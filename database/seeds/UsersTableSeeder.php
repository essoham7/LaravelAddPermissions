<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;

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
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin user',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);


        $author = User::create([
            'name' => 'Author user',
            'email' => 'author@author.com',
            'password' => Hash::make('password')
        ]);


        $user = User::create([
            'name' => 'Generic user',
            'email' => 'generic@user.com',
            'password' => Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}

