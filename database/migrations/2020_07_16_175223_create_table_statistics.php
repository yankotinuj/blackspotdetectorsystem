<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStatistics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('deviceid')->unique();
            $table->string('locationid')->unique();
            $table->double('spd_1500m')->nullable();
            $table->double('spd_1000m')->nullable();
            $table->double('spd_500m')->nullable();
            $table->double('spd_10m')->nullable();
            $table->double('dst_1500m')->nullable();
            $table->double('dst_1000m')->nullable();
            $table->double('dst_500m')->nullable();
            $table->double('dst_10m')->nullable();
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
        Schema::dropIfExists('statistics');
    }
}
