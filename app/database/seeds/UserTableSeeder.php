<?php

class UserTableSeeder extends Seeder
{
    public function run()
    {
//        DB::table('users')->delete();

        User::create(array(
            'name' => 'firstuser',
            'email' => 'first@email.com',
            'password' => Hash::make('first_password')
        ));

        User::create(array(
            'name' => 'seconduser',
            'email' => 'second@email.com',
            'password' => Hash::make('second_password')
        ));
    }

}