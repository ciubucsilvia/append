<?php

namespace App\Http\Controllers\Append\Admin;

use App\Http\Requests\StoreProjectCategoryRequest;
use App\Http\Requests\UpdateProjectCategoryRequest;
use App\Models\ProjectCategory;

class ProjectCategoryController extends AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->title = 'Category';
        $this->folder = 'project-categories';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!$this->user->can('view project-categories')) abort('401');

        $this->title = 'Categories';

        $items = $this->projectCategoryRepository->getAllWithPaginate();
        
        $this->content = view($this->theme . '.admin.project-categories.index', 
            compact('items'));

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!$this->user->can('create project-category')) abort('401');

        $this->title .= '::create';
        
        $this->content = view($this->theme . '.admin.project-categories.create');

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectCategoryRequest $request)
    {
        if(!$this->user->can('store project-category')) abort(401);
        $data = $request->all();
        
        $category = $this->projectCategoryRepository->create($data);
        
        if($category) {
            return redirect()
            ->route('admin.project-categories.index')
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
    public function show(ProjectCategory $projectCategory)
    {
        if(!$this->user->can('show project-category')) abort(401);

        $this->content = view(env('THEME') . '.admin.project-categories.show', 
            compact('projectCategory'));
        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectCategory $projectCategory)
    {
        if(!$this->user->can('edit project-category')) abort(401);
        $this->title .= '::edit';
        $this->content = view(env('THEME') . '.admin.project-categories.edit', 
            compact('projectCategory'));
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectCategoryRequest $request, ProjectCategory $projectCategory)
    {
        if(!$this->user->can('update project-category')) abort(401);
        $data = $request->all();
        
        $projectCategory->update($data);

        if($projectCategory) {
            return redirect()
            ->route('admin.project-categories.index')
            ->with(['success' => "Category: $projectCategory->name updated!"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error!'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectCategory $projectCategory)
    {
        if(!$this->user->can('delete project-category')) abort(401);
        $projectCategoryName = $projectCategory->name;

        $projectCategory->delete();
        
        return redirect()
            ->route('admin.project-categories.index')
            ->with(['success' => "Category: $projectCategoryName deleted!"]);
    }
}
