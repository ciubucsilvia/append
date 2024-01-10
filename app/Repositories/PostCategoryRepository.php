<?php

namespace App\Repositories;

use App\Repositories\CoreRepository;
use App\Models\PostCategory as Model;

class PostCategoryRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getCategories()
    {
        $attributes = new \stdClass;
        $attributes->columns = [
            'id', 
            'name',
            'slug',
        ];

        $attributes->with = ['posts'];
        
        return $this->get($attributes);
    }
}