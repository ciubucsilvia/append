<?php

namespace App\Http\Controllers\Append\Admin;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends AdminController
{
    protected $userRepository;

    public function __construct()
    {
        parent::__construct();

        $this->title = 'User';
        $this->userRepository = app(UserRepository::class);
        $this->folder = 'users';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!$this->user->hasPermissionTo('view users')) abort('401');

        $this->title .= 's';

        $items = $this->userRepository->getAllWithPaginate();

        $this->content = view($this->theme . '.admin.users.index', compact('items'));

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if(!$this->user->hasPermissionTo('show user')) abort('401');

        $this->content = view($this->theme . '.admin.users.show', 
            compact('user'));

        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if(!$this->user->hasPermissionTo('edit user')) abort(401);

        $this->title .= "::edit";
        $roles = $this->roleRepository->getForComboBox();

        $this->content = view($this->theme . '.admin.users.edit', 
            compact('user', 'roles'));

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if(!$this->user->hasPermissionTo('update user')) abort(401);
        $data = $request->all();

        $result = $user->update($data);
        
        if(isset($data['roles'])) {
            $user->syncRoles($data['roles']);
        } else {
            $user->syncRoles();
        }

        // save $data['is_team']
        $this->userRepository->setIsTeam($user, $data);

        if($result) {
            return redirect()
            ->route('admin.users.index')
            ->with(['success' => "Permission: $user->name updated!"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error!'])
                ->withInput();
        } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if(!$this->user->hasPermissionTo('delete permission')) abort('401');
        $userName = $user->name;

        $user->delete();
        $user->syncRoles();
        
        return redirect()
            ->route('admin.permissions.index')
            ->with(['success' => "Permission: $userName deleted!"]);
    }
}
