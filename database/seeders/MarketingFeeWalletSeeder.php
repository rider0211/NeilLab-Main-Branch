<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MarketingFeeWalletSeeder extends Seeder
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
                'fee_type' => 1,
                'chain_net' => 1,
                'wallet_address' => 'bc1qkus9vumkh2zdftdnua9latk5qqpxzdlavs5lyf',
                'private_key' => '',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'fee_type' => 1,
                'chain_net' => 2,
                'wallet_address' => '0x1e39D6270EbE4C6c85fAc60E2c62e1ED09F69f69',
                'private_key' => '',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]];
        DB::table('marketing_fee_wallets')->insert($categories);
    }
}
