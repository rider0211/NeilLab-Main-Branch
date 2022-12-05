<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MarketingCampain;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class AdminUserlistController extends Controller
{
    //
    public function index(){
        $page_title = __('locale.adminuserlist');
        $page_description = 'Some description for the page';
        $action = 'userlist';
        $result = User::where('user_type','!=', 'admin')->get()->toArray();

        $campaigns = MarketingCampain::where('status', 1)->get();
        $theme_mode = $this->getThemeMode();

        return view('zenix.admin.userlist', compact('page_title', 'page_description', 'action', 'result', 'campaigns', 'theme_mode'));
    }
    public function getUserByID(Request $request){
        $id = $request['id'];
        $result = User::where('id', $id)->get()->toArray();
        $success = true;
        return response()->json(['success'=>$success, 'data'=>$result]);
    }

    public function assignCampaignId(Request $request) {
        $user_id = $request->user_id;
        $campaign_id = $request->campaign_id;
        if(empty($campaign_id)){
            $redirect = '';
        }else{
            $campaign = MarketingCampain::find($campaign_id);
            $kyc = $campaign->kyc_required;
            $redirect = $kyc==2?'agreement':'kyc';
        }
        $user = User::find($user_id);
        $user->marketing_campain_id = $campaign_id;
        $user->redirect = $redirect;
        if($user->user_type == 'none') $user->user_type = 'client';
        if($user->save()) return 'success';
        else return 'error';
    }

    public function filterUser($filterID = null){

        $page_title = __('locale.adminuserlist');
        $page_description = 'Some description for the page';
        $action = 'userlist';
        $result = User::where('marketing_campain_id', $filterID)->get()->toArray();

        $campaigns = MarketingCampain::where('status', 1)->get();
        $theme_mode = $this->getThemeMode();
        $filter_id = $filterID;
        return view('zenix.admin.userlist', compact('page_title', 'page_description', 'action', 'result', 'campaigns', 'theme_mode', 'filter_id'));

    }
    public function deleteUserByID($userID = null){

        $result = User::where("id", $userID)->delete();

        if($result > 0){
            return redirect('/admin/userlist')->with('success', 'User has been updated successfully ');
        }else{
            return redirect('/admin/userlist')->with('error', 'Try again. There is error in database');
        }
    }

    public function changeUserEmail(Request $request){
        $id = $request['user_id'];
        $target_email = $request['target_email'];

        $result = User::where("id", $id)->update(["email" => $target_email]);

        if($result > 0){
            return redirect('/admin/userlist')->with('success', 'Email has been updated successfully ');
        }else{
            return redirect('/admin/userlist')->with('error', 'Try again. There is error in database');
        }
    }

    public function changeUserPassword(Request $request){
        $id = $request['user_password_id'];
        $result = User::where("id", $id)->update(["password" => Hash::make(12345678)]);
        if($result > 0){
            return redirect('/admin/userlist')->with('success', 'Password has been formated to number "12345678".');
        }else{
            return redirect('/admin/userlist')->with('error', 'Try again. There is error in database');
        }
    }
    public function changeUserState($id, $state){
        $result = User::where("id", $id)->update(["state" => $state]);
        if($result > 0){
            return redirect('/admin/userlist')->with('success', 'User state has been changed successfully');
        }else{
            return redirect('/admin/userlist')->with('error', 'Try again. There is error in database');
        }
    }
}
