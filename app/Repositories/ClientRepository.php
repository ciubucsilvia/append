<?php

namespace App\Repositories;

use App\Repositories\CoreRepository;
use App\Models\Client as Model;

class ClientRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getClients()
    {
        $attributes = new \stdClass;
        $attributes->columns = [
            'id', 
            'name',
            'image',
            'active'
        ];

        $attributes->take = config('settings.clients');
        $attributes->where = ['active', '1'];
        
        return $this->get($attributes);
    }
}