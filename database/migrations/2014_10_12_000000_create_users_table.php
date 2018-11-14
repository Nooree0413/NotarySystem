<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->enum('title', ['Mr','Mrs','Miss'])->default("Mr");
            $table->string('contactnum')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->date('dob');
            $table->integer('birthCertificateNumber')->unique();
            $table->enum('districtIssued', ['Port Louis','Moka','Plaine Wilhems','Pamplemousses','Grand Port','Savanne','Flacq','Rivière du Rempart','Rivière Noire'])->default("Port Louis");
            $table->string('placeOfBirth');
            $table->enum('gender', ['Male','Female'])->default("Male");
            $table->string('address');
            $table->string('nic')->unique();
            $table->enum('marriageStatus', ['Single','Married','Divorced','Widowed'])->default("Single");
            $table->enum('roles', ['Buyer','Seller'])->default("Buyer");
            $table->string('profession');
            $table->rememberToken();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        Schema::create('spouse', function (Blueprint $table) {
            
            $table->increments('id');
            $table->unsignedInteger('spouseId');
            $table->enum('title', ['Mr','Mrs'])->default("Mr");
            $table->string('firstname');
            $table->date('dob');
            $table->integer('birthCertificateNumber')->unique();
            $table->enum('BCdistrictIssued', ['Port Louis','Moka','Plaine Wilhems','Pamplemousses','Grand Port','Savanne','Flacq','Rivière du Rempart','Rivière Noire'])->default("Port Louis");
            $table->string('placeOfBirth');
            $table->enum('gender', ['Male','Female'])->default("Male");
            $table->string('spouseNic')->unique();
            $table->date('marriageDate');
            $table->integer('MarriageCertificateNumber')->unique();
            $table->enum('MCdistrictIssued', ['Port Louis','Moka','Plaine Wilhems','Pamplemousses','Grand Port','Savanne','Flacq','Rivière du Rempart','Rivière Noire'])->default("Port Louis");
            $table->string('profession');
            $table->enum('roles', ['Buyer_spouse','Seller_spousse'])->default("Buyer_spouse");
            $table->rememberToken();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
