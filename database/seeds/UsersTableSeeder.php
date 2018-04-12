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
        DB::table('users')->insert([
            'name' => 'Владимир',           
            'email' => 'vova.pas@mail.ru',
            'password' => bcrypt('admin'),
            'id_role' => config('app.role_admin')
        ]);
    }
}
