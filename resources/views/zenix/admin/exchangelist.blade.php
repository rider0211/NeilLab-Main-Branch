{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
	<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
		<h2 class="font-w600 title mb-2 me-auto ">{{__('locale.adminexchangelist')}}</h2>

		<a href="{!! url('/admin/new_exchange_list'); !!}" class="btn btn-secondary mb-2"><i class="las la-plus scale5 me-3"></i>{{__('locale.admin_create_new_exchange_list')}}</a>
	</div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('locale.adminexchangelist')}}</h4>
                    @if(session()->has('error'))
					<div class="alert alert-danger"><div class="alert-body">{{ session()->get('error') }}</div></div>
					@endif

					@if(session()->has('success'))
					<div class="alert alert-success"><div class="alert-body">{{ session()->get('success') }}</div></div>
					@endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="exchange_list_table" class="datatable-for-select table table-striped" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>{{__('locale.exchange_list_id')}}</th>
                                    <th>{{__('locale.exchange_list_name')}}</th>
                                    <th>{{__('locale.exchange_list_email')}}</th>
                                    <th>{{__('locale.exchange_list_wallet_address')}}</th>
                                    <th>{{__('locale.exchange_list_test_status')}}</th>
                                    <th>{{__('locale.exchange_list_certified')}}</th>
                                    <th>{{__('locale.exchange_list_state')}}</th>
                                    <th>{{__('locale.exchange_list_action')}}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- Scripts --}}
@section('scripts')
	<script>
		jQuery(document).ready(function(){
			dezSettingsOptions.version = '<?php echo $theme_mode?>';
			setTimeout(function() {
				dezSettingsOptions.version = '<?php echo $theme_mode?>';
				new dezSettings(dezSettingsOptions);
			}, 1500)
		});
		function updateExchangeState(e){
			var exchange_id = $(e).data('id');
			var state = $("#exchange_state_"+exchange_id).val();
            console.log(state);
			$.ajax({
				type: "post",
				url : '{!! url('/admin/updatestate'); !!}',
				data: {
					"_token": "{{ csrf_token() }}",
					"id": exchange_id,
					"state": state,
				},
				success: function(data){
					if(data.success){
                        alertSuccess();
                    }else{
						alertError("Database Error!");
					}
				},
			});
		}

		function alertSuccess(){
			toastr.info("Updated Successfully", "Success", {
                    positionClass: "toast-top-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
		}

		function alertError(msg){
			toastr.error(msg, "Error", {
                    positionClass: "toast-top-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
		}
	</script>
@endsection
