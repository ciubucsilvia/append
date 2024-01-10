<?php

namespace App\Http\Controllers\Append;

use App\Repositories\ClientRepository;
use App\Repositories\FeatureRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\UserRepository;

class IndexController extends BaseController
{
    private $clientRepository;
    private $featureRepository;
    private $questionRepository;
    private $userRepository;

    public function __construct()
    {
        parent::__construct();

        $this->clientRepository = app(ClientRepository::class);
        $this->featureRepository = app(FeatureRepository::class);
        $this->questionRepository = app(QuestionRepository::class);
        $this->userRepository = app(UserRepository::class);

        $this->title = 'Home';
        $this->description = 'Home';
    }

    public function index() 
    {
        $this->home = view($this->theme . '.home');
        $this->aboutUs = view($this->theme . '.about_us');

        $clients = $this->clientRepository->getClients();
        $this->clients = view($this->theme . '.clients', compact('clients'));

        $this->stats = view($this->theme . '.stats');

        $services = $this->serviceRepository->getServices(config('settings.home_services'));
        $this->services = view($this->theme . '.services', compact('services'));

        $features = $this->featureRepository->getFeatures();
        $this->features = view($this->theme . '.features', compact('features'));
        
        $questions = $this->questionRepository->getQuestions();
        $this->faq = view($this->theme . '.faq', compact('questions'));

        $team = $this->userRepository->getTeam();
        $this->team = view($this->theme . '.team', compact('team'));

        $this->callToAction = view($this->theme . '.call_to_action');
        
        $testimonials = $this->testimonialRepository->getTestimonials();
        $this->testimonials = view($this->theme . '.testimonials', 
            compact('testimonials'));

        $posts = $this->postRepository->getPosts(config('settings.home_recent_posts'));
        $this->recentPosts = view($this->theme . '.recent_posts', compact('posts'));
        $this->contact = view($this->theme . '.contact');

        return $this->renderOutput();
    }
}
