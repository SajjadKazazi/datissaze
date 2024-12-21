<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portfolio\AddStaffRequest;
use App\Models\Meta;
use App\Models\Staff;
use App\Repositories\Admin\StaffCategoryRepositoryEloquent;
use App\Repositories\Admin\StaffRepositoryEloquent;
use App\Repository\Eloquent\StaffRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class StaffController extends Controller
{
    private $staffRepository,$categoryRepository;

    public function __construct(StaffRepositoryEloquent $staffRepository , StaffCategoryRepositoryEloquent $categoryRepository)
    {

        $this->staffRepository = $staffRepository;
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $staffs = $this->staffRepository->orderBy('created_at','DESC')->with('category')->paginate(15);

        return view('admin.staffs.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories =$this->categoryRepository->get(['id','title']);

        return view('admin.staffs.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddStaffRequest $request): \Illuminate\Http\RedirectResponse
    {

        $payload = [
            'name' => $request->get('name'),
            'avatar' => $request->get('avatar'),
            'job' => $request->get('job'),
            'category_id' => $request->get('category_id'),

        ];
        $staff = $this->staffRepository->create($payload);
        $meta = new Meta;
        $meta->meta_title =$request->get('meta_title');
        $meta->meta_description =$request->get('meta_description');
        $meta->meta_canonical =$request->get('meta_canonical');
        $staff->meta()->save($meta);
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return redirect()->route('admin.staffs.index')->with('success_add', __('entities/staff.success.add'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Staff $staff): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories =$this->categoryRepository->get(['id','title']);

        return view('admin.staffs.edit', compact('staff','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Staff $staff): \Illuminate\Http\RedirectResponse
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        $image_file = $request->get('avatar');


        if (!is_null($image_file)) {
            $image = $image_file;
        }
        else{
            $image = $staff->avatar;

        }

        $payload = [
            'name' => $request->get('name'),
            'avatar' => $image,
            'job' => $request->get('job'),
            'category_id' => $request->get('category_id'),

        ];

        $staff->update($payload);

        $staff->meta()->updateOrCreate([],[
            'meta_title'=>$request->get('meta_title'),
            'meta_description'=>$request->get('meta_description'),
            'meta_canonical'=>$request->get('meta_canonical'),
        ]);
        return redirect()->route('admin.staffs.index')->with('success_add', __('entities/staff.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Staff $staff): \Illuminate\Http\JsonResponse
    {
        $staff->delete();
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return response()->json(['success' => true, 'success_msg' => __('entities/staff.success.delete')]);
    }

}
