<?php

namespace App\Http\Controllers\Append\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ClientRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\PostCategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\RoleRepository;
use App\Repositories\TagRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $template;
    protected $theme;
    protected $vars;

    protected $user;
    protected $title = 'Title';
    protected $content;

    protected $folder;

    protected $permissionRepository;
    protected $roleRepository;
    protected $clientRepository;
    protected $projectCategoryRepository;
    protected $projectRepository;
    protected $postCategoryRepository;
    protected $postRepository;
    protected $tagRepository;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();

            if(!$this->user) {
                abort(404);
            }

            return $next($request);
        });

        $this->template = env('THEME') . '.admin.index'; 
        $this->theme = env('THEME'); 

        $this->permissionRepository = app(PermissionRepository::class);
        $this->roleRepository = app(RoleRepository::class);
        $this->clientRepository = app(ClientRepository::class);
        $this->projectCategoryRepository = app(ProjectCategoryRepository::class);
        $this->projectRepository = app(ProjectRepository::class);
        $this->postCategoryRepository = app(PostCategoryRepository::class);
        $this->postRepository = app(PostRepository::class);
        $this->tagRepository = app(TagRepository::class);
    }

    public function renderOutput()
    {
        $this->vars = Arr::add($this->vars, 'title', $this->title);
        $this->vars = Arr::add($this->vars, 'route', $this->folder);
        $this->vars = Arr::add($this->vars, 'content', $this->content);

        $navbar = view($this->theme . '.admin.parts.navbar');
        $this->vars = Arr::add($this->vars, 'navbar', $navbar);

        $sidebar = view($this->theme . '.admin.parts.sidebar');
        $this->vars = Arr::add($this->vars, 'sidebar', $sidebar);

        $footer = view($this->theme . '.admin.parts.footer');
        $this->vars = Arr::add($this->vars, 'footer', $footer);

        return view($this->template)->with($this->vars);
    }
}
