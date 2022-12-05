<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ccxt;
use App\Models\ExchangeInfo;
use kornrunner\Ethereum\Address;
use Illuminate\Support\Arr;

class AdminExchangeListController extends Controller
{
    public function index(){
        $page_title = __('locale.adminexchangelist');
        $page_description = 'Some description for the page';
        $action = 'exchangelist';

        $theme_mode = $this->getThemeMode();

        return view('zenix.admin.exchangelist', compact('page_title', 'page_description', 'action', 'theme_mode'));

    }

    public function editExchange($id = null){
        $page_title = __('locale.admin_create_new_exchange_list');
        $page_description = 'Some description for the page';
        $action = 'exchangelist';
        $theme_mode = $this->getThemeMode();
        if($id){
            $result = ExchangeInfo::where("id", $id)->get()->toArray();
            return view('zenix.admin.newExchangeList', compact('page_title', 'page_description', 'action', 'result', 'theme_mode'));
        }else{
            return view('zenix.admin.newExchangeList', compact('page_title', 'page_description', 'action', 'theme_mode'));
        }
    }

    public function updateExchangeList(Request $request){
        $payLoad = Arr::except($request->all(),['_token','old_id']);
        $payLoad['state'] = 1;
        if($request->old_id){
            $result = ExchangeInfo::where("id", $request->old_id)->update($payLoad);
            if($result > 0){
                return redirect('/admin/new_exchange_list/'.$request->old_id)->with('success', 'Successfully updated');
            }else{
                return redirect('/admin/new_exchange_list/'.$request->old_id)->with('error', 'Try again. There is error in database');
            }
        }else{
            $result = ExchangeInfo::create($payLoad);
            if(isset($result) && $result->id > 0){
                return redirect('/admin/new_exchange_list/'.$request->old_id)->with('success', 'Successfully created');
            }else{
                return redirect('/admin/new_exchange_list/'.$request->old_id)->with('error', 'Try again. There is error in database');
            }
        }
    }

    public function deleteExchange($id = null){
        $res=ExchangeInfo::where('id',$id)->delete();
        if($res > 0){
            return redirect('/admin/exchangelist/')->with('success', 'Successfully deleted');
        }else{
            return redirect('/admin/exchangelist/')->with('error', 'Try again. There is error in database');
        }
    }

    public function updateState(Request $request){
        $success = true;
        $error = false;

        $exhcange_id    = $request['id'];
        $state          = $request['state'];

        $res=ExchangeInfo::where('id',$exhcange_id)->update(["state" => $state]);
        if($res > 0){
            return response()->json(["success" => $success,]);
        }else{
            return response()->json(["success" => $error,]);
        }
    }

    public function getAllExchanges(Request $request){
        $start = $request['start'];
        $length = $request['length'];
        $search = $request['search']['value'];
        $exchanges = $this->getExchanges($start, $length, $search);
        $filtered_number = $exchanges['filtered'];
        $exchange_lists = $exchanges['exchange'];
        $total_number = $exchanges['total'];

        foreach ($exchange_lists as $key => $value) {
            # code...
               $exchange = $this->exchange($value);
               try {
                   //code...
                   if($exchange->id == 'bitget'){
                    $btc_wallet = json_decode($this->getDepositAddressBitget($exchange, "USDT", "ERC20"), true);
                    $btc_wallet_address = $btc_wallet['data']['address'];
                }else if($exchange->id == 'gateio'){
                    $btc_wallet = $exchange->fetchDepositAddress("ETH");
                    $btc_wallet_address = $btc_wallet['address'];
                }else{
                    $btc_wallet = $exchange->fetchDepositAddress("USDT");
                    $btc_wallet_address = $btc_wallet['address'];
                }

                   $exchange_lists[$key]['wallet_address'] = $btc_wallet_address;
                   $exchange_lists[$key]['connect_status'] = true;
               } catch (\Throwable $th) {
                   throw $th;
                   $exchange_lists[$key]['wallet_address'] = 'Disconnected';
                   $exchange_lists[$key]['connect_status'] = false;
               }
           }

        return response()->json(["list" => $exchange_lists, "filtered" => $filtered_number, "total" => $total_number]);
    }
}
