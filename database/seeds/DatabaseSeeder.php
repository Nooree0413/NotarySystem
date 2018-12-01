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
                'firstname' => 'Noor',
                'lastname' => 'Khayrattee',  
                'title'=> '1',
                'contactnum' => '57896461',
                'email' => 'nooree@gmail.com',
                'password' => bcrypt('123456'),
                'dob' => '1997-11-13',
                'birthCertificateNumber' =>'7',
                'districtIssued' => '2',
                'placeOfBirth' =>'Dr Jeetoo Hospital',
                'gender' => '1',
                'address' => 'Royal Road Lavenir St Pierre',
                'nic' => 'K1234567890987',
                'marriageStatus' => '1',
                'roles' => '1',
                'profession'=>'software tester'
            ],   
        ]);

        DB::table('staff')->insert([
            [
                'firstname' => 'Sarah',
                'lastname' => 'Muller',  
                'email' => 'sarah@gmail.com',
                'password' => Hash::make(123456)
            ],   
        ]);
    }
}
