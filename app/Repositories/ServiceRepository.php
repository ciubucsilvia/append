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

    public function getServices($take = null)
    {
        $attributes = new \stdClass;
        $attributes->columns = [
            'id', 
            'title',
            'slug',
            'icon',
            'description'
        ];

        $attributes->take = $take;
        $attributes->where = ['active', '1'];
        
        return $this->get($attributes);
    }
}