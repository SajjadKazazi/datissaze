<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Resume;
use App\Repositories\Admin\ContactRepositoryEloquent;
use App\Repositories\Admin\ResumeRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    private $resumeRepository;

    public function __construct(ResumeRepositoryEloquent $resumeRepository)
    {

        $this->resumeRepository = $resumeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {

        $resumes = $this->resumeRepository->orderBy('created_at','DESC')->paginate(15);


        return view('admin.resumes.index', compact('resumes'));
    }
    public function download($resume){

        $resume = $this->resumeRepository->findByField('id',$resume)->first();
        $file = storage_path().'/'.'app/public'.'/resumes/'.$resume->file;

        if(file_exists($file)){
            return response()->file($file);

        }
        return abort(404);
    }

    public function download_pic($resume){

        $resume = $this->resumeRepository->findByField('id',$resume)->first();
        $file = storage_path().'/'.'app/public'.'/resumes/pics/'.$resume->pic;

        if(file_exists($file)){
            return response()->download($file);

        }
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Resume $resume): \Illuminate\Http\JsonResponse
    {
//        $file = $resume->file;
//        $file_pic = $resume->pic;
//        unlink($file);
//        unlink($file_pic);

        $resume->delete();

        return response()->json(['success' => true, 'success_msg' => __('entities/resume.success.delete')]);
    }

}
