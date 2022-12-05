<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InternalTradeSellList;
use App\Models\GlobalUserList;
use App\Models\ChainStack;
use Illuminate\Support\Arr;
use App\Models\MasterLoad;
use App\Models\SuperLoad;
use App\Models\ExchangeInfo;
use App\Models\InternalWallet;

class SellController extends Controller
{

    public function __construct()
    {
        $this->RPCusername = config('app.RPCusername');
        $this->RPCpassword = config('app.RPCpassword');

    }

    public function index(){
        $page_title = __('locale.sell_wizard');
        $page_description = 'Some description for the page';
        $action = 'wizard';

        $chainstacks = ChainStack::orderBy('id', 'asc')->get()->toArray();

        $internal_bitcoin_wallet_list = InternalWallet::where('chain_stack', 1)->where('wallet_type', 1)->get()->toArray();

        // $bitcoin_wallet = $internal_bitcoin_wallet_list[0]['wallet_address'];
        $bitcoin_info = $this->get_receiving_btc_address();
        $bitcoin_wallet = $bitcoin_info['address'];
        $theme_mode = $this->getThemeMode();

        return view('zenix.client.sellwizard', compact('page_title', 'page_description', 'action', 'bitcoin_wallet', 'chainstacks', 'theme_mode'));
    }

    public function sellCrypto(Request $request){
        $success    = true;
        $error      = false;

        $is_duplicate = InternalTradeSellList::where('tx_id', $request['tx_id'])->get()->toArray();

        if(count($is_duplicate) > 0){
            return response()->json(["success" => $error, "msg" => "This transaction has been used before."]);
        }else{

            $internal_treasury_wallet_info = InternalWallet::where('chain_stack', 1)->where('wallet_type', 1)->get()->toArray();

            $internalTradeSellInfo = array();
            $internalTradeSellInfo['user_id']                           = $request['user_id'];
            $internalTradeSellInfo['cronjob_list']                      = 1;
            $internalTradeSellInfo['asset_purchased']                   = $request['digital_asset'];
            $internalTradeSellInfo['chain_stack']                       = $request['chain_stack'];
            $internalTradeSellInfo['sell_amount']                       = $request['sell_amount'];
            $internalTradeSellInfo['delivered_address']                 = $request['delivered_address'];
            $internalTradeSellInfo['sender_address']                    = $request['sender_address'];
            $internalTradeSellInfo['internal_treasury_wallet_id']       = $internal_treasury_wallet_info[0]['id'];
            $internalTradeSellInfo['internal_treasury_wallet_address']  = $request['receive_address'];
            $internalTradeSellInfo['pay_with']                          = $request['pay_with'];
            $internalTradeSellInfo['transaction_description']           = "This is the sell transaction";
            $internalTradeSellInfo['commision_id']                      = 1;
            $internalTradeSellInfo['bank_changes']                      = 1;
            $internalTradeSellInfo['left_over_profit']                  = 1;
            $internalTradeSellInfo['total_amount_left']                 = $request['sell_amount'];
            $internalTradeSellInfo['tx_id']                             = $request['tx_id'];
            $internalTradeSellInfo['state']                             = 0;

            $result = InternalTradeSellList::create($internalTradeSellInfo);

            if(isset($result) && $result->id > 0){
                \Log::info($request['sell_amount']."BTC has been sold by user ID".$request['user_id']);
                return response()->json(["success" => $success,]);
            }else{
                return response()->json(["success" => $error,]);
            }
        }
    }

    public function masterload($request){
        $success    = true;
        $error      = false;

        $from = $request['sender_address'];
        $to = $request['toAddress'];
        $amount = $request['amount'];
        $tx_id = $request['tx_id'];

        $internal_treasury_wallet_info = InternalWallet::where('wallet_address',$to)->get()->toArray();

        $internal_treasury_wallet_id = $internal_treasury_wallet_info[0]['id'];

        $sellLists = InternalTradeSellList::where('sender_address', $from)->where('internal_treasury_wallet_id', $internal_treasury_wallet_id)->where('pay_with', $amount)->where('state', 1)->get()->toArray();

        $masterload_array = array();
        $masterload_array['trade_type'] = 2;
        $masterload_array['trade_id'] = $sellLists[0]['id'];
        $masterload_array['internal_treasury_wallet_id'] = $internal_treasury_wallet_id;
        $masterload_array['sending_address'] = $from;
        $masterload_array['amount'] = $amount;
        $masterload_array['tx_id'] = $tx_id;

        $create_masterload_result = MasterLoad::create($masterload_array);
        if(isset($create_masterload_result) && $create_masterload_result->id > 0){

            return ["success" => $success, "master_load_id" => $create_masterload_result->id];

        }else{
            return ["success" => $error,];
        }

    }

    public function superload_v($master_load_id_param){

        $success = true;
        $error   = false;

        $masterload_id = $master_load_id_param;

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
                        $btc_wallet = json_decode($this->getDepositAddressBitget($exchange, "BTC"));
                        $btc_wallet = $btc_wallet->data->address;
                        $deposit_wallet_address = $btc_wallet;
                    }else{
                        $deposit_account = $exchange->fetchDepositAddress("BTC");
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
                    $send_result = $this->sendBTC($deposit_wallet_address, $amount);
                    \Log::info($send_result);
                    sleep(10);

                    if($send_result['status'] == 'success'){
                        $superload_tbl_data = array();
                        $superload_tbl_data['trade_type']                   = 2;
                        $superload_tbl_data['trade_id']                     = $master_load_info[0]['trade_id'];
                        $superload_tbl_data['masterload_id']                = $masterload_id;
                        $superload_tbl_data['receive_address']              = $deposit_wallet_address;
                        $superload_tbl_data['sending_address']              = $internal_treasury_wallet_info[0]['wallet_address'];
                        $superload_tbl_data['tx_id']                        = $send_result['txid'];
                        $superload_tbl_data['internal_treasury_wallet_id']  = $internal_treasury_wallet_info[0]['id'];
                        $superload_tbl_data['amount']                       = $amount;
                        $superload_tbl_data['left_amount']                  = $amount;
                        $superload_tbl_data['result_amount']                = 0;
                        $superload_tbl_data['exchange_id']                  = $value;
                        $superload_tbl_data['status']                       = 0;
                        $superload_tbl_data['manual_withdraw_flag']         = 0;

                        $insert_super_tbl_result = SuperLoad::create($superload_tbl_data);
                        if(isset($insert_super_tbl_result) && $insert_super_tbl_result->id > 0){
                            $update_result = InternalTradeSellList::where('id', $master_load_info[0]['trade_id'])->update(['state' => 2]);
                        }
                    }
                } catch (\Throwable $th) {
                    //throw $th;

                    $superload_tbl_data = array();
                    $superload_tbl_data['trade_type']                   = 2;
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

                    \Log::info("One superload has been failed. because ".$th->getMessage());
                }
            }
        }
    }

    public function get_new_btc_wallet_address () {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "http://localhost:7890",
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => $this->RPCusername.':'.$this->RPCpassword,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POSTFIELDS => '{"id":"curltext","method":"createnewaddress","params":[]}',
            CURLOPT_POST => 1,
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return null;
        } else {
            $result = json_decode($response);
            return $result->result;
        }
    }

    public function get_balance(){

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "http://localhost:7890",
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => $this->RPCusername.':'.$this->RPCpassword,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POSTFIELDS => '{"id":"curltext","method":"getbalance","params":[]}',
            // CURLOPT_POSTFIELDS => '{"id":"curltext","method":"listaddresses","params":["receiving"]}',
            CURLOPT_POST => 1,
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return ['status'=>'error', 'message'=>$err];
        } else {
            $result = json_decode($response);
            dd($result);
            if(isset($result->result)){
                $k = array_rand($result->result);
                return ['status'=>'success', 'address'=>$result->result[$k]];
            }else{
                return ['status'=>'error', 'message'=>'Could not get an address'];
            }
        }
    }
    public function get_receiving_btc_address () {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "http://localhost:7890",
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => $this->RPCusername.':'.$this->RPCpassword,
            CURLOPT_RETURNTRANSFER => 1,
            // CURLOPT_POSTFIELDS => '{"id":"curltext","method":"getbalance","params":[]}',
            CURLOPT_POSTFIELDS => '{"id":"curltext","method":"listaddresses","params":["receiving"]}',
            CURLOPT_POST => 1,
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return ['status'=>'error', 'message'=>$err];
        } else {
            $result = json_decode($response);
            // dd($result);
            if(isset($result->result)){
                $k = array_rand($result->result);
                return ['status'=>'success', 'address'=>$result->result[$k]];
            }else{
                return ['status'=>'error', 'message'=>'Could not get an address'];
            }
        }

    }

    public function confirm_btc_payment ($amount, $txid) {

        $curl = curl_init();
        $year = date('Y');

        curl_setopt_array($curl, [
            CURLOPT_URL => "http://localhost:7890",
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => $this->RPCusername.':'.$this->RPCpassword,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POSTFIELDS => '{ "id": "curltext", "method":"onchain_history", "params": {"year": '.$year.' } }',
            CURLOPT_POST => 1,
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return ['status'=>'error', 'message'=>$err];
        } else {
            $result = json_decode($response);
            if(isset($result->result)){
                $transactions = $result->result->transactions;
                foreach($transactions as $tx) {
                    if(floatval($tx->bc_value) === floatval($amount) && $tx->txid === $txid && $tx->confirmations >= 3) {

                        return ['status'=>'success', 'result'=>'true'];
                    }
                }
                return ['status'=>'success', 'result'=>'false'];
            }else{
                return ['status'=>'error', 'message'=>'Some error occured!'];
            }
        }
    }


    public function cronHandleFunction(){

        $btc_trade_lists = InternalTradeSellList::where('state', 0)->get()->toArray();
        if(count($btc_trade_lists) != 0){
            foreach ($btc_trade_lists as $key => $value) {
                # code...
                $amount = $value['pay_with'];
                $tx_id  = $value['tx_id'];

                //  Confirm the payment which sends from client to internal treasury wallet, if status = ok && confirm steo == 3
                $confirm_result = $this->confirm_btc_payment($amount, $tx_id);
                if($confirm_result['status'] == 'success' && $confirm_result['result'] == 'true'){
                    $internal_trade_update_result = InternalTradeSellList::where('id', $value['id'])->update(['state' => 1]);
                    $internal_treasury_wallet = InternalWallet::where('id', $value['internal_treasury_wallet_id'])->get()->toArray();

                    \Log::info($tx_id." -------------- transaction Confirmed!");

                    if($internal_trade_update_result > 0){
                        $request = array();

                        $request['sender_address'] = $value['sender_address'];
                        $request['toAddress'] = $internal_treasury_wallet[0]['wallet_address'];
                        $request['amount'] = $value['pay_with'];
                        $request['tx_id'] = $value['tx_id'];

                        $master_load_result = $this->masterload($request);

                        if($master_load_result['success'] == true){
                            $this->superload_v($master_load_result['master_load_id']);
                        }
                    }
                }
            }
        }
    }
}
