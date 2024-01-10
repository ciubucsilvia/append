<?php

namespace App\Repositories;

use App\Repositories\CoreRepository;
use Spatie\Permission\Models\Role as Model;

class RoleRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }
}