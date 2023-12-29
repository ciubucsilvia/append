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
}