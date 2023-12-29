<?php

namespace App\Repositories;

use App\Repositories\CoreRepository;
use App\Models\Service as Model;

class ServiceRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getServices()
    {
        $attributes = new \stdClass;
        $attributes->columns = [
            'id', 
            'title',
            'slug',
            'image',
            'icon',
            'description'
        ];

        $attributes->take = config('settings.services');
        $attributes->where = ['active', '1'];
        
        return $this->get($attributes);
    }
}