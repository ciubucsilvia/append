<?php

namespace App\Http\Controllers\Append;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show(string $slug)
    {
        $tag = $this->tagRepository->getBySlug($slug);
        if(!$tag) abort(404);

        $this->title = $tag->name;

        $posts = $tag->posts()->paginate(config('settings.posts'));

        $this->content = view($this->theme . '.blog', 
            compact('posts'));

        return $this->renderOutput();
    }
}
