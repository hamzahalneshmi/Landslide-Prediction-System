<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $ResearcherRole = Role::where('name', 'Researcher')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email'=> 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);

        $Researcher = User::create([
            'name' => 'Researcher',
            'email'=> 'Researcher@Researcher.com',
            'password' => bcrypt('Researcher')
        ]);

        $user = User::create([
            'name' => 'user',
            'email'=> 'user@user.com',
            'password' => bcrypt('user')
        ]);

        $admin->roles()->attach($adminRole);
        $Researcher->roles()->attach($ResearcherRole);
        $user->roles()->attach($userRole);
    }
}
