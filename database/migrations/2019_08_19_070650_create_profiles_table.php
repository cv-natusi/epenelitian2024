<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');

            $table->string('username');
            $table->string('password');
            $table->integer('users_id')->unsigned();
            $table->string('salutation')->nullable();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('category');
            $table->string('initials')->nullable();
            $table->string('gender');
            $table->text('affiliation')->nullable();
            $table->string('signature')->nullable();
            $table->string('email');
            $table->string('id_orcid')->nullable();
            $table->string('url')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->longText('mailing_ads')->nullable();
            $table->string('country')->nullable();
            $table->text('bio')->nullable();
            $table->string('confirm_reg');
            $table->string('identify')->nullable();
            $table->string('image')->nullable();
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
