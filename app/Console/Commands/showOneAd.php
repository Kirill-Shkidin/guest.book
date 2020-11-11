<?php

namespace App\Console\Commands;

use App\Models\Review;
use Illuminate\Console\Command;

class showOneAd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:oneAd {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command let you get one ad';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return string
     */
    public function handle()
    {
      return $this->line(Review::query()->find($this->argument('id'))->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}
