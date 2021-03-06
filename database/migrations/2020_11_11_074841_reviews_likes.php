<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReviewsLikes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
  {
    Schema::create('reviews_likes', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('review_id')->comment('ID отзыва');
      $table->string('user_ip')->comment('IP пользователя');
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
    Schema::dropIfExists('reviews_likes');
  }
}
