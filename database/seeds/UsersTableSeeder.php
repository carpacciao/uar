<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email'     => 'lucasvd@msn.com',
            'password'  => bcrypt('lucas'),
            'role_id'   => 1
        ]);
        User::create([
            'email'     => 'lu@msn.com',
            'password'  => bcrypt('lucas'),
            'role_id'   => 1
        ]);
    }
}
