<?php

/**
 * Created by PhpStorm.
 * User: Comzyh
 * Date: 2015/1/4
 * Time: 6:24
 */
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create(array(
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'is_admin' => true,
            'role' => 'teacher'
        ));
        User::create(array(
            'username' => 'teacher',
            'password' => Hash::make('teacher'),
            'is_admin' => false,
            'role' => 'teacher'
        ));
        User::create(array(
                'username' => 'student',
                'password' => Hash::make('student'),
                'is_admin' => false)
        );
    }
}