<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Alert;

//Enables us to output flash messaging
use Session;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }*/

    public function index()
    {
        if(Auth()->user()->can('Show Users')){
            return view('Admin-lte.users.index')->with('users', User::paginate(5));
        }
        return view('errors.401');
    }

    public function create() {
    //Get all roles and pass it to the view
    if(Auth()->user()->can('Add User')){
        $roles = Role::get();
        return view('Admin-lte.users.create', ['roles'=>$roles]);
    }
    return view('errors.401');

    }
    


    public function store(Request $request) {
        if(Auth()->user()->can('Add User')){
        //Validate name, email and password fields
            $this->validate($request, [
                'name'=>'required|max:120',
                'email'=>'required|email|unique:users',
                'password'=>'required|min:6|confirmed',
                'email_verified_at'=>now()
            ]);
            $password = bcrypt($request['password']);
            $user = User::create(
                [
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                
                ]); //Retrieving only the email and password data
            $user->markEmailAsVerified();

            $roles = $request['roles']; //Retrieving the roles field
        //Checking if a role was selected
            if (isset($roles)) {
    
                foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();            
                $user->assignRole($role_r); //Assigning role to user
                }
            }        
        //Redirect to the users.index view and display message
        Alert::success('Success', 'User successfully added.');

            return redirect('/admin/users')
                ->with('success',
                 'User successfully added.');
        }
        return view('errors.401');

        }



        public function show($id) {
            return redirect('users'); 
        }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth()->user()->can('Edit User')){
        if(Auth::user()->id == $id){
            return redirect('/admin/users')->with('warning', 'you are not allowed to edit yourself');
        }
        return view('Admin-lte.users.edit')->with(['user' => User::find($id), 'roles' => Role::all()]);
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
    public function update(Request $request, $id)
    {
        if(Auth()->user()->can('Edit User')){
        if(Auth::user()->id == $id){
            return redirect('/admin/users')->with('warning', 'you are not allowed to edit yourself');
        }
        
        $user = User::find($id);
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
       
        ]);
        $input = $request->only(['name', 'email',]); //Retreive the name, email and password fields
        $roles = $request['roles']; //Retreive all roles
        $user->fill($input)->save();

        if (isset($roles)) {        
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles          
        }        
        else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }
        Alert::success('Success', 'User successfully edited.');

        return redirect('/admin/users')
            ->with('success',
             'User successfully edited.');
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
        if(Auth()->user()->can('Delete User')){
        if(Auth::user()->id == $id){
            Alert::error('warning', 'you are not allowed to delete yourself');

            return redirect('/admin/users');
        }
        $user = User::find($id);
        if($user){
            $user->roles()->detach();
            $user->delete();
            Alert::success('Success', 'User has been deleted');

            return redirect('/admin/users');
        }
        Alert::warning('Warning', 'User can not be deleted');
        return redirect('/admin/users');
    }
    return view('errors.401');
    }

}
