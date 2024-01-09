<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function __construct(){
        $this->middleware('can:role.index')->only('index');
        $this->middleware('can:role.edit')->only('edit', 'update');
        $this->middleware('can:role.destroy')->only('destroy');
        $this->middleware('can:role.create')->only('create','store');

    }

    public function index(){
        $roles = Role::paginate(10);
        return view('admin.role.index', compact('roles'));
    }

    public function create(){
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    public function store(RoleRequest $request){
        $data = $request->only(['name', 'guard_name']);
        $role = Role::create($data);

        $role->permissions()->sync($request->permissions);
        return redirect()->action([RoleController::class, 'index']);
    }
    public function edit(Role $role){
        $permissions = Permission::all();
        return view('admin.role.edit', compact('role', 'permissions'));
    }
    public function update(RoleRequest $request, Role $role){
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect()->action([RoleController::class, 'index']);

    }

    public function destroy(Role $role){
        $role -> delete();
        return redirect()->action([RoleController::class, 'index']);
    }
}
