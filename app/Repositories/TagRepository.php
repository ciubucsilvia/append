<?php

namespace App\Repositories;

use App\Repositories\CoreRepository;
use App\Models\Tag as Model;

class TagRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getTags()
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