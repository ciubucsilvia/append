<?php

namespace App\Http\Controllers\Append\Admin;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Spatie\Permission\Models\Permission;

class PermissionController extends AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->title = 'Permission';
        $this->folder = 'permissions';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!$this->user->hasPermissionTo('view permissions')) abort('401');

        $this->title .= 's';
        $items = $this->permissionRepository->getAllWithPaginate();
        
        $this->content = view($this->theme . '.admin.permissions.index', 
            compact('items'));

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!$this->user->hasPermissionTo('create permission')) abort('401');

        $this->title .= '::create';
        $roles = $this->roleRepository->getForComboBox();
        
        $this->content = view($this->theme . '.admin.permissions.create', compact('roles'));

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request)
    {
        if(!$this->user->hasPermissionTo('store permission')) abort(401);
        $data = $request->all();
        
        $permission = Permission::create($data); 
        if(isset($data['roles'])) {
           $permission->syncRoles($data['roles']);
        }

        if($permission) {
            return redirect()
            ->route('admin.permissions.index')
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
    public function show(Permission $permission)
    {
        if(!$this->user->hasPermissionTo('show permission')) abort('401');

        $this->content = view($this->theme . '.admin.permissions.show', 
            compact('permission'));

        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        if(!$this->user->hasPermissionTo('edit permission')) abort('401');
        
        $this->title .= '::edit';

        $roles = $this->roleRepository->getForComboBox();
        $this->content = view($this->theme . '.admin.permissions.edit', 
            compact('permission', 'roles'));

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        if(!$this->user->hasPermissionTo('update permission')) abort(401);
        
        $data = $request->all();
        $result = $permission->update($data);

        if(isset($data['roles'])) {
            $permission->syncRoles($data['roles']);
        } else {
            $permission->syncRoles();
        }

        if($result) {
            return redirect()
            ->route('admin.permissions.index')
            ->with(['success' => "Permission: $permission->name updated!"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error!'])
                ->withInput();
        }    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        if(!$this->user->hasPermissionTo('delete permission')) abort('401');
        $permissionName = $permission->name;

        $permission->delete();
        $permission->syncRoles();
        
        return redirect()
            ->route('admin.permissions.index')
            ->with(['success' => "Permission: $permissionName deleted!"]);
    }
}
