<?php

namespace App\Repositories;

use App\Repositories\CoreRepository;
use App\Models\Question as Model;

class QuestionRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getQuestions()
    {
        $attributes = new \stdClass;
        $attributes->columns = [
            'id', 
            'question',
            'answer',
            'sort'
        ];
        
        return $this->get($attributes);
    }
}