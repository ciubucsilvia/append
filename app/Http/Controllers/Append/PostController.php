<?php

namespace App\Http\Controllers\Append;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $posts = $this->postRepository->getPosts();

        $this->title = 'Blog';
        $this->content = view($this->theme . '.blog', 
            compact('posts'));

        return $this->renderOutput();
    }

    public function show(string $slug)
    {
        $post = $this->postRepository->getBySlug($slug);
        if(!$post) abort(404);

        $this->title = $post->title;
        $this->description = $post->description;

        $categories = $this->postCategoryRepository->getCategories();
        $recentPosts = $this->postRepository->getPosts(config('settings.show_post_recent_posts'));
        $tags = $this->tagRepository->getTags()->random(config('settings.show_post_tags'));
        $comments = $post->comments()->orderBy('created_at', 'DESC')->get();
        
        $this->content = view($this->theme . '.blog_show', 
            compact('post', 'categories', 'recentPosts', 'tags', 'comments'));

        return $this->renderOutput();
    }
}
