<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Alert;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }*/
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index() {
        if(Auth()->user()->can('Show Permissions')){
        $permissions = Permission::paginate(10); //Get all permissions

        return view('Admin-lte.users.permissions.index')->with('permissions', $permissions);
    }
    return view('errors.401');
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create() {
        if(Auth()->user()->can('Add Permissions')){
        $roles = Role::get(); //Get all roles

        return view('Admin-lte.users.permissions.create')->with('roles', $roles);
    }
    return view('errors.401');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        if(Auth()->user()->can('Add Permissions')){
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);

        $name = $request['name'];
        $permission = new Permission();
        $permission->name = $name;

        $roles = $request['roles'];

        $permission->save();
        Alert::success('Success', 'Permission '. $permission->name.' added!');
        if (!empty($request['roles'])) { //If one or more role is selected
            foreach ($roles as $role) {
                $r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record

                $permission = Permission::where('name', '=', $name)->first(); //Match input //permission to db record
                $r->givePermissionTo($permission);
            }
            

        }

        return redirect('/admin/permissions')
            ->with('flash_message',
             'Permission'. $permission->name.' added!');
            }
            return view('errors.401');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id) {
        if(Auth()->user()->can('Show Permissions')){
        return redirect('admin.permissions');
    }
    return view('errors.401');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id) {
        if(Auth()->user()->can('Edit Permissions')){
        $permission = Permission::findOrFail($id);

        return view('Admin-lte.users.permissions.edit', compact('permission'));
    }
    return view('errors.401');
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id) {
        if(Auth()->user()->can('Edit Permissions')){
        $permission = Permission::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);
        $input = $request->all();
        $permission->fill($input)->save();
        Alert::success('Success', 'Permission updated!');

        return redirect('/admin/permissions')
            ->with('flash_message',
             'Permission'. $permission->name.' updated!');
            }
            return view('errors.401');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
        if(Auth()->user()->can('Delete Permissions')){
        $permission = Permission::findOrFail($id);

    //Make it impossible to delete this specific permission    
    if ($permission->name == "Administer roles & permissions") {
        Alert::error('Oops...', 'Cannot delete this Permission!');
            return redirect('/admin/permissions')
            ->with('flash_message',
             'Cannot delete this Permission!');
        }

        $permission->delete();
        Alert::success('Success', 'Permission deleted!');
        return redirect('/admin/permissions')
            ->with('flash_message',
             'Permission deleted!');
            }
            return view('errors.401');
    }
}
