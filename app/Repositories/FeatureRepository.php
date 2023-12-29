<?php

namespace App\Repositories;

use App\Repositories\CoreRepository;
use App\Models\Feature as Model;

class FeatureRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getFeatures()
    {
        $attributes = new \stdClass;
        $attributes->columns = [
            'id', 
            'title',
            'slug',
            'image',
            'content'
        ];

        $attributes->take = config('settings.features');
        $attributes->where = ['active', '1'];
        
        return $this->get($attributes);
    }
}