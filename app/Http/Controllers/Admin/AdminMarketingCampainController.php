<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GlobalUserList;
use App\Models\ExchangeInfo;
use App\Models\TradingPair;
use App\Models\ColdWallet;
use App\Models\MarketingCampain;
use App\Models\DomainList;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class AdminMarketingCampainController extends Controller
{

    public function index(){
        $page_title = __('locale.marketing_campain');
        $page_description = 'Some description for the page';
        $action = 'marketing_campain';
        $result = MarketingCampain::orderBy('id', 'asc')->get()->toArray();
        $theme_mode = $this->getThemeMode();

        return view('zenix.admin.marketing_campain', compact('page_title', 'page_description', 'action', 'result', 'theme_mode'));
    }
    public function editMarketingCampain($id = null){
        $page_title = __('locale.add_new_marketing_campain');
        $page_description = 'Some description for the page';
        $action = 'marketing_campain';
        $data = MarketingCampain::find($id);
        $theme_mode = $this->getThemeMode();

        return view('zenix.admin.editMarketingCampain', compact('page_title', 'page_description', 'action', 'id', 'data', 'theme_mode'));
    }

    public function deleteMarketingCampain($id = null){

        $result = MarketingCampain::where("id", $id)->delete();
        if($result > 0){
            $userList = User::where('marketing_campain_id', $id)->get()->toArray();
            if(count($userList) > 0){
                foreach ($userList as $key => $value) {
                    # code...
                    User::where('id', $value['id'])->update(['marketing_campain_id' => 0]);
                }
            }
            return redirect('/admin/marketingcampain')->with('success', 'Marketing Campaign has been updated successfully ');

        }else{
            return redirect('/admin/marketingcampain')->with('error', 'Try again. There is error in database');
        }
    }
    public function updateMarketing(Request $request){
        if(empty($request->old_id)){
            $validated = $request->validate([
                'campain_name'=> 'required|string|max:255',
                'kyc_required'=> 'required',
                'internal_sales_fee'=> 'required|numeric|min:0',
                'uni_level_fee'=> 'required|numeric|min:0',
                'external_sales_fee'=> 'required|numeric|min:0',
                'trust_fee'=> 'required|numeric|min:0',
                'profit_fee'=> 'required|numeric|min:0',
                'terms'=> 'required|string',
                'website_name'=> 'required|string|max:255',
                'banner_title'=> 'required|string|max:1024',
                'banner_content'=> 'required|string',
                'trainee_video' => 'required|file|max:8192|mimes:mp4',
                'logo_image' => 'required|image',
            ]);
            // $validator = Validator::make($request->all(), [
            //     'file' => 'max:10240',
            // ]);
            $video = "";
            $logo_images = "";
            if($request->file()) {
                $video = time().'_'.$request->trainee_video->getClientOriginalName();
                $video_path = $request->file('trainee_video')->storeAs('trainee_videos', $video, 'public');
                $logo_images = time().'_'.$request->logo_image->getClientOriginalName();
                $logo_path = $request->file('logo_image')->storeAs('logo_images', $logo_images, 'public');
            }
            $marketing_array = array();
            $marketing_array['campain_name'] = $validated['campain_name'];
            $marketing_array['kyc_required'] = $validated['kyc_required'];
            $marketing_array['total_fee'] = $validated['internal_sales_fee'] + $validated['uni_level_fee'] + $validated['external_sales_fee'] + $validated['trust_fee'] + $validated['profit_fee'];
            $marketing_array['internal_sales_fee'] = $validated['internal_sales_fee'];
            $marketing_array['uni_level_fee'] = $validated['uni_level_fee'];
            $marketing_array['external_sales_fee'] = $validated['external_sales_fee'];
            $marketing_array['trust_fee'] = $validated['trust_fee'];
            $marketing_array['profit_fee'] = $validated['profit_fee'];
            $marketing_array['terms'] = $validated['terms'];
            $marketing_array['website_name'] = $validated['website_name'];
            $marketing_array['banner_title'] = $validated['banner_title'];
            $marketing_array['banner_content'] = $validated['banner_content'];
            $marketing_array['trainee_video'] = $video;
            $marketing_array['logo_image'] = $logo_images;
            $marketing_array['status'] = 1;

            $result = MarketingCampain::create($marketing_array);
            if(isset($result) && $result->id > 0){
                return redirect('/admin/marketingcampain')->with('success', 'Successfully saved!');
            }else{
                return redirect('/admin/marketingcampain')->with('error', __('error.error_on_database'));
            }
        }else{
            $validated = $request->validate([
                'campain_name'=> 'required|string|max:255',
                'kyc_required'=> 'required',
                'internal_sales_fee'=> 'required|numeric|min:0|max:100',
                'uni_level_fee'=> 'required|numeric|min:0|max:100',
                'external_sales_fee'=> 'required|numeric|min:0|max:100',
                'trust_fee'=> 'required|numeric|min:0|max:100',
                'profit_fee'=> 'required|numeric|min:0|max:100',
                'terms'=> 'required|string',
                'website_name'=> 'required|string|max:255',
                'banner_title'=> 'required|string|max:1024',
                'banner_content'=> 'required|string',
                'trainee_video' => 'file|max:8192|mimes:mp4',
                'logo_image' => 'image',
            ]);

            $validator = Validator::make($request->all(), [
                'file' => 'max:10240',
            ]);
            $campaign = MarketingCampain::find($request->old_id);
            $campaign->campain_name = $validated['campain_name'];
            $campaign->kyc_required = $validated['kyc_required'];
            $campaign->total_fee = $validated['internal_sales_fee'] + $validated['uni_level_fee'] + $validated['external_sales_fee'] + $validated['trust_fee'] + $validated['profit_fee'];
            $campaign->internal_sales_fee = $validated['internal_sales_fee'];
            $campaign->uni_level_fee = $validated['uni_level_fee'];
            $campaign->external_sales_fee = $validated['external_sales_fee'];
            $campaign->trust_fee = $validated['trust_fee'];
            $campaign->profit_fee = $validated['profit_fee'];
            $campaign->terms = $validated['terms'];
            $campaign->website_name = $validated['website_name'];
            $campaign->banner_title = $validated['banner_title'];
            $campaign->banner_content = $validated['banner_content'];
            if($request->file()) {
                $video = time().'_'.$request->trainee_video->getClientOriginalName();
                $video_path = $request->file('trainee_video')->storeAs('trainee_videos', $video, 'public');
                $logo_images = time().'_'.$request->logo_image->getClientOriginalName();
                $logo_path = $request->file('logo_image')->storeAs('logo_images', $logo_images, 'public');

                $campaign->trainee_video = $video;
                $campaign->logo_image = $logo_images;
            }

            $result = $campaign->save();
            if($result){
                return redirect('/admin/marketingcampain')->with('success', 'Successfully created');
            }else{
                return redirect('/admin/marketingcampain')->with('error', __('error.error_on_database'));
            }


        }

    }

    public function changeMarketingCampainStatusByID(Request $request){
        $id = $request['id'];
        $value = $request['value'];
        $result = MarketingCampain::where("id", $id)->update(["status" => $value]);
        $success = true;
        $error = false;

        if($result > 0){
            return response()->json(["success" => $success,]);
        }else{
            return response()->json(["success" => $error,]);
        }
    }

    public function previewMarketingCampain($id){
        $campaign = MarketingCampain::find($id);
        $kyc = $campaign->kyc_required;
        $redirect = $kyc==2?'agreement':'kyc';
        auth()->user()->update(['marketing_campain_id'=>$id, 'redirect'=>$redirect]);

        return redirect('/');
    }

}
