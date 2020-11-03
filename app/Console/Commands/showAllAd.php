<?php

namespace App\Console\Commands;

use App\Models\Ad;
use Illuminate\Console\Command;

class showAllAd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:ad';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command let you all info about ad in json format';

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
      return $this->line(Ad::query()->get()->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}
