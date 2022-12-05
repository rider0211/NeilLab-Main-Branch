<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\InternalTradeSellList;
use App\Models\InternalTradeBuyList;
use App\Models\GlobalUserList;
use App\Models\ChainStack;

use Illuminate\Support\Arr;

use App\Models\MasterLoad;
use App\Models\SuperLoad;
use App\Models\SubLoad;
use App\Models\ExchangeInfo;
use App\Models\InternalWallet;
use App\Models\User;
use Auth;
use App\Models\Withdraw;

use Illuminate\Support\Facades\DB;

class AdminManualWithdrawController extends Controller
{
    //
    public function __construct()
    {
        $this->withdraw_limit = config('app.withdraw_limit');

    }
    public function index(){
        $page_title = __('locale.manual_withdraw');
        $page_description = 'Some description for the page';
        $action = 'manual_withdraw';

        $withdraw_info = Withdraw::where('status', 0)->where('manual_flag', 1)->get()->toArray();

        foreach ($withdraw_info as $key => $value) {
            # code...
            if($value['trade_type'] == 1){
                $trade_info = InternalTradeBuyList::where('id', $value['trade_id'])->get()->toArray();
            }else{
                $trade_info = InternalTradeSellList::where('id', $value['trade_id'])->get()->toArray();
            }

            $user_info = User::where('id', $trade_info[0]['user_id'])->get()->toArray();
            $withdraw_info[$key]['email'] = $user_info[0]['email'];
            $withdraw_info[$key]['username'] = $user_info[0]['first_name'] . $user_info[0]['last_name'];

            $exchange_info = ExchangeInfo::where('id', $value['exchange_id'])->get()->toArray();
            $withdraw_info[$key]['exchange_name'] = $exchange_info[0]['ex_name'];
            $withdraw_info[$key]['exchange_email'] = $exchange_info[0]['ex_login'];
        }
        $theme_mode = $this->getThemeMode();

        return view('zenix.admin.manual_withdraw', compact('page_title', 'page_description', 'action', 'withdraw_info', 'theme_mode'));

    }

    public function registerWithdraw(Request $request){
        $withdraw_id = $request['withdraw_id'];
        $tx_id = $request['tx_id'];

        $success = true;
        $error = false;

        $withdraw_tx_history = Withdraw::find($tx_id);
        if(isset($withdraw_tx_history->id) && $withdraw_tx_history->id > 0){
            return response()->json(["success" => $error, "msg" => "This transaction has already been used before."]);
        }else{

            $result = Withdraw::where('id', $withdraw_id)->update(['withdraw_order_id' => $tx_id]);

            if($result > 0){
                $withdraw_info = Withdraw::where('id', $withdraw_id)->get()->toArray();

                \Log::info("new withdraw requested manually! amount is ".$withdraw_info[0]['amount']);
                return response()->json(["success" => $success]);
            }else{
                return response()->json(["success" => $error, "msg" => "Database Error"]);
            }
        }
    }
}
