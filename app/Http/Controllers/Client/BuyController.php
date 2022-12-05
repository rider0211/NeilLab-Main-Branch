<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InternalTradeBuyList;
use App\Models\GlobalUserList;
use App\Models\ChainStack;
use Illuminate\Support\Arr;
use App\Models\MasterLoad;
use App\Models\SuperLoad;
use App\Models\ExchangeInfo;
use App\Models\InternalWallet;


class BuyController extends Controller
{
    //



    public function index()
    {
        $page_title = __('locale.buy_wizard');
        $page_description = 'Some description for the page';
        $action = 'wizard';
        $chainstack_info = ChainStack::orderBy('id', 'asc')->get()->toArray();
        $chainstacks = Arr::except($chainstack_info,['0']);

        $internal_ethereum_wallet_list = InternalWallet::where('chain_stack', 2)->where('wallet_type', 1)->get()->toArray();

        $ethereum_wallet = $internal_ethereum_wallet_list[0]['wallet_address'];
        $theme_mode = $this->getThemeMode();

        return view('zenix.client.buywizard', compact('page_title', 'page_description', 'action', 'chainstacks', 'ethereum_wallet', 'theme_mode'));
    }

    public function buyCrypto(Request $request){


        $success    = true;
        $error      = false;

        $internal_treasury_wallet_info = InternalWallet::where('wallet_address', $request['receive_address'])->get()->toArray();


        $is_duplicate = InternalTradeBuyList::where('tx_id', $request['tx_id'])->get()->toArray();
        if(count($is_duplicate) > 0){
            return response()->json(["success" => $error,"msg" => "This transaction has been used before."]);
        }else{
            $transaction_status = $this->checkTransaction($request['sender_address'], $request['receive_address'], $request['pay_with'], $request['tx_id']);
            if(isset($transaction_status[0]) && $transaction_status[0] == true){
                $internalTradeBuyInfo = array();
                $internalTradeBuyInfo['user_id']                        = $request['user_id'];
                $internalTradeBuyInfo['cronjob_list']                   = 1;
                $internalTradeBuyInfo['asset_purchased']                = $request['digital_asset'];
                $internalTradeBuyInfo['chain_stack']                    = $request['chain_stack'];
                $internalTradeBuyInfo['buy_amount']                     = $request['buy_amount'];
                $internalTradeBuyInfo['delivered_address']              = $request['delivered_address'];
                $internalTradeBuyInfo['sender_address']                 = $request['sender_address'];
                $internalTradeBuyInfo['internal_treasury_wallet_id']    = $internal_treasury_wallet_info[0]['id'];
                $internalTradeBuyInfo['pay_with']                       = $request['pay_with'];
                $internalTradeBuyInfo['pay_method']                     = $request['pay_method'];
                $internalTradeBuyInfo['transaction_description']        = "This is the buy transaction";
                $internalTradeBuyInfo['commision_id']                   = 1;
                $internalTradeBuyInfo['bank_changes']                   = 1;
                $internalTradeBuyInfo['left_over_profit']               = 1;
                $internalTradeBuyInfo['total_amount_left']              = $request['buy_amount'];
                $internalTradeBuyInfo['tx_id']                          = $request['tx_id'];
                $internalTradeBuyInfo['state']                          = 0;

                $result = InternalTradeBuyList::create($internalTradeBuyInfo);

                if(isset($result) && $result->id > 0){
                    \Log::info($request['buy_amount']."usdt has been sold by user ID".$request['user_id']);

                    return response()->json(["success" => $success]);

                }else{
                    return response()->json(["success" => $error,"msg" => "Order error"]);
                }
            }else{
                return response()->json(["success" => $error,"msg" => "There is a problem in  Transaction ID!"]);
            }
        }


    }

    public function superload_v($masterload_id){

        $master_load_info = MasterLoad::where('id', $masterload_id)->get()->toArray();
        $internal_treasury_wallet_info = InternalWallet::where('id', $master_load_info[0]['internal_treasury_wallet_id'])->get()->toArray();

        $amount_result = $this->getAmountExchange($master_load_info[0]['amount']);
        if(count($amount_result['exchange_available_accounts']) > 0){

            foreach ($amount_result['exchange_available_accounts'] as $value) {
                # code...
                try {
                    //code...
                    $exchange_info = ExchangeInfo::where('id', $value)->get()->toArray();
                    $exchange = $this->exchange($exchange_info[0]);
                    if($exchange->id == 'bitget'){
                        $usdt_wallet = json_decode($this->getDepositAddressBitget($exchange, "USDT", "ERC20"), true);
                        $deposit_wallet_address = $usdt_wallet['data']['address'];

                    }else if ($exchange->id == 'gateio'){
                        $deposit_account = $exchange->fetchDepositAddress("ETH");
                        $deposit_wallet_address = $deposit_account['address'];
                    }else{
                        $deposit_account = $exchange->fetchDepositAddress("USDT");
                        $deposit_wallet_address = $deposit_account['address'];
                    }
                    if($exchange_info[0]['ex_name'] == 'Binance'){
                        $amount = $amount_result['binance_deposite_amount'];
                    }else if($exchange_info[0]['ex_name'] == 'FTX'){
                        $amount = $amount_result['ftx_deposite_amount'];
                    }else if($exchange_info[0]['ex_name'] == 'kucoin'){
                        $amount = $amount_result['kucoin_deposite_amount'];
                    }else if($exchange_info[0]['ex_name'] == 'gateio'){
                        $amount = $amount_result['gate_deposite_amount'];
                    }else if($exchange_info[0]['ex_name'] == 'huobi'){
                        $amount = $amount_result['huobi_deposite_amount'];
                    }else if($exchange_info[0]['ex_name'] == 'bitstamp'){
                        $amount = $amount_result['bitstamp_deposite_amount'];
                    }else if($exchange_info[0]['ex_name'] == 'bitfinex'){
                        $amount = $amount_result['bitfinex_deposite_amount'];
                    }else if($exchange_info[0]['ex_name'] == 'okx'){
                        $amount = $amount_result['okx_deposite_amount'];
                    }else if($exchange_info[0]['ex_name'] == 'bitget'){
                        $amount = $amount_result['bitget_deposite_amount'];
                    }else if($exchange_info[0]['ex_name'] == 'mexc'){
                        $amount = $amount_result['mexc_deposite_amount'];
                    }
                    $amount = floor($amount * 1000000) / 1000000;
                    $private_key = base64_decode($internal_treasury_wallet_info[0]['private_key']);
                    $send_result = $this->sendUSDT($internal_treasury_wallet_info[0]['wallet_address'],$private_key, $deposit_wallet_address, $amount);

                    \Log::info("send ".$amount."usdt from ".$internal_treasury_wallet_info[0]['wallet_address']."to ".$deposit_wallet_address);

                    sleep(25);
                    if(!empty($send_result)){
                        $superload_tbl_data = array();
                        $superload_tbl_data['trade_type']                   = 1;
                        $superload_tbl_data['trade_id']                     = $master_load_info[0]['trade_id'];
                        $superload_tbl_data['masterload_id']                = $masterload_id;
                        $superload_tbl_data['receive_address']              = $deposit_wallet_address;
                        $superload_tbl_data['sending_address']              = $internal_treasury_wallet_info[0]['wallet_address'];
                        $superload_tbl_data['tx_id']                        = $send_result[1];
                        $superload_tbl_data['internal_treasury_wallet_id']  = $internal_treasury_wallet_info[0]['id'];
                        $superload_tbl_data['amount']                       = $amount;
                        $superload_tbl_data['left_amount']                  = $amount;
                        $superload_tbl_data['result_amount']                = 0;
                        $superload_tbl_data['exchange_id']                  = $value;
                        $superload_tbl_data['status']                       = 0;
                        $superload_tbl_data['manual_withdraw_flag']         = 0;

                        $insert_super_tbl_result = SuperLoad::create($superload_tbl_data);
                        if(isset($insert_super_tbl_result) && $insert_super_tbl_result->id > 0){
                            $update_result = InternalTradeBuyList::where('id', $master_load_info[0]['trade_id'])->update(['state' => 2]);
                        }
                    }
                } catch (\Throwable $th) {
                    //throw $th;

                    \Log::info("One superload has been failed. because ".$th->getMessage());

                    $superload_tbl_data = array();
                    $superload_tbl_data['trade_type']                   = 1;
                    $superload_tbl_data['trade_id']                     = $master_load_info[0]['trade_id'];
                    $superload_tbl_data['masterload_id']                = $masterload_id;
                    $superload_tbl_data['receive_address']              = $deposit_wallet_address;
                    $superload_tbl_data['sending_address']              = $internal_treasury_wallet_info[0]['wallet_address'];
                    $superload_tbl_data['tx_id']                        = 1;
                    $superload_tbl_data['internal_treasury_wallet_id']  = $internal_treasury_wallet_info[0]['id'];
                    $superload_tbl_data['amount']                       = $amount;
                    $superload_tbl_data['left_amount']                  = $amount;
                    $superload_tbl_data['result_amount']                = 0;
                    $superload_tbl_data['exchange_id']                  = $value;
                    $superload_tbl_data['status']                       = 0;
                    $superload_tbl_data['manual_withdraw_flag']         = 0;
                    $insert_super_tbl_result = SuperLoad::create($superload_tbl_data);


                }
            }
        }
    }


    public function cronHandleFunction(){

        $buy_lists = InternalTradeBuyList::where('state', 0)->get()->toArray();
        if(count($buy_lists) != 0){
            foreach ($buy_lists as $key => $value) {
            # code...

                $masterload_array = array();

                $masterload_array['trade_type'] = 1;
                $masterload_array['trade_id'] = $value['id'];
                $masterload_array['internal_treasury_wallet_id'] = $value['internal_treasury_wallet_id'];
                $masterload_array['sending_address'] = $value['sender_address'];
                $masterload_array['amount'] = $value['pay_with'];
                $masterload_array['tx_id'] = $value['tx_id'];

                $create_masterload_result = MasterLoad::create($masterload_array);
                if(isset($create_masterload_result) && $create_masterload_result->id > 0){
                    $internal_trade_update_result = InternalTradeBuyList::where('id', $value['id'])->update(['state' => 1]);
                    if($internal_trade_update_result > 0){
                        $this->superload_v($create_masterload_result->id);
                    }
                }
            }
        }
    }
}
