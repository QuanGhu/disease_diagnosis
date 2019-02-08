<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubDiagnoseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_diagnose', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('diagnose_id');
            $table->string('cause');
            $table->timestamps();

            $table->foreign('diagnose_id')->references('id')->on('diagnose')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_diagnose');
    }
}
