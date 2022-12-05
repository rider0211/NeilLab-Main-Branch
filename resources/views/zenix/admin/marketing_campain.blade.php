{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex">
						<h4 class="card-title">{{__('locale.marketing_campain')}}</h4>
						<a href="{!! url('/admin/editMarketingCampain'); !!}" class="btn btn-secondary mb-2"><i class="las la-plus scale5 me-3"></i>{{__('locale.add_new_marketing_campain')}}</a>
                	</div>
                <div class="card-body">
					@if(session()->has('error'))
					<div class="alert alert-danger"><div class="alert-body">{{ session()->get('error') }}</div></div>
					@endif
	
					@if(session()->has('success'))
					<div class="alert alert-success"><div class="alert-body">{{ session()->get('success') }}</div></div>
					@endif
                    <div class="table-responsive">
                        <table id="example7" class="display" style="min-width: 2000px">
                            <thead>
                                <tr>
                                    <th>Campaign ID</th>
                                    <th>Campaign Name</th>
                                    <th>Total Fee To Client</th>
                                    <th>Internal Sales Fee</th>
                                    <th>Uni Level Fee</th>
                                    <th>External Sales Fee</th>
                                    <th>Trust Fee</th>
                                    <th>Profit Fee</th>
                                    <th>KYC Reqired</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $key => $value)
								<tr>
									<td>{{++$key}}</td>
									<td>{{$value['campain_name']}}</td>
									<td>{{$value['total_fee']}}</td>
									<td>{{$value['internal_sales_fee']}}</td>
									<td>{{$value['uni_level_fee']}}</td>
									<td>{{$value['external_sales_fee']}}</td>
									<td>{{$value['trust_fee']}}</td>
									<td>{{$value['profit_fee']}}</td>
									<td>{{$value['kyc_required']==2?'No':'Yes'}}</td>
									<td>
										<select id="marketing_campain_state" name="marketing_campain_state" onchange="handleChangeStatus(this)">
											<?php echo $value['status'] == 1? "<option value='{$value['id']}-1' selected>active</option>":"<option value='{$value['id']}-1'>Active</option>" ?>
											<?php echo $value['status'] == 2? "<option value='{$value['id']}-2' selected>not active</option>":"<option value='{$value['id']}-2'>Inactive</option>" ?>
										</select>
									</td>
									<td>
										<a href="{!! url('/admin/editMarketingCampain/'.$value['id']); !!}" title="Edit"><i class="fa fa-edit"></i></a> 
										<a href="{!! url('/admin/previewMarketingCampain/'.$value['id']); !!}" target="_blank" title="Preview"><i class="fa fa-eye"></i></a>
										<a href="{!! url('/admin/deleteMarketingCampaign/'.$value['id']); !!}" title="Delete"><i class="fa fa-trash"></i></a>
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
		function handleChangeStatus(val){
			var value = getID(val.value);
			var global_user_id = value[0];
			var selected_value = value[1];
			$.ajax({
					type: "post",
					url : '{!! url('/admin/changeMarketingCampainStatusByID'); !!}',
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