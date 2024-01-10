<?php

namespace App\Repositories;

use App\Repositories\CoreRepository;
use App\Models\ProjectCategory as Model;

class ProjectCategoryRepository extends CoreRepository
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
        
        $attributes->with = ['projects'];

        return $this->get($attributes);
    }
}