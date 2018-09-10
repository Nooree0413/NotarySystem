<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            [
                'firstname' => 'Nooree',
                'lastname' => 'Khayrattee',  
                'contactnum' => '57896461',
                'email' => 'nooree@gmail.com',
                'password' => bcrypt('123456'),
                'dob' => '1997-11-13',
                'gender' => 'Female'
            ],
            [
                'firstname' => 'Wasiim',
                'lastname' => 'Gukhool',  
                'contactnum' => '57696461',
                'email' => 'wasiim@gmail.com',
                'password' => bcrypt('123456'),
                'dob' => '1997-09-04',
                'gender' => 'Male'
            ]
           
        ]);
        
    }
}
