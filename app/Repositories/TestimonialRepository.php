<?php

namespace App\Repositories;

use App\Repositories\CoreRepository;
use App\Models\Testimonial as Model;

class TestimonialRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getTestimonials()
    {
        $attributes = new \stdClass;
        $attributes->columns = [
            'id', 
            'name',
            'occupation',
            'message',
            'rating',
            'image'
        ];

        $attributes->take = config('settings.testimonials');
        $attributes->where = ['active', '1'];
        
        return $this->get($attributes);
    }
}