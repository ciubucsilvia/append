<?php

namespace App\Http\Controllers\Append;

class ProjectController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->title = 'Portfolio';
        $items = $this->projectRepository->getProjects();
        
        $categories = $this->projectCategoryRepository->getCategories();
        $this->content = view($this->theme . '.portfolio', 
            compact('items', 'categories'));
        return $this->renderOutput();
    }

    public function show(string $slug)
    {
        $project = $this->projectRepository->getBySlug($slug);
        if(!$project) abort(404);

        $this->title = $project->title;
        $this->description = $project->description;

        $testimonials = $this->testimonialRepository->getTestimonials();
        $testimonial = $testimonials->random();
    
        $this->content = view($this->theme . '.portfolio_show', 
            compact('project', 'testimonial'));

        return $this->renderOutput();
    }
}
