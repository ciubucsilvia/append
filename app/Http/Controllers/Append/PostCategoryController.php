<?php

namespace App\Http\Controllers\Append;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostCategoryController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show(string $slug)
    {
        $category = $this->postCategoryRepository->getBySlug($slug);
        if(!$category) abort(404);

        $this->title = $category->name;

        $posts = $category->posts()->paginate(config('settings.posts'));

        $this->content = view($this->theme . '.blog', 
            compact('posts'));

        return $this->renderOutput();
    }
}
