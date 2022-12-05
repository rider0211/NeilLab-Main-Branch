<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\User;
use App\Models\MarketingCampain;
use App\Models\Referral;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    // use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        // $this->middleware('guest');
    }

        /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
            return Validator::make($data,[
                'username'  => ['required', 'string', 'max:255'],
                'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'  => ['required', 'string', 'min:8','confirmed'],
            ]);
    }

        /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'      => $data['name'],
            'username'  => $data['username'],
            'password'  => Hash::make($data['password']),
            'user_type' => 'none',
            'state' => 0,
        ]);
       
    }
    //

    public function customRegisterUser(Request $request)
    {
        // $responseRecaptcha=GoogleReCaptchaV3::verifyResponse($request->input('g-recaptcha-response'),$request->getClientIp())->toArray();
        //dd($responseRecaptcha);
        // if($responseRecaptcha['success']==true && $responseRecaptcha['score']>= 0.6){
            $validate = \Validator::make($request->all(),[
                'firstname'  => ['required', 'string', 'max:50'],
                'lastname'  => ['required', 'string', 'max:50'],
                'email'     => ['required', 'string', 'email', 'max:50'],
                'password'  => ['required', 'string', 'min:8'],
            ]);
            if( $validate->fails()){
                return redirect()
                ->back()
                ->withErrors($validate);
            }
            $marketing_campaign = 0;
            $invitor = null;
            $redirect = '';
            if(isset($request->referral_code)) {
                $invitor = User::where('referral_code', $request->referral_code)->first();
                if($invitor) {
                    $marketing_campaign = $invitor->marketing_campain_id;
                    $campain = MarketingCampain::find($invitor->marketing_campain_id);
                    if($campain->kyc_required == 2) $redirect = 'agreement';
                    else if($campain->kyc_required == 1) $redirect = 'kyc';
                }
            }

            $result = User::where("email", $request->email)->get()->count();
            if($result == 0){
                $user_create = User::create([
                    'first_name' => $request->firstname,
                    'last_name' => $request->lastname,
                    'marketing_campain_id'  => $marketing_campaign,
                    'email'     => $request->email,
                    'password'   => Hash::make($request->password),
                    'whatsapp' => isset($request->whatsapp)?$request->whatsapp:'',
                    'boomboomchat' => isset($request->boomboomchat)?$request->boomboomchat:'',
                    'telegram' => isset($request->telegram)?$request->telegram:'',
                    'redirect' => $redirect,
                    'referral_code' => '',
                    'user_type' => $marketing_campaign>0?'client':'none',
                    'state' => 1,
                    'theme_mode' => 'dark',
                ]);
                $new_user = User::find($user_create->id);
                $referral_code = substr(md5($user_create->id), 0, 8);
                $new_user->referral_code = $referral_code;
                $new_user->save();

                if($invitor) {
                    $refer = new Referral();
                    $refer->user_id = $invitor->id;
                    $refer->reffered_id = $user_create->id;
                    $refer->save();
                }

            }else{
                return redirect('/register')->with('error', 'This email is already existed.');
            }
            if(auth()->attempt(array('email' => $request->email, 'password' => $request->password))){
                $request->session()->regenerate();

                return redirect()->intended('');
            }
        // }else{
            // return redirect()->route('register')->with('error','ReCaptcha Error');
        // }
    }

    public function page_kyc() {
        $page_title = 'Page KYC';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.auth.kyc', compact('page_title', 'page_description', 'action'));
    }
    public function page_agreement() {
        $page_title = 'Page Agreement';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $campaign = MarketingCampain::find(auth()->user()->marketing_campain_id);
        $terms = $campaign->terms;
        $logo_path = '/storage/logo_images/'.$campaign->logo_image;
        return view('zenix.auth.agreement', compact('page_title', 'page_description', 'action',  'logo_path', 'terms'));
    }

    public function agree_terms_conditions (Request $request) {
        $me = User::find(auth()->user()->id);
        $me->redirect = 'trainee_video';
        $me->save();

        return redirect('/trainee_video');
    }

    public function page_trainee_video () {
        $page_title = 'Page Trainee Video';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $campaign = MarketingCampain::find(auth()->user()->marketing_campain_id);
        $video = $campaign->trainee_video;
        $logo_path = '/storage/logo_images/'.$campaign->logo_image;

        return view('zenix.auth.trainee_video', compact('page_title', 'page_description', 'action', 'logo_path', 'video'));
    }

    public function understood_video (Request $request) {
        $me = User::find(auth()->user()->id);
        $me->redirect = (auth()->user()->user_type=='admin'?'admin/dashboard':'invite_friends');
        $me->save();

        // $request->session()->regenerate();

        return redirect('/'.(auth()->user()->user_type=='admin'?'admin/dashboard':'invite_friends'));
    }

}
