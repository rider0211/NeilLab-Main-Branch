{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('locale.exchange_list')}}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dashboard_table" class="table table-striped" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>{{__('locale.exchange_list_id')}}</th>
                                    <th>{{__('locale.exchange_list_name')}}</th>
                                    <th>{{__('locale.exchange_list_email')}}</th>
                                    @if (Auth::user()->user_type == 'admin')
                                    <th>{{__('locale.exchange_list_wallet_address')}}</th>
                                    @endif
                                    <th>{{__('locale.exchange_list_test_status')}}</th>
                                    <th>{{__('locale.exchange_list_certified')}}</th>
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
	</script>
@endsection
