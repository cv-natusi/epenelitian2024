<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('users_id')->unsigned();
            
            $table->text('comments');
            $table->integer('permohonan_id')->unsigned();
            $table->text('file_submission')->nullable();
            $table->text('original_filename')->nullable();
            $table->string('file_size')->nullable();
            $table->string('title')->nullable();
            $table->string('lang')->nullable();
            $table->text('abstract')->nullable();
            $table->text('agencies')->nullable();
            $table->text('references')->nullable();
            $table->string('status')->nullable();  
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
        Schema::dropIfExists('submissions');
    }
}
