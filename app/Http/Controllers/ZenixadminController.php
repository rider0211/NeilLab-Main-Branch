<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MarketingCampain;
use App\Models\User;

class ZenixadminController extends Controller
{
    // Dashboard
    public function dashboard_1()
    {

        $page_title = 'Dashboard Light';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;

        return view('zenix.dashboard.index', compact('page_title', 'page_description', 'action'));

    }
    
    // Dashboard 2
    public function dashboard_2()
    {

        $page_title = 'Dashboard 2';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.dashboard.index_2', compact('page_title', 'page_description', 'action'));

    }
    
    // coin_details
    public function coin_details()
    {
      
     
        $page_title = 'Coin Details';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.dashboard.coin_details', compact('page_title', 'page_description', 'action'));
    }
    
    // portofolio
    public function portofolio()
    {

        $page_title = 'Portofolio';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.dashboard.portofolio', compact('page_title', 'page_description', 'action'));

    }

    // market_capital
    public function market_capital()
    {

        $page_title = 'Market Capital';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.dashboard.market_capital', compact('page_title', 'page_description', 'action'));

    }

    // tranasactions
    public function tranasactions()
    {

        $page_title = 'Tranasactions';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.dashboard.tranasactions', compact('page_title', 'page_description', 'action'));

    }

    // my_wallets
    public function my_wallets()
    {

        $page_title = 'My Wallets';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.dashboard.my_wallets', compact('page_title', 'page_description', 'action'));

    }

    // profile
    public function app_profile()
    {
        
        $page_title = 'Profile';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.app.profile', compact('page_title', 'page_description', 'action'));
        
    }

    // Post Details
    public function post_details()
    {
        
        $page_title = 'Post Details';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.app.post_details', compact('page_title', 'page_description', 'action'));
        
    }

    // Chat
    public function page_chat()
    {
        
        $page_title = 'Chat';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.message.chat', compact('page_title', 'page_description', 'action'));
        
    }

    // project_list
    public function project_list()
    {
        
        $page_title = 'Project List';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.project.project_list', compact('page_title', 'page_description', 'action'));
        
    }


    // Project Card
    public function project_card()
    {
        
        $page_title = 'Project Card';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.project.project_card', compact('page_title', 'page_description', 'action'));
        
    }

    // contact List
    public function contact_list()
    {
        
        $page_title = 'Contact List';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.contact.contact_list', compact('page_title', 'page_description', 'action'));
        
    }  

    // contact card
    public function contact_card()
    {
        
        $page_title = 'Contact Card';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.contact.contact_card', compact('page_title', 'page_description', 'action'));
        
    }

    // Email Compose
    public function email_compose()
    {
        $page_title = 'Compose';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.message.compose', compact('page_title', 'page_description', 'action'));
    }
    
    // Email Inbox
    public function email_inbox()
    {
        $page_title = 'Inbox';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.message.inbox', compact('page_title', 'page_description', 'action'));
    }
    
    // Email Read
    public function email_read()
    {
        $page_title = 'Read';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.message.read', compact('page_title', 'page_description', 'action'));
    }

    // Calender
    public function app_calender()
    {
        $page_title = 'Calender';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.app.calender', compact('page_title', 'page_description', 'action'));
    }

    // Ecommerce Checkout
    public function ecom_checkout()
    {
        $page_title = 'Checkout';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ecommerce.checkout', compact('page_title', 'page_description', 'action'));
    }

    // Ecommerce Customers
    public function ecom_customers()
    {
        $page_title = 'Ecom Customers';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ecommerce.customers', compact('page_title', 'page_description', 'action'));
    }
    
    // Ecommerce Invoice
    public function ecom_invoice()
    {
        $page_title = 'Invoice';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ecommerce.invoice', compact('page_title', 'page_description', 'action'));
    }
    
    // Ecommerce Product Detail
    public function ecom_product_detail()
    {
        $page_title = 'Product Detail';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ecommerce.product_detail', compact('page_title', 'page_description', 'action'));
    }
    
    // Ecommerce Product Grid
    public function ecom_product_grid()
    {
        $page_title = 'Product Grid';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ecommerce.product_grid', compact('page_title', 'page_description', 'action'));
    }
    
    // Ecommerce Product List
    public function ecom_product_list()
    {
        $page_title = 'Product List';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ecommerce.product_list', compact('page_title', 'page_description', 'action'));
    }
    
    // Ecommerce Product Order
    public function ecom_product_order()
    {
        $page_title = 'Product Order';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ecommerce.product_order', compact('page_title', 'page_description', 'action'));
    }

    // Chart Chartist
    public function chart_chartist()
    {
        $page_title = 'Chart Chartist';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.chart.chartist', compact('page_title', 'page_description', 'action'));
    }
    
    // Chart Chartjs
    public function chart_chartjs()
    {
        $page_title = 'Chart Chartjs';
        $page_description = 'Some description for the page';
        
        $action = __FUNCTION__;
        return view('zenix.chart.chartjs', compact('page_title', 'page_description', 'action'));
    }
    
    // Chart Flot
    public function chart_flot()
    {
        $page_title = 'Chart Flot';
        $page_description = 'Some description for the page';
        
        $action = __FUNCTION__;
        return view('zenix.chart.flot', compact('page_title', 'page_description', 'action'));
    }
    
    // Chart Morris
    public function chart_morris()
    {
        $page_title = 'Chart Morris';
        $page_description = 'Some description for the page';
        
        $action = __FUNCTION__;
        return view('zenix.chart.morris', compact('page_title', 'page_description', 'action'));
    }
    
    // Chart Peity
    public function chart_peity()
    {
        $page_title = 'Chart Peity';
        $page_description = 'Some description for the page';
        
        $action = __FUNCTION__;
        return view('zenix.chart.peity', compact('page_title', 'page_description', 'action'));
    }
    
    // Chart Sparkline
    public function chart_sparkline()
    {
        $page_title = 'Chart Sparkline';
        $page_description = 'Some description for the page';
        
        $action = __FUNCTION__;
        return view('zenix.chart.sparkline', compact('page_title', 'page_description', 'action'));
    }
    
    // Ui Accordion
    public function ui_accordion()
    {
        $page_title = 'Accordion';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ui.accordion', compact('page_title', 'page_description', 'action'));
    }
    
    // Ui Alert
    public function ui_alert()
    {
        $page_title = 'Alert';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ui.alert', compact('page_title', 'page_description', 'action'));
    }
    
    // Ui Badge
    public function ui_badge()
    {
        $page_title = 'Badge';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ui.badge', compact('page_title', 'page_description', 'action'));
    }
    
    // Ui Button
    public function ui_button()
    {
        $page_title = 'Button';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ui.button', compact('page_title', 'page_description', 'action'));
    }
    
    // Ui Button Group
    public function ui_button_group()
    {
        $page_title = 'Button Group';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ui.button_group', compact('page_title', 'page_description', 'action'));
    }
    
    // Ui Card
    public function ui_card()
    {
        $page_title = 'Card';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ui.card', compact('page_title', 'page_description', 'action'));
    }
    
    // Ui Carousel
    public function ui_carousel()
    {
        $page_title = 'Carousel';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ui.carousel', compact('page_title', 'page_description', 'action'));
    }
    
    // Ui Dropdown
    public function ui_dropdown()
    {
        $page_title = 'Dropdown';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ui.dropdown', compact('page_title', 'page_description', 'action'));
    }
    
    // Ui Grid
    public function ui_grid()
    {
        $page_title = 'Grid';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ui.grid', compact('page_title', 'page_description', 'action'));
    }
    
    // Ui List Group
    public function ui_list_group()
    {
        $page_title = 'List Group';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ui.list_group', compact('page_title', 'page_description', 'action'));
    }
    
    // Ui Media Object
    public function ui_media_object()
    {
        $page_title = 'Media Object';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ui.media_object', compact('page_title', 'page_description', 'action'));
    }
    
    // Ui Modal
    public function ui_modal()
    {
        $page_title = 'Modal';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ui.modal', compact('page_title', 'page_description', 'action'));
    }
    
    // Ui Pagination
    public function ui_pagination()
    {
        $page_title = 'Pagination';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ui.pagination', compact('page_title', 'page_description', 'action'));
    }
    
    // Ui Popover
    public function ui_popover()
    {
        $page_title = 'Popover';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ui.popover', compact('page_title', 'page_description', 'action'));
    }
    
    // Ui Progressbar
    public function ui_progressbar()
    {
        $page_title = 'Progressbar';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ui.progressbar', compact('page_title', 'page_description', 'action'));
    }
    
    // Ui Tab
    public function ui_tab()
    {
        $page_title = 'Tab';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ui.tab', compact('page_title', 'page_description', 'action'));
    }
    

    // Ui Typography
    public function ui_typography()
    {
        $page_title = 'Typography';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.ui.typography', compact('page_title', 'page_description', 'action'));
    }
    
    // UC Nestable.
    public function uc_nestable()
    {
        $page_title = 'Nestable';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.uc.nestable', compact('page_title', 'page_description', 'action'));
    }
    // UC Lightgallery.
    public function uc_lightgallery()
    {
        $page_title = 'Lightgallery';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.uc.lightgallery', compact('page_title', 'page_description', 'action'));
    }
    
    // UC NoUi Slider
    public function uc_noui_slider()
    {
        $page_title = 'Noui Slider';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.uc.noui_slider', compact('page_title', 'page_description', 'action'));
    }
    
    // UC Select2
    public function uc_select2()
    {
        $page_title = 'Select2';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.uc.select2', compact('page_title', 'page_description', 'action'));
    }
    
    // UC Sweetalert
    public function uc_sweetalert()
    {
        $page_title = 'Sweetalert';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.uc.sweetalert', compact('page_title', 'page_description', 'action'));
    }
    
    // UC Toastr
    public function uc_toastr()
    {
        $page_title = 'Toastr';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.uc.toastr', compact('page_title', 'page_description', 'action'));
    }

    // Map Jqvmap
    public function map_jqvmap()
    {
        $page_title = 'Map Jqvmap';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.map.jqvmap', compact('page_title', 'page_description', 'action'));
    }

    // Widget Basic
    public function widget_basic()
    {
        $page_title = 'Widget';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.widget.widget_basic', compact('page_title', 'page_description', 'action'));
    }

    // Form Editor Summernote
    public function form_editor_summernote()
    {
        $page_title = 'Summernote Editor';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.form.editor_summernote', compact('page_title', 'page_description', 'action'));
    }
    
    // Form Element
    public function form_element()
    {
        $page_title = 'Form Element';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.form.element', compact('page_title', 'page_description', 'action'));
    }
    
    // Form Pickers
    public function form_pickers()
    {
        $page_title = 'Form Pickers';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.form.pickers', compact('page_title', 'page_description', 'action'));
    }
    
    // Form Validation Jquery
    public function form_validation_jquery()
    {
        $page_title = 'Form Validation';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.form.validation_jquery', compact('page_title', 'page_description', 'action'));
    }
    
    // Form Wizard
    public function form_wizard()
    {
        $page_title = 'Form Wizard';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.form.wizard', compact('page_title', 'page_description', 'action'));
    }

    // Table Bootstrap Basic
    public function table_bootstrap_basic()
    {
        $page_title = 'Table Basic';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.table.bootstrap_basic', compact('page_title', 'page_description', 'action'));
    }
    
    // Table Datatable Basic
    public function table_datatable_basic()
    {
        $page_title = 'Table Datatable';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.table.datatable_basic', compact('page_title', 'page_description', 'action'));
    }

    // Page Error 400
    public function page_error_400()
    {
        $page_title = 'Page Error 400';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.page.error_400', compact('page_title', 'page_description', 'action'));
    }
    
    // Page Error 403
    public function page_error_403()
    {
        $page_title = 'Page Error 403';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.page.error_403', compact('page_title', 'page_description', 'action'));
    }
    
    // Page Error 404
    public function page_error_404()
    {
        $page_title = 'Page Error 404';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.page.error_404', compact('page_title', 'page_description', 'action'));
    }
    
    // Page Error 500
    public function page_error_500()
    {
        $page_title = 'Page Error 500';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.page.error_500', compact('page_title', 'page_description', 'action'));
    }
    
    // Page Error 503
    public function page_error_503()
    {
        $page_title = 'Page Error 503';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.page.error_503', compact('page_title', 'page_description', 'action'));
    }
    
    // Page Forgot Password
    public function page_forgot_password()
    {
        $page_title = 'Page Forgot Password';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.auth.forgot_password', compact('page_title', 'page_description', 'action'));
    }
    
    // Page Lock Screen
    public function page_lock_screen()
    {
        $page_title = 'Page Lock Screen';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.page.lock_screen', compact('page_title', 'page_description', 'action'));
    }
    
    // Page Login
    public function page_login()
    {
        $page_title = 'Page Login';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('zenix.auth.login', compact('page_title', 'page_description', 'action'));
    }
    
    // Page Register
    public function page_register($referral_code = null)
    {
        $page_title = 'Page Register';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        $logo_path = '/front/images/logo-s2-white.png';
        if($referral_code) {
            $referer = User::where('referral_code', $referral_code)->first();
            if($referer) {
                $campaign = MarketingCampain::find($referer->marketing_campain_id);
                $logo_path = '/storage/logo_images/'.$campaign->logo_image;
            }
        }
        return view('zenix.auth.register', compact('page_title', 'page_description', 'action', 'logo_path', 'referral_code'));
    }
    

















    
}
