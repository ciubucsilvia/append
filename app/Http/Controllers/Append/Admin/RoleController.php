<?php

namespace App\Http\Controllers\Append\Admin;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Role;

class RoleController extends AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->title = 'Role';
        $this->folder = 'roles';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!$this->user->can('view roles')) abort('401');

        $this->title .= 's';

        $items = $this->roleRepository->getAllWithPaginate();

        $this->content = view($this->theme . '.admin.roles.index', compact('items'));

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!$this->user->hasPermissionTo('create role')) abort('401');

        $this->title .= '::create';
        $permissions = $this->permissionRepository->getForComboBox();
        
        $this->content = view($this->theme . '.admin.roles.create', 
            compact('permissions'));

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        if(!$this->user->hasPermissionTo('store role')) abort(401);
        $data = $request->all();
        
        $role = Role::create($data); 
        
        if(isset($data['permissions'])) {
           $role->syncPermissions($data['permissions']);
        }

        if($role) {
            return redirect()
            ->route('admin.roles.index')
            ->with(['success' => 'Successfully saved!']);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error!'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        if(!$this->user->can('show role')) abort('401');

        $this->content = view($this->theme . '.admin.roles.show', 
            compact('role'));

        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        if(!$this->user->hasPermissionTo('edit role')) abort('401');
        
        $this->title .= '::edit';

        $permissions = $this->permissionRepository->getForComboBox();
        $this->content = view($this->theme . '.admin.roles.edit', 
            compact('role', 'permissions'));

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        if(!$this->user->hasPermissionTo('update role')) abort(401);
        
        $data = $request->all();
        $result = $role->update($data);

        if(isset($data['permissions'])) {
            $role->syncPermissions($data['permissions']);
        } else {
            $role->syncPermissions();
        }

        if($result) {
            return redirect()
            ->route('admin.roles.index')
            ->with(['success' => "Role: $role->name updated!"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error!'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if(!$this->user->hasPermissionTo('delete role')) abort('401');
        $roleName = $role->name;

        $role->delete();
        $role->syncPermissions();
        
        return redirect()
            ->route('admin.roles.index')
            ->with(['success' => "Role: $roleName deleted!"]);
    }
}
