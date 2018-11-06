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
                'gender' => 'Female',
                'address' => 'Royal Road Lavenir St Pierre',
                'nic' => 'K1234567890987',
                'marriageStatus' => 'Single',
                'roles' => 'Admin'


            ],
            [
                'firstname' => 'Wasiim',
                'lastname' => 'Gukhool',  
                'contactnum' => '57696461',
                'email' => 'wasiim@gmail.com',
                'password' => bcrypt('123456'),
                'dob' => '1997-09-04',
                'gender' => 'Male',
                'address' => 'Royal Road Castel',
                'nic' => 'G1234567890987',
                'marriageStatus' => 'Single',
                'roles' => 'Admin'
            ]
           
        ]);

        DB::table('spouseDetails')->insert([
            [
                'spouseId' =>'2',
                'firstname' => 'Mala',
                'lastname' => 'Gukhool',  
                'contactnum' => '57296461',
                'email' => 'mala@gmail.com',
                'dob' => '1997-11-13',
                'gender' => 'Female',
                'address' => 'Royal Road Castel',
                'spouseNic' => 'K1334567890987'

            ],
           
           
        ]);
        
        
    }
}
