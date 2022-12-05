<?php

namespace App\Http\Controllers\Trade;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;


class InternalTradesController extends Controller
{
    //
    public function index(){
        $page_title = __('locale.internal_trade');
        $page_description = 'Some description for the page';
        $action = 'internal_trade';

        $result = User::orderBy('id', 'asc')->get()->toArray();
        
        foreach ($result as $key => $value) {
            # code...
            $result[$key]['cronjob_list'] = 23;
            $result[$key]['user_type'] = "human";
            $result[$key]['asset_class_purchase'] = "BTC";
            $result[$key]['buy_amount_in_coin'] = 20;
            $result[$key]['but_address_to_send_coin'] = env("INTERNAL_TREASURY_ACCOUNT");
            $result[$key]['pay_with'] = "ltc";
            $result[$key]['chainstack'] = "BTC";
            $result[$key]['transaction_description'] = "buy";
            $result[$key]['trusted_free'] = 25;
            $result[$key]['campain'] = ".direct";
            $result[$key]['profit'] = 4;
            $result[$key]['commission'] = 4;
            $result[$key]['fee_from_exchange'] = "";
            $result[$key]['bank_change'] = "";
            $result[$key]['left_over_profit'] = "";
            $result[$key]['total_amount_left'] = "";
            $result[$key]['master_load'] = "";
            $result[$key]['address_link'] = "link";
        }
        $theme_mode = $this->getThemeMode();

        return view('zenix.trade.internal_trade', compact('page_title', 'page_description', 'action','result', 'theme_mode'));
    }
}
