<?php

namespace App\Repositories;

use App\Repositories\CoreRepository;
use Spatie\Permission\Models\Permission as Model;

class PermissionRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }
}