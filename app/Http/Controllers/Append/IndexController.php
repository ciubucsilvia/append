<?php

namespace App\Http\Controllers\Append;

use App\Repositories\ClientRepository;
use App\Repositories\FeatureRepository;

class IndexController extends BaseController
{
    private $client_repository;
    private $feature_repository;

    public function __construct()
    {
        parent::__construct();

        $this->client_repository = app(ClientRepository::class);
        $this->feature_repository = app(FeatureRepository::class);
    }

    public function index() 
    {
        $this->home = view($this->theme . '.home');
        $this->aboutUs = view($this->theme . '.about_us');

        $clients = $this->client_repository->getClients();
        $this->clients = view($this->theme . '.clients', compact('clients'));

        $this->stats = view($this->theme . '.stats');

        $services = $this->service_repository->getServices();
        $this->services = view($this->theme . '.services', compact('services'));

        $features = $this->feature_repository->getFeatures();
        $this->features = view($this->theme . '.features', compact('features'));
        
        $this->portfolio = view($this->theme . '.portfolio');
        $this->pricing = view($this->theme . '.pricing');
        $this->faq = view($this->theme . '.faq');
        $this->team = view($this->theme . '.team');
        $this->callToAction = view($this->theme . '.call_to_action');
        $this->testimonials = view($this->theme . '.testimonials');
        $this->recentPosts = view($this->theme . '.recent_posts');
        $this->contact = view($this->theme . '.contact');

        return $this->renderOutput();
    }
}
