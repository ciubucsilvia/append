<?php

namespace App\Http\Controllers\Append\Admin;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;

class TagController extends AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->title = 'Tag';
        $this->folder = 'tags';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!$this->user->can('view tags')) abort('401');

        $this->title .= 's';

        $items = $this->tagRepository->getAllWithPaginate();
        
        $this->content = view($this->theme . '.admin.tags.index', 
            compact('items'));

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!$this->user->can('create tag')) abort('401');

        $this->title .= '::create';
        
        $this->content = view($this->theme . '.admin.tags.create');

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        if(!$this->user->can('store tag')) abort(401);
        $data = $request->all();
        
        $tag = $this->tagRepository->create($data);
        
        if($tag) {
            return redirect()
            ->route('admin.tags.index')
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
    public function show(Tag $tag)
    {
        if(!$this->user->can('show tag')) abort(401);

        $this->content = view(env('THEME') . '.admin.tags.show', 
            compact('tag'));
        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        if(!$this->user->can('edit tag')) abort(401);
        $this->title .= '::edit';
        $this->content = view(env('THEME') . '.admin.tags.edit', 
            compact('tag'));
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        if(!$this->user->can('update tag')) abort(401);
        $data = $request->all();
        
        $tag->update($data);

        if($tag) {
            return redirect()
            ->route('admin.tags.index')
            ->with(['success' => "Tag: $tag->name updated!"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error!'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        if(!$this->user->can('delete tag')) abort(401);
        $tagName = $tag->name;

        $tag->delete();
        
        return redirect()
            ->route('admin.tags.index')
            ->with(['success' => "Tag: $tagName deleted!"]);
    }
}
