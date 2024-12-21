<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portfolio\AddServiceRequest;
use App\Http\Requests\Portfolio\UpdateServiceRequest;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\Service;
use App\Repositories\Admin\ContactRepositoryEloquent;
use App\Repository\Eloquent\ContactRepository;
use App\Repository\Eloquent\ServiceRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactRepository;

    public function __construct(ContactRepositoryEloquent $contactRepository)
    {

        $this->contactRepository = $contactRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $contacts = $this->contactRepository->orderBy('created_at','DESC')->paginate(15);


        return view('admin.contact.index', compact('contacts'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Contact $contact): \Illuminate\Http\JsonResponse
    {
        $contact->delete();
        return response()->json(['success' => true, 'success_msg' => __('entities/contact.success.delete')]);
    }

}
