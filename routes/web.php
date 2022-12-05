<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ZenixadminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminExchangeListController;
use App\Http\Controllers\Admin\AdminUserlistController;
use App\Http\Controllers\Admin\AdminWalletController;
use App\Http\Controllers\Admin\AdminGlobalUserController;
use App\Http\Controllers\Admin\AdminMarketingCampainController;
use App\Http\Controllers\Admin\AdminBuyReportController;
use App\Http\Controllers\Admin\AdminSellReportController;
use App\Http\Controllers\Admin\AdminManualWithdrawController;
use App\Http\Controllers\Controller;



use App\Http\Controllers\Client\BuyController;
use App\Http\Controllers\Client\BuyReportController;
use App\Http\Controllers\Client\SellController;
use App\Http\Controllers\Client\SellReportController;



    Route::get('/',                     [HomeController::class,'index']);
    Route::get('/login',                [ZenixadminController::class,'page_login']);
    Route::get('/logout',               [LoginController::class, 'logout']);
    Route::post('/login_user',          [LoginController::class, 'login']);
    Route::get('/register',             [ZenixadminController::class,'page_register']);
    Route::post('/register_new_user',   [RegisterController::class, 'customRegisterUser']);

    Route::get('/forgot_password',      [ZenixadminController::class, 'page_forgot_password']);

    Route::post('/reset_password',      [LoginController::class, 'resetPassword']);

    Route::post('/forget-password',      [LoginController::class, 'submitForgetPasswordForm']);

    Route::get('/reset-password/{token}',[LoginController::class, 'showResetPasswordForm']);
    Route::post('/reset-password',       [LoginController::class, 'submitResetPasswordForm']);

    //Referral
    Route::get('/home/{refferal_code}',                     [HomeController::class,'referral_index']);
    Route::get('/register/{refferal_code}',                     [ZenixadminController::class,'page_register']);

    Route::group(['middleware' => ['auth']], function(){
        Route::get('/kyc',                  [RegisterController::class, 'page_kyc']);
        Route::get('/agreement',            [RegisterController::class, 'page_agreement']);
        Route::post('/agreement',            [RegisterController::class, 'agree_terms_conditions']);
        Route::get('/trainee_video',            [RegisterController::class, 'page_trainee_video']);
        Route::post('/trainee_video',            [RegisterController::class, 'understood_video']);
    });

    // Admin Routing
    Route::group(['middleware' => ['isAdmin']], function(){

        Route::get('/admin/exchangelist',               [AdminExchangeListController::class, "index"]);
        Route::get('/admin/new_exchange_list/{id?}',    [AdminExchangeListcontroller::class, "editExchange"]);
        Route::get('/admin/delete_exchange_list/{id?}', [AdminExchangeListcontroller::class, "deleteExchange"]);
        Route::post('/admin/updatestate',               [AdminExchangeListController::class, 'updateState']);

        Route::post('/admin/getAllExchanges',           [AdminExchangeListController::class, 'getAllExchanges']);

        Route::post('/update_exchange_list',    [AdminExchangeListController::class, 'updateExchangeList']);
        Route::get('/admin/dashboard',          [AdminDashboardController::class,'index']);

        // Admin User list routing
        Route::get('/admin/userlist',                       [AdminUserlistController::class,'index']);
        Route::get('/admin/filterUserList/{filterID}',      [AdminUserlistController::class,'filterUser']);

        Route::post('/admin/getUserByID',                   [AdminUserlistController::class,'getUserByID']);
        Route::post('/admin/assignCampaignId',              [AdminUserlistController::class,'assignCampaignId']);
        Route::post('/admin/changeUserEmail',               [AdminUserlistController::class,'changeUserEmail']);
        Route::post('/admin/changeUserPassword',            [AdminUserlistController::class,'changeUserPassword']);
        Route::get('/admin/change_userstate/{id}/{state}',  [AdminUserlistController::class,'changeUserState']);
        Route::post('/admin/filterUser',                    [AdminUserlistController::class,'filterUser']);


        Route::get('/admin/kyc_edit/{id}',                  [Controller::class,'coming_soon']);
        Route::get('/admin/view_upline/{id}',               [Controller::class,'coming_soon']);
        Route::get('/admin/view_downline/{id}',             [Controller::class,'coming_soon']);
        Route::get('/admin/user_product/{id}',              [Controller::class,'coming_soon']);
        Route::get('/admin/mlm_tree/{id}',                  [Controller::class,'coming_soon']);

        Route::get('/admin/user_del/{id}',                  [AdminUserlistController::class,'deleteUserByID']);

        // Route::get('/admin/walletlist',     [Controller::class,'coming_soon']);
        Route::get('/admin/walletlist',     [AdminWalletController::class,'index']);

        Route::get('/admin/newWalletlist/{id?}',  [AdminWalletController::class,'viewNewWalletlist']);
        Route::post('/admin/getNewWalletAddress',  [AdminWalletController::class,'generateNewWalletAddress']);
        Route::post('/admin/update_wallet_list',  [AdminWalletController::class,'updateWalletList']);
        Route::post('/admin/editColdStorage',  [AdminWalletController::class,'editColdStorage']);
        Route::post('/admin/getWalletInfoByID',  [AdminWalletController::class,'getWalletInfoByID']);
        Route::post('/admin/withdrawToColdStorage',  [AdminWalletController::class,'withdrawToColdStorage']);
        Route::post('/admin/changeInternalWalletType',  [AdminWalletController::class,'changeInternalWalletType']);
        Route::get('/admin/deleteInternalWallet/{id?}', [AdminWalletController::class, "deleteInternalWallet"]);





        Route::get('/admin/globaluserlist', [Controller::class,'coming_soon']);
        Route::get('/admin/editGlobalUser/{id?}', [AdminGlobalUserController::class,'editGlobalUser']);
        Route::post('/admin/updateGlobalUserList', [AdminGlobalUserController::class,'updateGlobalUserList']);
        Route::post('/admin/changeBuyWeightByID', [AdminGlobalUserController::class,'changeBuyWeightByID']);
        Route::post('/admin/changeSellWeightByID', [AdminGlobalUserController::class,'changeSellWeightByID']);
        Route::post('/admin/changeStatusByID', [AdminGlobalUserController::class,'changeStatusByID']);

        Route::get('/admin/marketingcampain', [AdminMarketingCampainController::class,'index']);
        Route::get('/admin/editMarketingCampain/{id?}', [AdminMarketingCampainController::class,'editMarketingCampain']);
        Route::post('/admin/changeMarketingCampainStatusByID', [AdminMarketingCampainController::class,'changeMarketingCampainStatusByID']);
        Route::get('/admin/previewMarketingCampain/{id}', [AdminMarketingCampainController::class,'previewMarketingCampain']);
        Route::post('/admin/updateMarketing', [AdminMarketingCampainController::class,'updateMarketing']);
        Route::get('/admin/deleteMarketingCampaign/{id?}', [AdminMarketingCampainController::class,'deleteMarketingCampain']);



        Route::get('/admin/internalTradeBuy', [AdminInternalTradeBuyController::class,'index']);
        Route::get('/admin/internalTradeSell', [AdminInternalTradeSellController::class,'index']);

        Route::get('/admin/buy_report', [AdminBuyReportController::class,'index']);
        Route::get('/admin/sell_report', [AdminSellReportController::class,'index']);

        Route::get('/admin/masterload_report_buy/{id?}',  [AdminBuyReportController::class,'masterload_report']);
        Route::get('/admin/subload_report_buy/{id?}',   [AdminBuyReportController::class,'superload_report']);
        Route::get('/admin/superload_report_buy/{id?}',     [AdminBuyReportController::class,'subload_report']);

        Route::get('/admin/masterload_report_sell/{id?}', [AdminSellReportController::class,'masterload_report']);
        Route::get('/admin/subload_report_sell/{id?}',  [AdminSellReportController::class,'superload_report']);
        Route::get('/admin/superload_report_sell/{id?}',    [AdminSellReportController::class,'subload_report']);

        Route::get('/admin/manual_withdraw',    [AdminManualWithdrawController::class,'index']);
        Route::post('/admin/registerWithdraw',    [AdminManualWithdrawController::class,'registerWithdraw']);
        Route::get('/admin/commisions',     [Controller::class,'coming_soon']);

    });

    // Client Routing
    Route::group(['middleware' => ['isClient', 'hasMarketingCampain']], function(){


        Route::get('/buy_wizard',           [BuyController::class, 'index']);
        Route::post('/buy_crypto',          [BuyController::class, 'buyCrypto']);
        Route::post('/master_load',         [BuyController::class, 'masterload']);
        Route::post('/super_load',          [BuyController::class, 'superload_v']);

        Route::get('/sell_wizard',          [SellController::class, 'index']);
        Route::post('/sell_crypto',         [SellController::class, 'sellCrypto']);
        Route::post('/sell_master_load',    [SellController::class, 'masterload']);
        Route::post('/sell_super_load',     [SellController::class, 'superload_v']);

        Route::get('/get_new_btc_wallet_addr',  [SellController::class, 'get_new_btc_wallet_address']);
        Route::get('/get_receiving_btc_address',  [SellController::class, 'get_receiving_btc_address']);
        Route::post('/confirm_btc_payment',  [SellController::class, 'confirm_btc_payment']);

        Route::get('/buy_report',           [BuyReportController::class, 'index']);
        Route::post('/get_buy_report_infos',[BuyReportController::class, 'get_buy_info']);

        Route::get('/sell_report',          [SellReportController::class, 'index']);

        Route::get('/masterload_report_buy/{id?}',  [BuyReportController::class,'masterload_report']);
        Route::get('/subload_report_buy/{id?}',   [BuyReportController::class,'superload_report']);
        Route::get('/superload_report_buy/{id?}',     [BuyReportController::class,'subload_report']);

        Route::get('/masterload_report_sell/{id?}', [SellReportController::class,'masterload_report']);
        Route::get('/subload_report_sell/{id?}',  [SellReportController::class,'superload_report']);
        Route::get('/superload_report_sell/{id?}',    [SellReportController::class,'subload_report']);

        Route::get('/invite_friends', [HomeController::class, 'invite_friends']);
        Route::post('/get_profit', [HomeController::class, 'get_profit']);

        Route::get('/profile', [Controller::class, 'coming_soon']);
    });

    Route::get('/required_marketing_campain', [Controller::class, 'requiredMarketingCampain']);
    Route::get('/getMarketprice',  [Controller::class, 'getMarketprice']);
    Route::get('/get_balance',  [SellController::class, 'get_balance']);
    Route::post('/updateThemeMode',  [Controller::class, 'updateThemeMode']);





