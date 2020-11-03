<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name')->comment('Название объявления');
          $table->text('desc')->comment('Описание объявления');
          $table->integer('price')->comment('Цена');
          $table->string('img1')->comment('Изображение 1')->nullable(true);
          $table->string('img2')->comment('Изображение 2')->nullable(true);
          $table->string('img3')->comment('Изображение 3')->nullable(true);
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
      Schema::dropIfExists('ads');
    }
}
