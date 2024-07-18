<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorSubmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_submits', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('submission_id')->unsigned();

            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('id_orcid');
            $table->string('url');
            $table->text('affiliation');
            $table->string('country');
            $table->text('interest')->nullable();
            $table->text('bio');
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
        Schema::dropIfExists('author_submits');
    }
}
