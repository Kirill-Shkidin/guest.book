<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('author_name')->comment('Имя автора');
          $table->string('author_ip')->comment('IP автора');
          $table->text('desc')->comment('Текст отзыва');
          $table->integer('likes')->default(0)->comment('Количество лайков');
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
      Schema::dropIfExists('reviews');
    }
}
