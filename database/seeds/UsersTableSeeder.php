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
            [
                'created_at' => \Carbon\Carbon::now(),
                'username' => 'shuhaib',
                'image' => '',
                'first_name' => 'shuhaib',
                'last_name' => 'malik',
                'role' => 'admin',
                'email' => 'shuhaib@gmail.com',
                'password' => bcrypt('password'),
                'status' => '1',
                'phone' => '7012582228',
                'address' => 'kottakal',
                'gender' => 'male',
                'dob' => '2019-03-12',
                'join_date' => '2019-03-12',
                'job_type' => 'sales',
                'city' => 'malappuram',
                'age' => '23',
            ],
            [
                'created_at' => \Carbon\Carbon::now(),
                'username' => 'shuhaibmalik',
                'image' => '',
                'first_name' => 'shuhaib',
                'last_name' => 'malik',
                'role' => 'employee',
                'email' => 'shuhiabmalik@gmail.com',
                'password' => bcrypt('password'),
                'status' => '1',
                'phone' => '7012582228',
                'address' => 'kottakal',
                'gender' => 'male',
                'dob' => '2019-03-12',
                'join_date' => '2019-03-12',
                'job_type' => 'IT',
                'city' => 'kottakal',
                'age' => '22',
            ],
        ]);
    }
}
