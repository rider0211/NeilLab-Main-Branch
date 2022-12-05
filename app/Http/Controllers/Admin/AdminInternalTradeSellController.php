<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modles\InternalTradeSellList;
use Illuminate\Support\Facades\DB;

class AdminInternalTradeSellController extends Controller
{
    //
    public function index(){

        $result = DB::table('internal_trade_sell_lists')
                                        ->join('users', 'internal_trade_sell_lists.user_id', '=', 'users.id')
                                        ->select('internal_trade_sell_lists.*', 'users.email','users.id as user_id')
                                        ->get()->toArray();

        $page_title = __('locale.internal_trade_sell');
        $page_description = 'Some description for the page';
        $action = 'internal_trade';
        $theme_mode = $this->getThemeMode();

        return view('zenix.admin.internalTradeSell', compact('page_title', 'page_description', 'action','result', 'theme_mode'));

    }
}
