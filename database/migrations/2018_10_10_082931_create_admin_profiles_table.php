<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_profiles', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('admin_id')->unique();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('city');
            $table->string('country');
            $table->string('email')->unique();
            $table->text('about_me');
            $table->text('profile_pic')->nullable();
            $table->string('quote')->nullable();

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
        Schema::dropIfExists('admin_profiles');
    }
}
