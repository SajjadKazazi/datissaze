<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cooperator\AddCooperationRequest;
use App\Http\Requests\Cooperator\UpdateCooperationRequest;
use App\Models\Cooperator;
use App\Models\Meta;
use App\Repositories\Admin\CooperatorRepositoryEloquent;
use App\Repository\Eloquent\CooperatorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CooperatorController extends Controller
{
    private $cooperatorRepository;

    public function __construct(CooperatorRepositoryEloquent $CooperatorRepository)
    {

        $this->cooperatorRepository   = $CooperatorRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $cooperators = $this->cooperatorRepository->orderBy('created_at','DESC')->paginate(15);

        return view('admin.cooperators.index', compact('cooperators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.cooperators.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddCooperationRequest $request): \Illuminate\Http\RedirectResponse
    {
        $payload = [
            'name' => $request->get('name'),
            'img' => $request->get('img')
        ];
        $cooperator = $this->cooperatorRepository->create($payload);

        $meta = new Meta;
        $meta->meta_title = $request->get('meta_title');
        $meta->meta_description = $request->get('meta_description');
        $meta->meta_canonical = $request->get('meta_canonical');
        $cooperator->meta()->save($meta);
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');

        return redirect()->route('admin.cooperators.index')->with('success_add', __('entities/cooperator.success.add'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cooperator  $cooperator
     * @return \Illuminate\Http\Response
     */
    public function show(Cooperator $cooperator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cooperator  $cooperator
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Cooperator $cooperator): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.cooperators.edit', compact('cooperator'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cooperator  $cooperator
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCooperationRequest $request, Cooperator $cooperator): \Illuminate\Http\RedirectResponse
    {
        $image_file = $request->get('img');


        if (!is_null($image_file)) {
            $image = $image_file;
        }
        else{
            $image = $cooperator->img;
        }


        $payload = [
            'img' => $image ,
            'name' => $request->get('name')
        ];

        $cooperator->update($payload);
        $cooperator->meta()->updateOrCreate([
            'meta_title' => $request->get('meta_title'),
            'meta_description' => $request->get('meta_description'),
            'meta_canonical' => $request->get('meta_canonical'),
        ]);
        return redirect()->route('admin.cooperators.index')->with('success_add', __('entities/cooperator.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cooperator  $cooperator
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Cooperator $cooperator): \Illuminate\Http\JsonResponse
    {
        $cooperator->delete();
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return response()->json(['success' => true, 'success_msg' => __('entities/cooperator.success.delete')]);
    }
}
