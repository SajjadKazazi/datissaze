<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\Category\AddStaffCategoryRequest;
use App\Http\Requests\Staff\Category\UpdateStaffCategoryRequest;
use App\Models\Service;
use App\Models\StaffCategory;
use App\Repositories\Admin\StaffCategoryRepositoryEloquent;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class StaffCategoryController extends Controller
{
    private $staffCategory;

    public function __construct(StaffCategoryRepositoryEloquent $staffCategory)
    {

        $this->staffCategory = $staffCategory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = $this->staffCategory->orderBy('created_at','DESC')->paginate(10);

        return view('admin.staffs.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddStaffCategoryRequest $request)
    {
        $slug = SlugService::createSlug(StaffCategory::class, 'slug', $request->get('slug'), ['unique' => false]);

        $payload = [
            'title' => $request->get('title'),
            'slug' => $slug,
            'description' => $request->get('description')
        ];

        $this->staffCategory->create($payload);

        return redirect()->route('admin.Staffs.categories.index')->with('success_add', __('entities/category.success.add'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StaffCategory  $staffCategory
     * @return \Illuminate\Http\Response
     */
    public function show(StaffCategory $staffCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StaffCategory  $staffCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(StaffCategory $staffCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StaffCategory  $staffCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateStaffCategoryRequest $request, StaffCategory $category)
    {
        $slug = SlugService::createSlug(StaffCategory::class, 'slug', $request->get('slug'), ['unique' => false]);

        $payload = [
            'title' => $request->get('title'),
            'slug' => $slug,
            'description' => $request->get('description')
        ];
        $category->update($payload);
        return redirect()->route('admin.Staffs.categories.index')->with('success_add', __('entities/category.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StaffCategory  $staffCategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(StaffCategory $category)
    {
        $category->delete();
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return response()->json(['success' => true, 'success_msg' => __('entities/category.success.delete')]);
    }
}
