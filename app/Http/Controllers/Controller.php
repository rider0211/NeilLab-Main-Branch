<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\InternalWallet;
use SWeb3\Sweb3;
use SWeb3\Sweb3_contract;

use App\Models\OutLoads;
use App\Models\SuperLoad;
use App\Models\OrderList;
use App\Models\SubLoad;
use App\Models\Withdraw;

use App\Models\ExchangeInfo;
use App\Models\InternalTradeBuyList;
use App\Models\InternalTradeSellList;
use App\Models\User;
use App\Models\MarketingCampain;
use App\Models\MarketingFeeWallet;
use App\Models\SendFeeTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;




class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->RPCusername = config('app.RPCusername');
        $this->RPCpassword = config('app.RPCpassword');
        $this->binance_withdraw_fee = config('app.binance_withdraw_fee');
        $this->okx_withdraw_fee = config('app.okx_withdraw_fee');
        $this->huobi_withdraw_fee = config('app.huobi_withdraw_fee');
        $this->kucoin_withdraw_fee = config('app.kucoin_withdraw_fee');
        $this->gate_withdraw_fee = config('app.gate_withdraw_fee');
        $this->bitget_withdraw_fee = config('app.bitget_withdraw_fee');
        $this->mexc_withdraw_fee = config('app.mexc_withdraw_fee');

        $this->binance_btc_withdraw_fee = config('app.binance_btc_withdraw_fee');
        $this->okx_btc_withdraw_fee = config('app.okx_btc_withdraw_fee');
        $this->huobi_btc_withdraw_fee = config('app.huobi_btc_withdraw_fee');
        $this->kucoin_btc_withdraw_fee = config('app.kucoin_btc_withdraw_fee');
        $this->gate_btc_withdraw_fee = config('app.gate_btc_withdraw_fee');
        $this->bitget_btc_withdraw_fee = config('app.bitget_btc_withdraw_fee');
        $this->mexc_btc_withdraw_fee = config('app.mexc_btc_withdraw_fee');
    }

    // Redirect to Required Marketing page and coming soon page

    public function requiredMarketingCampain(){
        $page_title = 'required marketing campaign';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $theme_mode = $this->getThemeMode();

        return view('zenix.page.requiredMarketingCampain', compact('page_title', 'page_description', 'action', 'theme_mode'));
    }

    public function coming_soon(){
        $page_title = 'Coming Soon...';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $theme_mode = $this->getThemeMode();

        return view('zenix.page.coming_soon', compact('page_title', 'page_description', 'action', 'theme_mode'));
    }


    public function exchange($param=null){
        $n_id = $param['ex_name'];
        $exchange_id = '\\ccxt\\' . $n_id;
        if( $param['ex_name'] == 'okcoin' || $param['ex_name'] == 'kucoin' || $param['ex_name'] == 'okx' || $param['ex_name'] == 'bitget' ){
            $exchange = new $exchange_id(array(
                'enableRateLimit' => true,
                'apiKey' => $param['api_key'],
                'secret' => $param['api_secret'],
                'password' => $param['api_passphase'],
                'passphase' => $param['api_passphase'],
            ));
            return $exchange;
        }else{
            $exchange = new $exchange_id(array(
                'enableRateLimit' => true,
                'apiKey' => $param['api_key'],
                'secret' => $param['api_secret'],
            ));
            return $exchange;
        }
    }

    function getBalance($address) {
        return file_get_contents('https://blockchain.info/q/addressbalance/'. $address);
    }

    public function getBTCMarketPrice($exchange_info, $amount){
        # code...
        $bitcoin_ticker = $exchange_info->fetch_ticker('BTC/USDT');
        $btc_amount = floor($amount/$bitcoin_ticker['bid'] * 1000000) / 1000000;
        return $btc_amount;
    }

    public function getUSDTPrice($exchange_info, $amount){
        # code...
        $bitcoin_ticker = $exchange_info->fetch_ticker('BTC/USDT');
        $usdt_amount = floor($amount*$bitcoin_ticker['bid'] * 1000000) / 1000000;
        return $usdt_amount;
    }

    public function createMarketBuyOrder($symbol, $amount, $exchange){
        $type = 'market';
        $side = 'buy';
        $btc_price = null;
        if($exchange->id == 'huobi' ||  $exchange->id == 'gateio' ||   $exchange->id == 'mexc' ||   $exchange->id == 'bitget') {
            $fetch_ticker = $exchange->fetch_ticker($symbol);
            $btc_price = $fetch_ticker['bid'];
        }
        if($exchange->id == 'gateio' || $exchange->id == 'mexc'){
            $type = 'limit';
        }
        $order = $exchange->createOrder($symbol, $type, $side, $amount, $btc_price);
        \Log::info("Create Market Buy Order which amount is".$amount);
        return $order;
    }

    public function createMarketSellOrder($symbol, $amount, $exchange){
        $type = 'market';
        $side = 'sell';
        $btc_price = null;
        if($exchange->id == 'huobi' ||  $exchange->id == 'gateio' ||   $exchange->id == 'mexc') {
            $fetch_ticker = $exchange->fetch_ticker($symbol);
            $btc_price = $fetch_ticker['bid'];
        }
        if($exchange->id == 'gateio' || $exchange->id == 'mexc'){
            $type = 'limit';
        }
        $order = $exchange->createOrder($symbol, $type, $side, $amount, $btc_price);
        \Log::info("Create Market Sell Order which amount is".$amount);

        return $order;
    }
    public function marketBuyOrder($exchange, $amount, $superload_id, $ex_name, $type){
        try {
            $_amount = $amount;
            $amount -= 5;
            if ($exchange->id == 'kucoin') {
                $inner_transfer_result = $exchange->transfer('USDT', $amount, 'main', 'trade');
                \Log::info("Kucoin After Inner transfer for market sell order : ".$amount);
            } else if ($exchange->id == 'okx') {
                 $inner_transfer_result = $exchange->transfer('USDT', $amount, '6', '18');
                 \Log::info("OKX after Inner transfer USDT for market sell order : ".$amount);
            }
            $amount -= 5;
            $symbol = "BTC/USDT";
            $market_amount = floor($this->getBTCMarketPrice($exchange, $amount)*0.999 * 1000000)/ 1000000;
            $order = $this->createMarketBuyOrder($symbol, $market_amount, $exchange);

            $superload_info = SuperLoad::where('id', $superload_id)->get()->toArray();

            $order_tbl_info = array();

            $order_tbl_info['trade_id']         = $superload_info[0]['trade_id'];
            $order_tbl_info['trade_type']       = $superload_info[0]['trade_type'];
            $order_tbl_info['exchange_id']      = $superload_info[0]['exchange_id'];
            $order_tbl_info['superload_id']     = $superload_id;
            $order_tbl_info['order_id']         = $order['id'];
            $order_tbl_info['result_amount']    = 0;
            $order_tbl_info['status']           = 0;

            $create_order_result = OrderList::create($order_tbl_info);
            if(isset($create_order_result) && $create_order_result->id > 0){
                if($type == 1){
                    $update_superload_result = SuperLoad::where('id', $superload_id)->update(['left_amount' => 0, 'status' => 1]);
                }else{
                    $remain_amount = $superload_info[0]['left_amount'] - $_amount;
                    $update_superload_result = SuperLoad::where('id', $superload_id)->update(['left_amount' => $remain_amount]);
                }
                \Log::info("New marketing buy has been request. amount = ".$order['amount']);
            }
        } catch (\Throwable $th) {
            //throw $th;
            \Log::info("One scaled buy hasn't been failed".$th->getMessage());
        }
    }

    public function marketSellOrder($exchange, $amount, $superload_id, $ex_name, $type){
        try {

            if ($exchange->id == 'kucoin') {
                $inner_transfer_result = $exchange->transfer('BTC', $amount, 'main', 'trade');
                \Log::info("Kucoin After Inner transfer BTC for market sell order : ".$amount);
            } else if ($exchange->id == 'okx') {
                $amount -= 0.0003;
                $inner_transfer_result = $exchange->transfer('BTC', $amount, '6', '18');
                \Log::info("OKX after Inner transfer BTC for market sell order : ".$amount);
            }

            $symbol = "BTC/USDT";
            $market_amount = floor($amount*0.999 * 1000000) / 1000000;
            //code...
            $order = $this->createMarketSellOrder($symbol, $market_amount, $exchange);

            $superload_info = SuperLoad::where('id', $superload_id)->get()->toArray();

            $order_tbl_info = array();

            $order_tbl_info['trade_id']         = $superload_info[0]['trade_id'];
            $order_tbl_info['trade_type']       = $superload_info[0]['trade_type'];
            $order_tbl_info['exchange_id']      = $superload_info[0]['exchange_id'];
            $order_tbl_info['superload_id']     = $superload_id;
            $order_tbl_info['order_id']         = $order['id'];
            $order_tbl_info['result_amount']    = 0;
            $order_tbl_info['status']           = 0;

            $create_order_result = OrderList::create($order_tbl_info);
            if(isset($create_order_result) && $create_order_result->id > 0){
                if($type == 1){
                    $update_superload_result = SuperLoad::where('id', $superload_id)->update(['left_amount' => 0, 'status' => 1]);
                }else{
                    $remain_amount = $superload_info[0]['left_amount'] - $amount;
                    $update_superload_result = SuperLoad::where('id', $superload_id)->update(['left_amount' => $remain_amount]);
                }
                \Log::info("New marketing sell has been request. amount = ".$order['amount']);
            }
        } catch(\Throwable $th){
            \Log::info("One scaled sell hasn't been failed".$th->getMessage());
        }
    }
    /* This function works every 3 minutes */
    public function cronScaledSaleHandleFunction(){
        /*
        order_size_limit_btc => This is the order size limit that system can order at once.
        order_size_limit_usdt => This is the order size limit that system can order at once.
        */
        $order_size_limit_btc = 1;
        $order_size_limit_usdt = 20000;

        $result = ExchangeInfo::where('state', 1)->orderBy('id', 'asc')->get()->toArray();

        /* retrieve exchanges whether deposit transaction has been completed or not */
        foreach ($result as $key => $value) {
            $exchange = $this->exchange($value);
            $usdt_deposit_history = $exchange->fetchDeposits("USDT");
            foreach ($usdt_deposit_history as $key => $deposit_value) {
                # code...
                /* If deposit transaction has been completed, take a place next logic. */
                if($deposit_value['status'] == 'ok'){
                    if(isset($deposit_value['txid'])){
                        $database_status_of_superload = SuperLoad::where('tx_id', $deposit_value['txid'])->get()->toArray();

                        /* If there remains unordered amount, request order till left amount is zero */
                        if(count($database_status_of_superload) != 0 && $database_status_of_superload[0]['left_amount'] > 0 && $database_status_of_superload[0]['status'] == 0){
                            /* If remains amount is less than 15 usdt. */
                            if($database_status_of_superload[0]['left_amount'] - $order_size_limit_usdt < 200){
                                $this->marketBuyOrder($exchange, $database_status_of_superload[0]['left_amount'], $database_status_of_superload[0]['id'], $value['ex_name'], 1);
                                \Log::info("Deposit transaction of ".$deposit_value['txid']." has been confirmed from ".$value['ex_name']);
                            }else if($database_status_of_superload[0]['left_amount'] > $order_size_limit_usdt){
                                $this->marketBuyOrder($exchange, $order_size_limit_usdt, $database_status_of_superload[0]['id'], $value['ex_name'], 0);
                            }else{
                                /* If all money has been ordered, update status. */
                                $this->marketBuyOrder($exchange, $database_status_of_superload[0]['left_amount'], $database_status_of_superload[0]['id'], $value['ex_name'], 1);
                                \Log::info("Deposit transaction of ".$deposit_value['txid']." has been confirmed from ".$value['ex_name']);
                            }
                        }

                    }
                }
            }
            $btc_deposit_history = $exchange->fetchDeposits("BTC");
            foreach ($btc_deposit_history as $key => $deposit_value) {
                # code...
                /* If deposit transaction has been completed, take a place next logic. */
                if($deposit_value['status'] == 'ok'){
                    if(isset($deposit_value['txid'])){
                        if($exchange->id == 'mexc'){
                            $txid = explode(":", $deposit_value['txid']);
                            $deposit_value['txid'] = $txid[0];
                        }
                        $confirm_result = $this->confirm_btc_transaction($deposit_value['txid']);
                        if($confirm_result['status'] == 'success' && $confirm_result['result'] == 'true'){
                            $database_status_of_superload = SuperLoad::where('tx_id', $deposit_value['txid'])->get()->toArray();

                            /* If there remains unordered amount, request order till left amount is zero */
                            if(count($database_status_of_superload) != 0 && $database_status_of_superload[0]['left_amount'] > 0 && $database_status_of_superload[0]['status'] == 0){
                                /* If remains amount is less than 0.001 btc. */
                                if($database_status_of_superload[0]['left_amount'] - $order_size_limit_btc < 0.011){
                                    $this->marketSellOrder($exchange, $database_status_of_superload[0]['left_amount'], $database_status_of_superload[0]['id'], $value['ex_name'], 1);
                                    \Log::info("Deposit transaction of ".$deposit_value['txid']." has been confirmed from ".$value['ex_name']);

                                }else if($database_status_of_superload[0]['left_amount'] > $order_size_limit_btc){
                                    $this->marketSellOrder($exchange, $order_size_limit_btc, $database_status_of_superload[0]['id'], $value['ex_name'], 0);
                                }else{
                                    /* If all money has been ordered, update status. */
                                    $this->marketSellOrder($exchange, $database_status_of_superload[0]['left_amount'], $database_status_of_superload[0]['id'], $value['ex_name'], 1);
                                    \Log::info("Deposit transaction of ".$deposit_value['txid']." has been confirmed from ".$value['ex_name']);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    /* This function works every 4 minutes */
    public function cronCheckOrder(){
        try {
            //code...
            $order_info_lists = OrderList::where('status', 0)->get()->toArray();
            $symbol = "BTC/USDT";

            foreach ($order_info_lists as $key => $value) {
                # code...
                $exchange_info = ExchangeInfo::where('id', $value['exchange_id'])->get()->toArray();
                $exchange = $this->exchange($exchange_info[0]);

                $_symbol = null;
                if($exchange_info[0]['ex_name'] == 'okx' || $exchange_info[0]['ex_name'] == 'bitget' || $exchange_info[0]['ex_name'] == 'mexc'){
                    $_symbol = $symbol;
                }
                if($exchange->id == 'gateio'){
                    $order_info = $this->getSingleOrderGateIO($exchange, $value['order_id']);
                }else{
                    $order_info = $exchange->fetch_order($value['order_id'], $_symbol);
                }

                \Log::info($order_info);
                if($order_info['status'] == 'closed'){

                    $order_result_amount = $order_info['amount'];

                    if($value['trade_type'] == 2){
                        if($exchange->id == 'gateio' || $exchange->id == 'mexc'){
                            $order_result_amount = $order_info['fill_price'];
                        }else{
                            $order_result_amount = $order_info['cost'];
                        }
                    }else{
                        if($exchange->id == 'bitget'){
                            $order_result_amount = $order_info['filled'];
                        }
                    }

                    $fee = $order_result_amount * 0.002;

                    if($value['trade_type'] == 2){
                        if(isset($order_info['fee']['cost']) && $order_info['fee']['cost'] != null){
                            if(isset($order_info['fee']['currency']) && ($order_info['fee']['currency'] == "USDT" || $order_info['fee']['currency'] == "usdt")){
                                $fee = $order_info['fee']['cost'];
                            }else if(isset($order_info['fee']['currency']) && ($order_info['fee']['currency'] == "BTC" || $order_info['fee']['currency'] == "btc")){
                                $fee = $this->getUSDTprice($exchange, $order_info['fee']['cost']);
                            }
                        }
                    }else{
                        if(isset($order_info['fee']['cost']) && $order_info['fee']['cost'] != null){
                            if(isset($order_info['fee']['currency']) && ($order_info['fee']['currency'] == "BTC" || $order_info['fee']['currency'] == "btc")){
                                $fee = $order_info['fee']['cost'];
                            }else if(isset($order_info['fee']['currency']) && ($order_info['fee']['currency'] == "USDT" || $order_info['fee']['currency'] == "usdt")){
                                $fee = $this->getBTCMarketPrice($exchange, $order_info['fee']['cost']);
                            }
                        }
                    }

                    $order_result_amount -= $fee;

                    if($value['trade_type']== 1){
                        $order_result_amount -= 0.0003;
                        if ($exchange->id == 'kucoin') {
                            $inner_transfer_result = $exchange->transfer('BTC', $order_result_amount, 'trade', 'main');
                            \Log::info("kucoin after Inner transfer BTC for withdraw order : ".$order_result_amount);
                        } else if ($exchange->id == 'okx') {
                             $inner_transfer_result = $exchange->transfer('BTC', $order_result_amount, '18', '6');
                            \Log::info("okx after Inner transfer BTC for withdraw order : ".$order_result_amount);
                        }
                    }else if($value['trade_type'] == 2){

                        $order_result_amount -= 5;

                        if ($exchange->id == 'kucoin') {
                            $inner_transfer_result = $exchange->transfer('USDT', $order_result_amount, 'trade', 'main');
                            \Log::info("kucoin after Inner transfer USDT for withdraw order : ".$order_result_amount);
                        } else if ($exchange->id == 'okx') {

                             $inner_transfer_result = $exchange->transfer('USDT', $order_result_amount, '18', '6');
                            \Log::info("okx after Inner transfer USDT for withdraw order : ".$order_result_amount);
                        }
                    }

                    $order_result_amount = floor($order_result_amount * 10000) / 10000;

                    $update_status_order_list = OrderList::where('id', $value['id'])->update(['status' => 1, 'result_amount' => $order_result_amount]);

                    \Log::info('Closed one order. trade type = '.$value['trade_type']);

                }else if($order_info['status'] == 'canceled' && $order_info['status'] == 'expired' && $order_info['status'] == 'rejected'){

                    try {
                        //code...
                        $update_status_order_list = OrderList::where('id', $value['id'])->update(['status' => 3]);

                        if($value['trade_type'] == 1){
                            $order = $this->createMarketBuyOrder($symbol, $order_info['amount'], $exchange);
                        }else{
                            $order = $this->createMarketSellOrder($symbol, $order_info['amount'], $exchange);
                        }

                        $order_tbl_info = array();

                        $order_tbl_info['trade_id']         = $value['trade_id'];
                        $order_tbl_info['trade_type']       = $value['trade_type'];
                        $order_tbl_info['exchange_id']      = $value['exchange_id'];
                        $order_tbl_info['superload_id']     = $value['superload_id'];
                        $order_tbl_info['order_id']         = $order['id'];
                        $order_tbl_info['result_amount']    = 0;
                        $order_tbl_info['status']           = 0;

                        $create_order_result = OrderList::create($order_tbl_info);

                        \Log::info('One resale has been registered!');

                    } catch (\Throwable $th) {
                        //throw $th;
                        \Log::info('One resale order has been failed. Because of '.$th->getMessage());
                    }
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            \Log::info('Failed checking one scalled sale because of '.$th->getMessage());
        }
    }
    /* This function works every 5 minutes */
    public function cronWithdraw(){
        $order_completed_list = OrderList::where('status', 1)->get()->toArray();
        foreach ($order_completed_list as $key => $value) {
            # code...
            $exchange_info = ExchangeInfo::where('id', $value['exchange_id'])->get()->toArray();
            $exchange = $this->exchange($exchange_info[0]);
            $withdraw_result = $this->withdraw($exchange, $value['id']);
        }
    }
    /* This function works every 2 minutes */
    public function cronCheckWithdraw (){
        $withdraw_order_info = Withdraw::where('status', 0)->get()->toArray();
        foreach ($withdraw_order_info as $key => $value) {
            # code...
            if($value['trade_type'] == 1){
                $asset = "BTC";
                $confirm_result = $this->confirmWithdrawTransaction($asset, $value);
            }else{
                $asset = "USDT";
                $confirm_result = $this->confirmWithdrawTransaction($asset, $value);
            }

            if($confirm_result['success']){
                $outloads_info = OutLoads::where('trade_type', $value['trade_type'])->where('trade_id', $value['trade_id'])->get()->toArray();

                if(count($outloads_info) > 0){
                    $withdraw_fee = 0;
                    if(isset($confirm_result['withdraw_transaction']['fee']['cost']) && $confirm_result['withdraw_transaction']['fee']['cost'] != null){
                        $withdraw_fee = $confirm_result['withdraw_transaction']['fee']['cost'];
                    }
                    $currentamount  = floor(($outloads_info[0]['current_amount'] + ($confirm_result['withdraw_transaction']['amount'] - $withdraw_fee)) * 10000) / 10000;
                    $totalamount    = floor(($outloads_info[0]['total_amount'] + ($confirm_result['withdraw_transaction']['amount'] - $withdraw_fee)) * 10000) / 10000;


                    $orderlists = OrderList::where('trade_type', $value['trade_type'])->where('trade_id', $value['trade_id'])->where('status', 0)->orWhere('status', 1)->get()->toArray();
                    $orderlists_ = OrderList::where('trade_type', $value['trade_type'])->where('trade_id', $value['trade_id'])->where('status', 2)->get()->toArray();

                    $superload_info = SuperLoad::where('trade_type', $value['trade_type'])->where('trade_id', $value['trade_id'])->where('status', 0)->get()->toArray();

                    $withdrawlists = Withdraw::where('trade_type', $value['trade_type'])->where('trade_id', $value['trade_id'])->where('status', 1)->get()->toArray();

                    if(count($superload_info) == 0 && count($orderlists) == 0 && count($orderlists_) == count($withdrawlists)){
                        $update_outloads_result = OutLoads::where('trade_type', $value['trade_type'])->where('trade_id', $value['trade_id'])->update(['current_amount' => $currentamount, 'total_amount' => $totalamount, 'status' => 1]);
                    }else{
                        $update_outloads_result = OutLoads::where('trade_type', $value['trade_type'])->where('trade_id', $value['trade_id'])->update(['current_amount' => $currentamount, 'total_amount' => $totalamount]);
                    }
                }else{
                    $withdraw_fee = 0;
                    if(isset($confirm_result['withdraw_transaction']['fee']['cost']) && $confirm_result['withdraw_transaction']['fee']['cost'] != null){
                        $withdraw_fee = $confirm_result['withdraw_transaction']['fee']['cost'];
                    }
                    $currentamount  = floor(($confirm_result['withdraw_transaction']['amount'] - $withdraw_fee) * 10000) / 10000;

                    if($value['trade_type'] == 1){
                        $trade_info = InternalTradeBuyList::where('id', $value['trade_id'])->get()->toArray();
                    }else{
                        $trade_info = InternalTradeSellList::where('id', $value['trade_id'])->get()->toArray();

                    }
                    $outload_info = array();

                    $outload_info['trade_id'] = $value['trade_id'];
                    $outload_info['trade_type'] = $value['trade_type'];
                    $outload_info['exchange_id'] = $value['exchange_id'];
                    $outload_info['user_id'] = $trade_info[0]['user_id'];
                    $outload_info['current_amount'] = $currentamount;
                    $outload_info['total_amount'] = $currentamount;
                    $outload_info['status'] = 0;

                    $update_outloads_result = OutLoads::create($outload_info);
                }
            }
        }
    }
    /* This function works every 5 minutes */
    public function cronLastStep(){
        $outloads_info = OutLoads::where('status', 1)->get()->toArray();
        if(count($outloads_info) > 0){
            \Log::info("complete one outloads!");
            foreach ($outloads_info as $key => $value) {
                # code...
                $this->lastStep($value, 1);
            }
        }
    }
    /* This function works every 00 : 00 AM */

    public function cronDailyWithdraw(){
        $outloads_info = OutLoads::where('status', 1)->get()->toArray();
        if(count($outloads_info) > 0){
            foreach ($outloads as $key => $value) {
                # code...
                $this->lastStep($value, 2);
            }
        }
    }

    public function lastStep($value, $type){
        try {
            //code...
            if($value['trade_type'] == 1){
                $trade_info = InternalTradeBuyList::where('id', $value['trade_id'])->get()->toArray();
                $sending_fee_result = $this->handleSendFee($trade_info[0], $value['current_amount'], 1);
                if($sending_fee_result['status']){
                    sleep(25);

                    $send_client_amount = floor($sending_fee_result['remain_amount'] * 1000000) / 1000000;
                    $send_result = $this->sendBTC($trade_info[0]['delivered_address'], $send_client_amount);

                    $subload_info = array();
                    $subload_info['tx_id']              = $send_result['txid'];
                    $subload_info['trade_type']         = $value['trade_type'];
                    $subload_info['trade_id']           = $value['trade_id'];
                    $subload_info['amount']             = $send_client_amount;
                    $subload_info['status']             = 1;

                    $subload_create_result = SubLoad::create($subload_info);

                    if($type == 1){
                        $update_outloads_status = OutLoads::where('id', $value['id'])->update(['current_amount' => 0,'status' => 2]);
                        $update_internal_trade_buy = InternalTradeBuyList::where('id', $value['trade_id'])->update(['state' => 3]);
                        \Log::info("complete one sale order");
                    }else{
                        $update_outloads_status = OutLoads::where('id', $value['id'])->update(['current_amount' => 0]);
                        \Log::info("One daily withdrawn");
                    }
                }
            }else{
                $trade_info = InternalTradeSellList::where('id', $value['trade_id'])->get()->toArray();
                $sending_fee_result = $this->handleSendFee($trade_info[0], $value['current_amount'], 2);
                if($sending_fee_result['status']){

                    sleep(25);

                    $internal_wallet_info = InternalWallet::where('wallet_type',1)->where('chain_stack',2)->get()->toArray();
                    $private_key = base64_decode($internal_wallet_info[0]['private_key']);
                    $address = $internal_wallet_info[0]['wallet_address'];

                    $send_client_amount = floor($sending_fee_result['remain_amount'] * 1000000) / 1000000;

                    $send_usdt_result = $this->sendUSDT($address, $private_key, $trade_info[0]['delivered_address'],  $send_client_amount);

                    $subload_info = array();
                    $subload_info['tx_id']              = $send_usdt_result[1];
                    $subload_info['trade_type']         = $value['trade_type'];
                    $subload_info['trade_id']           = $value['trade_id'];
                    $subload_info['amount']             = $send_client_amount;
                    $subload_info['status']             = 1;

                    $subload_create_result = SubLoad::create($subload_info);

                    if($type == 1){
                        $update_outloads_status = OutLoads::where('id', $value['id'])->update(['current_amount' => 0,'status' => 2]);
                        $update_internal_trade_buy = InternalTradeSellList::where('id', $value['trade_id'])->update(['state' => 3]);
                        \Log::info("complete one sale order");
                    }else{
                        $update_outloads_status = OutLoads::where('id', $value['id'])->update(['current_amount' => 0]);
                        \Log::info("One daily withdrawn");
                    }
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            \Log::info("Failed one sale order. because ".$th->getMessage());
        }
    }

    public function withdraw($exchange, $order_id){

        $order_info = OrderList::where('id', $order_id)->get()->toArray();
        $withdraw_info = array();

        if(isset($order_info[0]['trade_type']) && $order_info[0]['trade_type'] == 1){
            try {
                //code...
                $code = "BTC";
                $amount = floor($order_info[0]['result_amount'] * 0.985 * 1000000) / 1000000;
                $internal_wallets = InternalWallet::where('chain_stack', 1)->where('wallet_type', 1)->get()->toArray();
                $address = $internal_wallets[0]['wallet_address'];

                $params = [];

                if ($exchange->id == 'okx') {

                    $chain = null;
                    if ( strcasecmp($code, 'USDT') == 0) {
                        $chain = 'USDT-ERC20';
                    } else if (strcasecmp($code, 'BTC') == 0) {
                        $chain = 'BTC-Bitcoin';
                    } else {
                        $chain = null;
                    }

                    $params = [
                        'dest'=>'4', /** 3: internal 4: on chain */
                        'chain'=>$chain,
                        'pwd'=>$exchange->secret,
                        'fee' => 0.0002, /** min withdraw fee is 2 */
                    ];
                }else if($exchange->id == 'bitget'){
                    $params = [
                        'chain'=>'BTC',
                    ];
                }else if($exchange->id == 'gateio'){
                    $params = [
                        'network'=>'BTC',
                    ];
                }
                \Log::info($params);
                if($exchange->id == 'mexc'){
                    $network = "Bitcoin";
                    $withdraw_detail = $this->withdrawMEXC($exchange, $amount, $address, $code, $network );
                    $withdraw_detail = json_decode($withdraw_detail, true);
                }else{

                    $withdraw_detail = $exchange->withdraw($code, $amount, $address, null, $params);
                }

                $withdraw_info['trade_type']        = 1;
                $withdraw_info['trade_id']          = $order_info[0]['trade_id'];
                $withdraw_info['superload_id']      = $order_info[0]['superload_id'];
                $withdraw_info['exchange_id']       = $order_info[0]['exchange_id'];
                $withdraw_info['withdraw_order_id'] = $withdraw_detail['id'];
                $withdraw_info['manual_flag']       = 0;
                $withdraw_info['status']            = 0;

                $result = Withdraw::create($withdraw_info);

                $order_info = OrderList::where('id', $order_id)->update(['status' => 2]);

                \Log::info("Withdraw request has been ordered. amount = ".$amount." to ".$address);
                return true;

            } catch (\Throwable $th) {
                //throw $th;
                $withdraw_info['trade_type']        = 1;
                $withdraw_info['trade_id']          = $order_info[0]['trade_id'];
                $withdraw_info['superload_id']      = $order_info[0]['superload_id'];
                $withdraw_info['exchange_id']       = $order_info[0]['exchange_id'];
                $withdraw_info['withdraw_order_id'] = "1";
                $withdraw_info['manual_flag']       = 1;
                $withdraw_info['status']            = 0;

                $result = Withdraw::create($withdraw_info);

                $order_info = OrderList::where('id', $order_id)->update(['status' => 2]);

                \Log::info("The withdraw of this order id ".$order_id." has been converted to manual withdraw. because ".$th->getMessage());
                return true;
            }


        }else if(isset($order_info[0]['trade_type']) && $order_info[0]['trade_type'] == 2){
            try {
                //code...
                $code = "USDT";
                $amount = $order_info[0]['result_amount'];
                $real_amount = floor($amount * 0.98 * 1000000) / 1000000;

                $internal_wallets = InternalWallet::where('chain_stack', 2)->where('wallet_type', 1)->get()->toArray();

                $address = $internal_wallets[0]['wallet_address'];

                $params = [];

                if ($exchange->id == 'okx') {

                    $chain = null;
                    if ( strcasecmp($code, 'USDT') == 0) {
                        $chain = 'USDT-ERC20';
                    } else if (strcasecmp($code, 'BTC') == 0) {
                        $chain = 'BTC-Bitcoin';
                    } else {
                        $chain = null;
                    }

                    $params = [
                        'dest'=>'4', /** 3: internal 4: on chain */
                        'chain'=>$chain,
                        'pwd'=>$exchange->secret,
                        'fee' => 5, /** min withdraw fee is 2 */
                    ];
                }else if($exchange->id == 'bitget'){
                    $params = [
                        'chain'=>'ERC20',
                    ];
                }else if($exchange->id == 'gateio'){
                    $params = [
                        'network'=>'ERC20',
                    ];
                }

                \Log::info($params);
                if($exchange->id == 'mexc'){
                    $network = "ERC20";
                    $withdraw_detail = $this->withdrawMEXC($exchange, $real_amount, $address, $code, $network );
                    $withdraw_detail = json_decode($withdraw_detail, true);
                }else{
                    $withdraw_detail = $exchange->withdraw($code, $real_amount, $address, null, $params);
                }

                \Log::info($withdraw_detail);

                $withdraw_info['trade_type']        = 2;
                $withdraw_info['trade_id']          = $order_info[0]['trade_id'];
                $withdraw_info['superload_id']      = $order_info[0]['superload_id'];
                $withdraw_info['exchange_id']       = $order_info[0]['exchange_id'];
                $withdraw_info['amount']            = $real_amount;
                $withdraw_info['withdraw_order_id'] = $withdraw_detail['id'];
                $withdraw_info['manual_flag']       = 0;
                $withdraw_info['status']            = 0;

                $result = Withdraw::create($withdraw_info);

                $order_info = OrderList::where('id', $order_id)->update(['status' => 2]);

                \Log::info("Withdraw request has been ordered. amount = ".$real_amount." to ".$address);
                return true;
            } catch (\Throwable $th) {
                //throw $th;
                $withdraw_info['trade_type']        = 2;
                $withdraw_info['trade_id']          = $order_info[0]['trade_id'];
                $withdraw_info['superload_id']      = $order_info[0]['superload_id'];
                $withdraw_info['exchange_id']       = $order_info[0]['exchange_id'];
                $withdraw_info['amount']            = $real_amount;
                $withdraw_info['withdraw_order_id'] = "1";
                $withdraw_info['manual_flag']       = 1;
                $withdraw_info['status']            = 0;

                $result = Withdraw::create($withdraw_info);

                $order_info = OrderList::where('id', $order_id)->update(['status' => 2]);

                \Log::info("The withdraw of this order id ".$order_id." has been converted to manual withdraw. because ".$th->getMessage());
                return true;
            }

        }
    }

    public function checkTransaction($from, $to, $amount, $tx_id){
        exec('node C:\Server\NeilLab-Main-Branch\app\Http\Controllers\Admin\USDTSendServer\checkTransaction.js ' .$from.' '.$to. ' '.$amount.' '.$tx_id, $output);
        return $output;
    }

    public function confirmWithdrawTransaction($asset, $value){
        try {
            //code...
            $exchange_info = ExchangeInfo::where('id', $value['exchange_id'])->get()->toArray();
            $exchange = $this->exchange($exchange_info[0]);
            $withdraw_transaction_history = $exchange->fetchWithdrawals($asset);

            if($exchange->id == 'mexc'){
                \Log::info($withdraw_transaction_history);
            }
            $return = false;
            $transaction = array();

            foreach ($withdraw_transaction_history as $key => $history_value) {
                # code...
                if(($history_value['id'] == $value['withdraw_order_id'] || $history_value['txid'] == $value['withdraw_order_id'] || '0x'.$history_value['txid'] == $value['withdraw_order_id'])&& $history_value['status'] == 'ok'){
                    \Log::info($history_value);

                    $update_withdraw_status = Withdraw::where('id', $value['id'])->update(['status' => 1]);

                    \Log::info("Withdarw request has been confirmed from ".$exchange_info[0]['ex_name']."!");
                    $return = true;
                    $transaction = $history_value;
                    break;
                }
            }
            return ['success' => $return, 'withdraw_transaction' => $transaction];
        } catch (\Throwable $th) {
            //throw $th;
            \Log::info('Confirm Withdraw trnsaction has been failed'.$th->getMessage());
            return ['success' => false];

        }
    }

    public function handleSendFee($trade_info, $amount, $trade_type){
        $user_info = User::where('id', $trade_info['user_id'])->get()->toArray();
        $marketing_info = MarketingCampain::where('id', $user_info[0]['marketing_campain_id'])->get()->toArray();
        if(count($marketing_info) > 0){

            $fee_amount = floor($amount/100*$marketing_info[0]['total_fee'] * 1000000) / 1000000;
            $remain_amount = $amount - $fee_amount;


            if($trade_type == 1){
                $marketing_fee_wallets = MarketingFeeWallet::where('fee_type', 1)->where('chain_net', 1)->get()->toArray();
                $send_result = $this->sendBTC($marketing_fee_wallets[0]['wallet_address'], $fee_amount);

                $tx_id =  $send_result['txid'];
                \Log::info("Total Fee (".$fee_amount."BTC)has been sent to " . $marketing_fee_wallets[0]['wallet_address']);

                $chain_net = 1;
                $send_fee_result = true;
            }else{
                $marketing_fee_wallets = MarketingFeeWallet::where('fee_type', 1)->where('chain_net', 2)->get()->toArray();

                $internal_wallet_info = InternalWallet::where('wallet_type',1)->where('chain_stack',2)->get()->toArray();
                $private_key = base64_decode($internal_wallet_info[0]['private_key']);
                $address = $internal_wallet_info[0]['wallet_address'];

                $send_usdt_result = $this->sendUSDT($address, $private_key , $marketing_fee_wallets[0]['wallet_address'], $fee_amount);
                \Log::info($send_usdt_result);
                $tx_id = $send_usdt_result[1];
                \Log::info("Total Fee (".$fee_amount."USDT)has been sent to " . $marketing_fee_wallets[0]['wallet_address']);

                $chain_net = 2;
            }
            $transaction_history = array();
            $transaction_history['fee_type'] = 1;
            $transaction_history['chain_net'] = $chain_net;
            $transaction_history['amount'] = $fee_amount;
            $transaction_history['tx_id'] = $tx_id;
            $transaction_history['user_id'] = $trade_info['user_id'];

            $transaction_create_result = SendFeeTransaction::create($transaction_history);

            if($transaction_create_result->id > 0){
                $return_status = true;
            }else{
                $return_status = false;
            }

            return (['status' => $return_status, 'remain_amount' => $remain_amount]);
        }else{
            return (['status' => false]);
        }

    }


    public function confirm_btc_transaction ($txid) {

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
                    if($tx->txid === $txid && $tx->confirmations >= 3) {
                        return ['status'=>'success', 'result'=>'true'];
                    }
                }
                return ['status'=>'success', 'result'=>'false'];
            }else{
                return ['status'=>'error', 'message'=>'Some error occured!'];
            }
        }
    }

    public function sendBTC($to, $amount){

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "http://localhost:7890",
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => $this->RPCusername.':'.$this->RPCpassword,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POSTFIELDS => '{"id":"curltext","method":"payto","params": {"destination" : "'.$to.'", "amount" : '.$amount.'}}',
            CURLOPT_POST => 1,
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if ($err) {
            return ['status'=>'error', 'message'=>$err];
        } else {
            $result = json_decode($response);
            if(isset($result->result)){

                curl_setopt_array($curl, [
                    CURLOPT_URL => "http://localhost:7890",
                    CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
                    CURLOPT_USERPWD => $this->RPCusername.':'.$this->RPCpassword,
                    CURLOPT_RETURNTRANSFER => 1,
                    CURLOPT_POSTFIELDS => '{"id":"curltext","method":"broadcast","params": ["'.$result->result.'"]}',
                    CURLOPT_POST => 1,
                ]);

                $response1 = curl_exec($curl);
                $err1 = curl_error($curl);
                curl_close($curl);

                if($err1){
                    return ['status'=>'error', 'message'=>$err1];
                }else{
                    $result1 = json_decode($response1);
                    if(isset($result1->result)){
                        return ['status'=>'success', 'txid'=>$result1->result];
                    }else{
                        return ['status'=>'error', 'message'=>'An error occured!'];
                    }
                }
            }else{
                return ['status'=>'error', 'message'=>$result->error->message];
            }
        }
    }

    public function sendUSDT($from, $from_pk, $to, $amount){
        $amount_big = $amount*1000000;
        exec('node C:\Server\NeilLab-Main-Branch\app\Http\Controllers\Admin\USDTSendServer\sendUSDT.js ' .$from.' '.$from_pk. ' '.$to.' '.$amount_big, $output);
        return $output;
    }

    public function updateThemeMode(Request $request){
        $themeMode = $request['mode'];
        $update_theme_mode_result = User::where('id', auth()->user()->id)->update(['theme_mode' => $themeMode]);
        return response()->json(["success" => $update_theme_mode_result]);
    }

    public function getThemeMode(){
        return auth()->user()->theme_mode;
    }
    public function getAmountExchange($amonut){

        $result = ExchangeInfo::where('state', 1)->orderBy('id', 'asc')->get()->toArray();

        $binance_account = array();
        $ftx_account = array();
        $kucoin_account = array();
        $gate_account = array();
        $huobi_account = array();
        $bitstamp_account = array();
        $bitfinex_account = array();
        $okx_account = array();
        $bitget_account = array();
        $mexc_account = array();




        $exchange_available_accounts = array();

        $binance_deposite_amount = 0;
        $ftx_deposite_amount = 0;
        $gate_deposite_amount = 0;
        $huobi_deposite_amount = 0;
        $kucoin_deposite_amount = 0;
        $bitstamp_deposite_amount = 0;
        $bitfinex_deposite_amount = 0;
        $okx_deposite_amount = 0;
        $bitget_deposite_amount = 0;
        $mexc_deposite_amount = 0;


        foreach ($result as $key => $value) {
         # code...
            $exchange = $this->exchange($value);
            try {
                //code...
                if($exchange->id == 'bitget'){
                    $btc_wallet = json_decode($this->getDepositAddressBitget($exchange, "BTC"));
                    $btc_wallet = $btc_wallet->data->address;
                    $btc_wallet_address = $btc_wallet;
                }else{
                    $btc_wallet = $exchange->fetchDepositAddress("BTC");
                }
                if($value['ex_name'] == 'Binance'){
                    array_push($binance_account, $value['id']);
                }else if($value['ex_name'] == 'FTX'){
                    array_push($ftx_account, $value['id']);
                }else if($value['ex_name'] == 'kucoin'){
                    array_push($kucoin_account, $value['id']);
                }else if($value['ex_name'] == 'gateio'){
                    array_push($gate_account, $value['id']);
                }else if($value['ex_name'] == 'huobi'){
                    array_push($huobi_account, $value['id']);
                }else if($value['ex_name'] == 'bitstamp'){
                    array_push($bitstamp_account, $value['id']);
                }else if($value['ex_name'] == 'bitfinex'){
                    array_push($bitfinex_account, $value['id']);
                }else if($value['ex_name'] == 'okx'){
                    array_push($okx_account, $value['id']);
                }else if($value['ex_name'] == 'bitget'){
                    array_push($bitget_account, $value['id']);
                }else if($value['ex_name'] == 'mexc'){
                    array_push($mexc_account, $value['id']);
                }

                array_push($exchange_available_accounts, $value['id']);
            } catch (\Throwable $th) {
                //throw $th;
                \Log::info("one exchange is disconnected because of ". $th->getMessage());
            }
        }

        $binance_available_number   = count($binance_account);
        $ftx_available_number       = count($ftx_account);
        $kucoin_available_number    = count($kucoin_account);
        $gate_available_number      = count($gate_account);
        $huobi_available_number     = count($huobi_account);
        $bitstamp_available_number  = count($bitstamp_account);
        $bitfinex_available_number  = count($bitfinex_account);
        $okx_available_number       = count($okx_account);
        $bitget_available_number    = count($bitget_account);
        $mexc_available_number      = count($mexc_account);




        if($binance_available_number != 0 || $ftx_available_number != 0 || $kucoin_available_number != 0 || $gate_available_number != 0 || $huobi_available_number != 0 || $bitstamp_available_number != 0 || $bitfinex_available_number != 0 || $okx_available_number != 0 || $bitget_available_number != 0 || $mexc_available_number != 0){
            $binance_account_rate   = 8/50 * $binance_available_number      / (8/50 * $binance_available_number + 2/50 * $ftx_available_number + 3/50 * $kucoin_available_number + 7/50 * $gate_available_number + 7/50 * $huobi_available_number + 5/50 * $bitstamp_available_number + 8/50 * $bitfinex_available_number + 6/50 * $okx_available_number + 2/50 * $bitget_available_number + 2/50 * $mexc_available_number);
            $ftx_account_rate       = 2/50 * $ftx_available_number          / (8/50 * $binance_available_number + 2/50 * $ftx_available_number + 3/50 * $kucoin_available_number + 7/50 * $gate_available_number + 7/50 * $huobi_available_number + 5/50 * $bitstamp_available_number + 8/50 * $bitfinex_available_number + 6/50 * $okx_available_number + 2/50 * $bitget_available_number + 2/50 * $mexc_available_number);
            $kucoin_account_rate    = 3/50 * $kucoin_available_number       / (8/50 * $binance_available_number + 2/50 * $ftx_available_number + 3/50 * $kucoin_available_number + 7/50 * $gate_available_number + 7/50 * $huobi_available_number + 5/50 * $bitstamp_available_number + 8/50 * $bitfinex_available_number + 6/50 * $okx_available_number + 2/50 * $bitget_available_number + 2/50 * $mexc_available_number);
            $gate_account_rate      = 7/50 * $gate_available_number         / (8/50 * $binance_available_number + 2/50 * $ftx_available_number + 3/50 * $kucoin_available_number + 7/50 * $gate_available_number + 7/50 * $huobi_available_number + 5/50 * $bitstamp_available_number + 8/50 * $bitfinex_available_number + 6/50 * $okx_available_number + 2/50 * $bitget_available_number + 2/50 * $mexc_available_number);
            $huobi_account_rate     = 7/50 * $huobi_available_number        / (8/50 * $binance_available_number + 2/50 * $ftx_available_number + 3/50 * $kucoin_available_number + 7/50 * $gate_available_number + 7/50 * $huobi_available_number + 5/50 * $bitstamp_available_number + 8/50 * $bitfinex_available_number + 6/50 * $okx_available_number + 2/50 * $bitget_available_number + 2/50 * $mexc_available_number);
            $bitstamp_account_rate  = 5/50 * $bitstamp_available_number     / (8/50 * $binance_available_number + 2/50 * $ftx_available_number + 3/50 * $kucoin_available_number + 7/50 * $gate_available_number + 7/50 * $huobi_available_number + 5/50 * $bitstamp_available_number + 8/50 * $bitfinex_available_number + 6/50 * $okx_available_number + 2/50 * $bitget_available_number + 2/50 * $mexc_available_number);
            $bitfinex_account_rate  = 8/50 * $bitfinex_available_number     / (8/50 * $binance_available_number + 2/50 * $ftx_available_number + 3/50 * $kucoin_available_number + 7/50 * $gate_available_number + 7/50 * $huobi_available_number + 5/50 * $bitstamp_available_number + 8/50 * $bitfinex_available_number + 6/50 * $okx_available_number + 2/50 * $bitget_available_number + 2/50 * $mexc_available_number);
            $okx_account_rate       = 6/50 * $okx_available_number          / (8/50 * $binance_available_number + 2/50 * $ftx_available_number + 3/50 * $kucoin_available_number + 7/50 * $gate_available_number + 7/50 * $huobi_available_number + 5/50 * $bitstamp_available_number + 8/50 * $bitfinex_available_number + 6/50 * $okx_available_number + 2/50 * $bitget_available_number + 2/50 * $mexc_available_number);
            $bitget_account_rate    = 2/50 * $bitget_available_number       / (8/50 * $binance_available_number + 2/50 * $ftx_available_number + 3/50 * $kucoin_available_number + 7/50 * $gate_available_number + 7/50 * $huobi_available_number + 5/50 * $bitstamp_available_number + 8/50 * $bitfinex_available_number + 6/50 * $okx_available_number + 2/50 * $bitget_available_number + 2/50 * $mexc_available_number);
            $mexc_account_rate      = 2/50 * $mexc_available_number         / (8/50 * $binance_available_number + 2/50 * $ftx_available_number + 3/50 * $kucoin_available_number + 7/50 * $gate_available_number + 7/50 * $huobi_available_number + 5/50 * $bitstamp_available_number + 8/50 * $bitfinex_available_number + 6/50 * $okx_available_number + 2/50 * $bitget_available_number + 2/50 * $mexc_available_number);


            if($binance_available_number != 0){
                $binance_deposite_amount    = floor(($amonut * $binance_account_rate   / $binance_available_number)     * 1000000 ) / 1000000;
            }
            if($ftx_available_number != 0){
                $ftx_deposite_amount        = floor(($amonut * $ftx_account_rate       / $ftx_available_number)         * 1000000 ) / 1000000;
            }
            if($kucoin_available_number != 0){
                $kucoin_deposite_amount     = floor(($amonut * $kucoin_account_rate    / $kucoin_available_number)      * 1000000 ) / 1000000;
            }
            if($gate_available_number != 0){
                $gate_deposite_amount       = floor(($amonut * $gate_account_rate      / $gate_available_number)        * 1000000 ) / 1000000;
            }
            if($huobi_available_number != 0){
                $huobi_deposite_amount      = floor(($amonut * $huobi_account_rate     / $huobi_available_number)       * 1000000 ) / 1000000;
            }
            if($bitstamp_available_number != 0){
                $bitstamp_deposite_amount   = floor(($amonut * $bitstamp_account_rate  / $bitstamp_available_number)    * 1000000 ) / 1000000;
            }
            if($bitfinex_available_number != 0){
                $bitfinex_deposite_amount   = floor(($amonut * $bitfinex_account_rate  / $bitfinex_available_number)    * 1000000 ) / 1000000;
            }
            if($okx_available_number != 0){
                $okx_deposite_amount        = floor(($amonut * $okx_account_rate       / $okx_available_number)         * 1000000 ) / 1000000;
            }
            if($bitget_available_number != 0){
                $bitget_deposite_amount     = floor(($amonut * $bitget_account_rate    / $bitget_available_number)      * 1000000 ) / 1000000;
            }
            if($mexc_available_number != 0){
                $mexc_deposite_amount       = floor(($amonut * $mexc_account_rate      / $mexc_available_number)        * 1000000 ) / 1000000;
            }
        }

        $return_value = array();

        $return_value['binance_account']    = $binance_account;
        $return_value['ftx_account']        = $ftx_account;
        $return_value['kucoin_account']     = $kucoin_account;
        $return_value['gate_account']       = $gate_account;
        $return_value['huobi_account']      = $huobi_account;
        $return_value['bitstamp_account']   = $bitstamp_account;
        $return_value['bitfinex_account']   = $bitfinex_account;
        $return_value['okx_account']        = $okx_account;
        $return_value['bitget_account']     = $bitget_account;
        $return_value['mexc_account']       = $mexc_account;




        $return_value['binance_deposite_amount']    = $binance_deposite_amount;
        $return_value['ftx_deposite_amount']        = $ftx_deposite_amount;
        $return_value['kucoin_deposite_amount']     = $kucoin_deposite_amount;
        $return_value['gate_deposite_amount']       = $gate_deposite_amount;
        $return_value['huobi_deposite_amount']      = $huobi_deposite_amount;
        $return_value['bitstamp_deposite_amount']   = $bitstamp_deposite_amount;
        $return_value['bitfinex_deposite_amount']   = $bitfinex_deposite_amount;
        $return_value['okx_deposite_amount']        = $okx_deposite_amount;
        $return_value['bitget_deposite_amount']     = $bitget_deposite_amount;
        $return_value['mexc_deposite_amount']       = $mexc_deposite_amount;



        $return_value['exchange_available_accounts'] = $exchange_available_accounts;
        return $return_value;
    }

    public function handleFailedSuperLoads(){
        $failed_superloads = SuperLoad::where('tx_id', 1)->get()->toArray();

        if(count($failed_superloads) > 0){
            foreach ($failed_superloads as $key => $value) {
                # code...
                if($value['trade_type'] == 1){
                    try {
                        //code...
                        $internal_treasury_wallet_info = InternalWallet::where('id', $value['internal_treasury_wallet_id'])->get()->toArray();
                        $private_key = base64_decode($internal_treasury_wallet_info[0]['private_key']);
                        $send_result = $this->sendUSDT($internal_treasury_wallet_info[0]['wallet_address'],$private_key, $value['receive_address'], $value['amount']);
                        if(!empty($send_result)){
                            $update_failed_superload_result = SuperLoad::where('id', $value['id'])->update(['tx_id' => $send_result[1]]);
                            InternalTradeBuyList::where('id', $value['trade_id'])->update(['state' => 2]);
                            \Log::info("send ".$amount."usdt from ".$internal_treasury_wallet_info[0]['wallet_address']."to ".$deposit_wallet_address);
                        }
                    } catch (\Throwable $th) {
                        //throw $th;
                        \Log::info("One failed superload has been failed. because ".$th->getMessage());
                    }

                }else{
                    try {
                        //code...

                        $send_result = $this->sendBTC($value['receive_address'], $value['amount']);

                        if($send_result['status'] == 'success'){
                            $update_failed_superload_result = SuperLoad::where('id', $value['id'])->update(['tx_id' => $send_result['txid']]);
                            InternalTradeSellList::where('id', $value['trade_id'])->update(['state' => 2]);

                            \Log::info("send ".$value['amount']."BTC from to ".$value['receive_address']);
                        }
                    } catch (\Throwable $th) {
                        //throw $th;
                        \Log::info("One failed superload has been failed. because ".$th->getMessage());
                    }
                }
            }
        }
    }

    public function withdrawMEXC($exchange, $amount, $address, $coin, $network ){

        // $coin = 'USDT', $network = 'ERC20'
        // $coin = 'BTC', $network = 'Bitcoin'


        $time = time() * 1000;
        $signatureString = "coin={$coin}&network={$network}&amount=".$amount."&recvWindow=60000&address=".$address."&timestamp=".$time;
        $signature = hash_hmac("sha256", $signatureString, $exchange->secret);
        $url = 'https://api.mexc.com/api/v3/capital/withdraw/apply?'.$signatureString.'&signature='.$signature;


        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_HTTPHEADER => array(
            'X-MEXC-APIKEY: '.$exchange->apiKey
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        /**
         * Sample response
         *
         * "{"id":"57e32ff714054d4aabd6302cde623663"}"
         */
        return $response;

    }
    public function buildSignHeadersGateIO($exchange, $method, $resourcePath, $queryParams = null, $payload = null)
    {
        $host='https://api.gateio.ws/api/v4';

        $fullPath = parse_url($host, PHP_URL_PATH) . $resourcePath;
        $fmt = "%s\n%s\n%s\n%s\n%s";
        $timestamp = time();
        $hashedPayload = hash("sha512", ($payload !== null) ? $payload : "");
        $signatureString = sprintf(
            $fmt,
            $method,
            $fullPath,
            $queryParams,
            $hashedPayload,
            $timestamp
        );
        $signature = hash_hmac("sha512", $signatureString, $exchange->secret);
        return [
            "KEY" => $exchange->apiKey,
            "SIGN" => $signature,
            "Timestamp" => $timestamp
        ];
    }
    public function getSingleOrderGateIO($exchange, $order_id) {

        $query_param='currency_pair=BTC_USDT';

        $sign_headers=$this->buildSignHeadersGateIO($exchange, 'GET', "/spot/orders/".$order_id, $query_param, );

        try {
            $full_url = 'https://api.gateio.ws/api/v4/spot/orders/'.$order_id.'?'.$query_param;

            $ch = curl_init($full_url);
            $headers = [];
            foreach($sign_headers as $key=>$value) {
                $headers[] = $key.':'.$value;
            }

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
            return json_decode($result, true);
        } catch (Exception $e) {
            \Log::info($e->getMessage());
        }



    }

    public function getDepositAddressBitget($exchange, $code, $network=null ){

        // $coin = 'USDT', $network = 'ERC20'

        try {
            //code...
            $time = (int) round(microtime(true) * 1000);
            $params = ['coin'=>$code];
            if($network) {
                $params['chain'] = $network;
            }

            $req_data = $exchange->sign('wallet/deposit-address', ['private', 'spot'], 'GET', $params);
            $curl = curl_init();
            $headers = [];
            foreach($req_data['headers'] as $key=>$value) {
                $headers[] = $key.':'.$value;
            }
            $headers[] = 'locale:en-US';
            $headers[] = 'Content-Type:application/json';


            curl_setopt_array($curl, array(
                CURLOPT_URL => $req_data['url'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $req_data['method'],
                CURLOPT_HTTPHEADER=>$headers
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            // dd(['res' => $response], $req_data, $headers);
            return $response;
        } catch (\Throwable $th) {
            //throw $th;
            dd(['error' => $th->getMessage()]);
        }

    }

    public function getExchanges($start, $length, $search = null){

        $total_number = 0;
        $filtered_number = 0;

        $returnvalue = array();
        if($length == -1){
            if($search != null || $search != ''){
                $exchanges = ExchangeInfo::whereLike(['ex_name', 'ex_login'], $search)->get()->toArray();
                $total_number = count($exchanges);
                $filtered_number = $total_number;
            }else{
                $exchanges = ExchangeInfo::get()->toArray();
                $total_number = count($exchanges);
                $filtered_number = $total_number;
            }
        }else{
            if($search != null || $search != ''){
                $exchanges = ExchangeInfo::whereLike(['ex_name', 'ex_login'], $search)->skip($start)->take($length)->get()->toArray();
                $total_number = ExchangeInfo::whereLike(['ex_name', 'ex_login'], $search)->get()->count();
                $filtered_number = $total_number;
            }else{
                $exchanges = ExchangeInfo::skip($start)->take($length)->get()->toArray();
                $total_number = ExchangeInfo::get()->count();
                $filtered_number = $total_number;
            }
        }
        $returnvalue['exchange'] = $exchanges;
        $returnvalue['total'] = $total_number;
        $returnvalue['filtered'] = $filtered_number;

        return $returnvalue;
    }
}

