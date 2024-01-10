<?php

namespace App\Http\Controllers\Append\Admin;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;

class ProjectController extends AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->title = 'Project';
        $this->folder = 'projects';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!$this->user->can('view projects')) abort('401');

        $this->title .= 's';

        $items = $this->projectRepository->getAllWithPaginate();
        
        $this->content = view($this->theme . '.admin.projects.index', 
            compact('items'));

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!$this->user->can('create project')) abort('401');

        $this->title .= '::create';

        $categories = $this->projectCategoryRepository->getForComboBox();
        $clients = $this->clientRepository->getForComboBoxActive();
        
        $this->content = view($this->theme . '.admin.projects.create', 
            compact('categories', 'clients'));

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        if(!$this->user->can('store project')) abort(401);
        
        $data = $request->all();
        // create new object 
        $project = $this->projectRepository->create($data);

        // save $request->file('image')
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $this->projectRepository->saveImageInJson($project, $file, $this->folder); 
        }
        
        // save $data['is_published']
        $this->projectRepository->setPublished($project, $data);

        if($project) {
            return redirect()
            ->route('admin.projects.index')
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
    public function show(Project $project)
    {
        if(!$this->user->can('show project')) abort(401);

        $this->content = view(env('THEME') . '.admin.projects.show', 
            compact('project'));
        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        if(!$this->user->can('edit project')) abort(401);
        $this->title .= '::edit';
        $categories = $this->projectCategoryRepository->getForComboBox();
        $clients = $this->clientRepository->getForComboBoxActive();

        $this->content = view(env('THEME') . '.admin.projects.edit', 
            compact('project', 'categories', 'clients'));
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        if(!$this->user->can('update project')) abort(401);
        $data = $request->all();
        
        $project->update($data);
        
        // save $request->file('image')
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $this->projectRepository->saveImageInJson($project, $file, $this->folder); 
        }
        
        // save $data['is_published']
        $this->projectRepository->setPublished($project, $data);

        if($project) {
            return redirect()
            ->route('admin.projects.index')
            ->with(['success' => "Project: $project->name updated!"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error!'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if(!$this->user->can('delete project')) abort(401);
        $projectTitle = $project->title;

        $this->projectRepository->deleteJsonImage($project->image, $this->folder);
        $project->delete();
        
        return redirect()
            ->route('admin.projects.index')
            ->with(['success' => "Project: $projectTitle deleted!"]);
    }
}
