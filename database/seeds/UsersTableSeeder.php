<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'superadmin',
            'email' => 'superadministrator@app.com',
            'image' => 'defualt.png',
            'password' => bcrypt('123456'),
            
        ]);
        
        $user->attachRole('superadmin');
    }
}
