<?php

namespace App\Repositories;

use App\Repositories\CoreRepository;
use App\Models\User as Model;

class UserRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getTeam() {
        $attributes = new \stdClass;
        $attributes->columns = [
            'name', 
            'image',
            'occupation',
            'description',
            'social_twitter',
            'social_facebook',
            'social_instagram',
            'social_linkedin'
        ];

        $attributes->take = config('settings.team');
        $attributes->where = ['is_team', '1'];
        
        return $this->get($attributes);
    }
}