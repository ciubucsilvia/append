<?php

namespace App\Http\Controllers\Append\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PermissionRepository;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\RoleRepository;
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

    protected $permission_repository;
    protected $role_repository;
    protected $projectCategoryRepository;

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

        $this->permission_repository = app(PermissionRepository::class);
        $this->role_repository = app(RoleRepository::class);
        $this->projectCategoryRepository = app(ProjectCategoryRepository::class);
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
