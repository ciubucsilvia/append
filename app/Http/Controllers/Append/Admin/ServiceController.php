<?php

namespace App\Http\Controllers\Append\Admin;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use App\Repositories\ServiceRepository;

class ServiceController extends AdminController
{
    protected $serviceRepository;

    public function __construct()
    {
        parent::__construct();
        
        $this->title = 'Service';
        $this->folder = 'services';

        $this->serviceRepository = app(ServiceRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!$this->user->can('view services')) abort('401');

        $this->title .= 's';

        $items = $this->serviceRepository->getAllWithPaginate();
        
        $this->content = view($this->theme . '.admin.services.index', 
            compact('items'));

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!$this->user->can('create service')) abort('401');

        $this->title .= '::create';
        
        $this->content = view($this->theme . '.admin.services.create');

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        if(!$this->user->can('store service')) abort(401);
        
        $data = $request->all();
        // create new object Service
        $service = $this->serviceRepository->create($data);
        
        // save $request->file('image')
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $this->serviceRepository->saveImage($service, $file, $this->folder);
        }
        // save $data['active']
        $this->serviceRepository->setActive($service, $data);

        if($service) {
            return redirect()
            ->route('admin.services.index')
            ->with(['success' => 'Successfully saved!']);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error!'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        if(!$this->user->can('show service')) abort(401);

        $this->content = view(env('THEME') . '.admin.services.show', 
            compact('service'));
        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        if(!$this->user->can('edit service')) abort(401);
        $this->title .= '::edit';
        $this->content = view(env('THEME') . '.admin.services.edit', 
            compact('service'));
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        if(!$this->user->can('update service')) abort(401);
        $data = $request->all();
        
        $service->update($data);
        
        // save $request->file('image')
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $this->serviceRepository->saveImage($service, $file, $this->folder);
        }
        // save $data['active']
        $this->serviceRepository->setActive($service, $data);

        if($service) {
            return redirect()
            ->route('admin.services.index')
            ->with(['success' => "Service: $service->name updated!"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error!'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if(!$this->user->can('delete service')) abort(401);
        $serviceTitle = $service->title;

        $this->serviceRepository->deleteImage($service->image, $this->folder);
        $service->delete();
        
        return redirect()
            ->route('admin.services.index')
            ->with(['success' => "Service: $serviceTitle deleted!"]);
    }
}
