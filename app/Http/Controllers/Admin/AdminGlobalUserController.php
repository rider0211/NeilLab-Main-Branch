<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GlobalUserList;
use App\Models\ExchangeInfo;
use App\Models\TradingPair;
use App\Models\ColdWallet;
use Illuminate\Support\Arr;

use App\Http\Controllers\Controller;

class AdminGlobalUserController extends Controller
{
    //
    
    public function index(){
        $page_title = __('locale.global_user_list');
        $page_description = 'Some description for the page';
        $action = 'global_user_list';

        $result = GlobalUserList::orderBy('id', 'asc')->get()->toArray();
        foreach ($result as $key => $value) {
            # code...
            $user_info = User::where('id', $value['user_id'])->get()->toArray();
            if(count($user_info) != 0){
                $result[$key]['user_email'] = $user_info[0]['email'];
                $result[$key]['user_first_name'] = $user_info[0]['first_name'];
                $result[$key]['user_last_name'] = $user_info[0]['last_name'];
            }

            $cold_storage_info = ColdWallet::where('id', $value['cold_storage_id'])->get()->toArray();
            if(count($cold_storage_info) != 0){
                $result[$key]['cold_storage_address'] = $cold_storage_info[0]['cold_address'];
            }

            $trading_pair_info = TradingPair::where('id', $value['set_for_trading_pairs'])->get()->toArray();

            if(count($trading_pair_info) != 0){
                $result[$key]['set_for_trading_pairs_left'] = $trading_pair_info[0]['left'];
                $result[$key]['set_for_trading_pairs_right'] = $trading_pair_info[0]['right'];
            }
            
            $exchange_info = ExchangeInfo::where('id', $value['selected_exchange'])->get()->toArray();
            if(count($exchange_info) != 0){
                $result[$key]['echange_name'] = $exchange_info[0]['ex_name'];
            }
        }
        $theme_mode = $this->getThemeMode();
        return view('zenix.admin.global_user_list', compact('page_title', 'page_description', 'action','result', 'theme_mode'));
    }
    
    public function editGlobalUser($id = null){
        $page_description = 'Some description for the page';
        $action = 'global_user_list';
        $theme_mode = $this->getThemeMode();

        if($id){
            $page_title = __('locale.edit_global_user_list');
            $result = GlobalUserList::where("id", $id)->get()->toArray();
            return view('zenix.admin.editGlobalUser', compact('page_title', 'page_description', 'action', 'result', 'theme_mode'));
        }else{

            $page_title = __('locale.add_global_user_list');
            return view('zenix.admin.editGlobalUser', compact('page_title', 'page_description', 'action', 'theme_mode'));
        }
    }

    public function updateGlobalUserList(Request $request){
        
        $payLoad = Arr::except($request->all(),['_token', 'email']);
        $user_result = User::where('email', $request['email'])->get()->toArray();
        if(count($user_result) > 0){
            $is_exit_global = GlobalUserList::where('user_id', $user_result[0]['id'])->get()->toArray();
            if(count($is_exit_global) > 0){
                return redirect('/admin/editGlobalUser')->with('error', __('error.error_already_exit_on_global'));
            }else{
                $payLoad['user_id'] = $user_result[0]['id'];
                $payLoad['cold_storage_id'] = 1;
                $payLoad['set_for_trading_pairs'] = 1;
                $payLoad['selected_exchange'] = 1;
                $payLoad['selected_exchange'] = 1;
                $payLoad['wallet_address'] = "bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh";
                $result = GlobalUserList::create($payLoad);
                if(isset($result) && $result->id > 0){
                    return redirect('/admin/globaluserlist')->with('success', 'Successfully created');
                }else{
                    return redirect('/admin/editGlobalUser')->with('error', __('error.error_on_database'));
                }
            }
        }else{
            return redirect('/admin/editGlobalUser')->with('error', __('error.error_already_exit_on_global'));
        }
    }
    public function changeBuyWeightByID(Request $request){
        $id = $request['id'];
        $value = $request['value'];
        $result = GlobalUserList::where("id", $id)->update(["buy_weight" => $value]);
        $success = true;
        $error = false;

        if($result > 0){
            return response()->json(["success" => $success,]);
        }else{
            return response()->json(["success" => $error,]);
        }
    }

    public function changeSellWeightByID(Request $request){
        $id = $request['id'];
        $value = $request['value'];
        $result = GlobalUserList::where("id", $id)->update(["sell_weight" => $value]);
        $success = true;
        $error = false;

        if($result > 0){
            return response()->json(["success" => $success,]);
        }else{
            return response()->json(["success" => $error,]);
        }
    }
    public function changeStatusByID(Request $request){
        $id = $request['id'];
        $value = $request['value'];
        $result = GlobalUserList::where("id", $id)->update(["status" => $value]);
        $success = true;
        $error = false;

        if($result > 0){
            return response()->json(["success" => $success,]);
        }else{
            return response()->json(["success" => $error,]);
        }
    }
}
