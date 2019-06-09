<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('locations', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('lat');
      $table->string('lng');
      $table->boolean('active');
      $table->unsignedBigInteger('child_id');
      $table->foreign('child_id')->references('id')->on('children');
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
    Schema::dropIfExists('locations');
  }
}
