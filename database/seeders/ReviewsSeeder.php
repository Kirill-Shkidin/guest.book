<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
//    dd(Review::factory()->count(1)->create()->toArray());
    DB::table('reviews')->insert(Review::factory()->count(1)->make()->toArray());
  }

}
