<?php

namespace App\Http\Controllers\Append;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectCategoryController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show(string $slug)
    {
        $category = $this->projectCategoryRepository->getBySlug($slug);
        if(!$category) abort(404);

        $this->title = $category->name;
        $this->description = $category->description;
        
        $items = $category->projects()->paginate(config('settings.projects'));
        $categories = $this->projectCategoryRepository->getCategories();

        $this->content = view($this->theme . '.portfolio', 
            compact('items', 'categories'));
        return $this->renderOutput();

        return $this->renderOutput();
    }
}
