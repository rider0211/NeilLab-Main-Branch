<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\MarketingCampain;
use App\Models\User;
use App\Models\ReferralProfit;
use App\Models\ChainStack;
use App\Models\InternalWallet;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    public function index()
    {
        $banner_title = 'Welcome!';
        $banner_content = '';
        $logo_path = '/front/images/logo-s2-white.png';
        $profit = null;
        if(Auth::check()) {
            $campaign = MarketingCampain::find(auth()->user()->marketing_campain_id);
            if($campaign) {
                $banner_title = $campaign->banner_title;
                $banner_content = $campaign->banner_content;
                $logo_path = '/storage/logo_images/'.$campaign->logo_image;
            }

            $profit = ReferralProfit::where('user_id', auth()->user()->id)->where('status', 0)->first();
        }
        return view('front.home', compact('banner_title', 'banner_content', 'logo_path', 'profit'));
    }

    public function referral_index($referral_code) {
        app('App\Http\Controllers\Auth\LoginController')->verify_referral_code($referral_code);

        $refer = User::where('referral_code', $referral_code)->first();
        if($refer){
            $campaign_id = $refer->marketing_campain_id;
            $campaign = MarketingCampain::find($campaign_id);
            $profit = null;
            if($campaign) {
                if(auth()->user()){
                    return redirect('/invite_friends');
                }else{
                    $banner_title = $campaign->banner_title;
                    $banner_content = $campaign->banner_content;
                    $logo_path = '/storage/logo_images/'.$campaign->logo_image;
                    return view('front.home', compact('banner_title', 'banner_content', 'logo_path', 'referral_code', 'profit'));
                }
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/');
        }
    }

    public function invite_friends() {
        $page_title = 'Invite Friends';
        $page_description = 'Some description for the page';

        $referal_url = url('/home/'.auth()->user()->referral_code);
        $friends = auth()->user()->referers;

        $profits = ReferralProfit::where('user_id', auth()->user()->id)->where('status', 1)->get();
        $theme_mode = $this->getThemeMode();
        
        return view('zenix.client.invite_friends', compact('page_title', 'page_description', 'friends', 'referal_url', 'profits', 'theme_mode'));
    }

    // This function is needed to verify... We may consider the double spending the money.... 
    public function get_profit(Request $request) {
        $id = $request->input('id');
        $wallet_address = $request->input('wallet');

        $profit = ReferralProfit::find($id);
        $profit->wallet_address = $wallet_address;
        // Get Corresponding Treasury wallet
        $internal_wallet = InternalWallet::where('chain_stack', $profit->stack->id)->where('set_as_treasury_wallet', 1)->first();
        if(!$internal_wallet) return ['status'=>'error', 'payload'=>'An error occured, please try again'];
        // In case of BTC
        if($profit->stack->stackname == 'BTC') {
            $result = app('App\Http\Controllers\Client\SellController')->sendBTC($wallet_address, $profit->amount);
            if($result['status']=='success') {
                $profit->status = 1;
                $profit->txid = $result['txid'];
                $profit->save();
                return ['status'=>'success', 'payload'=>$result['txid']];
            }else{
                return ['status'=>'error', 'payload'=>$result['message']];
            }
        }else{ // USDT
            $result = $this->sendUSDT($internal_wallet->wallet_address, $internal_wallet->private_key, $wallet_address, $profit->amount);
            if(empty($result)) {
                return ['status'=>'error', 'payload'=>'An error occured, please try again'];
            }else{
                $profit->status = 1;
                $profit->txid = $result[1];
                $profit->save();
                return ['status'=>'success', 'payload'=>$result[1]];
            }
        }
    }
}
