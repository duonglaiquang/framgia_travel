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
        DB::table('users')->delete();

        DB::table('users')->insert(
            [
                [
                    'email'    => 'admin@gmail.com',
                    'name'     => 'admin',
                    'password' => bcrypt('123456'),
                    'gender'   => 'male',
                    'level'    => '1',
                ],

                [
                    'email'    => 'duong@gmail.com',
                    'name'     => 'duong',
                    'password' => bcrypt('123456'),
                    'gender'   => 'male',
                    'level'    => '0',
                ],
            ]
        );
    }
}
