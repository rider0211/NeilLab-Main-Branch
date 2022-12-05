<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TradingPairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = [
            [
                'exchange_id' => 1,
                'left' => 'BTC',
                'l_chin_stack' => 'Bitcoin',
                'right' => 'USDT',
                'r_chain_stack' => 'Ethereum',
                'select_all' => 1,
                'select_exhcnage_they_can' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]];
        DB::table('trading_pairs')->insert($categories);
    }
}
