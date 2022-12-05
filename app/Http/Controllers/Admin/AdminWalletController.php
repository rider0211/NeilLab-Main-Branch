<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\ColdWallet;
use App\Models\InternalWallet;
use kornrunner\Ethereum\Address;
use Illuminate\Support\Facades\Storage;
use ccxt;
use Denpa\Bitcoin\Client as BitcoinClient;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
class AdminWalletController extends Controller
{
    public function __construct()
    {
        $this->RPCusername = config('app.RPCusername');
        $this->RPCpassword = config('app.RPCpassword');

    }


    public function index(){
        $page_title = __('locale.adminwalletlist');
        $page_description = 'Some description for the page';
        $action = 'walletlist';

        $internal_wallet  = InternalWallet::orderBy('id', 'asc')->get()->toArray();

        foreach ($internal_wallet as $key => $value) {
            # code...
            if($internal_wallet[$key]['cold_storage_wallet_id'] != null){
                $cold_storage_address = ColdWallet::select("cold_address")->where("id", $internal_wallet[$key]['cold_storage_wallet_id'])->get()->toArray();
                $internal_wallet[$key]['cold_storage_address'] = $cold_storage_address[0]['cold_address'];
            }else{
                $internal_wallet[$key]['cold_storage_address'] = "Edit";
            }
        }
        $cold_wallet = ColdWallet::orderBy('id', 'asc')->get();
        $theme_mode = $this->getThemeMode();

        return view('zenix.admin.walletlist', compact('page_title', 'page_description', 'action', 'internal_wallet','cold_wallet', 'theme_mode'));
    }

    public function viewNewWalletlist($id = null){
        $page_title = __('locale.admin_create_new_internal_wallet_list');
        $page_description = 'Some description for the page';
        $action = 'walletlist';
        $theme_mode = $this->getThemeMode();

        if($id){
            $result = InternalWallet::where("id", $id)->get()->toArray();
            return view('zenix.admin.updateInternalWallet', compact('page_title', 'page_description', 'action', 'result', 'theme_mode'));
        }else{
            $cold_wallet = ColdWallet::orderBy('id', 'asc')->get()->toArray();
            return view('zenix.admin.updateInternalWallet', compact('page_title', 'page_description', 'action','cold_wallet', 'theme_mode'));
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

    public function generateNewWalletAddress(Request $request){
        $chain_stack = $request['chain_stack'];
        $success = true;
        $error = false;
        if($chain_stack == 1){
            try {
                $address = $this->get_new_btc_wallet_address();
                return response()->json(["success" => $success, "address" => $address]);
            } catch (\Throwable $th) {
                return response()->json(["success" => $error, "message" => "Invalid Information!"]);
            }
        }else{
            $metamaskAddressInfo = $this->createMetamaskWalletAddress();
            $metamaskAddress = $metamaskAddressInfo->get();
            $metamaskPrivateKey = $metamaskAddressInfo->getPrivateKey();
            return response()->json(["success" => $success, "address" => "0x".$metamaskAddress, "private_key" => $metamaskPrivateKey]);
        }
    }
    function createMetamaskWalletAddress (){
        $address = new Address();
        return $address;
    }
    public function updateWalletList(Request $request){
        $payLoad = Arr::except($request->all(),['_token']);
        $payLoad['private_key'] = base64_encode($payLoad['private_key']);
        $payLoad['cold_storage_wallet_id'] = 1;
        $result = InternalWallet::create($payLoad);
        if(isset($result) && $result->id > 0){
            return redirect('/admin/walletlist'.$request->old_id)->with('success', 'Successfully created');
        }else{
            return redirect('/admin/walletlist'.$request->old_id)->with('error', 'Try again. There is error in database');
        }
    }

    public function editColdStorage(Request $request){
        $id = $request['user_id'];
        $wallet_id = $request['cold_storage_wallet_id'];
        $result = InternalWallet::where('id', $id)->update(['cold_storage_wallet_id' => $wallet_id]);
        if($result > 0){
            return redirect('/admin/walletlist')->with('success', 'Successfully created');
        }else{
            return redirect('/admin/walletlist')->with('error', 'Try again. There is error in database');
        }
    }

    public function getWalletInfoByID(Request $request){
        $id = $request['id'];
        $wallet_info = InternalWallet::where('id', $id)->get()->toArray();
        $wallet_balance = $this->getBalance($wallet_info[0]['wallet_address']);
        $cold_storage = ColdWallet::where('id', $wallet_info[0]['cold_storage_wallet_id'])->get()->toArray();
        $cold_address = $cold_storage[0]['cold_address'];
        $success = true;
        return response()->json(["success" => $success, "wallet_balance" => $wallet_balance, "cold_storage" => $cold_address]);
    }

    public function changeInternalWalletType(Request $request){

        $wallet_id = $request->wallet_id;
        $wallet_type = $request->wallet_type;

        $wallet = InternalWallet::find($wallet_id);
        $wallet->wallet_type = $wallet_type;
        if($wallet->save()) return 'success';
        else return 'error';
    }
    public function deleteInternalWallet($id = null){
        $res=InternalWallet::where('id',$id)->delete();
        if($res > 0){
            return redirect('/admin/walletlist')->with('success', 'Successfully deleted');
        }else{
            return redirect('/admin/walletlist')->with('error', 'Try again. There is error in database');
        }
    }
}
