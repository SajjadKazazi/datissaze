<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\AddMenuRequest;
use App\Http\Requests\Menu\UpdateMenuRequest;
use App\Models\Menu;
use App\Repositories\Admin\CategoryNewsRepositoryEloquent;
use App\Repositories\Admin\MenuRepositoryEloquent;
use App\Repositories\Admin\NewsRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MenuController extends Controller
{
    private $menu;

    public function __construct(MenuRepositoryEloquent $menu)
    {
        $this->menu = $menu;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $menus = $this->menu->with('parent')->orderBy('created_at', 'DESC')->paginate(15);

        $parents = $this->menu->get(['id','parent_id','title']);



        return view('admin.menus.index', compact('menus','parents'));
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
     * @return \Illuminate\Http\Response
     */
    public function store(AddMenuRequest $request)
    {

        $payload = [
            'parent_id' => is_null($request->get('parent_id')) ? 0 : $request->get('parent_id'),
            'title' => $request->get('title'),
            'url' => $request->get('url'),
            'type' => $request->get('type'),
            'visibility' => $request->get('visibility'),
            'order' => $request->get('order')
        ];

         $this->menu->create($payload);
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');

        return redirect()->route('admin.menus.index')->with('success_add', __('entities/menu.success.add'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $payload = [
            'parent_id' => is_null($request->get('parent_id')) ? 0 : $request->get('parent_id'),
            'title' => $request->get('title'),
            'url' => $request->get('url'),
            'type' => $request->get('type'),
            'visibility' => $request->get('visibility'),
            'order' => $request->get('order')
        ];
        $menu->update($payload);
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return redirect()->route('admin.menus.index')->with('success_add', __('entities/menu.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return response()->json(['success' => true, 'success_msg' => __('entities/menu.success.delete')]);
    }
}
