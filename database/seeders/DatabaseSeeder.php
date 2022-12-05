<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call(ChainStackSeeder::class);
        $this->call(ColdWalletSeeder::class);
        $this->call(DigitalAssetsSeeder::class);
        $this->call(MarketingFeeWalletSeeder::class);
        $this->call(TradingPairSeeder::class);
        $this->call(UserSeeder::class);
    }
}
