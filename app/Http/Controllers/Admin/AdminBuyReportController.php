<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\InternalTradeBuyList;
use App\Models\GlobalUserList;
use App\Models\ChainStack;
use Illuminate\Support\Arr;
use App\Models\MasterLoad;
use App\Models\SuperLoad;
use App\Models\SubLoad;
use App\Models\ExchangeInfo;
use App\Models\InternalWallet;
use Auth;
use Illuminate\Support\Facades\DB;

class AdminBuyReportController extends Controller
{

    public function index(){

        $page_title = __('locale.buy_report');
        $page_description = 'Some description for the page';
        $action = 'report';


        $result = DB::table('internal_trade_buy_lists')
                ->join('users', 'internal_trade_buy_lists.user_id', '=', 'users.id')
                ->join('master_loads as a', 'a.trade_id', '=', 'internal_trade_buy_lists.id')
                ->join('internal_wallets as b', 'b.id', '=', 'internal_trade_buy_lists.internal_treasury_wallet_id')
                ->select('internal_trade_buy_lists.*', 'users.email','users.id as user_id', 'a.id as masterload_id', 'b.wallet_address')
                ->where('a.trade_type', 1)
                ->get()->toArray();

        $theme_mode = $this->getThemeMode();
        return view('zenix.admin.report.buyReport', compact('page_title', 'page_description', 'action', 'result', 'theme_mode'));
    }

    public function masterload_report($masterload_id = null){
        $page_title = __('locale.masterload_report');
        $page_description = 'Some description for the page';
        $action = 'report';
        $result = DB::table('master_loads')
        ->join('internal_wallets as b', 'b.id', '=', 'master_loads.internal_treasury_wallet_id')
        ->select('master_loads.*', 'b.wallet_address')
        ->where('master_loads.id', $masterload_id)
        ->get()->toArray();
        $theme_mode = $this->getThemeMode();
        return view('zenix.admin.report.masterload_report', compact('page_title', 'page_description', 'action', 'result', 'theme_mode'));
    }
    public function superload_report($masterload_id = null){
        $page_title = __('locale.super_load_report');
        $page_description = 'Some description for the page';
        $action = 'report';
        // $result = SuperLoad::where('masterload_id', $masterload_id)->where('trade_type', 1)->get()->toArray();
        $result = DB::table('super_loads')->select('super_loads.*')->where('super_loads.masterload_id', $masterload_id)->where('trade_type', 1)->get()->toArray();
        $trade_type = 1;
        $theme_mode = $this->getThemeMode();
        return view('zenix.admin.report.superload_report', compact('page_title', 'page_description', 'action', 'result', 'masterload_id', 'trade_type', 'theme_mode'));
    }

    public function subload_report($masterload_id = null){
        $page_title = __('locale.sub_load_report');
        $page_description = 'Some description for the page';
        $action = 'report';
        $masterload_info = MasterLoad::find($masterload_id);
        $result = SubLoad::where('trade_id', $masterload_info->trade_id)->where('trade_type', 1)->get()->toArray();
        $internal_trade_sell_info = InternalTradeBuyList::find($masterload_info->trade_id);
        $delivered_address = $internal_trade_sell_info->delivered_address;
        $trade_type = 1;
        $theme_mode = $this->getThemeMode();
        return view('zenix.admin.report.subload_report', compact('page_title', 'page_description', 'action', 'result', 'delivered_address', 'masterload_id', 'trade_type', 'theme_mode'));
    }
}

