<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
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
                'marketing_campain_id' => 0,
                'first_name' => 'Admin',
                'last_name' => 'Name',
                'email' => 'codemaster9428@gmail.com',
                'password' => '$2y$10$IXSm3tJ9IiR/qDd7NI9kA.EFSdWJAodT.ITABgb.Jg77XNXsdEqC2',
                'whatsapp' => '',
                'boomboomchat' => '',
                'telegram' => '',
                'redirect' => 'agreement',
                'referral_code' => 'c4ca4238',
                'user_type' => 'admin',
                'state' => 1,
                'theme_mode' => 'dark',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]];
        DB::table('users')->insert($categories);
    }
}