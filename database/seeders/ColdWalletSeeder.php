<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ColdWalletSeeder extends Seeder
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
            'cold_address' => '1F1tAaz5x1HUXrCNLbtMDqcw6o5GNn4xqX',
            'wallet_type' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],[
            'cold_address' => 'bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh',
            'wallet_type' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]
        ];
        DB::table('cold_wallets')->insert($categories);
    }
}
