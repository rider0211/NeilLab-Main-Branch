<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use RenokiCo\LaravelWeb3\Web3Facade as Web3;
use App\Http\Controllers\Controller;

class ListingUSDTCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'USDTListing:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        Controller::cronHandleFunction();
    }
}
