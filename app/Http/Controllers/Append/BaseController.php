<?php

namespace App\Http\Controllers\Append;

use App\Http\Controllers\Controller;
use App\Repositories\ServiceRepository;
use Illuminate\Support\Arr;

class BaseController extends Controller
{
    protected $template;
    protected $theme;
    protected $vars;

    protected $title = '';
    protected $content = '';

    protected $home = '';
    protected $clients = '';
    protected $aboutUs = '';
    protected $stats = '';
    protected $services = '';
    protected $features = '';
    protected $portfolio = '';
    protected $pricing = '';
    protected $faq = '';
    protected $team = '';
    protected $callToAction = '';
    protected $testimonials = '';
    protected $recentPosts = '';
    protected $contact = '';

    protected $service_repository;

    public function __construct()
    {

        $this->template = env('THEME') . '.index'; 
        $this->theme = env('THEME'); 

        $this->service_repository = app(ServiceRepository::class);
    }

    public function renderOutput()
    {
        $this->vars = Arr::add($this->vars, 'title', $this->title);
        $this->vars = Arr::add($this->vars, 'content', $this->content);

        $header = view($this->theme . '.header');
        $this->vars = Arr::add($this->vars, 'header', $header);

        $this->vars = Arr::add($this->vars, 'home', $this->home);
        $this->vars = Arr::add($this->vars, 'clients', $this->clients);
        $this->vars = Arr::add($this->vars, 'aboutUs', $this->aboutUs);
        $this->vars = Arr::add($this->vars, 'stats', $this->stats);
        $this->vars = Arr::add($this->vars, 'services', $this->services);
        $this->vars = Arr::add($this->vars, 'features', $this->features);
        $this->vars = Arr::add($this->vars, 'portfolio', $this->portfolio);
        $this->vars = Arr::add($this->vars, 'pricing', $this->pricing);
        $this->vars = Arr::add($this->vars, 'faq', $this->faq);
        $this->vars = Arr::add($this->vars, 'team', $this->team);
        $this->vars = Arr::add($this->vars, 'callToAction', $this->callToAction);
        $this->vars = Arr::add($this->vars, 'testimonials', $this->testimonials);
        $this->vars = Arr::add($this->vars, 'recentPosts', $this->recentPosts);
        $this->vars = Arr::add($this->vars, 'contact', $this->contact);
        
        $footer = view($this->theme . '.footer');
        $this->vars = Arr::add($this->vars, 'footer', $footer);

        return view($this->template)->with($this->vars);
    }
}
