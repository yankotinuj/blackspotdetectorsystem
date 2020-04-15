<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('locationid')->unique();
            $table->integer('kejadian');
            $table->integer('meninggaldunia');
            $table->integer('lukaberat');
            $table->integer('lukaringan');
            $table->integer('koefisien');
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
        Schema::dropIfExists('detail_locations');
    }
}
