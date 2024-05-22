<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('crn', 255);
            $table->string('lastname', 255);
            $table->string('firstname', 255);
            $table->string('middlename', 255)->nullable();
            $table->string('suffix', 10)->nullable();
            $table->date('dateofbirth');
            $table->string('emailaddress', 255)->unique();
            $table->string('password');
            $table->string('buildingname', 255)->nullable();
            $table->string('street', 255)->nullable();
            $table->string('lot_and_blockno', 255)->nullable();
            $table->string('subdivision', 255)->nullable();
            $table->string('city_municipality', 255);
            $table->string('barangay', 255);
            $table->string('postalcode', 20);
            $table->string('faddress', 255)->nullable();
            $table->string('fcity', 255)->nullable();
            $table->string('fcountry', 255)->nullable();
            $table->string('fzip', 20)->nullable();
            $table->string('registrationpreference', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
