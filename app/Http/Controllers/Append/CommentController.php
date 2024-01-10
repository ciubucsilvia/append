<?php

namespace App\Http\Controllers\Append;

use App\Http\Controllers\Append\BaseController;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store(StoreCommentRequest $request)
    {
        $data = $request->all();
        $comment = Comment::create($data);
        
        $slug = $data['post_slug'];

        if($comment) {
            return redirect()->route('posts.show', $slug);
        }
    }
}
