<?php

namespace App\Repositories;

use App\Repositories\CoreRepository;
use App\Models\Post as Model;

class PostRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getPosts($take = false)
    {
        $attributes = new \stdClass;
        $attributes->columns = [
            'id', 
            'title',
            'slug',
            'image',
            'post_category_id',
            'user_id'
        ];

        if($take) {
            $attributes->take = $take;
        } else {
            $attributes->perPage = config('settings.posts');
        }
        
        $attributes->where = ['is_published', true];
        $attributes->with = ['category', 'user', 'tags'];
        
        return $this->get($attributes);
    }
}