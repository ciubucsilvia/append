<?php

namespace App\Repositories;

use App\Repositories\CoreRepository;
use App\Models\Project as Model;

class ProjectRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getProjects()
    {
        $attributes = new \stdClass;
        $attributes->columns = [
            'id', 
            'title',
            'slug',
            'image',
            'project_category_id',
            'client_id'
        ];

        $attributes->perPage = config('settings.projects');
        $attributes->where = ['is_published', true];
        $attributes->with = ['category', 'client'];
        
        return $this->get($attributes);
    }
}