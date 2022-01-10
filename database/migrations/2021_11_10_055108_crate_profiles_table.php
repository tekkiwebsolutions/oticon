<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('id')->on('users')->comment('users : primary id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->integer('verified_account')->comment('0: Not verified, 1: Verified')->default(0);
            $table->integer('gender')->comment('0: Unassigned, 1: Male, 2: Female, 3: Other')->nullable();
            $table->integer('status')->default(1);
            $table->string('occupation')->nullable();
            $table->string('location')->nullable();
            $table->string('profile_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
