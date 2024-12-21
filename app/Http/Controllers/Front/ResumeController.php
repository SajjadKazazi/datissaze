<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Resume\AddResumeRequest;
use App\Repositories\Front\ResumeRepositoryEloquent;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    private $resumeRepository;

    public function __construct(ResumeRepositoryEloquent $resumeRepository)
    {

        $this->resumeRepository = $resumeRepository;
    }
    public function view(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        SEOTools::setTitle(' فرصت های شغلی');

        return view('front.pages.resume');
    }

    public function store(Request $request)
    {

        if($request->hasfile('pic')){
            $filename = uuid_create();
            $pic =$filename .'.'. $request->file('pic')->getClientOriginalExtension();
            $request->file('pic')->storeAs('/resumes/pics/' , $pic,'public_uploads');
        }
        if($request->hasfile('file')){
            $filename = uuid_create();
            $file_last =$filename . '.pdf';
            $request->file('file')->storeAs('public/resumes/' , $file_last);
        }
        $payload = [
            'name' => $request->get('name'),
            'mobile' => $request->get('mobile'),
            'email' => $request->get('email'),
            'file' => $file_last,
            'pic' => '/uploads/resumes/pics/' . $pic,
        ];
        $this->resumeRepository->create($payload);
        return back()->with('success_add','رزومه شما با موفقیت ارسال گردید');


    }
}
