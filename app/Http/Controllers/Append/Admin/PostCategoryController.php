<?php

namespace App\Http\Controllers\Append\Admin;

use App\Http\Requests\StorePostCategoryRequest;
use App\Http\Requests\UpdatePostCategoryRequest;
use App\Models\PostCategory;

class PostCategoryController extends AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->title = 'Category';
        $this->folder = 'post-categories';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!$this->user->can('view post-categories')) abort('401');

        $this->title = 'Categories';

        $items = $this->postCategoryRepository->getAllWithPaginate();
        
        $this->content = view($this->theme . '.admin.post-categories.index', 
            compact('items'));

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!$this->user->can('create post-category')) abort('401');

        $this->title .= '::create';
        
        $this->content = view($this->theme . '.admin.post-categories.create');

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostCategoryRequest $request)
    {
        if(!$this->user->can('store post-category')) abort(401);
        $data = $request->all();
        
        $category = $this->postCategoryRepository->create($data);
        
        if($category) {
            return redirect()
            ->route('admin.post-categories.index')
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
    public function show(PostCategory $postCategory)
    {
        if(!$this->user->can('show post-category')) abort(401);

        $this->content = view(env('THEME') . '.admin.post-categories.show', 
            compact('postCategory'));
        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostCategory $postCategory)
    {
        if(!$this->user->can('edit post-category')) abort(401);
        $this->title .= '::edit';
        $this->content = view(env('THEME') . '.admin.post-categories.edit', 
            compact('postCategory'));
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostCategoryRequest $request, PostCategory $postCategory)
    {
        if(!$this->user->can('update post-category')) abort(401);
        $data = $request->all();
        
        $postCategory->update($data);

        if($postCategory) {
            return redirect()
            ->route('admin.post-categories.index')
            ->with(['success' => "Category: $postCategory->name updated!"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error!'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCategory $postCategory)
    {
        if(!$this->user->can('delete post-category')) abort(401);
        $postCategoryName = $postCategory->name;

        $postCategory->delete();
        
        return redirect()
            ->route('admin.post-categories.index')
            ->with(['success' => "Category: $postCategoryName deleted!"]);
    }
}
