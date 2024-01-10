<?php

namespace App\Http\Controllers\Append\Admin;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->title = 'Post';
        $this->folder = 'posts';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!$this->user->can('view posts')) abort('401');

        $this->title .= 's';

        $items = $this->postRepository->getAllWithPaginate();
        
        $this->content = view($this->theme . '.admin.posts.index', 
            compact('items'));

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!$this->user->can('create post')) abort('401');

        $this->title .= '::create';

        $categories = $this->postCategoryRepository->getForComboBox();
        $tags = $this->tagRepository->getForComboBox();
        
        $this->content = view($this->theme . '.admin.posts.create', 
            compact('categories', 'tags'));

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        if(!$this->user->can('store post')) abort(401);
        
        $data = $request->all();
        $data['user_id'] = $this->user->id;
        
        // create new object 
        $post = $this->postRepository->create($data);
        $post->tags()->attach($data['tags']);

        // save $request->file('image')
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $this->postRepository->saveImage($post, $file, $this->folder); 
        }
        
        // save $data['is_published']
        $this->postRepository->setPublished($post, $data);

        if($post) {
            return redirect()
            ->route('admin.posts.index')
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
    public function show(Post $post)
    {
        if(!$this->user->can('show post')) abort(401);

        $this->content = view(env('THEME') . '.admin.posts.show', 
            compact('post'));
        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if(!$this->user->can('edit post')) abort(401);
        $this->title .= '::edit';
        $categories = $this->postCategoryRepository->getForComboBox();
        $tags = $this->tagRepository->getForComboBox();

        $this->content = view(env('THEME') . '.admin.posts.edit', 
            compact('post', 'categories', 'tags'));
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if(!$this->user->can('update post')) abort(401);
        $data = $request->all();
        
        $post->update($data);

        // remove alte tags and add neu
        if($data['tags']) {
            $post->tags()->detach($post->tags);
            $post->tags()->attach($data['tags']);
        } 
        
        // save $request->file('image')
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $this->postRepository->saveImageInJson($post, $file, $this->folder); 
        }
        
        // save $data['is_published']
        $this->projectRepository->setPublished($post, $data);

        if($post) {
            return redirect()
            ->route('admin.posts.index')
            ->with(['success' => "Post: $post->name updated!"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error!'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if(!$this->user->can('delete post')) abort(401);
        $postTitle = $post->title;

        $this->projectRepository->deleteImage($post->image, $this->folder);
        $post->tags()->detach($post->tags);
        $post->delete();
        
        return redirect()
            ->route('admin.posts.index')
            ->with(['success' => "Post: $postTitle deleted!"]);
    }
}
