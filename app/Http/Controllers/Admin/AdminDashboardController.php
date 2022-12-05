<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ccxt;
use App\Models\ExchangeInfo;
use kornrunner\Ethereum\Address;

class AdminDashboardController extends Controller
{
    public function index(){
        if(auth()->user()->user_type == "admin"){
            $page_title = __('locale.admindashboard');
        }else{
            $page_title = __('locale.clientdashboard');
        }
        $page_description = 'Some description for the page';
        $action = 'dashboard_2';

        $theme_mode = $this->getThemeMode();
        return view('zenix.admin.dashboard', compact('page_title', 'page_description', 'action', 'theme_mode'));
    }
}
