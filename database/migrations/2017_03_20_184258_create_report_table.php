<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('report', function (Blueprint $table) {
          $table->increments('id')->unique();
          $table->string('prod_name')->default('null');
          $table->foreign('prod_name')->references('prod_name')->on('production');
          $table->string('process');
          $table->string('achievement');
          $table->string('prob_cause');
          $table->string('solution');
          $table->string('added_by')->default('null'); //value only use default
          $table->foreign('added_by')->references('id')->on('users');
          $table->string('modified_by')->default('null');
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
        Schema::dropIfExists('report');
    }
}
