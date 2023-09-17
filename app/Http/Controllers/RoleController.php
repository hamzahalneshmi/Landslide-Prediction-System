<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Alert;
use Session;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }*/

    public function index() {
        if(Auth()->user()->can('Show Roles')){
        $roles = Role::paginate(5);//Get all roles

        return view('Admin-lte.users.roles.index')->with('roles', $roles);
    }
    return view('errors.401');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if(Auth()->user()->can('Add Role')){
        $permissions = Permission::all();//Get all permissions

        return view('Admin-lte.users.roles.create', ['permissions'=>$permissions]);
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
        if(Auth()->user()->can('Add Role')){
    //Validate name and permissions field
        $this->validate($request, [
            'name'=>'required|unique:roles|max:10',
            'permissions' =>'required',
            ]
        );

        $name = $request['name'];
        $role = new Role();
        $role->name = $name;

        $permissions = $request['permissions'];
        Alert::success('Success', 'Role has been added!');

        $role->save();
    //Looping thru selected permissions
        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail(); 
         //Fetch the newly created role and assign permission
            $role = Role::where('name', '=', $name)->first(); 
            $role->givePermissionTo($p);
        }

        return redirect('/admin/roles')
            ->with('flash_message',
             'Role'. $role->name.' added!'); 
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
        if(Auth()->user()->can('Show Roles')){
        return redirect('roles');
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
        if(Auth()->user()->can('Edit Role')){
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('Admin-lte.users.roles.edit', compact('role', 'permissions'));
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
        if(Auth()->user()->can('Edit Role')){
        $role = Role::findOrFail($id);//Get role with the given id
    //Validate name and permission fields
        $this->validate($request, [
            'name'=>'required|max:10|unique:roles,name,'.$id,
            'permissions' =>'required',
        ]);

        $input = $request->except(['permissions']);
        $permissions = $request['permissions'];
        $role->fill($input)->save();
        Alert::success('Success', 'Role has been updated!');

        $p_all = Permission::all();//Get all permissions

        foreach ($p_all as $p) {
            $role->revokePermissionTo($p); //Remove all permissions associated with role
        }

        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail(); //Get corresponding form //permission in db
            $role->givePermissionTo($p);  //Assign permission to role
        }

        return redirect('/admin/roles')
            ->with('flash_message',
             'Role'. $role->name.' updated!');
            }
            return view('errors.401');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth()->user()->can('Delete Role')){
        $role = Role::findOrFail($id);
        $role->delete();
        Alert::success('Success', 'Role has been deleted');

        return redirect('/admin/roles')
            ->with('flash_message',
             'Role deleted!');
            }
            return view('errors.401');
    }
}
