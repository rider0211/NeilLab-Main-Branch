<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modles\InternalTradeBuyList;
use Illuminate\Support\Facades\DB;

class AdminInternalTradeBuyController extends Controller
{
    //
    public function index(){

        $result = DB::table('internal_trade_buy_lists')
                                        ->join('users', 'internal_trade_buy_lists.global_user_id', '=', 'users.id')
                                        ->select('internal_trade_buy_lists.*', 'users.email','users.id as user_id')
                                        ->get()->toArray();

        $page_title = __('locale.internal_trade_buy');
        $page_description = 'Some description for the page';
        $action = 'internal_trade';
        $theme_mode = $this->getThemeMode();

        return view('zenix.admin.internalTradeBuy', compact('page_title', 'page_description', 'action','result', 'theme_mode'));

    }
}
