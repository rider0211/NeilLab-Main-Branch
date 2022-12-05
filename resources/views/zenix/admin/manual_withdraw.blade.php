{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex">
						<h4 class="card-title">{{__('locale.manual_withdraw')}}</h4>
                </div>
                <div class="card-body">
					@if(session()->has('error'))
					<div class="alert alert-danger"><div class="alert-body">{{ session()->get('error') }}</div></div>
					@endif

					@if(session()->has('success'))
					<div class="alert alert-success"><div class="alert-body">{{ session()->get('success') }}</div></div>
					@endif
                    <div class="table-responsive">
                        <table id="example7" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>Trade Type</th>
                                    <th>Exchange Name</th>
                                    <th>Exchange Email</th>
                                    <th>Amount</th>
                                    <th>Transaction Input</th>
                                    <th>Assets</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($withdraw_info as $key => $value)
								<tr>
									<td>{{$value['username']}}</td>
									<td>{{$value['email']}}</td>
                                    @if($value['trade_type'] == 1)
									<td>Buy</td>
                                    @elseif($value['trade_type'] == 2)
									<td>Sell</td>
                                    @endif
									<td>{{$value['exchange_name']}}</td>
									<td>{{$value['exchange_email']}}</td>
									<td>{{$value['amount']}}</td>
									<td>
										<input type="text" class="form-control" name="withdraw_txid" id="withdraw_txid_{{$value['id']}}">
									</td>
                                    @if($value['trade_type'] == 1)
									<td>BTC</td>
                                    @elseif($value['trade_type'] == 2)
									<td>USDT</td>
                                    @endif
									<td id="action_{{$value['id']}}">
										<input type="button" class="btn btn-secondary mb-2" data-id="{{$value['id']}}" onclick="registerWithdraw(this);" value="Complete">
									</td>
								@endforeach
                            </tbody>
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

		function registerWithdraw(e){
			var withdraw_id = $(e).data('id');
			var tx_id = $("#withdraw_txid_"+withdraw_id).val();

			$.ajax({
				type: "post",
				url : '{!! url('/admin/registerWithdraw'); !!}',
				data: {
					"_token": "{{ csrf_token() }}",
					"withdraw_id": withdraw_id,
					"tx_id": tx_id,
				},
				success: function(data){
					if(data.success){
						$("#action_"+withdraw_id).html("Registered");
						$("#withdraw_txid_"+withdraw_id).attr("disabled", true);
					}else{
						alertError(data.msg);
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
