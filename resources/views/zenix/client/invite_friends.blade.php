{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
	<div class="container-fluid">
		<!-- Add Project -->
		<div class="modal fade" id="addProjectSidebar">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Create Project</h5>
						<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label class="text-black font-w500">Project Name</label>
								<input type="text" class="form-control">
							</div>
							<div class="form-group">
								<label class="text-black font-w500">Deadline</label>
								<input type="date" class="form-control">
							</div>
							<div class="form-group">
								<label class="text-black font-w500">Client Name</label>
								<input type="text" class="form-control">
							</div>
							<div class="form-group">
								<button type="button" class="btn btn-primary">CREATE</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
				@if(session()->has('error'))
				<div class="alert alert-danger"><div class="alert-body">{{ session()->get('error') }}</div></div>
				@endif

				@if(session()->has('success'))
				<div class="alert alert-success"><div class="alert-body">{{ session()->get('success') }}</div></div>
				@endif
                <div class="card">
                    <div class="card-body">
						<!-- <div class="alert alert-info alert-dismissible fade show">
							<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
							If you invite a friend, you will get a percentage of his transaction amount.
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                            </button>
						</div> -->
						<div class="form-group">
							<label>Please share this url with your friends</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control" readonly value="{{$referal_url}}">
								<button class="btn btn-primary" type="button" id="copy-btn" onclick="copyToClipboard()">Copy</button>
							</div>
						</div>
						<h4 class="mt-5">Invited People</h4>
						<hr>
						<table class="table table-responsive-md">
							<thead>
								<tr>
									<th><strong>Email</strong></th>
									<th><strong>Name</strong></th>
									<th><strong>Date</strong></th>
									<th><strong>Referral</strong></th>
								</tr>
							</thead>
							<tbody>
								@if ($friends->count()==0)
									<tr>
										<td colspan="4" align="center">No invited friends.</td>
									</tr>
								@else
									@foreach($friends as $friend)
									<tr>
										<td>{{$friend->friend->email}}</td>
										<td>{{$friend->friend->first_name.' '.$friend->friend->last_name}}</td>
										<td>{{$friend->created_at}}</td>
										<td><span class="badge light badge-success">Successful</span></td>
									</tr>
									@endforeach
								@endif
							</tbody>
						</table>
						<h4 class="mt-5">Referral Profit History</h4>
						<hr>
						<table class="table table-responsive-md">
							<thead>
								<tr>
									<th><strong>From</strong></th>
									<th><strong>Amount</strong></th>
									<th><strong>Chain</strong></th>
									<th><strong>Date</strong></th>
								</tr>
							</thead>
							<tbody>
								@if ($profits->count()==0)
									<tr>
										<td colspan="4" align="center">No profits.</td>
									</tr>
								@else
									@foreach($profits as $profit)
									<tr>
										<td>{{$profit->from->first_name.' '.$profit->from->last_name}}</td>
										<td>{{$profit->amount.' '.$profit->token}}</td>
										<td>{{$profit->stack->stackname}}</td>
										<td>{{$profit->created_at}}</td>
									</tr>
									@endforeach
								@endif
							</tbody>
						</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
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
<script>
	function copyToClipboard(){
		let temp = document.createElement('textarea');
		temp.value = '{{$referal_url}}';
		document.body.appendChild(temp);
		temp.select();
		document.execCommand('copy');
		document.body.removeChild(temp);
		document.getElementById('copy-btn').innerText = 'Copied';
	}
	function handleChange(val){
		if(val.value == 2){
			$('#chain_stack').html(

			);
		}else{
			$('#chain_stack').html(
				"<option value='1'>BTC</option>"
			);
		}
	}

</script>
@endsection
