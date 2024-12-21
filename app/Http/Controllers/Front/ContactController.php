<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\AddContactRequest;
use App\Repositories\Admin\ContactRepositoryEloquent;
use App\Support\Settings\CommunicationSettings;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
class ContactController extends Controller
{
    private $contactRepository;

    public function __construct(\App\Repositories\Front\ContactRepositoryEloquent $contactRepository)
    {

        $this->contactRepository = $contactRepository;
    }

    public function view(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        SEOTools::setTitle('تماس با ما');

        $settings = new CommunicationSettings();
        return view('front.pages.contact', compact('settings'));
    }

    public function store(AddContactRequest $request)
    {

        $payload = [
            'name' => $request->get('name'),
            'subject_type' => $request->get('subject_type'),
            'mobile' => $request->get('mobile'),
            'message' => $request->get('message'),
        ];
        $this->contactRepository->create($payload);
        return back()->with('success_add','پیام شما با موفقیت ارسال گردید');


    }
}
