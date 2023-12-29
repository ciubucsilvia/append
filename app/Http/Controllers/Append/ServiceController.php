<?php

namespace App\Http\Controllers\Append;

class ServiceController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show(string $slug)
    {
        $service = $this->service_repository->getBySlug($slug);
        
        if($service) {
            $this->content = view(env('THEME') . '.service_show', 
                compact('service'));
            return $this->renderOutput();
        }
        return abort(404);
    }
}
