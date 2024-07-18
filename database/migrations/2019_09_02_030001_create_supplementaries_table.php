<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplementariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplementaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('submission_id');
            $table->string('title')->nullable();
            $table->string('file')->nullable();
            $table->string('file_size')->nullable();
            $table->date('date')->nullable();
            $table->text('creator')->nullable();
            $table->text('keywords')->nullable();
            $table->string('type')->nullable();
            $table->longText('description')->nullable();
            $table->string('publisher')->nullable();
            $table->text('agencies')->nullable();
            $table->string('lang')->nullable();
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
        Schema::dropIfExists('supplementaries');
    }
}
