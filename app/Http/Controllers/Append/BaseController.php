<?php

namespace App\Http\Controllers\Append;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\PostCategoryRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\TagRepository;
use App\Repositories\TestimonialRepository;
use Illuminate\Support\Arr;

class BaseController extends Controller
{
    protected $template;
    protected $theme;
    protected $vars;

    protected $title = '';
    protected $content = '';
    protected $description = '';

    protected $home = '';
    protected $clients = '';
    protected $aboutUs = '';
    protected $stats = '';
    protected $services = '';
    protected $features = '';
    // protected $portfolio = '';
    // protected $pricing = '';
    protected $faq = '';
    protected $team = '';
    protected $callToAction = '';
    protected $testimonials = '';
    protected $recentPosts = '';
    protected $contact = '';

    protected $serviceRepository;
    protected $projectRepository;
    protected $projectCategoryRepository;
    protected $postRepository;
    protected $postCategoryRepository;
    protected $testimonialRepository;
    protected $tagRepository;

    public function __construct()
    {

        $this->template = env('THEME') . '.index'; 
        $this->theme = env('THEME'); 

        $this->serviceRepository = app(ServiceRepository::class);
        $this->projectRepository = app(ProjectRepository::class);
        $this->projectCategoryRepository = app(ProjectCategoryRepository::class);
        $this->postRepository = app(PostRepository::class);
        $this->testimonialRepository = app(TestimonialRepository::class);
        $this->postCategoryRepository = app(PostCategoryRepository::class);
        $this->tagRepository = app(TagRepository::class);
    }

    public function renderOutput()
    {
        $this->vars = Arr::add($this->vars, 'title', $this->title);
        $this->vars = Arr::add($this->vars, 'description', $this->description);
        $this->vars = Arr::add($this->vars, 'content', $this->content);

        $header = view($this->theme . '.header');
        $this->vars = Arr::add($this->vars, 'header', $header);

        $this->vars = Arr::add($this->vars, 'home', $this->home);
        $this->vars = Arr::add($this->vars, 'clients', $this->clients);
        $this->vars = Arr::add($this->vars, 'aboutUs', $this->aboutUs);
        $this->vars = Arr::add($this->vars, 'stats', $this->stats);
        $this->vars = Arr::add($this->vars, 'services', $this->services);
        $this->vars = Arr::add($this->vars, 'features', $this->features);
        // $this->vars = Arr::add($this->vars, 'portfolio', $this->portfolio);
        // $this->vars = Arr::add($this->vars, 'pricing', $this->pricing);
        $this->vars = Arr::add($this->vars, 'faq', $this->faq);
        $this->vars = Arr::add($this->vars, 'team', $this->team);
        $this->vars = Arr::add($this->vars, 'callToAction', $this->callToAction);
        $this->vars = Arr::add($this->vars, 'testimonials', $this->testimonials);
        $this->vars = Arr::add($this->vars, 'recentPosts', $this->recentPosts);
        $this->vars = Arr::add($this->vars, 'contact', $this->contact);
        
        $services = $this->serviceRepository->getServices(config('settings.footer_services'));
        $footer = view($this->theme . '.footer', compact('services'));
        $this->vars = Arr::add($this->vars, 'footer', $footer);

        return view($this->template)->with($this->vars);
    }
}
