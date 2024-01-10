<?php

namespace App\Http\Controllers\Append\Admin;

use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;
use App\Models\Feature;
use App\Repositories\FeatureRepository;

class FeatureController extends AdminController
{
    protected $featureRepository;

    public function __construct()
    {
        parent::__construct();
        
        $this->title = 'Feature';
        $this->folder = 'features';

        $this->featureRepository = app(FeatureRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!$this->user->can('view features')) abort('401');

        $this->title .= 's';

        $items = $this->featureRepository->getAllWithPaginate();
        
        $this->content = view($this->theme . '.admin.features.index', 
            compact('items'));

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!$this->user->can('create feature')) abort('401');

        $this->title .= '::create';
        
        $this->content = view($this->theme . '.admin.features.create');

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeatureRequest $request)
    {
        if(!$this->user->can('store feature')) abort(401);
        $data = $request->all();
        
        $client = $this->featureRepository->create($data);
        
        // save $request->file('image')
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $this->featureRepository->saveImage($client, $file, $this->folder);
        }
        // save $data['active']
        $this->featureRepository->setActive($client, $data);

        if($client) {
            return redirect()
            ->route('admin.features.index')
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
    public function show(Feature $feature)
    {
        if(!$this->user->can('show feature')) abort(401);

        $this->content = view(env('THEME') . '.admin.features.show', 
            compact('feature'));
        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        if(!$this->user->can('edit feature')) abort(401);
        $this->title .= '::edit';
        $this->content = view(env('THEME') . '.admin.features.edit', 
            compact('feature'));
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
        if(!$this->user->can('update feature')) abort(401);
        $data = $request->all();
        
        $feature->update($data);
        
        // save $request->file('image')
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $this->featureRepository->saveImage($feature, $file, $this->folder);
        }
        // save $data['active']
        $this->featureRepository->setActive($feature, $data);

        if($feature) {
            return redirect()
            ->route('admin.features.index')
            ->with(['success' => "Feature: $feature->title updated!"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error!'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        if(!$this->user->can('delete feature')) abort(401);
        $featureTitle = $feature->title;

        $this->featureRepository->deleteImage($feature->image, $this->folder);
        $feature->delete();
        
        return redirect()
            ->route('admin.features.index')
            ->with(['success' => "Feature: $featureTitle deleted!"]);
    }
}
