{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
	<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
		<h2 class="font-w600 title mb-2 me-auto ">{{__('locale.marketing_campain_view')}}</h2>
	</div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('locale.marketing_campain_view')}}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example7" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>{{__('locale.campain_id')}}</th>
                                    <th>{{__('locale.marketing_campain')}}</th>
                                    <th>{{__('locale.campain_name')}}</th>
                                    <th>{{__('locale.copy_link')}}</th>
                                    <th>{{__('locale.number_of_signups')}}</th>
                                    <th>{{__('locale.preview')}}</th>
                                    <th>{{__('locale.status')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $key => $value)
								<tr>
									<td>{{$value['id']}}</td>
									<td>{{$value['marketing_campain']}}</td>
									<td>{{$value['campain_name']}}</td>
									<td>{{$value['marketing_campain']}}</td>
									<td>{{$value['number_of_signups']}}</td>
									<td>preview</td>
									<td>
										<select id="marketing_campain_state" name="marketing_campain_state" onchange="handleChangeStatus(this)">
											<?php echo $value['status'] == 1? "<option value='{$value['id']}-1' selected>active</option>":"<option value='{$value['id']}-1'>active</option>" ?>
											<?php echo $value['status'] == 2? "<option value='{$value['id']}-2' selected>not active</option>":"<option value='{$value['id']}-2'>not active</option>" ?>
										</select>
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