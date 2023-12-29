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
}