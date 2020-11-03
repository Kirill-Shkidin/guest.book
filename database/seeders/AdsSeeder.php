<?php

namespace Database\Seeders;

use App\Models\Ad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
//    dd(Ad::factory()->times(1)->make()->toArray());
    DB::table('ads')->insert(Ad::factory()->count(20)->make()->toArray());
  }

}
