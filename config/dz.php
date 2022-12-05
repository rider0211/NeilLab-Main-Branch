<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'NeilLab'),


    'public' => [
        'favicon' => 'media/img/logo/favicon.ico',
        'fonts' => [
            'google' => [
                'families' => [
                    'Poppins:300,400,500,600,700',
                ]
            ]
        ],
		'global' => [
			'css' => [
				'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				'css/style.css',
				'css/custom.css',

			],
			'js' => [
				'top'=>[
					'vendor/global/global.min.js',
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
				],
				'bottom'=>[
					'js/custom.js',
					'js/deznav-init.js',
				],
			],
		],
		'pagelevel' => [
			'css' => [
				'ZenixadminController_dashboard_1' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/owl-carousel/owl.carousel.css',
					'vendor/datatables/css/jquery.dataTables.min.css',
				],
				'ZenixadminController_exchangelist' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/owl-carousel/owl.carousel.css',
					'vendor/datatables/css/jquery.dataTables.min.css',
					'vendor/select2/css/select2.min.css',

					'vendor/toastr/css/toastr.min.css',
					'vendor/select2/css/select2.min.css',
				],
				'ZenixadminController_userlist' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/owl-carousel/owl.carousel.css',
					'vendor/datatables/css/jquery.dataTables.min.css',
					'vendor/toastr/css/toastr.min.css',
					'vendor/select2/css/select2.min.css',

				],
				'ZenixadminController_walletlist' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/owl-carousel/owl.carousel.css',
					'vendor/datatables/css/jquery.dataTables.min.css',
					'vendor/select2/css/select2.min.css',
					'vendor/sweetalert2/dist/sweetalert2.min.css',
					'vendor/toastr/css/toastr.min.css',

				],
				'ZenixadminController_internal_trade' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/owl-carousel/owl.carousel.css',
					'vendor/datatables/css/jquery.dataTables.min.css',
				],
				'ZenixadminController_global_user_list' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/owl-carousel/owl.carousel.css',
					'vendor/datatables/css/jquery.dataTables.min.css',
					'vendor/toastr/css/toastr.min.css',
					'vendor/select2/css/select2.min.css',
					'vendor/sweetalert2/dist/sweetalert2.min.css',
				],
				'ZenixadminController_marketing_campain' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/owl-carousel/owl.carousel.css',
					'vendor/datatables/css/jquery.dataTables.min.css',
					'vendor/toastr/css/toastr.min.css',
					'vendor/select2/css/select2.min.css',
				],
				'ZenixadminController_manual_withdraw' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/owl-carousel/owl.carousel.css',
					'vendor/datatables/css/jquery.dataTables.min.css',
					'vendor/toastr/css/toastr.min.css',
					'vendor/select2/css/select2.min.css',
				],
				'ZenixadminController_report' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/owl-carousel/owl.carousel.css',
					'vendor/datatables/css/jquery.dataTables.min.css',
					'vendor/toastr/css/toastr.min.css',
					'vendor/select2/css/select2.min.css',
				],


				'ZenixadminController_wizard' => [
					'vendor/select2/css/select2.min.css',
					'vendor/jquery-smartwizard/dist/css/smart_wizard.min.css',

					'vendor/toastr/css/toastr.min.css',
					'vendor/sweetalert2/dist/sweetalert2.min.css',


				],
				'ZenixadminController_dashboard_2' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/owl-carousel/owl.carousel.css',
					'vendor/datatables/css/jquery.dataTables.min.css',
				],
				'ZenixadminController_coin_details' => [
							'vendor/chartist/css/chartist.min.css',
							'vendor/bootstrap-daterangepicker/daterangepicker.css',
				],
				'ZenixadminController_portofolio' => [
							'vendor/chartist/css/chartist.min.css',
				],
				'ZenixadminController_market_capital' => [
							'vendor/chartist/css/chartist.min.css',
							'vendor/datatables/css/jquery.dataTables.min.css',
				],
				'ZenixadminController_tranasactions' => [
							'vendor/datatables/css/jquery.dataTables.min.css',
				],
				'ZenixadminController_my_wallets' => [
							'vendor/chartist/css/chartist.min.css',
							'vendor/swiper/css/swiper-bundle.min.css',
							'vendor/owl-carousel/owl.carousel.css',
				],
				'ZenixadminController_app_profile' => [
							'vendor/lightgallery/css/lightgallery.min.css',
				],
				'ZenixadminController_post_details' => [
							'vendor/lightgallery/css/lightgallery.min.css',
				],
				'ZenixadminController_page_chat' => [
							'vendor/chartist/css/chartist.min.css',
							'vendor/owl-carousel/owl.carousel.css',
				],
				'ZenixadminController_project_list' => [
							'vendor/chartist/css/chartist.min.css',
				],
				'ZenixadminController_project_card' => [
				],
				'ZenixadminController_contact_list' => [
							'vendor/datatables/css/jquery.dataTables.min.css',
							'vendor/chartist/css/chartist.min.css',
				],
				'ZenixadminController_contact_card' => [
							'vendor/chartist/css/chartist.min.css',
							'vendor/owl-carousel/owl.carousel.css',
				],
				'ZenixadminController_app_calender' => [
							'vendor/fullcalendar/css/main.min.css',
				],
				'ZenixadminController_chart_chartist' => [
							'vendor/chartist/css/chartist.min.css',
				],
				'ZenixadminController_chart_chartjs' => [
				],
				'ZenixadminController_chart_flot' => [

				],
				'ZenixadminController_chart_morris' => [
				],
				'ZenixadminController_chart_peity' => [
				],
				'ZenixadminController_chart_sparkline' => [
				],
				'ZenixadminController_ecom_checkout' => [
				],
				'ZenixadminController_ecom_customers' => [
				],
				'ZenixadminController_ecom_invoice' => [
				],
				'ZenixadminController_ecom_product_detail' => [
							'vendor/star-rating/star-rating-svg.css',
							'vendor/owl-carousel/owl.carousel.css',
				],
				'ZenixadminController_ecom_product_grid' => [
				],
				'ZenixadminController_ecom_product_list' => [
							'vendor/star-rating/star-rating-svg.css',
				],
				'ZenixadminController_ecom_product_order' => [
				],
				'ZenixadminController_email_compose' => [
							'vendor/dropzone/dist/dropzone.css',
				],
				'ZenixadminController_email_inbox' => [
				],
				'ZenixadminController_email_read' => [
				],
				'ZenixadminController_form_editor_summernote' => [
							'vendor/summernote/summernote.css',
				],
				'ZenixadminController_form_element' => [
				],
				'ZenixadminController_form_pickers' => [
							'vendor/bootstrap-daterangepicker/daterangepicker.css',
							'vendor/clockpicker/css/bootstrap-clockpicker.min.css',
							'vendor/jquery-asColorPicker/css/asColorPicker.min.css',
							'vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css',
							'vendor/pickadate/themes/default.css',
							'vendor/pickadate/themes/default.date.css',
							'https://fonts.googleapis.com/icon?family=Material+Icons',
				],
				'ZenixadminController_form_validation_jquery' => [
				],
				'ZenixadminController_form_wizard' => [
							'vendor/jquery-smartwizard/dist/css/smart_wizard.min.css',
				],
				'ZenixadminController_map_jqvmap' => [
							'vendor/jqvmap/css/jqvmap.min.css',
				],
				'ZenixadminController_table_bootstrap_basic' => [
				],
				'ZenixadminController_table_datatable_basic' => [
							'vendor/datatables/css/jquery.dataTables.min.css',
				],
				'ZenixadminController_uc_lightgallery' => [
							'vendor/lightgallery/css/lightgallery.min.css',
				],
				'ZenixadminController_uc_nestable' => [
							'vendor/nestable2/css/jquery.nestable.min.css',
				],
				'ZenixadminController_uc_noui_slider' => [
							'vendor/nouislider/nouislider.min.css',
				],
				'ZenixadminController_uc_select2' => [
							'vendor/select2/css/select2.min.css',
				],
				'ZenixadminController_uc_sweetalert' => [
							'vendor/sweetalert2/dist/sweetalert2.min.css',
				],
				'ZenixadminController_uc_toastr' => [
							'vendor/toastr/css/toastr.min.css',
				],
				'ZenixadminController_ui_accordion' => [
				],
				'ZenixadminController_ui_alert' => [
				],
				'ZenixadminController_ui_badge' => [
				],
				'ZenixadminController_ui_button' => [
				],
				'ZenixadminController_ui_button_group' => [
				],
				'ZenixadminController_ui_card' => [
				],
				'ZenixadminController_ui_carousel' => [
				],
				'ZenixadminController_ui_dropdown' => [
				],
				'ZenixadminController_ui_grid' => [
				],
				'ZenixadminController_ui_list_group' => [
				],
				'ZenixadminController_ui_media_object' => [
				],
				'ZenixadminController_ui_modal' => [
				],
				'ZenixadminController_ui_pagination' => [
				],
				'ZenixadminController_ui_popover' => [
				],
				'ZenixadminController_ui_progressbar' => [
				],
				'ZenixadminController_ui_tab' => [
				],
				'ZenixadminController_ui_typography' => [
				],
				'ZenixadminController_widget_basic' => [
							'vendor/chartist/css/chartist.min.css',
				],
				'ZenixadminController_demo_modules_index' => [
				],
				'ZenixadminController_demo_modules_add' => [
				],
			],
			'js' => [
				'ZenixadminController_dashboard_1' => [
							'vendor/chart.js/Chart.bundle.min.js',
							'vendor/peity/jquery.peity.min.js',
							'vendor/apexchart/apexchart.js',
							'vendor/owl-carousel/owl.carousel.js',
							'js/dashboard/dashboard-1.js',
							'vendor/datatables/js/jquery.dataTables.min.js',
							'js/plugins-init/datatables.init.js',
							'js/plugins-init/clipboard.js',
							'js/plugins-init/clipboard.min.js',
				],
				'ZenixadminController_exchangelist' => [
							'vendor/chart.js/Chart.bundle.min.js',
							'vendor/peity/jquery.peity.min.js',
							'vendor/apexchart/apexchart.js',
							'vendor/owl-carousel/owl.carousel.js',
							'js/dashboard/dashboard-1.js',
							'vendor/datatables/js/jquery.dataTables.min.js',
							'js/plugins-init/datatables.init.js',
							'js/plugins-init/clipboard.js',
							'js/plugins-init/clipboard.min.js',

							'vendor/select2/js/select2.full.min.js',
							'js/plugins-init/select2-init.js',

                            'vendor/toastr/js/toastr.min.js',
                            'js/plugins-init/toastr-init.js',

				],
				'ZenixadminController_userlist' => [
					'vendor/peity/jquery.peity.min.js',
					'vendor/owl-carousel/owl.carousel.js',
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
					'vendor/toastr/js/toastr.min.js',
					'js/plugins-init/toastr-init.js',
					'js/plugins-init/clipboard.min.js',
					'vendor/select2/js/select2.full.min.js',
					'js/plugins-init/select2-init.js',
				],
				'ZenixadminController_walletlist' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/peity/jquery.peity.min.js',
					'vendor/apexchart/apexchart.js',
					'vendor/owl-carousel/owl.carousel.js',
					'js/dashboard/dashboard-1.js',
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
					'vendor/toastr/js/toastr.min.js',
					'js/plugins-init/toastr-init.js',

					'vendor/select2/js/select2.full.min.js',
					'js/plugins-init/select2-init.js',

					'vendor/sweetalert2/dist/sweetalert2.min.js',
					'js/plugins-init/sweetalert.init.js',
					'js/plugins-init/clipboard.js',
					'js/plugins-init/clipboard.min.js',
				],
				'ZenixadminController_internal_trade' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/peity/jquery.peity.min.js',
					'vendor/apexchart/apexchart.js',
					'vendor/owl-carousel/owl.carousel.js',
					'js/dashboard/dashboard-1.js',
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
				],
				'ZenixadminController_global_user_list' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/peity/jquery.peity.min.js',
					'vendor/apexchart/apexchart.js',
					'vendor/owl-carousel/owl.carousel.js',
					'js/dashboard/dashboard-1.js',
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
					'vendor/toastr/js/toastr.min.js',
					'js/plugins-init/toastr-init.js',

					'vendor/select2/js/select2.full.min.js',
					'js/plugins-init/select2-init.js',

					'vendor/sweetalert2/dist/sweetalert2.min.js',
					'js/plugins-init/sweetalert.init.js',
					'js/plugins-init/clipboard.js',
					'js/plugins-init/clipboard.min.js',
				],
				'ZenixadminController_marketing_campain' => [
					'vendor/peity/jquery.peity.min.js',
					'vendor/owl-carousel/owl.carousel.js',
					'js/dashboard/dashboard-1.js',
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
					'vendor/toastr/js/toastr.min.js',
					'js/plugins-init/toastr-init.js',

					'vendor/select2/js/select2.full.min.js',
					'js/plugins-init/select2-init.js',
				],
				'ZenixadminController_manual_withdraw' => [
					'vendor/peity/jquery.peity.min.js',
					'vendor/owl-carousel/owl.carousel.js',
					'js/dashboard/dashboard-1.js',
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
					'vendor/toastr/js/toastr.min.js',
					'js/plugins-init/toastr-init.js',

					'vendor/select2/js/select2.full.min.js',
					'js/plugins-init/select2-init.js',
				],

				'ZenixadminController_report' => [
					'vendor/peity/jquery.peity.min.js',
					'vendor/owl-carousel/owl.carousel.js',
					'js/dashboard/dashboard-1.js',
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
					'vendor/toastr/js/toastr.min.js',
					'js/plugins-init/toastr-init.js',

					'vendor/select2/js/select2.full.min.js',
					'js/plugins-init/select2-init.js',
				],

				'ZenixadminController_dashboard_2' => [
							'vendor/chart.js/Chart.bundle.min.js',
							'vendor/peity/jquery.peity.min.js',
							'vendor/apexchart/apexchart.js',
							'vendor/webticker/jquery.webticker.min.js',
							// 'js/dashboard/dashboard-1.js',
							'vendor/owl-carousel/owl.carousel.js',
							'vendor/datatables/js/jquery.dataTables.min.js',
							'js/plugins-init/datatables.init.js',
				],


				'ZenixadminController_wizard' => [
					'vendor/jquery-steps/build/jquery.steps.min.js',
					'vendor/jquery-validation/jquery.validate.min.js',
					'js/plugins-init/jquery.validate-init.js',
					'vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js',

					'vendor/select2/js/select2.full.min.js',
					'js/plugins-init/select2-init.js',

					'vendor/toastr/js/toastr.min.js',
					'js/plugins-init/toastr-init.js',
					'vendor/sweetalert2/dist/sweetalert2.min.js',

				],
				 'ZenixadminController_coin_details' => [
							'vendor/chart.js/Chart.bundle.min.js',
							'vendor/apexchart/apexchart.js',
							'js/dashboard/coin-details.js',
							'vendor/moment/moment.min.js',
							'vendor/bootstrap-daterangepicker/daterangepicker.js',
				],
				'ZenixadminController_my_wallets' => [
							'vendor/chart.js/Chart.bundle.min.js',
							'vendor/peity/jquery.peity.min.js',
							'vendor/apexchart/apexchart.js',
							'js/dashboard/my-wallet.js',
							'vendor/owl-carousel/owl.carousel.js',
							'vendor/swiper/js/swiper-bundle.min.js',
				],
				'ZenixadminController_tranasactions' => [
							'vendor/datatables/js/jquery.dataTables.min.js',
							'js/plugins-init/datatables.init.js',
				],
				'ZenixadminController_portofolio' => [
							'vendor/chart.js/Chart.bundle.min.js',
							'vendor/apexchart/apexchart.js',
							'js/dashboard/portofolio.js',
				],
				'ZenixadminController_market_capital' => [
							'vendor/chart.js/Chart.bundle.min.js',
							'vendor/peity/jquery.peity.min.js',
							'vendor/apexchart/apexchart.js',
							'vendor/datatables/js/jquery.dataTables.min.js',
							'js/plugins-init/datatables.init.js',
							'js/dashboard/market-capital.js',
				],
				'ZenixadminController_app_calender' => [
							'vendor/moment/moment.min.js',
							'vendor/fullcalendar/js/main.min.js',
							'js/plugins-init/fullcalendar-init.js',
				],
				'ZenixadminController_app_profile' => [
						    'vendor/lightgallery/js/lightgallery-all.min.js',
				],
				'ZenixadminController_post_details' => [
							'vendor/lightgallery/js/lightgallery-all.min.js',
				],
				'ZenixadminController_chart_chartist' => [
							'vendor/chartist/js/chartist.min.js',
							'vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js',
							'js/plugins-init/chartist-init.js',
				],
				'ZenixadminController_chart_chartjs' => [
						    'vendor/chart.js/Chart.bundle.min.js',
							'js/plugins-init/chartjs-init.js',
				],
				'ZenixadminController_chart_flot' => [
						    'vendor/chart.js/Chart.bundle.min.js',
							'vendor/flot/jquery.flot.js',
							'vendor/flot/jquery.flot.pie.js',
							'vendor/flot/jquery.flot.resize.js',
							'vendor/flot-spline/jquery.flot.spline.min.js',
							'js/plugins-init/flot-init.js',
				],
				'ZenixadminController_chart_morris' => [
						    'vendor/chart.js/Chart.bundle.min.js',
							'vendor/raphael/raphael.min.js',
							'vendor/morris/morris.min.js',
							'js/plugins-init/morris-init.js',
				],
				'ZenixadminController_chart_peity' => [
						    'vendor/chart.js/Chart.bundle.min.js',
							'vendor/peity/jquery.peity.min.js',
							'js/plugins-init/piety-init.js',

				],
				'ZenixadminController_chart_sparkline' => [
						    'vendor/chart.js/Chart.bundle.min.js',
							'vendor/jquery-sparkline/jquery.sparkline.min.js',
							'js/plugins-init/sparkline-init.js',
							'vendor/svganimation/vivus.min.js',
							'vendor/svganimation/svg.animation.js',
				],
				'ZenixadminController_ecom_checkout' => [
				],
				'ZenixadminController_ecom_customers' => [
							'vendor/highlightjs/highlight.pack.min.js',
				],
				'ZenixadminController_ecom_invoice' => [
				],
				'ZenixadminController_ecom_product_detail' => [
							'vendor/star-rating/jquery.star-rating-svg.js',
							'vendor/owl-carousel/owl.carousel.js',
                ],
				'ZenixadminController_ecom_product_grid' => [
				],
				'ZenixadminController_ecom_product_list' => [
							'vendor/star-rating/jquery.star-rating-svg.js',
				],
				'ZenixadminController_ecom_product_order' => [
				],
				'ZenixadminController_email_compose' => [
							'vendor/dropzone/dist/dropzone.js',
				],
				'ZenixadminController_email_inbox' => [
				],
				'ZenixadminController_email_read' => [
				],
				'ZenixadminController_form_editor_summernote' => [
							'vendor/ckeditor/ckeditor.js',
				],
				'ZenixadminController_form_element' => [
				],
				'ZenixadminController_form_pickers' => [
							'vendor/moment/moment.min.js',
							'vendor/bootstrap-daterangepicker/daterangepicker.js',
							'vendor/clockpicker/js/bootstrap-clockpicker.min.js',
							'vendor/jquery-asColor/jquery-asColor.min.js',
							'vendor/jquery-asGradient/jquery-asGradient.min.js',
							'vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js',
							'vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js',
							'vendor/pickadate/picker.js',
							'vendor/pickadate/picker.time.js',
							'vendor/pickadate/picker.date.js',
							'js/plugins-init/bs-daterange-picker-init.js',
							'js/plugins-init/clock-picker-init.js',
							'js/plugins-init/jquery-asColorPicker.init.js',
							'js/plugins-init/material-date-picker-init.js',
							'js/plugins-init/pickadate-init.js',
				],
				'ZenixadminController_form_validation_jquery' => [
							'vendor/jquery-validation/jquery.validate.min.js',
							'js/plugins-init/jquery.validate-init.js',
				],
				'ZenixadminController_form_wizard' => [
							'vendor/jquery-steps/build/jquery.steps.min.js',
							'vendor/jquery-validation/jquery.validate.min.js',
							'js/plugins-init/jquery.validate-init.js',
							'vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js',
				],
				'ZenixadminController_map_jqvmap' => [
							'vendor/jqvmap/js/jquery.vmap.min.js',
							'vendor/jqvmap/js/jquery.vmap.world.js',
							'vendor/jqvmap/js/jquery.vmap.usa.js',
							'js/plugins-init/jqvmap-init.js',
				],
				'ZenixadminController_page_chat' => [
						    'vendor/chart.js/Chart.bundle.min.js',
						    'vendor/peity/jquery.peity.min.js',
						    'vendor/apexchart/apexchart.js',
						    'js/dashboard/chat.js',
						    'vendor/owl-carousel/owl.carousel.js',
				],
				'ZenixadminController_page_error_400' => [
				],
				'ZenixadminController_page_error_403' => [
				],
				'ZenixadminController_page_error_404' => [
				],
				'ZenixadminController_page_error_500' => [
				],
				'ZenixadminController_page_error_503' => [
				],
				'ZenixadminController_page_forgot_password' => [
				],
				'ZenixadminController_page_lock_screen' => [
							'vendor/deznav/deznav.min.js',
				],
				'ZenixadminController_page_login' => [
				],
				'ZenixadminController_page_register' => [
				],
				'ZenixadminController_table_bootstrap_basic' => [
				],
				'ZenixadminController_table_datatable_basic' => [
							'vendor/datatables/js/jquery.dataTables.min.js',
							'js/plugins-init/datatables.init.js',
				],
				'ZenixadminController_uc_lightgallery' => [
							'vendor/lightgallery/js/lightgallery-all.min.js',
				],
				'ZenixadminController_uc_nestable' => [
							'vendor/nestable2/js/jquery.nestable.min.js',
							'js/plugins-init/nestable-init.js',
				],
				'ZenixadminController_uc_noui_slider' => [
							'vendor/nouislider/nouislider.min.js',
							'vendor/wnumb/wNumb.js',
							'js/plugins-init/nouislider-init.js',
				],
				'ZenixadminController_uc_select2' => [
							'vendor/select2/js/select2.full.min.js',
							'js/plugins-init/select2-init.js',
				],
				'ZenixadminController_uc_sweetalert' => [
							'vendor/sweetalert2/dist/sweetalert2.min.js',
							'js/plugins-init/sweetalert.init.js',
				],
				'ZenixadminController_uc_toastr' => [
							'vendor/toastr/js/toastr.min.js',
							'js/plugins-init/toastr-init.js',
				],
				'ZenixadminController_ui_accordion' => [
				],
				'ZenixadminController_ui_alert' => [
				],
				'ZenixadminController_ui_badge' => [
				],
				'ZenixadminController_ui_button' => [
				],
				'ZenixadminController_ui_button_group' => [
				],
				'ZenixadminController_ui_card' => [
				],
				'ZenixadminController_ui_carousel' => [
				],
				'ZenixadminController_ui_dropdown' => [
				],
				'ZenixadminController_ui_grid' => [
				],
				'ZenixadminController_ui_list_group' => [
				],
				'ZenixadminController_ui_media_object' => [
				],
				'ZenixadminController_ui_modal' => [
				],
				'ZenixadminController_ui_pagination' => [
				],
				'ZenixadminController_ui_popover' => [
				],
				'ZenixadminController_ui_progressbar' => [
				],
				'ZenixadminController_ui_tab' => [
				],
				'ZenixadminController_ui_typography' => [
				],
				'ZenixadminController_widget_basic' => [
							'vendor/chart.js/Chart.bundle.min.js',
							'vendor/apexchart/apexchart.js',
							'vendor/chartist/js/chartist.min.js',
							'vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js',
							'vendor/flot/jquery.flot.js',
							'vendor/flot/jquery.flot.pie.js',
							'vendor/flot/jquery.flot.resize.js',
							'vendor/flot-spline/jquery.flot.spline.min.js',
							'vendor/jquery-sparkline/jquery.sparkline.min.js',
							'js/plugins-init/sparkline-init.js',
							'vendor/peity/jquery.peity.min.js',
							'js/plugins-init/piety-init.js',
							'js/plugins-init/widgets-script-init.js',
				],
				'ZenixadminController_contact_card' => [
							'vendor/chart.js/Chart.bundle.min.js',
							'vendor/peity/jquery.peity.min.js',
							'vendor/apexchart/apexchart.js',
							'js/dashboard/contact.js',
							'vendor/owl-carousel/owl.carousel.js',

				],
				'ZenixadminController_contact_list' => [
							'vendor/chart.js/Chart.bundle.min.js',
							'vendor/datatables/js/jquery.dataTables.min.js',
							'js/plugins-init/datatables.init.js',
				],
				'ZenixadminController_project_list' => [
							'vendor/chart.js/Chart.bundle.min.js',
				],
				'ZenixadminController_project_card' => [
							'vendor/chart.js/Chart.bundle.min.js',
				],
				'ZenixadminController_demo_modules_add' => [
				],

			]
		],
	]
];
