<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIraiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('irai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category')->nullable();
            $table->string('song_title')->nullable();
            $table->string('song_description')->nullable();
            $table->string('song_audio')->nullable();
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
        Schema::dropIfExists('irai');
    }
}
