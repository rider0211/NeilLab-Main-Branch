{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
	<div class="container-fluid">
		<div class="form-head mb-sm-5 mb-3 d-flex align-items-center flex-wrap">
			<h2 class="font-w600 mb-0 me-auto mb-2 text-black">My Wallet</h2>
			<a href="javascript:void(0);" class="btn btn-outline-secondary me-3 mb-2"><i class="las la-calendar scale5 me-2"></i>Filter Periode</a>
			<a href="javascript:void(0);" class="btn btn-secondary mb-2">+ Add Wallet</a>
		</div>
		<div class="row">
			<div class="col-xl-3 col-xxl-4">
				<div class="swiper-box">
					<div class="swiper-container card-swiper">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<div class="card-bx stacked card">
									<img src="{{ asset('images/card/card1.jpg') }}" alt="">
									<div class="card-info">
										<p class="mb-1 text-white fs-14">Main Balance</p>
										<div class="d-flex justify-content-between">
											<h2 class="num-text text-white mb-5 font-w600">$673,412.66</h2>
											<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M19.2744 18.8013H16.0334V23.616H19.2744C19.9286 23.616 20.5354 23.3506 20.9613 22.9053C21.4066 22.4784 21.672 21.8726 21.672 21.1989C21.673 19.8813 20.592 18.8013 19.2744 18.8013Z" fill="white"/>
												<path d="M18 0C8.07429 0 0 8.07429 0 18C0 27.9257 8.07429 36 18 36C27.9257 36 36 27.9247 36 18C36 8.07531 27.9247 0 18 0ZM21.6627 26.3355H19.5398V29.6722H17.3129V26.3355H16.0899V29.6722H13.8528V26.3355H9.91954V24.2414H12.0898V11.6928H9.91954V9.59863H13.8528V6.3288H16.0899V9.59863H17.3129V6.3288H19.5398V9.59863H21.4735C22.5535 9.59863 23.5491 10.044 24.2599 10.7547C24.9706 11.4655 25.416 12.4611 25.416 13.5411C25.416 15.6549 23.7477 17.3798 21.6627 17.4744C24.1077 17.4744 26.0794 19.4647 26.0794 21.9096C26.0794 24.3453 24.1087 26.3355 21.6627 26.3355Z" fill="white"/>
												<path d="M20.7062 15.8441C21.095 15.4553 21.3316 14.9338 21.3316 14.3465C21.3316 13.1812 20.3842 12.2328 19.2178 12.2328H16.0334V16.4695H19.2178C19.7959 16.4695 20.3266 16.2226 20.7062 15.8441Z" fill="white"/>
											</svg>
										</div>
										<div class="d-flex">
											<div class="me-4 text-white">
												<p class="fs-12 mb-1 op6">VALID THRU</p>
												<span>08/21</span>
											</div>
											<div class="text-white">
												<p class="fs-12 mb-1 op6">CARD HOLDER</p>
												<span>Marquezz Silalahi</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="card-bx stacked card">
									<img src="{{ asset('images/card/card2.jpg') }}" alt="">
									<div class="card-info">
										<p class="fs-14 mb-1 text-white">Main Balance</p>
										<div class="d-flex justify-content-between">
											<h2 class="num-text text-white mb-5 font-w600">$673,412.66</h2>
											<svg width="55" height="34" viewBox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"/>
												<circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"/>
											</svg>
										</div>
										<div class="d-flex">
											<div class="me-4 text-white">
												<p class="fs-12 mb-1 op6">VALID THRU</p>
												<span>08/21</span>
											</div>
											<div class="text-white">
												<p class="fs-12 mb-1 op6">CARD HOLDER</p>
												<span>Marquezz Silalahi</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="card-bx stacked card">
									<img src="{{ asset('images/card/card3.jpg') }}" alt="">
									<div class="card-info">
										<p class="mb-1 text-white fs-14">Main Balance</p>
										<div class="d-flex justify-content-between">
											<h2 class="num-text text-white mb-5 font-w600">$673,412.66</h2>
											<svg width="55" height="34" viewBox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"/>
												<circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"/>
											</svg>
										</div>
										<div class="d-flex">
											<div class="me-4 text-white">
												<p class="fs-12 mb-1 op6">VALID THRU</p>
												<span>08/21</span>
											</div>
											<div class="text-white">
												<p class="fs-12 mb-1 op6">CARD HOLDER</p>
												<span>Marquezz Silalahi</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="card-bx stacked card">
									<img src="{{ asset('images/card/card4.jpg') }}" alt="">
									<div class="card-info">
										<p class="mb-1 text-white fs-14">Main Balance</p>
										<div class="d-flex justify-content-between">
											<h2 class="num-text text-white mb-5 font-w600">$673,412.66</h2>
											<svg width="55" height="34" viewBox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"/>
												<circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"/>
											</svg>
										</div>
										<div class="d-flex">
											<div class="me-4 text-white">
												<p class="fs-12 mb-1 op6">VALID THRU</p>
												<span>08/21</span>
											</div>
											<div class="text-white">
												<p class="fs-12 mb-1 op6">CARD HOLDER</p>
												<span>Marquezz Silalahi</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="card-bx stacked card">
									<img src="{{ asset('images/card/card1.jpg') }}" alt="">
									<div class="card-info">
										<p class="mb-1 text-white fs-14">Main Balance</p>
										<div class="d-flex justify-content-between">
											<h2 class="num-text text-white mb-5 font-w600">$673,412.66</h2>
											<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M19.2744 18.8013H16.0334V23.616H19.2744C19.9286 23.616 20.5354 23.3506 20.9613 22.9053C21.4066 22.4784 21.672 21.8726 21.672 21.1989C21.673 19.8813 20.592 18.8013 19.2744 18.8013Z" fill="white"/>
												<path d="M18 0C8.07429 0 0 8.07429 0 18C0 27.9257 8.07429 36 18 36C27.9257 36 36 27.9247 36 18C36 8.07531 27.9247 0 18 0ZM21.6627 26.3355H19.5398V29.6722H17.3129V26.3355H16.0899V29.6722H13.8528V26.3355H9.91954V24.2414H12.0898V11.6928H9.91954V9.59863H13.8528V6.3288H16.0899V9.59863H17.3129V6.3288H19.5398V9.59863H21.4735C22.5535 9.59863 23.5491 10.044 24.2599 10.7547C24.9706 11.4655 25.416 12.4611 25.416 13.5411C25.416 15.6549 23.7477 17.3798 21.6627 17.4744C24.1077 17.4744 26.0794 19.4647 26.0794 21.9096C26.0794 24.3453 24.1087 26.3355 21.6627 26.3355Z" fill="white"/>
												<path d="M20.7062 15.8441C21.095 15.4553 21.3316 14.9338 21.3316 14.3465C21.3316 13.1812 20.3842 12.2328 19.2178 12.2328H16.0334V16.4695H19.2178C19.7959 16.4695 20.3266 16.2226 20.7062 15.8441Z" fill="white"/>
											</svg>
										</div>
										<div class="d-flex">
											<div class="me-4 text-white">
												<p class="fs-12 mb-1 op6">VALID THRU</p>
												<span>08/21</span>
											</div>
											<div class="text-white">
												<p class="fs-12 mb-1 op6">CARD HOLDER</p>
												<span>Marquezz Silalahi</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="card-bx stacked card">
									<img src="{{ asset('images/card/card2.jpg') }}" alt="">
									<div class="card-info">
										<p class="fs-14 mb-1 text-white">Main Balance</p>
										<div class="d-flex justify-content-between">
											<h2 class="num-text text-white mb-5 font-w600">$673,412.66</h2>
											<svg width="55" height="34" viewBox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"/>
												<circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"/>
											</svg>
										</div>
										<div class="d-flex">
											<div class="me-4 text-white">
												<p class="fs-12 mb-1 op6">VALID THRU</p>
												<span>08/21</span>
											</div>
											<div class="text-white">
												<p class="fs-12 mb-1 op6">CARD HOLDER</p>
												<span>Marquezz Silalahi</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="card-bx stacked card">
									<img src="{{ asset('images/card/card2.jpg') }}" alt="">
									<div class="card-info">
										<p class="fs-14 mb-1 text-white">Main Balance</p>
										<div class="d-flex justify-content-between">
											<h2 class="num-text text-white mb-5 font-w600">$673,412.66</h2>
											<svg width="55" height="34" viewBox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"/>
												<circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"/>
											</svg>
										</div>
										<div class="d-flex">
											<div class="me-4 text-white">
												<p class="fs-12 mb-1 op6">VALID THRU</p>
												<span>08/21</span>
											</div>
											<div class="text-white">
												<p class="fs-12 mb-1 op6">CARD HOLDER</p>
												<span>Marquezz Silalahi</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="card-bx stacked card">
									<img src="{{ asset('images/card/card3.jpg') }}" alt="">
									<div class="card-info">
										<p class="mb-1 text-white fs-14">Main Balance</p>
										<div class="d-flex justify-content-between">
											<h2 class="num-text text-white mb-5 font-w600">$673,412.66</h2>
											<svg width="55" height="34" viewBox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"/>
												<circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"/>
											</svg>
										</div>
										<div class="d-flex">
											<div class="me-4 text-white">
												<p class="fs-12 mb-1 op6">VALID THRU</p>
												<span>08/21</span>
											</div>
											<div class="text-white">
												<p class="fs-12 mb-1 op6">CARD HOLDER</p>
												<span>Marquezz Silalahi</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<!-- Add Scroll Bar -->
						<div class="swiper-scrollbar"></div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-xxl-8">
				<div class="row">
					<div class="col-xl-12">
						<div class="d-block d-sm-flex mb-4">
							<h4 class="mb-0 text-black fs-20 me-auto">Card Details</h4>
							<div class="d-flex mt-sm-0">
								<a href="javascript:void(0);" class="btn-link me-3 underline">Generate Number</a>
								<a href="javascript:void(0);" class="btn-link underline">Edit</a>
							</div>
						</div>
					</div>	
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<div class="row align-items-end">
									<div class="col-xl-6 col-lg-12 col-xxl-12">
										<div class="row">
											<div class="col-sm-6">
												<div class="mb-4">
													<p class="mb-2">Card Name</p>
													<h4 class="text-black">Main Balance</h4>
												</div>
												<div class="mb-4">
													<p class="mb-2">Valid Date</p>
													<h4 class="text-black">08/21</h4>
												</div>
												<div>
													<p class="mb-2">Card Number</p>
													<h4 class="text-black">**** **** **** 1234</h4>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="mb-4">
													<p class="mb-2">Bank Name</p>
													<h4 class="text-black">ABC Center Bank</h4>
												</div>
												<div class="mb-4">
													<p class="mb-2">Card Holder</p>
													<h4 class="text-black">Marquezz Silalahi</h4>
												</div>
												<div>
													<p class="mb-2">Card Theme</p>
													<div class="btn-group theme-colors" data-bs-toggle="buttons">
														<label class="btn btn-primary btn-sm active"><input type="radio" class="position-absolute invisible" name="options" id="option5"> <i class="las la-check-circle"></i></label>
														<label class="btn btn-warning btn-sm"><input type="radio" class="position-absolute invisible" name="options" id="option1" checked=""><i class="las la-check-circle"></i></label>
														<label class="btn btn-success btn-sm"><input type="radio" class="position-absolute invisible" name="options" id="option2"> <i class="las la-check-circle"></i></label>
														<label class="btn btn-info btn-sm"><input type="radio" class="position-absolute invisible" name="options" id="option3"> <i class="las la-check-circle"></i></label>
														<label class="btn btn-secondary btn-sm"><input type="radio" class="position-absolute invisible" name="options" id="option4"> <i class="las la-check-circle"></i></label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-6 col-lg-12 col-xxl-12 mb-lg-0 mb-3">
										<p>Monthly Limits</p>
										<div class="row">
											<div class="col-sm-4 mb-sm-0 mb-4 text-center">
												<div class="d-inline-block position-relative donut-chart-sale mb-3">
													<span class="donut1" data-peity='{ "fill": ["rgb(255, 104, 38)", "rgba(240, 240, 240)"],   "innerRadius": 40, "radius": 10}'>5/8</span>
													<small>66%</small>
												</div>
												<h5 class="fs-18 text-black">Main Limits</h5>
												<span>$10,000</span>
											</div>
											<div class="col-sm-4 mb-sm-0 mb-4 text-center">
												<div class="d-inline-block position-relative donut-chart-sale mb-3">
													<span class="donut1" data-peity='{ "fill": ["rgb(29, 198, 36)", "rgba(240, 240, 240)"],   "innerRadius": 40, "radius": 10}'>4/9</span>
													<small>31%</small>
												</div>
												<h5 class="fs-18 text-black">Seconds</h5>
												<span>$500</span>
											</div>
											<div class="col-sm-4 text-center">
												<div class="d-inline-block position-relative donut-chart-sale mb-3">
													<span class="donut1" data-peity='{ "fill": ["rgb(158, 158, 158)", "rgba(240, 240, 240)"],   "innerRadius": 40, "radius": 10}'>2/8</span>
													<small>7%</small>
												</div>
												<h5 class="fs-18 text-black">Others</h5>
												<span>$100</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header d-block d-sm-flex border-0 pb-sm-0 pb-0 align-items-center">
								<div class="me-auto mb-sm-0 mb-3">
									<h4 class="fs-20 text-black">Coin Chart</h4>
									<p class="mb-0 fs-12">Lorem ipsum dolor sit amet, consectetur</p>
								</div>
								<select class="btn-secondary style-1 default-select ">
									<option>Monthly (2021)</option>
									<option>Daily (2021)</option>
									<option>Weekly (2021)</option>
								</select>
							</div>
							<div class="card-body pt-3">
								<div class="flex-wrap mb-sm-4 mb-2 align-items-center">
									<div class="d-flex align-items-center">
										<span class="fs-32 text-black font-w600 pe-3">$557,235.31</span>
										<span class="fs-22 text-success">7% <i class="fa fa-caret-up scale5 ms-2 text-success" aria-hidden="true"></i></span>
									</div>
									<p class="mb-0 text-black me-auto">Last Week <span class="text-success">$563,443</span></p>
								</div>
								<div id="chartTimeline" class="timeline-chart"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6  mt-4">
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-2 d-block d-sm-flex flex-wrap border-0">
								<div class="mb-3">
									<h4 class="fs-20 text-black">Wallet Activity</h4>
									<p class="mb-0 fs-13">Lorem ipsum dolor sit amet, consectetur</p>
								</div>
								<div class="card-action card-tabs mb-3 style-1">
									<ul class="nav nav-tabs" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-bs-toggle="tab" href="#monthly" role="tab">
												Monthly	
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-bs-toggle="tab" href="#Weekly" role="tab">
												Weekly
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-bs-toggle="tab" href="#Today" role="tab">
												Today
											</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-body tab-content p-0">
								<div class="tab-pane active show fade" id="monthly">
									<div class="table-responsive">
										<table class="table shadow-hover card-table border-no tbl-btn short-one">
											<tbody>
												<tr>
													<td>
														<span>
															<svg width="50" height="50" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect width="63" height="63" rx="14" fill="#625794"/>
																<path d="M25.4813 24.6343L25.4813 24.6343L30.3544 19.7376C30.3571 19.7348 30.3596 19.7323 30.3619 19.7301M25.4813 24.6343L30.7116 20.0875L30.3587 19.7333C30.368 19.7241 30.3756 19.7172 30.3789 19.7143L30.38 19.7133C30.3775 19.7155 30.3709 19.7214 30.3627 19.7293C30.3625 19.7295 30.3622 19.7298 30.3619 19.7301M25.4813 24.6343C24.9214 25.197 24.9234 26.1071 25.4862 26.6672C26.0489 27.2273 26.9591 27.2251 27.5191 26.6624L27.5192 26.6624L29.9377 24.232M25.4813 24.6343L29.9377 24.232M30.3619 19.7301C30.9212 19.1741 31.8279 19.1724 32.389 19.7304C32.3902 19.7316 32.3914 19.7329 32.3927 19.7341L32.3941 19.7356L32.4062 19.7477L37.2691 24.6342L36.9147 24.9869L37.2692 24.6342C37.829 25.1968 37.8271 26.107 37.2642 26.6672C36.7015 27.2272 35.7914 27.225 35.2314 26.6623L35.2313 26.6623L32.8127 24.232L32.8127 42.875C32.8127 43.6689 32.1692 44.3125 31.3752 44.3125C30.5813 44.3125 29.9377 43.6689 29.9377 42.875L29.9377 24.232M30.3619 19.7301C30.3605 19.7315 30.3591 19.7329 30.3577 19.7343L29.9377 24.232M32.3927 19.7342C32.3932 19.7347 32.3937 19.7351 32.3941 19.7356L32.3927 19.7342Z" fill="white" stroke="white"/>
															</svg>
														</span>
													</td>
													<td>
														<span class="font-w600 text-black">Topup</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">+$5,553</span>
													</td>
													<td><a class="btn-link text-success float-right" href="javascript:void(0);">Completed</a></td>
												</tr>
												<tr>
													<td>
														<span>
															<svg width="50" height="50" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect width="63" height="63" rx="14" fill="#625794"/>
																<path d="M37.2692 38.9908L37.2692 38.9908L32.3961 43.8874C32.3934 43.8902 32.3909 43.8927 32.3885 43.895M37.2692 38.9908L32.0389 43.5375L32.3918 43.8917C32.3825 43.9009 32.3749 43.9078 32.3716 43.9107L32.3705 43.9117C32.373 43.9095 32.3796 43.9036 32.3877 43.8957C32.388 43.8955 32.3883 43.8952 32.3885 43.895M37.2692 38.9908C37.8291 38.4281 37.827 37.5179 37.2643 36.9578C36.7016 36.3978 35.7914 36.3999 35.2314 36.9626L35.2313 36.9627L32.8127 39.393M37.2692 38.9908L32.8127 39.393M32.3885 43.895C31.8292 44.4509 30.9226 44.4526 30.3615 43.8946C30.3603 43.8934 30.3591 43.8922 30.3578 43.8909L30.3563 43.8894L30.3442 43.8773L25.4813 38.9908L25.8357 38.6381L25.4813 38.9908C24.9215 38.4282 24.9234 37.518 25.4862 36.9578C26.049 36.3978 26.9591 36.4 27.5191 36.9627L27.5192 36.9627L29.9377 39.393L29.9377 20.75C29.9377 19.9561 30.5813 19.3125 31.3752 19.3125C32.1692 19.3125 32.8127 19.9561 32.8127 20.75L32.8127 39.393M32.3885 43.895C32.39 43.8935 32.3914 43.8921 32.3928 43.8907L32.8127 39.393M30.3577 43.8908C30.3573 43.8903 30.3568 43.8899 30.3564 43.8894L30.3577 43.8908Z" fill="white" stroke="white"/>
															</svg>
														</span>
													</td>
													<td>
														<span class="font-w600 text-black">Withdraw</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">+$5,553</span>
													</td>
													<td>
														<a class="btn-link text-dark float-right" href="javascript:void(0);">Pending</a>
													</td>
												</tr>
												<tr>
													<td>
														<span>
															<svg width="50" height="50" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect width="63" height="63" rx="14" fill="#625794"/>
																<path d="M37.2692 38.9908L37.2692 38.9908L32.3961 43.8874C32.3934 43.8902 32.3909 43.8927 32.3885 43.895M37.2692 38.9908L32.0389 43.5375L32.3918 43.8917C32.3825 43.9009 32.3749 43.9078 32.3716 43.9107L32.3705 43.9117C32.373 43.9095 32.3796 43.9036 32.3877 43.8957C32.388 43.8955 32.3883 43.8952 32.3885 43.895M37.2692 38.9908C37.8291 38.4281 37.827 37.5179 37.2643 36.9578C36.7016 36.3978 35.7914 36.3999 35.2314 36.9626L35.2313 36.9627L32.8127 39.393M37.2692 38.9908L32.8127 39.393M32.3885 43.895C31.8292 44.4509 30.9226 44.4526 30.3615 43.8946C30.3603 43.8934 30.3591 43.8922 30.3578 43.8909L30.3563 43.8894L30.3442 43.8773L25.4813 38.9908L25.8357 38.6381L25.4813 38.9908C24.9215 38.4282 24.9234 37.518 25.4862 36.9578C26.049 36.3978 26.9591 36.4 27.5191 36.9627L27.5192 36.9627L29.9377 39.393L29.9377 20.75C29.9377 19.9561 30.5813 19.3125 31.3752 19.3125C32.1692 19.3125 32.8127 19.9561 32.8127 20.75L32.8127 39.393M32.3885 43.895C32.39 43.8935 32.3914 43.8921 32.3928 43.8907L32.8127 39.393M30.3577 43.8908C30.3573 43.8903 30.3568 43.8899 30.3564 43.8894L30.3577 43.8908Z" fill="white" stroke="white"/>
															</svg>
														</span>
													</td>
													<td>
														<span class="font-w600 text-black">Wihtdraw</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">-$912</span>
													</td>
													<td>
														<a class="btn-link  text-danger float-right" href="javascript:void(0);">Canceled</a>
													</td>
												</tr>
												<tr>
													<td>
													<span>
															<svg width="50" height="50" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect width="63" height="63" rx="14" fill="#625794"/>
																<path d="M25.4813 24.6343L25.4813 24.6343L30.3544 19.7376C30.3571 19.7348 30.3596 19.7323 30.3619 19.7301M25.4813 24.6343L30.7116 20.0875L30.3587 19.7333C30.368 19.7241 30.3756 19.7172 30.3789 19.7143L30.38 19.7133C30.3775 19.7155 30.3709 19.7214 30.3627 19.7293C30.3625 19.7295 30.3622 19.7298 30.3619 19.7301M25.4813 24.6343C24.9214 25.197 24.9234 26.1071 25.4862 26.6672C26.0489 27.2273 26.9591 27.2251 27.5191 26.6624L27.5192 26.6624L29.9377 24.232M25.4813 24.6343L29.9377 24.232M30.3619 19.7301C30.9212 19.1741 31.8279 19.1724 32.389 19.7304C32.3902 19.7316 32.3914 19.7329 32.3927 19.7341L32.3941 19.7356L32.4062 19.7477L37.2691 24.6342L36.9147 24.9869L37.2692 24.6342C37.829 25.1968 37.8271 26.107 37.2642 26.6672C36.7015 27.2272 35.7914 27.225 35.2314 26.6623L35.2313 26.6623L32.8127 24.232L32.8127 42.875C32.8127 43.6689 32.1692 44.3125 31.3752 44.3125C30.5813 44.3125 29.9377 43.6689 29.9377 42.875L29.9377 24.232M30.3619 19.7301C30.3605 19.7315 30.3591 19.7329 30.3577 19.7343L29.9377 24.232M32.3927 19.7342C32.3932 19.7347 32.3937 19.7351 32.3941 19.7356L32.3927 19.7342Z" fill="white" stroke="white"/>
															</svg>
														</span>
													</td>
													<td>
														<span class="font-w600 text-black">Topup</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">+$7,762</span>
													</td>
													<td>
														<a class="btn-link text-success float-right" href="javascript:void(0);">Completed</a>
													</td>
												</tr>
												<tr>
													<td>
														<span>
															<svg width="50" height="50" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect width="63" height="63" rx="14" fill="#625794"/>
																<path d="M25.4813 24.6343L25.4813 24.6343L30.3544 19.7376C30.3571 19.7348 30.3596 19.7323 30.3619 19.7301M25.4813 24.6343L30.7116 20.0875L30.3587 19.7333C30.368 19.7241 30.3756 19.7172 30.3789 19.7143L30.38 19.7133C30.3775 19.7155 30.3709 19.7214 30.3627 19.7293C30.3625 19.7295 30.3622 19.7298 30.3619 19.7301M25.4813 24.6343C24.9214 25.197 24.9234 26.1071 25.4862 26.6672C26.0489 27.2273 26.9591 27.2251 27.5191 26.6624L27.5192 26.6624L29.9377 24.232M25.4813 24.6343L29.9377 24.232M30.3619 19.7301C30.9212 19.1741 31.8279 19.1724 32.389 19.7304C32.3902 19.7316 32.3914 19.7329 32.3927 19.7341L32.3941 19.7356L32.4062 19.7477L37.2691 24.6342L36.9147 24.9869L37.2692 24.6342C37.829 25.1968 37.8271 26.107 37.2642 26.6672C36.7015 27.2272 35.7914 27.225 35.2314 26.6623L35.2313 26.6623L32.8127 24.232L32.8127 42.875C32.8127 43.6689 32.1692 44.3125 31.3752 44.3125C30.5813 44.3125 29.9377 43.6689 29.9377 42.875L29.9377 24.232M30.3619 19.7301C30.3605 19.7315 30.3591 19.7329 30.3577 19.7343L29.9377 24.232M32.3927 19.7342C32.3932 19.7347 32.3937 19.7351 32.3941 19.7356L32.3927 19.7342Z" fill="white" stroke="white"/>
															</svg>
														</span>
													</td>
													<td>
														<span class="font-w600 text-black">Topup</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">+$5,553</span>
													</td>
													<td>
														<a class="btn-link text-success float-right" href="javascript:void(0);">Completed</a>
													</td>
												</tr>
												<tr>
													<td>
														<span>
															<svg width="50" height="50" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect width="63" height="63" rx="14" fill="#625794"/>
																<path d="M37.2692 38.9908L37.2692 38.9908L32.3961 43.8874C32.3934 43.8902 32.3909 43.8927 32.3885 43.895M37.2692 38.9908L32.0389 43.5375L32.3918 43.8917C32.3825 43.9009 32.3749 43.9078 32.3716 43.9107L32.3705 43.9117C32.373 43.9095 32.3796 43.9036 32.3877 43.8957C32.388 43.8955 32.3883 43.8952 32.3885 43.895M37.2692 38.9908C37.8291 38.4281 37.827 37.5179 37.2643 36.9578C36.7016 36.3978 35.7914 36.3999 35.2314 36.9626L35.2313 36.9627L32.8127 39.393M37.2692 38.9908L32.8127 39.393M32.3885 43.895C31.8292 44.4509 30.9226 44.4526 30.3615 43.8946C30.3603 43.8934 30.3591 43.8922 30.3578 43.8909L30.3563 43.8894L30.3442 43.8773L25.4813 38.9908L25.8357 38.6381L25.4813 38.9908C24.9215 38.4282 24.9234 37.518 25.4862 36.9578C26.049 36.3978 26.9591 36.4 27.5191 36.9627L27.5192 36.9627L29.9377 39.393L29.9377 20.75C29.9377 19.9561 30.5813 19.3125 31.3752 19.3125C32.1692 19.3125 32.8127 19.9561 32.8127 20.75L32.8127 39.393M32.3885 43.895C32.39 43.8935 32.3914 43.8921 32.3928 43.8907L32.8127 39.393M30.3577 43.8908C30.3573 43.8903 30.3568 43.8899 30.3564 43.8894L30.3577 43.8908Z" fill="white" stroke="white"/>
															</svg>
														</span>
													</td>
													<td>
														<span class="font-w600 text-black">Withdraw</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">-$912</span>
													</td>
													<td>
														<a class="btn-link text-danger float-right" href="javascript:void(0);">Canceled</a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="Weekly">
									<div class="table-responsive">
										<table class="table shadow-hover card-table border-no tbl-btn short-one">
											<tbody>
												<tr>
													<td>
														<span>
															<svg width="50" height="50" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect width="63" height="63" rx="14" fill="#625794"/>
																<path d="M25.4813 24.6343L25.4813 24.6343L30.3544 19.7376C30.3571 19.7348 30.3596 19.7323 30.3619 19.7301M25.4813 24.6343L30.7116 20.0875L30.3587 19.7333C30.368 19.7241 30.3756 19.7172 30.3789 19.7143L30.38 19.7133C30.3775 19.7155 30.3709 19.7214 30.3627 19.7293C30.3625 19.7295 30.3622 19.7298 30.3619 19.7301M25.4813 24.6343C24.9214 25.197 24.9234 26.1071 25.4862 26.6672C26.0489 27.2273 26.9591 27.2251 27.5191 26.6624L27.5192 26.6624L29.9377 24.232M25.4813 24.6343L29.9377 24.232M30.3619 19.7301C30.9212 19.1741 31.8279 19.1724 32.389 19.7304C32.3902 19.7316 32.3914 19.7329 32.3927 19.7341L32.3941 19.7356L32.4062 19.7477L37.2691 24.6342L36.9147 24.9869L37.2692 24.6342C37.829 25.1968 37.8271 26.107 37.2642 26.6672C36.7015 27.2272 35.7914 27.225 35.2314 26.6623L35.2313 26.6623L32.8127 24.232L32.8127 42.875C32.8127 43.6689 32.1692 44.3125 31.3752 44.3125C30.5813 44.3125 29.9377 43.6689 29.9377 42.875L29.9377 24.232M30.3619 19.7301C30.3605 19.7315 30.3591 19.7329 30.3577 19.7343L29.9377 24.232M32.3927 19.7342C32.3932 19.7347 32.3937 19.7351 32.3941 19.7356L32.3927 19.7342Z" fill="white" stroke="white"/>
															</svg>
														</span>
													</td>
													<td>
														<span class="font-w600 text-black">Topup</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">+$5,553</span>
													</td>
													<td><a class="btn-link text-success float-right" href="javascript:void(0);">Completed</a></td>
												</tr>
												<tr>
													<td>
														<span>
															<svg width="50" height="50" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect width="63" height="63" rx="14" fill="#625794"/>
																<path d="M37.2692 38.9908L37.2692 38.9908L32.3961 43.8874C32.3934 43.8902 32.3909 43.8927 32.3885 43.895M37.2692 38.9908L32.0389 43.5375L32.3918 43.8917C32.3825 43.9009 32.3749 43.9078 32.3716 43.9107L32.3705 43.9117C32.373 43.9095 32.3796 43.9036 32.3877 43.8957C32.388 43.8955 32.3883 43.8952 32.3885 43.895M37.2692 38.9908C37.8291 38.4281 37.827 37.5179 37.2643 36.9578C36.7016 36.3978 35.7914 36.3999 35.2314 36.9626L35.2313 36.9627L32.8127 39.393M37.2692 38.9908L32.8127 39.393M32.3885 43.895C31.8292 44.4509 30.9226 44.4526 30.3615 43.8946C30.3603 43.8934 30.3591 43.8922 30.3578 43.8909L30.3563 43.8894L30.3442 43.8773L25.4813 38.9908L25.8357 38.6381L25.4813 38.9908C24.9215 38.4282 24.9234 37.518 25.4862 36.9578C26.049 36.3978 26.9591 36.4 27.5191 36.9627L27.5192 36.9627L29.9377 39.393L29.9377 20.75C29.9377 19.9561 30.5813 19.3125 31.3752 19.3125C32.1692 19.3125 32.8127 19.9561 32.8127 20.75L32.8127 39.393M32.3885 43.895C32.39 43.8935 32.3914 43.8921 32.3928 43.8907L32.8127 39.393M30.3577 43.8908C30.3573 43.8903 30.3568 43.8899 30.3564 43.8894L30.3577 43.8908Z" fill="white" stroke="white"/>
															</svg>
														</span>
													</td>
													<td>
														<span class="font-w600 text-black">Withdraw</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">+$5,553</span>
													</td>
													<td>
														<a class="btn-link text-dark float-right" href="javascript:void(0);">Pending</a>
													</td>
												</tr>
												<tr>
													<td>
														<span>
															<svg width="50" height="50" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect width="63" height="63" rx="14" fill="#625794"/>
																<path d="M37.2692 38.9908L37.2692 38.9908L32.3961 43.8874C32.3934 43.8902 32.3909 43.8927 32.3885 43.895M37.2692 38.9908L32.0389 43.5375L32.3918 43.8917C32.3825 43.9009 32.3749 43.9078 32.3716 43.9107L32.3705 43.9117C32.373 43.9095 32.3796 43.9036 32.3877 43.8957C32.388 43.8955 32.3883 43.8952 32.3885 43.895M37.2692 38.9908C37.8291 38.4281 37.827 37.5179 37.2643 36.9578C36.7016 36.3978 35.7914 36.3999 35.2314 36.9626L35.2313 36.9627L32.8127 39.393M37.2692 38.9908L32.8127 39.393M32.3885 43.895C31.8292 44.4509 30.9226 44.4526 30.3615 43.8946C30.3603 43.8934 30.3591 43.8922 30.3578 43.8909L30.3563 43.8894L30.3442 43.8773L25.4813 38.9908L25.8357 38.6381L25.4813 38.9908C24.9215 38.4282 24.9234 37.518 25.4862 36.9578C26.049 36.3978 26.9591 36.4 27.5191 36.9627L27.5192 36.9627L29.9377 39.393L29.9377 20.75C29.9377 19.9561 30.5813 19.3125 31.3752 19.3125C32.1692 19.3125 32.8127 19.9561 32.8127 20.75L32.8127 39.393M32.3885 43.895C32.39 43.8935 32.3914 43.8921 32.3928 43.8907L32.8127 39.393M30.3577 43.8908C30.3573 43.8903 30.3568 43.8899 30.3564 43.8894L30.3577 43.8908Z" fill="white" stroke="white"/>
															</svg>
														</span>
													</td>
													<td>
														<span class="font-w600 text-black">Wihtdraw</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">-$912</span>
													</td>
													<td>
														<a class="btn-link  text-danger float-right" href="javascript:void(0);">Canceled</a>
													</td>
												</tr>
												<tr>
													<td>
													<span>
															<svg width="50" height="50" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect width="63" height="63" rx="14" fill="#625794"/>
																<path d="M25.4813 24.6343L25.4813 24.6343L30.3544 19.7376C30.3571 19.7348 30.3596 19.7323 30.3619 19.7301M25.4813 24.6343L30.7116 20.0875L30.3587 19.7333C30.368 19.7241 30.3756 19.7172 30.3789 19.7143L30.38 19.7133C30.3775 19.7155 30.3709 19.7214 30.3627 19.7293C30.3625 19.7295 30.3622 19.7298 30.3619 19.7301M25.4813 24.6343C24.9214 25.197 24.9234 26.1071 25.4862 26.6672C26.0489 27.2273 26.9591 27.2251 27.5191 26.6624L27.5192 26.6624L29.9377 24.232M25.4813 24.6343L29.9377 24.232M30.3619 19.7301C30.9212 19.1741 31.8279 19.1724 32.389 19.7304C32.3902 19.7316 32.3914 19.7329 32.3927 19.7341L32.3941 19.7356L32.4062 19.7477L37.2691 24.6342L36.9147 24.9869L37.2692 24.6342C37.829 25.1968 37.8271 26.107 37.2642 26.6672C36.7015 27.2272 35.7914 27.225 35.2314 26.6623L35.2313 26.6623L32.8127 24.232L32.8127 42.875C32.8127 43.6689 32.1692 44.3125 31.3752 44.3125C30.5813 44.3125 29.9377 43.6689 29.9377 42.875L29.9377 24.232M30.3619 19.7301C30.3605 19.7315 30.3591 19.7329 30.3577 19.7343L29.9377 24.232M32.3927 19.7342C32.3932 19.7347 32.3937 19.7351 32.3941 19.7356L32.3927 19.7342Z" fill="white" stroke="white"/>
															</svg>
														</span>
													</td>
													<td>
														<span class="font-w600 text-black">Topup</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">+$7,762</span>
													</td>
													<td>
														<a class="btn-link text-success float-right" href="javascript:void(0);">Completed</a>
													</td>
												</tr>
												<tr>
													<td>
														<span>
															<svg width="50" height="50" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect width="63" height="63" rx="14" fill="#625794"/>
																<path d="M25.4813 24.6343L25.4813 24.6343L30.3544 19.7376C30.3571 19.7348 30.3596 19.7323 30.3619 19.7301M25.4813 24.6343L30.7116 20.0875L30.3587 19.7333C30.368 19.7241 30.3756 19.7172 30.3789 19.7143L30.38 19.7133C30.3775 19.7155 30.3709 19.7214 30.3627 19.7293C30.3625 19.7295 30.3622 19.7298 30.3619 19.7301M25.4813 24.6343C24.9214 25.197 24.9234 26.1071 25.4862 26.6672C26.0489 27.2273 26.9591 27.2251 27.5191 26.6624L27.5192 26.6624L29.9377 24.232M25.4813 24.6343L29.9377 24.232M30.3619 19.7301C30.9212 19.1741 31.8279 19.1724 32.389 19.7304C32.3902 19.7316 32.3914 19.7329 32.3927 19.7341L32.3941 19.7356L32.4062 19.7477L37.2691 24.6342L36.9147 24.9869L37.2692 24.6342C37.829 25.1968 37.8271 26.107 37.2642 26.6672C36.7015 27.2272 35.7914 27.225 35.2314 26.6623L35.2313 26.6623L32.8127 24.232L32.8127 42.875C32.8127 43.6689 32.1692 44.3125 31.3752 44.3125C30.5813 44.3125 29.9377 43.6689 29.9377 42.875L29.9377 24.232M30.3619 19.7301C30.3605 19.7315 30.3591 19.7329 30.3577 19.7343L29.9377 24.232M32.3927 19.7342C32.3932 19.7347 32.3937 19.7351 32.3941 19.7356L32.3927 19.7342Z" fill="white" stroke="white"/>
															</svg>
														</span>
													</td>
													<td>
														<span class="font-w600 text-black">Topup</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">+$5,553</span>
													</td>
													<td>
														<a class="btn-link text-success float-right" href="javascript:void(0);">Completed</a>
													</td>
												</tr>
												<tr>
													<td>
														<span>
															<svg width="50" height="50" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect width="63" height="63" rx="14" fill="#625794"/>
																<path d="M37.2692 38.9908L37.2692 38.9908L32.3961 43.8874C32.3934 43.8902 32.3909 43.8927 32.3885 43.895M37.2692 38.9908L32.0389 43.5375L32.3918 43.8917C32.3825 43.9009 32.3749 43.9078 32.3716 43.9107L32.3705 43.9117C32.373 43.9095 32.3796 43.9036 32.3877 43.8957C32.388 43.8955 32.3883 43.8952 32.3885 43.895M37.2692 38.9908C37.8291 38.4281 37.827 37.5179 37.2643 36.9578C36.7016 36.3978 35.7914 36.3999 35.2314 36.9626L35.2313 36.9627L32.8127 39.393M37.2692 38.9908L32.8127 39.393M32.3885 43.895C31.8292 44.4509 30.9226 44.4526 30.3615 43.8946C30.3603 43.8934 30.3591 43.8922 30.3578 43.8909L30.3563 43.8894L30.3442 43.8773L25.4813 38.9908L25.8357 38.6381L25.4813 38.9908C24.9215 38.4282 24.9234 37.518 25.4862 36.9578C26.049 36.3978 26.9591 36.4 27.5191 36.9627L27.5192 36.9627L29.9377 39.393L29.9377 20.75C29.9377 19.9561 30.5813 19.3125 31.3752 19.3125C32.1692 19.3125 32.8127 19.9561 32.8127 20.75L32.8127 39.393M32.3885 43.895C32.39 43.8935 32.3914 43.8921 32.3928 43.8907L32.8127 39.393M30.3577 43.8908C30.3573 43.8903 30.3568 43.8899 30.3564 43.8894L30.3577 43.8908Z" fill="white" stroke="white"/>
															</svg>
														</span>
													</td>
													<td>
														<span class="font-w600 text-black">Withdraw</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">-$912</span>
													</td>
													<td>
														<a class="btn-link text-danger float-right" href="javascript:void(0);">Canceled</a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="Today">
									<div class="table-responsive">
										<table class="table shadow-hover card-table border-no tbl-btn short-one">
											<tbody>
												<tr>
													<td>
														<span>
															<svg width="50" height="50" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect width="63" height="63" rx="14" fill="#625794"/>
																<path d="M25.4813 24.6343L25.4813 24.6343L30.3544 19.7376C30.3571 19.7348 30.3596 19.7323 30.3619 19.7301M25.4813 24.6343L30.7116 20.0875L30.3587 19.7333C30.368 19.7241 30.3756 19.7172 30.3789 19.7143L30.38 19.7133C30.3775 19.7155 30.3709 19.7214 30.3627 19.7293C30.3625 19.7295 30.3622 19.7298 30.3619 19.7301M25.4813 24.6343C24.9214 25.197 24.9234 26.1071 25.4862 26.6672C26.0489 27.2273 26.9591 27.2251 27.5191 26.6624L27.5192 26.6624L29.9377 24.232M25.4813 24.6343L29.9377 24.232M30.3619 19.7301C30.9212 19.1741 31.8279 19.1724 32.389 19.7304C32.3902 19.7316 32.3914 19.7329 32.3927 19.7341L32.3941 19.7356L32.4062 19.7477L37.2691 24.6342L36.9147 24.9869L37.2692 24.6342C37.829 25.1968 37.8271 26.107 37.2642 26.6672C36.7015 27.2272 35.7914 27.225 35.2314 26.6623L35.2313 26.6623L32.8127 24.232L32.8127 42.875C32.8127 43.6689 32.1692 44.3125 31.3752 44.3125C30.5813 44.3125 29.9377 43.6689 29.9377 42.875L29.9377 24.232M30.3619 19.7301C30.3605 19.7315 30.3591 19.7329 30.3577 19.7343L29.9377 24.232M32.3927 19.7342C32.3932 19.7347 32.3937 19.7351 32.3941 19.7356L32.3927 19.7342Z" fill="white" stroke="white"/>
															</svg>
														</span>
													</td>
													<td>
														<span class="font-w600 text-black">Topup</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">+$5,553</span>
													</td>
													<td><a class="btn-link text-success float-right" href="javascript:void(0);">Completed</a></td>
												</tr>
												<tr>
													<td>
														<span>
															<svg width="50" height="50" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect width="63" height="63" rx="14" fill="#625794"/>
																<path d="M37.2692 38.9908L37.2692 38.9908L32.3961 43.8874C32.3934 43.8902 32.3909 43.8927 32.3885 43.895M37.2692 38.9908L32.0389 43.5375L32.3918 43.8917C32.3825 43.9009 32.3749 43.9078 32.3716 43.9107L32.3705 43.9117C32.373 43.9095 32.3796 43.9036 32.3877 43.8957C32.388 43.8955 32.3883 43.8952 32.3885 43.895M37.2692 38.9908C37.8291 38.4281 37.827 37.5179 37.2643 36.9578C36.7016 36.3978 35.7914 36.3999 35.2314 36.9626L35.2313 36.9627L32.8127 39.393M37.2692 38.9908L32.8127 39.393M32.3885 43.895C31.8292 44.4509 30.9226 44.4526 30.3615 43.8946C30.3603 43.8934 30.3591 43.8922 30.3578 43.8909L30.3563 43.8894L30.3442 43.8773L25.4813 38.9908L25.8357 38.6381L25.4813 38.9908C24.9215 38.4282 24.9234 37.518 25.4862 36.9578C26.049 36.3978 26.9591 36.4 27.5191 36.9627L27.5192 36.9627L29.9377 39.393L29.9377 20.75C29.9377 19.9561 30.5813 19.3125 31.3752 19.3125C32.1692 19.3125 32.8127 19.9561 32.8127 20.75L32.8127 39.393M32.3885 43.895C32.39 43.8935 32.3914 43.8921 32.3928 43.8907L32.8127 39.393M30.3577 43.8908C30.3573 43.8903 30.3568 43.8899 30.3564 43.8894L30.3577 43.8908Z" fill="white" stroke="white"/>
															</svg>
														</span>
													</td>
													<td>
														<span class="font-w600 text-black">Withdraw</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">+$5,553</span>
													</td>
													<td>
														<a class="btn-link text-dark float-right" href="javascript:void(0);">Pending</a>
													</td>
												</tr>
												<tr>
													<td>
														<span>
															<svg width="50" height="50" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect width="63" height="63" rx="14" fill="#625794"/>
																<path d="M37.2692 38.9908L37.2692 38.9908L32.3961 43.8874C32.3934 43.8902 32.3909 43.8927 32.3885 43.895M37.2692 38.9908L32.0389 43.5375L32.3918 43.8917C32.3825 43.9009 32.3749 43.9078 32.3716 43.9107L32.3705 43.9117C32.373 43.9095 32.3796 43.9036 32.3877 43.8957C32.388 43.8955 32.3883 43.8952 32.3885 43.895M37.2692 38.9908C37.8291 38.4281 37.827 37.5179 37.2643 36.9578C36.7016 36.3978 35.7914 36.3999 35.2314 36.9626L35.2313 36.9627L32.8127 39.393M37.2692 38.9908L32.8127 39.393M32.3885 43.895C31.8292 44.4509 30.9226 44.4526 30.3615 43.8946C30.3603 43.8934 30.3591 43.8922 30.3578 43.8909L30.3563 43.8894L30.3442 43.8773L25.4813 38.9908L25.8357 38.6381L25.4813 38.9908C24.9215 38.4282 24.9234 37.518 25.4862 36.9578C26.049 36.3978 26.9591 36.4 27.5191 36.9627L27.5192 36.9627L29.9377 39.393L29.9377 20.75C29.9377 19.9561 30.5813 19.3125 31.3752 19.3125C32.1692 19.3125 32.8127 19.9561 32.8127 20.75L32.8127 39.393M32.3885 43.895C32.39 43.8935 32.3914 43.8921 32.3928 43.8907L32.8127 39.393M30.3577 43.8908C30.3573 43.8903 30.3568 43.8899 30.3564 43.8894L30.3577 43.8908Z" fill="white" stroke="white"/>
															</svg>
														</span>
													</td>
													<td>
														<span class="font-w600 text-black">Wihtdraw</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">-$912</span>
													</td>
													<td>
														<a class="btn-link  text-danger float-right" href="javascript:void(0);">Canceled</a>
													</td>
												</tr>
												<tr>
													<td>
													<span>
															<svg width="50" height="50" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect width="63" height="63" rx="14" fill="#625794"/>
																<path d="M25.4813 24.6343L25.4813 24.6343L30.3544 19.7376C30.3571 19.7348 30.3596 19.7323 30.3619 19.7301M25.4813 24.6343L30.7116 20.0875L30.3587 19.7333C30.368 19.7241 30.3756 19.7172 30.3789 19.7143L30.38 19.7133C30.3775 19.7155 30.3709 19.7214 30.3627 19.7293C30.3625 19.7295 30.3622 19.7298 30.3619 19.7301M25.4813 24.6343C24.9214 25.197 24.9234 26.1071 25.4862 26.6672C26.0489 27.2273 26.9591 27.2251 27.5191 26.6624L27.5192 26.6624L29.9377 24.232M25.4813 24.6343L29.9377 24.232M30.3619 19.7301C30.9212 19.1741 31.8279 19.1724 32.389 19.7304C32.3902 19.7316 32.3914 19.7329 32.3927 19.7341L32.3941 19.7356L32.4062 19.7477L37.2691 24.6342L36.9147 24.9869L37.2692 24.6342C37.829 25.1968 37.8271 26.107 37.2642 26.6672C36.7015 27.2272 35.7914 27.225 35.2314 26.6623L35.2313 26.6623L32.8127 24.232L32.8127 42.875C32.8127 43.6689 32.1692 44.3125 31.3752 44.3125C30.5813 44.3125 29.9377 43.6689 29.9377 42.875L29.9377 24.232M30.3619 19.7301C30.3605 19.7315 30.3591 19.7329 30.3577 19.7343L29.9377 24.232M32.3927 19.7342C32.3932 19.7347 32.3937 19.7351 32.3941 19.7356L32.3927 19.7342Z" fill="white" stroke="white"/>
															</svg>
														</span>
													</td>
													<td>
														<span class="font-w600 text-black">Topup</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">+$7,762</span>
													</td>
													<td>
														<a class="btn-link text-success float-right" href="javascript:void(0);">Completed</a>
													</td>
												</tr>
												<tr>
													<td>
														<span>
															<svg width="50" height="50" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect width="63" height="63" rx="14" fill="#625794"/>
																<path d="M25.4813 24.6343L25.4813 24.6343L30.3544 19.7376C30.3571 19.7348 30.3596 19.7323 30.3619 19.7301M25.4813 24.6343L30.7116 20.0875L30.3587 19.7333C30.368 19.7241 30.3756 19.7172 30.3789 19.7143L30.38 19.7133C30.3775 19.7155 30.3709 19.7214 30.3627 19.7293C30.3625 19.7295 30.3622 19.7298 30.3619 19.7301M25.4813 24.6343C24.9214 25.197 24.9234 26.1071 25.4862 26.6672C26.0489 27.2273 26.9591 27.2251 27.5191 26.6624L27.5192 26.6624L29.9377 24.232M25.4813 24.6343L29.9377 24.232M30.3619 19.7301C30.9212 19.1741 31.8279 19.1724 32.389 19.7304C32.3902 19.7316 32.3914 19.7329 32.3927 19.7341L32.3941 19.7356L32.4062 19.7477L37.2691 24.6342L36.9147 24.9869L37.2692 24.6342C37.829 25.1968 37.8271 26.107 37.2642 26.6672C36.7015 27.2272 35.7914 27.225 35.2314 26.6623L35.2313 26.6623L32.8127 24.232L32.8127 42.875C32.8127 43.6689 32.1692 44.3125 31.3752 44.3125C30.5813 44.3125 29.9377 43.6689 29.9377 42.875L29.9377 24.232M30.3619 19.7301C30.3605 19.7315 30.3591 19.7329 30.3577 19.7343L29.9377 24.232M32.3927 19.7342C32.3932 19.7347 32.3937 19.7351 32.3941 19.7356L32.3927 19.7342Z" fill="white" stroke="white"/>
															</svg>
														</span>
													</td>
													<td>
														<span class="font-w600 text-black">Topup</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">+$5,553</span>
													</td>
													<td>
														<a class="btn-link text-success float-right" href="javascript:void(0);">Completed</a>
													</td>
												</tr>
												<tr>
													<td>
														<span>
															<svg width="50" height="50" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect width="63" height="63" rx="14" fill="#625794"/>
																<path d="M37.2692 38.9908L37.2692 38.9908L32.3961 43.8874C32.3934 43.8902 32.3909 43.8927 32.3885 43.895M37.2692 38.9908L32.0389 43.5375L32.3918 43.8917C32.3825 43.9009 32.3749 43.9078 32.3716 43.9107L32.3705 43.9117C32.373 43.9095 32.3796 43.9036 32.3877 43.8957C32.388 43.8955 32.3883 43.8952 32.3885 43.895M37.2692 38.9908C37.8291 38.4281 37.827 37.5179 37.2643 36.9578C36.7016 36.3978 35.7914 36.3999 35.2314 36.9626L35.2313 36.9627L32.8127 39.393M37.2692 38.9908L32.8127 39.393M32.3885 43.895C31.8292 44.4509 30.9226 44.4526 30.3615 43.8946C30.3603 43.8934 30.3591 43.8922 30.3578 43.8909L30.3563 43.8894L30.3442 43.8773L25.4813 38.9908L25.8357 38.6381L25.4813 38.9908C24.9215 38.4282 24.9234 37.518 25.4862 36.9578C26.049 36.3978 26.9591 36.4 27.5191 36.9627L27.5192 36.9627L29.9377 39.393L29.9377 20.75C29.9377 19.9561 30.5813 19.3125 31.3752 19.3125C32.1692 19.3125 32.8127 19.9561 32.8127 20.75L32.8127 39.393M32.3885 43.895C32.39 43.8935 32.3914 43.8921 32.3928 43.8907L32.8127 39.393M30.3577 43.8908C30.3573 43.8903 30.3568 43.8899 30.3564 43.8894L30.3577 43.8908Z" fill="white" stroke="white"/>
															</svg>
														</span>
													</td>
													<td>
														<span class="font-w600 text-black">Withdraw</span>
													</td>
													<td>
														<span class="text-black">06:24:45 AM</span>
													</td>
													<td>
														<span class="font-w600 text-black">-$912</span>
													</td>
													<td>
														<a class="btn-link text-danger float-right" href="javascript:void(0);">Canceled</a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="card-footer border-0 p-0 caret">
								<a href="{!! url('/coin-details'); !!}" class="btn-link mt-1"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
							</div>
						</div>	
					</div>
				</div>
			</div>
			<div class="col-xl-6 mt-4">
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header d-sm-flex d-block pb-0 border-0">
								<div>
									<h4 class="fs-20 text-black">Quick Transfer</h4>
									<p class="mb-0 fs-12">Lorem ipsum dolor sit amet, consectetur</p>
								</div>
								<select class="form-control custom-image-select image-select mt-3 mt-sm-0">
									<option data-thumbnail="{{ asset('images/svg/ltc.svg') }}">Yearly (2021)</option>
									<option data-thumbnail="{{ asset('images/svg/eth.svg') }}">Weekly (2021)</option>
									<option data-thumbnail="{{ asset('images/svg/btc.svg') }}">Daily (2021)</option>
								</select>
							</div>
							<div class="card-body">
								<div class="form-wrapper">
									<div class="form-group">
										<div class="input-group input-group-lg">
											<div class="input-group-prepend">
												<span class="input-group-text">Amount BTC</span>
											</div>
											<input type="text" class="form-control" placeholder="742.2">
										</div>
									</div>
								</div>
								<div class="d-flex mb-3 justify-content-between align-items-center">
									<h4 class="text-black fs-20 mb-0">Recent Contacts</h4>
									<a href="javascript:void(0);" class="btn-link">View more</a>
								</div>
								<div class="testimonial-one px-4 owl-right-nav owl-carousel owl-loaded owl-drag">
									<div class="items">
										<div class="text-center">
											<img class="mb-3 rounded" src="{{ asset('images/contacts/Untitled-1.jpg') }}" alt="">
											<h5 class="mb-0"><a class="text-black" href="javascript:void(0);">Samuel</a></h5>
											<span class="fs-12">@sam224</span>
										</div>
									</div>
									<div class="items">
										<div class="text-center">
											<img class="mb-3 rounded" src="{{ asset('images/contacts/Untitled-2.jpg') }}" alt="">
											<h5 class="mb-0"><a class="text-black" href="javascript:void(0);">Cindy</a></h5>
											<span class="fs-12">@cindyss</span>
										</div>
									</div>
									<div class="items">
										<div class="text-center">
											<img class="mb-3 rounded" src="{{ asset('images/contacts/Untitled-3.jpg') }}" alt="">
											<h5 class="mb-0"><a class="text-black" href="javascript:void(0);">David</a></h5>
											<span class="fs-12">@davidxc</span>
										</div>
									</div>
									<div class="items">
										<div class="text-center">
											<img class="mb-3 rounded" src="{{ asset('images/contacts/Untitled-4.jpg') }}" alt="">
											<h5 class="mb-0"><a class="text-black" href="javascript:void(0);">Martha</a></h5>
											<span class="fs-12">@marthaa</span>
										</div>
									</div>
									<div class="items">
										<div class="text-center">
											<img class="mb-3 rounded" src="{{ asset('images/contacts/Untitled-5.jpg') }}" alt="">
											<h5 class="mb-0"><a class="text-black" href="javascript:void(0);">Olivia</a></h5>
											<span class="fs-12">@oliv62</span>
										</div>
									</div>
								</div>
								<div class="row pt-5 align-items-center">
									<div class="col-sm-6 mb-2">
										<p class="mb-0 fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
									</div>
									<div class="col-sm-6 mb-2">
										<a href="javascript:void(0);" class="btn btn-secondary d-block">TRANSFER NOW</a>
									</div>
								</div>
							</div>
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
		$(document).ready(function(){
			$(".theme-colors .btn").click(function(){
				$('.theme-colors .btn').removeClass("active");
				$(this).addClass("active");
		  	});
		}); 
	</script>
@endsection