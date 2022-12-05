{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
	<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
		<h2 class="font-w600 title mb-2 me-auto ">{{__('locale.adminwalletlist')}}</h2>
		<a href="{!! url('/admin/newWalletlist'); !!}" class="btn btn-secondary mb-2"><i class="las la-plus scale5 me-3"></i>{{__('locale.admin_create_new_internal_wallet_list')}}</a>
	</div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('locale.adminwalletlist')}}</h4>
                    @if(session()->has('error'))
					<div class="alert alert-danger"><div class="alert-body">{{ session()->get('error') }}</div></div>
					@endif

					@if(session()->has('success'))
					<div class="alert alert-success"><div class="alert-body">{{ session()->get('success') }}</div></div>
					@endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example7" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>{{__('locale.wallet_list_id')}}</th>
                                    <th>{{__('locale.wallet_type')}}</th>
                                    <th>{{__('locale.wallet_chainstack')}}</th>
                                    <th>{{__('locale.wallet_address')}}</th>
                                    <th>{{__('locale.wallet_list_withdraw')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($internal_wallet as $key => $value)
                                <tr>
                                    <td>{{$value['id']}}</td>
                                    @if ($value['wallet_type'] == 0)
                                    <td>Undefined Wallet</td>
                                    @elseif($value['wallet_type'] == 1)
									<td>Treasury Wallet</td>
                                    @elseif($value['wallet_type'] == 2)
									<td>Trust Wallet</td>
                                    @elseif($value['wallet_type'] == 3)
									<td>Commission Wallet</td>
                                    @endif
                                    @if($value['chain_stack'] == 1)
									<td>Bitcoin</td>
                                    @elseif($value['chain_stack'] == 2)
									<td>Ethereum</td>
                                    @endif
                                    <td>{{$value['wallet_address']}}</td>
                                    <td><a href="javascript:commingSoon()">Withdraw</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="coldStorageModal" aria-hidden="true" style="display: none;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<form method="post" action="{!! url('/admin/editColdStorage'); !!}">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title">Select Cold Storage Wallet</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal">
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="user_id" name="user_id"/>
					<div class="col-xl-12">
						<div class="form-group">
                            <label class="mb-1"><strong>Cold Storage Wallets</strong></label>
                            <select id="cold_wallet_select" name="cold_storage_wallet_id">
                                @foreach($cold_wallet as $key => $value)
                                <option value="{{++$key}}">{{$value['cold_address']}}</option>
                                @endforeach
                            </select>
                        </div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="withdrawModal" aria-hidden="true" style="display: none;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Withdraw live to cold storage BTC</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="wallet_id" name="wallet_id"/>
                <div class="col-xl-12">
                    <div class="form-group">
                        <label class="mb-1"><strong>Wallet Balance</strong></label>
                        <input type="text" class="form-control" id="wallet_balance" name="wallet_balance" disabled>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="form-group">
                        <label class="mb-1"><strong>Cold Storage</strong></label>
                        <input type="text" class="form-control" id="cold_storage" name="cold_storage" disabled>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="form-group">
                        <label class="mb-1"><strong>Amount to Withdraw</strong></label>
                        <input type="number" class="form-control" id="amount" name="amount" step="any">
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="form-group">
                        <label class="mb-1"><strong>Description</strong></label>
                        <textarea class="form-control" id="description" name="description" maxlength="100"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button onclick="withhdraw()" class="btn btn-primary">Withdraw</button>
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
            new ClipboardJS('.copy_address');
		});

        function fireColdWalletChangeModal(id){
            $("#user_id").val(id);
			$('#coldStorageModal').modal('show')
		}
        function withhdraw(){
            var wallet_id = $('#wallet_id').val();
            var amount = $('#amount').val();
            var description = $('#description').val();
            $.ajax({
					type: "post",
					url : '{!! url('/admin/withdrawToColdStorage'); !!}',
					data: {
						"_token": "{{ csrf_token() }}",
						"wallet_id": wallet_id,
                        "amount" : amount,
                        "description" : description
					},
					success: function(data){
						if(data.success){
                            swal({
								title: "Success",
								text: data.message,
								timer: 2e3,
								showConfirmButton: !1
							})
						}else{
                            sweetAlert("Oops...", data.message, "error")
						}
					},
				});
        }
        function fireWithdrawModal(id){
			$.ajax({
					type: "post",
					url : '{!! url('/admin/getWalletInfoByID'); !!}',
					data: {
						"_token": "{{ csrf_token() }}",
						"id": id,
					},
					success: function(data){
						if(data.success){
                            $('#wallet_id').val(id);
							$('#wallet_balance').val(data.wallet_balance);
							$('#cold_storage').val(data.cold_storage);
						}else{
							swal({
								title: "Error",
								text: data.message,
								timer: 2e3,
								showConfirmButton: !1
							})
						}
					},
				});
				$('#withdrawModal').modal('show');
		}
        function commingSoon(){
            sweetAlert("Oops...", "This function will be coming soon!!!", "info")
        }
		function changeWalletType(e){
			var walletId = $(e).data('id');
			var walletType = e.value;

			$.ajax({
				type: "post",
				url : '{!! url('/admin/changeInternalWalletType'); !!}',
				data: {
					"_token": "{{ csrf_token() }}",
					"wallet_id": walletId,
					"wallet_type": walletType,
				},
				success: function(data){
					if(data=='success')
						alertSuccess();
					else
						alertError();
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
		function alertError(){
			toastr.error("Database error", "Error", {
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
