{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
	<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
		<h2 class="font-w600 title mb-2 me-auto ">{{__('locale.global_user_list')}}</h2>
		<a href="{!! url('/admin/editGlobalUser'); !!}" class="btn btn-secondary mb-2"><i class="las la-plus scale5 me-3"></i>{{__('locale.add_global_user_list')}}</a>
	</div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('locale.global_user_list')}}</h4>
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
                                    <th>{{__('locale.global_user_id')}}</th>
                                    <th>{{__('locale.global_user_email')}}</th>
                                    <th>{{__('locale.global_user_first_name')}}</th>
                                    <th>{{__('locale.global_user_last_name')}}</th>
                                    <th>{{__('locale.global_user_type_of_user')}}</th>
                                    <th>{{__('locale.global_user_buy_weight')}}</th>
                                    <th>{{__('locale.global_user_amount_allow_to_buy')}}</th>
                                    <th>{{__('locale.global_user_sell_weight')}}</th>
                                    <th>{{__('locale.global_user_amount_allow_to_sell')}}</th>
                                    <th>{{__('locale.global_user_cold_storage_address')}}</th>
                                    <th>{{__('locale.global_user_cold_wallet_address')}}</th>
                                    <th>{{__('locale.global_user_see_for_all_trading_pairs')}}</th>
                                    <th>{{__('locale.global_user_selected_exchanges_they_can_trade_on')}}</th>
                                    <th>{{__('locale.global_user_status')}}</th>
                                    <th>{{__('locale.global_user_history')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $key => $value)
								<tr>
									<td>{{$value['user_id']}}</td>
									<td>{{$value['user_email']}}</td>
									<td>{{$value['user_first_name']}}</td>
									<td>{{$value['user_last_name']}}</td>
									@if($value['user_type'] == 1)
									<td>Human</td>
									@else
									<td>Robot</td>
									@endif
									<td>
										<select id="buy_weight" name="buy_weight" onchange="handleChangeBuyWeight(this)">
											<?php echo $value['buy_weight'] == 1? "<option value='{$value['id']}-1' selected>1</option>":"<option value='{$value['id']}-1'>1</option>" ?>
											<?php echo $value['buy_weight'] == 2? "<option value='{$value['id']}-2' selected>2</option>":"<option value='{$value['id']}-2'>2</option>" ?>
											<?php echo $value['buy_weight'] == 3? "<option value='{$value['id']}-3' selected>3</option>":"<option value='{$value['id']}-3'>3</option>" ?>
											<?php echo $value['buy_weight'] == 4? "<option value='{$value['id']}-4' selected>4</option>":"<option value='{$value['id']}-4'>4</option>" ?>
										</select>
									</td>
									<td>{{$value['amount_allow_to_buy']}}</td>
									<td>
										<select id="sell_weight" name="buy_weight" onchange="handleChangeSellWeight(this)">
											<?php echo $value['sell_weight'] == 1? "<option value='{$value['id']}-1' selected>1</option>":"<option value='{$value['id']}-1'>1</option>" ?>
											<?php echo $value['sell_weight'] == 2? "<option value='{$value['id']}-2' selected>2</option>":"<option value='{$value['id']}-2'>2</option>" ?>
											<?php echo $value['sell_weight'] == 3? "<option value='{$value['id']}-3' selected>3</option>":"<option value='{$value['id']}-3'>3</option>" ?>
											<?php echo $value['sell_weight'] == 4? "<option value='{$value['id']}-4' selected>4</option>":"<option value='{$value['id']}-4'>4</option>" ?>
										</select>
									</td>
									<td>{{$value['amount_allow_to_sell']}}</td>
									<td>{{$value['cold_storage_address']}}</td>
									<td>{{$value['wallet_address']}}</td>
									<td>{{$value['set_for_trading_pairs_left']}}/{{$value['set_for_trading_pairs_right']}}</td>
									<td>{{$value['echange_name']}}</td>
									<td>
										<select id="global_user_state" name="global_user_state" onchange="handleChangeStatus(this)">
											<?php echo $value['status'] == 1? "<option value='{$value['id']}-1' selected>active</option>":"<option value='{$value['id']}-1'>active</option>" ?>
											<?php echo $value['status'] == 2? "<option value='{$value['id']}-2' selected>not active</option>":"<option value='{$value['id']}-2'>not active</option>" ?>
										</select>
									</td>
									<td>List</td>
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
		function handleChangeBuyWeight(val){
			var value = getID(val.value);
			var global_user_id = value[0];
			var selected_value = value[1];
			$.ajax({
					type: "post",
					
					url : '{!! url('/admin/changeBuyWeightByID'); !!}',
					data: {
						"_token": "{{ csrf_token() }}",
						"id" : global_user_id,
						"value" : selected_value
					},
					success: function(data){
						if(data.success){
							alertSuccess();
						}else{
							alertError();
						}
					},
				});
		}
		function handleChangeSellWeight(val){
			var value = getID(val.value);
			var global_user_id = value[0];
			var selected_value = value[1];
			$.ajax({
					type: "post",
					url : '{!! url('/admin/changeSellWeightByID'); !!}',
					data: {
						"_token": "{{ csrf_token() }}",
						"id" : global_user_id,
						"value" : selected_value
					},
					success: function(data){
						if(data.success){
							alertSuccess();
						}else{
							alertError();
						}
					},
				});
		}
		function handleChangeStatus(val){
			var value = getID(val.value);
			var global_user_id = value[0];
			var selected_value = value[1];
			$.ajax({
					type: "post",
					url : '{!! url('/admin/changeStatusByID'); !!}',
					data: {
						"_token": "{{ csrf_token() }}",
						"id" : global_user_id,
						"value" : selected_value
					},
					success: function(data){
						if(data.success){
							alertSuccess();
						}else{
							alertError();
						}
					},
				});
		}
		
		function getID(value){
			var myArray = value.split("-");
			return myArray;
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