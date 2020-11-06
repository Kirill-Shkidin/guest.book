<?php

namespace App\Jobs;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AddImgUrl implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  private $id;

  /**
   * Create a new job instance.
   *
   * @param $id
   */
    public function __construct($id)
    {
        $this->id = $id;
    }

  /**
   * Execute the job.
   *
   * @param Request $request
   * @return bool
   */
    public function handle(Request $request, Ad $data)
    {
      $pack = $request->only('img1', 'img2', 'img3');
      $pack['id'] = $this->id;

      return $data::query()->find($this->id)->fill($request->only('img1', 'img2', 'img3'))->save();
    }
}
