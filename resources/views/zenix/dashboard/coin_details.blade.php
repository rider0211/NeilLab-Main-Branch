{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
	<div class="container-fluid">
		<div class=" form-head d-flex flex-wrap mb-4 align-items-center">
			<h2 class="text-black me-auto font-w600 mb-3">Coin Details</h2>
			<div class="card-action coin-tabs mt-3 mt-sm-0">
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="tab" href="#Bitcoin" role="tab" aria-selected="false">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M16 9.50011C15.9993 8.67201 15.328 8.00092 14.5001 8H10V11H14.5001C15.328 10.9993 15.9993 10.328 16 9.50011Z" fill="#FFAB2D"/>
							<path d="M10 16H14.5001C15.3285 16 16 15.3285 16 14.5001C16 13.6715 15.3285 13 14.5001 13H10V16Z" fill="#FFAB2D"/>
							<path d="M12 0C5.3726 0 0 5.3726 0 12C0 18.6274 5.3726 24 12 24C18.6274 24 24 18.6274 24 12C23.9924 5.37574 18.6243 0.00758581 12 0ZM18.0001 14.5713C17.9978 16.4641 16.4641 17.9978 14.5716 17.9999V18.8571C14.5716 19.3305 14.1876 19.7143 13.7144 19.7143C13.2409 19.7143 12.8572 19.3305 12.8572 18.8571V17.9999H11.1431V18.8571C11.1431 19.3305 10.7591 19.7143 10.2859 19.7143C9.8124 19.7143 9.42866 19.3305 9.42866 18.8571V17.9999H6.85733C6.38387 17.9999 6.00013 17.6161 6.00013 17.1429C6.00013 16.6695 6.38387 16.2857 6.85733 16.2857H7.71427V7.71427H6.85733C6.38387 7.71427 6.00013 7.33053 6.00013 6.85707C6.00013 6.38361 6.38387 5.99987 6.85733 5.99987H9.42866V5.14293C9.42866 4.66947 9.8124 4.28573 10.2859 4.28573C10.7593 4.28573 11.1431 4.66947 11.1431 5.14293V5.99987H12.8572V5.14293C12.8572 4.66947 13.2409 4.28573 13.7144 4.28573C14.1879 4.28573 14.5716 4.66947 14.5716 5.14293V5.99987C16.4571 5.99202 17.992 7.5139 18.0001 9.39937C18.0043 10.3978 17.5714 11.3481 16.8152 12C17.5643 12.6445 17.9967 13.5828 18.0001 14.5713Z" fill="#FFAB2D"/>
							</svg>
							Bitcoin
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " data-bs-toggle="tab" href="#Ethereum" role="tab" aria-selected="false">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12.3801 13.8734C12.136 13.9546 11.864 13.9546 11.6199 13.8734L9 13L12 18L15 13L12.3801 13.8734Z" fill="#00ADA3"/>
								<path d="M12 12L15 10.8001L12 6L9 10.8001L12 12Z" fill="#00ADA3"/>
								<path d="M12 0C5.3726 0 0 5.3726 0 12C0 18.6274 5.3726 24 12 24C18.6274 24 24 18.6274 24 12C23.9927 5.37574 18.6243 0.00732425 12 0ZM17.0524 11.5263L12.7667 20.0977C12.5551 20.5212 12.04 20.6928 11.6168 20.4812C11.4507 20.3983 11.3162 20.2638 11.2333 20.0977L6.94757 11.5263C6.81443 11.2589 6.8296 10.9416 6.9876 10.6882L11.2733 3.83111C11.5582 3.42984 12.114 3.33515 12.5153 3.62001C12.5972 3.67808 12.6686 3.74923 12.7267 3.83111L17.0121 10.6882C17.1704 10.9416 17.1856 11.2589 17.0524 11.5263Z" fill="#00ADA3"/>
							</svg>
							Ethereum
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" data-bs-toggle="tab" href="#Monero" role="tab" aria-selected="true">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12.2161 0.00189099C5.59822 -0.114662 0.118718 5.17136 0.00213245 11.7875C-0.0369579 13.869 0.462987 15.8373 1.36961 17.5623H5.14217V5.75207C5.14217 5.03013 6.12354 4.80045 6.44244 5.44835L12.0001 16.6998L17.5578 5.44903C17.8767 4.80045 18.8581 5.03013 18.8581 5.75207V17.5623H22.619C23.4625 15.9594 23.9645 14.1494 23.9981 12.2194C24.1147 5.60329 18.8341 0.1253 12.2161 0.00189099Z" fill="#FF782C"/>
								<path d="M17.4865 18.2479V8.6892L12.6146 18.5516C12.3842 19.0199 11.6154 19.0199 11.385 18.5516L6.51376 8.6892V18.2479C6.51376 18.6264 6.20721 18.9335 5.82796 18.9335H2.22685C4.36036 21.9303 7.82911 23.9241 11.7841 23.9981C15.8968 24.0708 19.5672 22.0551 21.7871 18.9335H18.1723C17.793 18.9335 17.4865 18.6264 17.4865 18.2479Z" fill="#FF782C"/>
							</svg>
							Monero
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " data-bs-toggle="tab" href="#Litecoin" role="tab" aria-selected="true">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 0C5.3726 0 0 5.3726 0 12C0 18.6274 5.3726 24 12 24C18.6274 24 24 18.6274 24 12C23.9924 5.37574 18.6243 0.00758581 12 0V0ZM16.2857 18.0001H9.42866C8.9552 18.0001 8.57147 17.6164 8.57147 17.1429C8.57147 17.1024 8.57434 17.0618 8.5801 17.0216L9.22515 12.5054L7.92222 12.8313C7.85421 12.8486 7.78437 12.8572 7.71427 12.8572C7.24081 12.8567 6.85759 12.4727 6.85785 11.9992C6.85838 11.6063 7.12571 11.2642 7.50683 11.1684L9.48674 10.6735L10.2942 5.0213C10.3612 4.55254 10.7954 4.22714 11.2642 4.2941C11.7329 4.36107 12.0583 4.79529 11.9914 5.26404L11.2825 10.2247L14.3636 9.4543C14.8222 9.33737 15.2886 9.61439 15.4053 10.0729C15.5222 10.5315 15.2452 10.9979 14.7866 11.1148C14.784 11.1153 14.7814 11.1161 14.7788 11.1166L11.0204 12.0562L10.4164 16.2857H16.2857C16.7592 16.2857 17.1429 16.6695 17.1429 17.1429C17.1429 17.6161 16.7592 18.0001 16.2857 18.0001Z" fill="#374C98"/>
							</svg>
							Litecoin
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="tab-content">
			<div class="tab-pane fade" id="Bitcoin">
				<div class="row">
					<div class="col-xl-3 col-xxl-4 mt-4">
						<div class="card">
							<div class="card-header pb-0 border-0">
								<h4 class="mb-0 text-black fs-20">About</h4>
								<div class="dropdown custom-dropdown mb-0">
									<div class="btn sharp pe-0 tp-btn" data-bs-toggle="dropdown">
										<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12.0049 13C12.5572 13 13.0049 12.5523 13.0049 12C13.0049 11.4477 12.5572 11 12.0049 11C11.4526 11 11.0049 11.4477 11.0049 12C11.0049 12.5523 11.4526 13 12.0049 13Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M12.0049 6C12.5572 6 13.0049 5.55228 13.0049 5C13.0049 4.44772 12.5572 4 12.0049 4C11.4526 4 11.0049 4.44772 11.0049 5C11.0049 5.55228 11.4526 6 12.0049 6Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M12.0049 20C12.5572 20 13.0049 19.5523 13.0049 19C13.0049 18.4477 12.5572 18 12.0049 18C11.4526 18 11.0049 18.4477 11.0049 19C11.0049 19.5523 11.4526 20 12.0049 20Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</div>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="javascript:void(0);">Details</a>
										<a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
									</div>
								</div>
							</div>
							<div class="card-body height400 dz-scroll" id="about-1">
								<div class="d-flex align-items-start mb-3 about-coin">
									<div>
										<img src="{{ asset('images/svg/btc1.svg') }}" alt="">
									</div>
									<div class="ms-3">
										<h2 class="font-w600 text-black mb-0 title">Digital Cash</h2>
										<p class="font-w600 text-black sub-title">BTC</p>
										<span>1 BTC = 68.48 USD</span>
									</div>	
								</div>
								<p class="fs-14">Dash is an open source cryptocurrency. It is an altcoin that was forked from the Bitcoin protocol. It is also a decentralized autonomous organization (DAO) run by a subset of its users, which are called "masternodes". The currency permits transactions that can be untraceable.</p>
								<p class="fs-14">Dash is an open source cryptocurrency. It is an altcoin that was forked from the Bitcoin protocol. It is also a decentralized autonomous organization (DAO) run by a subset of its users, which are called "masternodes". The currency permits transactions that can be untraceable.</p>
								<p class="fs-14">Dash is an open source cryptocurrency. It is an altcoin that was forked from the Bitcoin protocol. It is also a decentralized autonomous organization (DAO) run by a subset of its users, which are called "masternodes". The currency permits transactions that can be untraceable.</p>
							</div>
							<div class="card-footer border-0 p-0 caret">
								<a href="{!! url('/coin-details'); !!}" class="btn-link"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-xxl-8 mt-4">
						<div class="card">
							<div class="card-header pb-0 d-block d-sm-flex flex-wrap border-0 align-items-center">
								<div class="me-auto mb-3">
									<h4 class="fs-20 text-black">Coin Chart</h4>
									<p class="mb-0 fs-12">Lorem ipsum dolor sit amet, consectetur</p>
								</div>
								
								<div class="input-group detault-daterange me-3  mb-3" >
									<span class="input-group-text"><i class="las la-calendar"></i></span>
									<input type="text" class="form-control input-daterange-timepicker" name="daterange" value="04/01/2015 1:30 PM - 01/01/2015 2:00 PM">
								</div>
								<select class="btn-secondary style-1 default-select  mb-3">
									<option>USD ($ US Dollar)</option>
									<option>BTC ($ US Dollar)</option>
									<option>USD ($ US Dollar)</option>
								</select>
							</div>
							<div class="card-body pb-0 pt-sm-3 pt-0">
								<div class="row sp20 mb-4 align-items-center">
									<div class="col-lg-4 col-xxl-4 col-sm-4 d-flex flex-wrap align-items-center">
										<div class="px-2 info-group">
											<p class="fs-18 mb-1">Price</p>
											<h2 class="fs-28 font-w600 text-black">$11,898.15</h2>
										</div>
									</div>
									<div class="d-flex col-lg-8 col-xxl-8 col-sm-8 align-items-center mt-sm-0 mt-3 justify-content-end">
										<div class="px-2 info-group">
											<p class="fs-14 mb-1">24h% change</p>
											<h3 class="fs-20 font-w600"><span class="text-success">1.64%</span>
											<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M0 7L7.00001 -8.77983e-06L14 7H7.00001H0Z" fill="#2BC155"></path>
											</svg>
											</h3>
										</div>
										<div class="px-2 info-group">
											<p class="fs-14 mb-1">Volume (24h)</p>
											<h3 class="fs-20 font-w600 text-black">$47.22B</h3>
										</div>
										<div class="px-2 info-group">
											<p class="fs-14 mb-1">Market Cap</p>
											<h3 class="fs-20 font-w600 text-black">$219.24B</h3>
										</div>
									</div>
								</div>
								<div id="chartBarRunning" class="bar-chart"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-12">
						<div class="card">
							<div class="card-header d-sm-flex d-block pb-0 border-0">
								<div>
									<h4 class="fs-20 text-black">Quick Trade</h4>
									<p class="mb-0 fs-12">Lorem ipsum dolor sit amet, consectetur</p>
								</div>
								<div class="dropdown custom-dropdown d-block mt-3 mt-sm-0 mb-0">
									<div class="btn btn-light d-flex align-items-center svg-btn" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										<svg class="me-2" width="25" height="25" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M28.5 16.5002C28.4986 14.844 27.156 13.5018 25.5003 13.5H16.5002V19.4999H25.5003C27.156 19.4985 28.4986 18.1559 28.5 16.5002Z" fill="#FFAB2D"/>
											<path d="M16.5002 28.5H25.5003C27.1569 28.5 28.5 27.1569 28.5 25.5003C28.5 23.8432 27.1569 22.5001 25.5003 22.5001H16.5002V28.5Z" fill="#FFAB2D"/>
											<path d="M21 9.15527e-05C9.40213 9.15527e-05 0.00012207 9.4021 0.00012207 21C0.00012207 32.5979 9.40213 41.9999 21 41.9999C32.5979 41.9999 41.9999 32.5979 41.9999 21C41.9867 9.40759 32.5924 0.0133667 21 9.15527e-05ZM31.5002 25.4998C31.4961 28.8122 28.8122 31.4961 25.5003 31.4997V32.9998C25.5003 33.8284 24.8283 34.4999 24.0002 34.4999C23.1717 34.4999 22.5001 33.8284 22.5001 32.9998V31.4997H19.5004V32.9998C19.5004 33.8284 18.8284 34.4999 18.0003 34.4999C17.1718 34.4999 16.5002 33.8284 16.5002 32.9998V31.4997H12.0004C11.1718 31.4997 10.5003 30.8282 10.5003 30.0001C10.5003 29.1715 11.1718 28.5 12.0004 28.5H13.5V13.5H12.0004C11.1718 13.5 10.5003 12.8285 10.5003 11.9999C10.5003 11.1714 11.1718 10.4998 12.0004 10.4998H16.5002V9.00018C16.5002 8.17163 17.1718 7.50009 18.0003 7.50009C18.8289 7.50009 19.5004 8.17163 19.5004 9.00018V10.4998H22.5001V9.00018C22.5001 8.17163 23.1717 7.50009 24.0002 7.50009C24.8288 7.50009 25.5003 8.17163 25.5003 9.00018V10.4998C28.7999 10.4861 31.486 13.1494 31.5002 16.4489C31.5075 18.1962 30.7499 19.8593 29.4265 21C30.7376 22.1279 31.4943 23.7699 31.5002 25.4998Z" fill="#FFAB2D"/>
										</svg>
										<span class="text-black fs-16">23,511 LTC</span>
										<i class="fa fa-angle-down text-black scale3 ms-2"></i>
									</div>
									<div class="dropdown-menu dropdown-menu-end">
										<a href="#" class="dropdown-item">345,455 ETH</a>
										<a href="#" class="dropdown-item ">789,123 BTH</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="basic-form">
									<form class="form-wrapper">
										<div class="form-group">
											<div class="input-group input-group-lg">
												<div class="input-group-prepend">
													<span class="input-group-text">Amount BTC</span>
												</div>
												<input type="text" class="form-control" placeholder="52.5">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group input-group-lg">
												<div class="input-group-prepend">
													<span class="input-group-text ">Price BPL</span>
												</div>
												<input type="text" class="form-control" placeholder="0,000000">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group input-group-lg">
												<div class="input-group-prepend">
													<span class="input-group-text">Fee (1%)</span>
												</div>
												<input type="text" class="form-control" placeholder="0,000000">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group input-group-lg">
												<div class="input-group-prepend">
													<span class="input-group-text">Total BPL</span>
												</div>
												<input type="text" class="form-control" placeholder="0,000000">
											</div>
										</div>
										<div class="row mt-4 align-items-center">
											<div class="col-sm-6 mb-3">
												<p class="mb-0 fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
											</div>
											<div class="col-sm-6 text-sm-right text-start">
												<a href="javascript:void(0);" class="btn  btn-success text-white mb-2">
												BUY
													<svg class="ms-4 scale3" width="16" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M16.9638 11.5104L16.9721 14.9391L3.78954 1.7565C3.22815 1.19511 2.31799 1.19511 1.75661 1.7565C1.19522 2.31789 1.19522 3.22805 1.75661 3.78943L14.9392 16.972L11.5105 16.9637L11.5105 16.9637C10.7166 16.9619 10.0715 17.6039 10.0696 18.3978C10.0677 19.1919 10.7099 19.8369 11.5036 19.8388L11.5049 19.3388L11.5036 19.8388L18.3976 19.8554L18.4146 19.8555L18.4159 19.8555C18.418 19.8555 18.42 19.8555 18.422 19.8555C19.2131 19.8533 19.8528 19.2114 19.8555 18.4231C19.8556 18.4196 19.8556 18.4158 19.8556 18.4117L19.8389 11.5035L19.8389 11.5035C19.8369 10.7097 19.1919 10.0676 18.3979 10.0695C17.604 10.0713 16.9619 10.7164 16.9638 11.5103L16.9638 11.5104Z" fill="white" stroke="white"></path>
													</svg>
												</a>
												<a href="javascript:void(0);" class="btn btn-danger ms-4 mb-2">
												SELL
													<svg class="ms-4 scale5" width="16" height="16" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M5.35182 13.4965L5.35182 13.4965L5.33512 6.58823C5.33508 6.5844 5.3351 6.58084 5.33514 6.57759M5.35182 13.4965L5.83514 6.58306L5.33514 6.58221C5.33517 6.56908 5.33572 6.55882 5.33597 6.5545L5.33606 6.55298C5.33585 6.55628 5.33533 6.56514 5.33516 6.57648C5.33515 6.57684 5.33514 6.57721 5.33514 6.57759M5.35182 13.4965C5.35375 14.2903 5.99878 14.9324 6.79278 14.9305C7.58669 14.9287 8.22874 14.2836 8.22686 13.4897L8.22686 13.4896L8.21853 10.0609M5.35182 13.4965L8.21853 10.0609M5.33514 6.57759C5.33752 5.789 5.97736 5.14667 6.76872 5.14454C6.77041 5.14452 6.77217 5.14451 6.77397 5.14451L6.77603 5.1445L6.79319 5.14456L13.687 5.16121L13.6858 5.66121L13.687 5.16121C14.4807 5.16314 15.123 5.80809 15.1211 6.6022C15.1192 7.3961 14.4741 8.03814 13.6802 8.03626L13.6802 8.03626L10.2515 8.02798L23.4341 21.2106C23.9955 21.772 23.9955 22.6821 23.4341 23.2435C22.8727 23.8049 21.9625 23.8049 21.4011 23.2435L8.21853 10.0609M5.33514 6.57759C5.33513 6.57959 5.33514 6.58159 5.33514 6.5836L8.21853 10.0609M6.77407 5.14454C6.77472 5.14454 6.77537 5.14454 6.77603 5.14454L6.77407 5.14454Z" fill="white" stroke="white"></path>
													</svg>
												</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="mb-0 text-black fs-20">Sell Order</h4>
										<div class="dropdown custom-dropdown mb-0 tbl-orders-style">
											<div class="btn sharp tp-btn" data-bs-toggle="dropdown">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</div>
											<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="javascript:void(0);">Details</a>
												<a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
											</div>
										</div>
									</div>
									<div class="card-body p-3">
										<div class="table-responsive">
											<table class="table text-center bg-warning-hover tr-rounded order-tbl">
												<thead>
													<tr>
														<th class="text-start">Price</th>
														<th class="text-center">Amount</th>
														<th class="text-end">Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="text-start">82.3</td>
														<td>0.15</td>
														<td class="text-end">$134,12</td>
													</tr>
													<tr>
														<td class="text-start">83.9</td>
														<td>0.18</td>
														<td class="text-end">$237,31</td>
													</tr>
													<tr>
														<td class="text-start">84.2</td>
														<td>0.25</td>
														<td class="text-end">$252,58</td>
													</tr>
													<tr>
														<td class="text-start">86.2</td>
														<td>0.35</td>
														<td class="text-end">$126,26</td>
													</tr>
													<tr>
														<td class="text-start">91.6</td>
														<td>0.75</td>
														<td class="text-end">$46,92</td>
													</tr>
													<tr>
														<td class="text-start">92.6</td>
														<td>0.21</td>
														<td class="text-end">$123,27</td>
													</tr>
													<tr>
														<td class="text-start">93.9</td>
														<td>0.55</td>
														<td class="text-end">$212,56</td>
													</tr>
													<tr>
														<td class="text-start">94.2</td>
														<td>0.18</td>
														<td class="text-end">$129,26</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="card-footer border-0 p-0 caret">
										<a href="{!! url('/coin-details'); !!}" class="btn-link"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
							<div class="col-sm-6 m-t25">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="mb-0 text-black fs-20">Buy Order</h4>
										<div class="dropdown custom-dropdown mb-0 tbl-orders-style">
											<div class="btn sharp tp-btn" data-bs-toggle="dropdown">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</div>
											<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="javascript:void(0);">Details</a>
												<a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
											</div>
										</div>
									</div>
									<div class="card-body p-3">
										<div class="table-responsive">
											<table class="table text-center bg-warning-hover tr-rounded order-tbl">
												<thead>
													<tr>
														<th class="text-start">Price</th>
														<th class="text-center">Amount</th>
														<th class="text-end">Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="text-start">82.3</td>
														<td>0.15</td>
														<td class="text-end">$134,12</td>
													</tr>
													<tr>
														<td class="text-start">83.9</td>
														<td>0.18</td>
														<td class="text-end">$237,31</td>
													</tr>
													<tr>
														<td class="text-start">84.2</td>
														<td>0.25</td>
														<td class="text-end">$252,58</td>
													</tr>
													<tr>
														<td class="text-start">86.2</td>
														<td>0.35</td>
														<td class="text-end">$126,26</td>
													</tr>
													<tr>
														<td class="text-start">91.6</td>
														<td>0.75</td>
														<td class="text-end">$46,92</td>
													</tr>
													<tr>
														<td class="text-start">92.6</td>
														<td>0.21</td>
														<td class="text-end">$123,27</td>
													</tr>
													<tr>
														<td class="text-start">93.9</td>
														<td>0.55</td>
														<td class="text-end">$212,56</td>
													</tr>
													<tr>
														<td class="text-start">94.2</td>
														<td>0.18</td>
														<td class="text-end">$129,26</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="card-footer border-0 p-0 caret">
										<a href="{!! url('/coin-details'); !!}" class="btn-link"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="Ethereum">
				<div class="row">
					<div class="col-xl-3 col-xxl-4 mt-4">
						<div class="card">
							<div class="card-header pb-0 border-0">
								<h4 class="mb-0 text-black fs-20">About</h4>
								<div class="dropdown custom-dropdown mb-0">
									<div class="btn sharp tp-btn" data-bs-toggle="dropdown">
										<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12.0049 13C12.5572 13 13.0049 12.5523 13.0049 12C13.0049 11.4477 12.5572 11 12.0049 11C11.4526 11 11.0049 11.4477 11.0049 12C11.0049 12.5523 11.4526 13 12.0049 13Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M12.0049 6C12.5572 6 13.0049 5.55228 13.0049 5C13.0049 4.44772 12.5572 4 12.0049 4C11.4526 4 11.0049 4.44772 11.0049 5C11.0049 5.55228 11.4526 6 12.0049 6Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M12.0049 20C12.5572 20 13.0049 19.5523 13.0049 19C13.0049 18.4477 12.5572 18 12.0049 18C11.4526 18 11.0049 18.4477 11.0049 19C11.0049 19.5523 11.4526 20 12.0049 20Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</div>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="javascript:void(0);">Details</a>
										<a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
									</div>
								</div>
							</div>
							<div class="card-body height400 dz-scroll" id="about-2">
								<div class="d-flex align-items-start mb-3 about-coin">
									<div>
										<img src="{{ asset('images/svg/eth2.svg') }}" alt="">
									</div>
									<div class="ms-3">
										<h2 class="font-w600 text-black mb-0 title">Digital Cash</h2>
										<p class="font-w600 text-black sub-title">ETH</p>
										<span>1 ETH = 68.48 USD</span>
									</div>	
								</div>
								<p class="fs-14">Dash is an open source cryptocurrency. It is an altcoin that was forked from the Bitcoin protocol. It is also a decentralized autonomous organization (DAO) run by a subset of its users, which are called "masternodes". The currency permits transactions that can be untraceable.</p>
								<p class="fs-14">Dash is an open source cryptocurrency. It is an altcoin that was forked from the Bitcoin protocol. It is also a decentralized autonomous organization (DAO) run by a subset of its users, which are called "masternodes". The currency permits transactions that can be untraceable.</p>
								<p class="fs-14">Dash is an open source cryptocurrency. It is an altcoin that was forked from the Bitcoin protocol. It is also a decentralized autonomous organization (DAO) run by a subset of its users, which are called "masternodes". The currency permits transactions that can be untraceable.</p>
							</div>
							<div class="card-footer border-0 p-0 caret">
								<a href="{!! url('/coin-details'); !!}" class="btn-link"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-xxl-8 mt-4">
						<div class="card">
							<div class="card-header pb-0 d-block d-sm-flex flex-wrap border-0 align-items-center">
								<div class="me-auto mb-3">
									<h4 class="fs-20 text-black">Coin Chart</h4>
									<p class="mb-0 fs-12">Lorem ipsum dolor sit amet, consectetur</p>
								</div>
								<div class="input-group detault-daterange me-3  mb-3" >
									<span class="input-group-text"><i class="las la-calendar"></i></span>
									<input type="text" class="form-control input-daterange-timepicker" name="daterange" value="04/01/2015 1:30 PM - 01/01/2015 2:00 PM">
								</div>
								<select class="btn-secondary style-1 default-select  mb-3">
									<option>USD ($ US Dollar)</option>
									<option>BTC ($ US Dollar)</option>
									<option>USD ($ US Dollar)</option>
								</select>
							</div>
							<div class="card-body pb-0 pt-sm-3 pt-0">
								<div class="row sp20 mb-4 align-items-center">
									<div class="col-lg-4 col-xxl-4 col-sm-4 d-flex flex-wrap align-items-center">
										<div class="px-2 info-group">
											<p class="fs-18 mb-1">Price</p>
											<h2 class="fs-28 font-w600 text-black">$11,898.15</h2>
										</div>
									</div>
									<div class="d-flex col-lg-8 col-xxl-8 co-sm-8 align-items-center mt-sm-0 mt-3 justify-content-end">
										<div class="px-2 info-group">
											<p class="fs-14 mb-1">24h% change</p>
											<h3 class="fs-20 font-w600"><span class="text-success">1.64%</span>
											<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M0 7L7.00001 -8.77983e-06L14 7H7.00001H0Z" fill="#2BC155"></path>
											</svg>
											</h3>
										</div>
										<div class="px-2 info-group">
											<p class="fs-14 mb-1">Volume (24h)</p>
											<h3 class="fs-20 font-w600 text-black">$47.22B</h3>
										</div>
										<div class="px-2 info-group">
											<p class="fs-14 mb-1">Market Cap</p>
											<h3 class="fs-20 font-w600 text-black">$219.24B</h3>
										</div>
									</div>
								</div>
								<div id="chartBarRunning1" class="bar-chart"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-12">
						<div class="card">
							<div class="card-header d-sm-flex d-block pb-0 border-0">
								<div>
									<h4 class="fs-20 text-black">Quick Trade</h4>
									<p class="mb-0 fs-12">Lorem ipsum dolor sit amet, consectetur</p>
								</div>
								<div class="dropdown custom-dropdown d-block mt-3 mt-sm-0 mb-0">
									<div class="btn btn-light d-flex align-items-center svg-btn" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										<svg class="me-2" width="25" height="25" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M28.5 16.5002C28.4986 14.844 27.156 13.5018 25.5003 13.5H16.5002V19.4999H25.5003C27.156 19.4985 28.4986 18.1559 28.5 16.5002Z" fill="#FFAB2D"/>
											<path d="M16.5002 28.5H25.5003C27.1569 28.5 28.5 27.1569 28.5 25.5003C28.5 23.8432 27.1569 22.5001 25.5003 22.5001H16.5002V28.5Z" fill="#FFAB2D"/>
											<path d="M21 9.15527e-05C9.40213 9.15527e-05 0.00012207 9.4021 0.00012207 21C0.00012207 32.5979 9.40213 41.9999 21 41.9999C32.5979 41.9999 41.9999 32.5979 41.9999 21C41.9867 9.40759 32.5924 0.0133667 21 9.15527e-05ZM31.5002 25.4998C31.4961 28.8122 28.8122 31.4961 25.5003 31.4997V32.9998C25.5003 33.8284 24.8283 34.4999 24.0002 34.4999C23.1717 34.4999 22.5001 33.8284 22.5001 32.9998V31.4997H19.5004V32.9998C19.5004 33.8284 18.8284 34.4999 18.0003 34.4999C17.1718 34.4999 16.5002 33.8284 16.5002 32.9998V31.4997H12.0004C11.1718 31.4997 10.5003 30.8282 10.5003 30.0001C10.5003 29.1715 11.1718 28.5 12.0004 28.5H13.5V13.5H12.0004C11.1718 13.5 10.5003 12.8285 10.5003 11.9999C10.5003 11.1714 11.1718 10.4998 12.0004 10.4998H16.5002V9.00018C16.5002 8.17163 17.1718 7.50009 18.0003 7.50009C18.8289 7.50009 19.5004 8.17163 19.5004 9.00018V10.4998H22.5001V9.00018C22.5001 8.17163 23.1717 7.50009 24.0002 7.50009C24.8288 7.50009 25.5003 8.17163 25.5003 9.00018V10.4998C28.7999 10.4861 31.486 13.1494 31.5002 16.4489C31.5075 18.1962 30.7499 19.8593 29.4265 21C30.7376 22.1279 31.4943 23.7699 31.5002 25.4998Z" fill="#FFAB2D"/>
										</svg>
										<span class="text-black fs-16">23,511 LTC</span>
										<i class="fa fa-angle-down text-black scale3 ms-2"></i>
									</div>
									<div class="dropdown-menu dropdown-menu-end">
										<a href="#" class="dropdown-item">345,455 ETH</a>
										<a href="#" class="dropdown-item ">789,123 BTH</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="basic-form">
									<form class="form-wrapper">
										<div class="form-group">
											<div class="input-group input-group-lg">
												<div class="input-group-prepend">
													<span class="input-group-text">Amount BTC</span>
												</div>
												<input type="text" class="form-control" placeholder="52.5">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group input-group-lg">
												<div class="input-group-prepend">
													<span class="input-group-text ">Price BPL</span>
												</div>
												<input type="text" class="form-control" placeholder="0,000000">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group input-group-lg">
												<div class="input-group-prepend">
													<span class="input-group-text">Fee (1%)</span>
												</div>
												<input type="text" class="form-control" placeholder="0,000000">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group input-group-lg">
												<div class="input-group-prepend">
													<span class="input-group-text">Total BPL</span>
												</div>
												<input type="text" class="form-control" placeholder="0,000000">
											</div>
										</div>
										<div class="row mt-4 align-items-center">
											<div class="col-sm-6 mb-2">
												<div>
													<p class="mb-0 fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
												</div>
											</div>
											<div class="col-sm-6 text-sm-right text-start">
												<a href="javascript:void(0);" class="btn  btn-success text-white mb-2">
												BUY
													<svg class="ms-4 scale3" width="16" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M16.9638 11.5104L16.9721 14.9391L3.78954 1.7565C3.22815 1.19511 2.31799 1.19511 1.75661 1.7565C1.19522 2.31789 1.19522 3.22805 1.75661 3.78943L14.9392 16.972L11.5105 16.9637L11.5105 16.9637C10.7166 16.9619 10.0715 17.6039 10.0696 18.3978C10.0677 19.1919 10.7099 19.8369 11.5036 19.8388L11.5049 19.3388L11.5036 19.8388L18.3976 19.8554L18.4146 19.8555L18.4159 19.8555C18.418 19.8555 18.42 19.8555 18.422 19.8555C19.2131 19.8533 19.8528 19.2114 19.8555 18.4231C19.8556 18.4196 19.8556 18.4158 19.8556 18.4117L19.8389 11.5035L19.8389 11.5035C19.8369 10.7097 19.1919 10.0676 18.3979 10.0695C17.604 10.0713 16.9619 10.7164 16.9638 11.5103L16.9638 11.5104Z" fill="white" stroke="white"></path>
													</svg>
												</a>
												<a href="javascript:void(0);" class="btn btn-danger ms-4 mb-2">
												SELL
													<svg class="ms-4 scale5" width="16" height="16" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M5.35182 13.4965L5.35182 13.4965L5.33512 6.58823C5.33508 6.5844 5.3351 6.58084 5.33514 6.57759M5.35182 13.4965L5.83514 6.58306L5.33514 6.58221C5.33517 6.56908 5.33572 6.55882 5.33597 6.5545L5.33606 6.55298C5.33585 6.55628 5.33533 6.56514 5.33516 6.57648C5.33515 6.57684 5.33514 6.57721 5.33514 6.57759M5.35182 13.4965C5.35375 14.2903 5.99878 14.9324 6.79278 14.9305C7.58669 14.9287 8.22874 14.2836 8.22686 13.4897L8.22686 13.4896L8.21853 10.0609M5.35182 13.4965L8.21853 10.0609M5.33514 6.57759C5.33752 5.789 5.97736 5.14667 6.76872 5.14454C6.77041 5.14452 6.77217 5.14451 6.77397 5.14451L6.77603 5.1445L6.79319 5.14456L13.687 5.16121L13.6858 5.66121L13.687 5.16121C14.4807 5.16314 15.123 5.80809 15.1211 6.6022C15.1192 7.3961 14.4741 8.03814 13.6802 8.03626L13.6802 8.03626L10.2515 8.02798L23.4341 21.2106C23.9955 21.772 23.9955 22.6821 23.4341 23.2435C22.8727 23.8049 21.9625 23.8049 21.4011 23.2435L8.21853 10.0609M5.33514 6.57759C5.33513 6.57959 5.33514 6.58159 5.33514 6.5836L8.21853 10.0609M6.77407 5.14454C6.77472 5.14454 6.77537 5.14454 6.77603 5.14454L6.77407 5.14454Z" fill="white" stroke="white"></path>
													</svg>
												</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="mb-0 text-black fs-20">Sell Order</h4>
										<div class="dropdown custom-dropdown mb-0 tbl-orders-style">
											<div class="btn sharp tp-btn" data-bs-toggle="dropdown">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</div>
											<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="javascript:void(0);">Details</a>
												<a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
											</div>
										</div>
									</div>
									<div class="card-body p-3">
										<div class="table-responsive">
											<table class="table text-center bg-success-hover tr-rounded order-tbl">
												<thead>
													<tr>
														<th class="text-start">Price</th>
														<th class="text-center">Amount</th>
														<th class="text-end">Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="text-start">82.3</td>
														<td>0.15</td>
														<td class="text-end">$134,12</td>
													</tr>
													<tr>
														<td class="text-start">83.9</td>
														<td>0.18</td>
														<td class="text-end">$237,31</td>
													</tr>
													<tr>
														<td class="text-start">84.2</td>
														<td>0.25</td>
														<td class="text-end">$252,58</td>
													</tr>
													<tr>
														<td class="text-start">86.2</td>
														<td>0.35</td>
														<td class="text-end">$126,26</td>
													</tr>
													<tr>
														<td class="text-start">91.6</td>
														<td>0.75</td>
														<td class="text-end">$46,92</td>
													</tr>
													<tr>
														<td class="text-start">92.6</td>
														<td>0.21</td>
														<td class="text-end">$123,27</td>
													</tr>
													<tr>
														<td class="text-start">93.9</td>
														<td>0.55</td>
														<td class="text-end">$212,56</td>
													</tr>
													<tr>
														<td class="text-start">94.2</td>
														<td>0.18</td>
														<td class="text-end">$129,26</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="card-footer border-0 p-0 caret">
										<a href="{!! url('/coin-details'); !!}" class="btn-link"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
							<div class="col-sm-6 m-t25">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="mb-0 text-black fs-20">Buy Order</h4>
										<div class="dropdown custom-dropdown mb-0 tbl-orders-style">
											<div class="btn sharp tp-btn" data-bs-toggle="dropdown">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</div>
											<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="javascript:void(0);">Details</a>
												<a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
											</div>
										</div>
									</div>
									<div class="card-body p-3">
										<div class="table-responsive">
											<table class="table text-center bg-success-hover tr-rounded order-tbl">
												<thead>
													<tr>
														<th class="text-start">Price</th>
														<th class="text-center">Amount</th>
														<th class="text-end">Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="text-start">82.3</td>
														<td>0.15</td>
														<td class="text-end">$134,12</td>
													</tr>
													<tr>
														<td class="text-start">83.9</td>
														<td>0.18</td>
														<td class="text-end">$237,31</td>
													</tr>
													<tr>
														<td class="text-start">84.2</td>
														<td>0.25</td>
														<td class="text-end">$252,58</td>
													</tr>
													<tr>
														<td class="text-start">86.2</td>
														<td>0.35</td>
														<td class="text-end">$126,26</td>
													</tr>
													<tr>
														<td class="text-start">91.6</td>
														<td>0.75</td>
														<td class="text-end">$46,92</td>
													</tr>
													<tr>
														<td class="text-start">92.6</td>
														<td>0.21</td>
														<td class="text-end">$123,27</td>
													</tr>
													<tr>
														<td class="text-start">93.9</td>
														<td>0.55</td>
														<td class="text-end">$212,56</td>
													</tr>
													<tr>
														<td class="text-start">94.2</td>
														<td>0.18</td>
														<td class="text-end">$129,26</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="card-footer border-0 p-0 caret">
										<a href="{!! url('/coin-details'); !!}" class="btn-link"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade show active" id="Monero">
				<div class="row">
					<div class="col-xl-3 col-xxl-4 mt-4">
						<div class="card">
							<div class="card-header pb-0 border-0">
								<h4 class="mb-0 text-black fs-20">About</h4>
								<div class="dropdown custom-dropdown mb-0">
									<div class="btn sharp tp-btn" data-bs-toggle="dropdown">
										<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12.0049 13C12.5572 13 13.0049 12.5523 13.0049 12C13.0049 11.4477 12.5572 11 12.0049 11C11.4526 11 11.0049 11.4477 11.0049 12C11.0049 12.5523 11.4526 13 12.0049 13Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M12.0049 6C12.5572 6 13.0049 5.55228 13.0049 5C13.0049 4.44772 12.5572 4 12.0049 4C11.4526 4 11.0049 4.44772 11.0049 5C11.0049 5.55228 11.4526 6 12.0049 6Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M12.0049 20C12.5572 20 13.0049 19.5523 13.0049 19C13.0049 18.4477 12.5572 18 12.0049 18C11.4526 18 11.0049 18.4477 11.0049 19C11.0049 19.5523 11.4526 20 12.0049 20Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</div>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="javascript:void(0);">Details</a>
										<a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
									</div>
								</div>
							</div>
							<div class="card-body height400 dz-scroll" id="about-3">
								<div class="d-flex align-items-start mb-3 about-coin">
									<div>
										<img src="{{ asset('images/svg/monero.svg') }}" alt="">
									</div>
									<div class="ms-3">
										<h2 class="font-w600 text-black mb-0 title">Digital Cash</h2>
										<p class="font-w600 text-black sub-title">XMR</p>
										<span>1 XMR = 68.48 USD</span>
									</div>	
								</div>
								<p class="fs-14">Dash is an open source cryptocurrency. It is an altcoin that was forked from the Bitcoin protocol. It is also a decentralized autonomous organization (DAO) run by a subset of its users, which are called "masternodes". The currency permits transactions that can be untraceable.</p>
								<p class="fs-14">Dash is an open source cryptocurrency. It is an altcoin that was forked from the Bitcoin protocol. It is also a decentralized autonomous organization (DAO) run by a subset of its users, which are called "masternodes". The currency permits transactions that can be untraceable.</p>
								<p class="fs-14">Dash is an open source cryptocurrency. It is an altcoin that was forked from the Bitcoin protocol. It is also a decentralized autonomous organization (DAO) run by a subset of its users, which are called "masternodes". The currency permits transactions that can be untraceable.</p>
							</div>
							<div class="card-footer border-0 p-0 caret">
								<a href="{!! url('/coin-details'); !!}" class="btn-link"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-xxl-8 mt-4">
						<div class="card">
							<div class="card-header pb-0 d-block d-sm-flex flex-wrap border-0 align-items-center">
								<div class="me-auto mb-3">
									<h4 class="fs-20 text-black">Coin Chart</h4>
									<p class="mb-0 fs-12">Lorem ipsum dolor sit amet, consectetur</p>
								</div>
								
								<div class="input-group detault-daterange me-3  mb-3" >
									<span class="input-group-text"><i class="las la-calendar"></i></span>
									<input type="text" class="form-control input-daterange-timepicker" name="daterange" value="04/01/2015 1:30 PM - 01/01/2015 2:00 PM">
								</div>
								<select class="btn-secondary style-1 default-select  mb-3">
									<option>USD ($ US Dollar)</option>
									<option>BTC ($ US Dollar)</option>
									<option>USD ($ US Dollar)</option>
								</select>
							</div>
							<div class="card-body pb-0 pt-sm-3 pt-0">
								<div class="row sp20 mb-4 align-items-center">
									<div class="col-lg-4 col-xxl-4 col-sm-4 d-flex flex-wrap align-items-center">
										<div class="px-2 info-group">
											<p class="fs-18 mb-1">Price</p>
											<h2 class="fs-28 font-w600 text-black">$11,898.15</h2>
										</div>
									</div>
									<div class="d-flex col-lg-8 col-xxl-8 col-sm-8 align-items-center mt-sm-0 mt-3 justify-content-end">
										<div class="px-2 info-group">
											<p class="fs-14 mb-1">24h% change</p>
											<h3 class="fs-20 font-w600"><span class="text-success">1.64%</span>
											<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M0 7L7.00001 -8.77983e-06L14 7H7.00001H0Z" fill="#2BC155"></path>
											</svg>
											</h3>
										</div>
										<div class="px-2 info-group">
											<p class="fs-14 mb-1">Volume (24h)</p>
											<h3 class="fs-20 font-w600 text-black">$47.22B</h3>
										</div>
										<div class="px-2 info-group">
											<p class="fs-14 mb-1">Market Cap</p>
											<h3 class="fs-20 font-w600 text-black">$219.24B</h3>
										</div>
									</div>
								</div>
								<div id="chartBarRunning2" class="bar-chart"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-12">
						<div class="card">
							<div class="card-header d-sm-flex d-block pb-0 border-0">
								<div>
									<h4 class="fs-20 text-black">Quick Trade</h4>
									<p class="mb-0 fs-12">Lorem ipsum dolor sit amet, consectetur</p>
								</div>
								<div class="dropdown custom-dropdown d-block mt-3 mt-sm-0 mb-0">
									<div class="btn btn-light d-flex align-items-center svg-btn" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										<svg class="me-2" width="25" height="25" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M28.5 16.5002C28.4986 14.844 27.156 13.5018 25.5003 13.5H16.5002V19.4999H25.5003C27.156 19.4985 28.4986 18.1559 28.5 16.5002Z" fill="#FFAB2D"/>
											<path d="M16.5002 28.5H25.5003C27.1569 28.5 28.5 27.1569 28.5 25.5003C28.5 23.8432 27.1569 22.5001 25.5003 22.5001H16.5002V28.5Z" fill="#FFAB2D"/>
											<path d="M21 9.15527e-05C9.40213 9.15527e-05 0.00012207 9.4021 0.00012207 21C0.00012207 32.5979 9.40213 41.9999 21 41.9999C32.5979 41.9999 41.9999 32.5979 41.9999 21C41.9867 9.40759 32.5924 0.0133667 21 9.15527e-05ZM31.5002 25.4998C31.4961 28.8122 28.8122 31.4961 25.5003 31.4997V32.9998C25.5003 33.8284 24.8283 34.4999 24.0002 34.4999C23.1717 34.4999 22.5001 33.8284 22.5001 32.9998V31.4997H19.5004V32.9998C19.5004 33.8284 18.8284 34.4999 18.0003 34.4999C17.1718 34.4999 16.5002 33.8284 16.5002 32.9998V31.4997H12.0004C11.1718 31.4997 10.5003 30.8282 10.5003 30.0001C10.5003 29.1715 11.1718 28.5 12.0004 28.5H13.5V13.5H12.0004C11.1718 13.5 10.5003 12.8285 10.5003 11.9999C10.5003 11.1714 11.1718 10.4998 12.0004 10.4998H16.5002V9.00018C16.5002 8.17163 17.1718 7.50009 18.0003 7.50009C18.8289 7.50009 19.5004 8.17163 19.5004 9.00018V10.4998H22.5001V9.00018C22.5001 8.17163 23.1717 7.50009 24.0002 7.50009C24.8288 7.50009 25.5003 8.17163 25.5003 9.00018V10.4998C28.7999 10.4861 31.486 13.1494 31.5002 16.4489C31.5075 18.1962 30.7499 19.8593 29.4265 21C30.7376 22.1279 31.4943 23.7699 31.5002 25.4998Z" fill="#FFAB2D"/>
										</svg>
										<span class="text-black fs-16">23,511 LTC</span>
										<i class="fa fa-angle-down text-black scale3 ms-2"></i>
									</div>
									<div class="dropdown-menu dropdown-menu-end">
										<a href="#" class="dropdown-item">345,455 ETH</a>
										<a href="#" class="dropdown-item ">789,123 BTH</a>
									</div>
								</div>
							</div>
							<div class="card-body">	
								<div class="basic-form">
									<form class="form-wrapper">
										<div class="form-group">
											<div class="input-group input-group-lg">
												<div class="input-group-prepend">
													<span class="input-group-text">Amount BTC</span>
												</div>
												<input type="text" class="form-control" placeholder="52.5">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group input-group-lg">
												<div class="input-group-prepend">
													<span class="input-group-text ">Price BPL</span>
												</div>
												<input type="text" class="form-control" placeholder="0,000000">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group input-group-lg">
												<div class="input-group-prepend">
													<span class="input-group-text">Fee (1%)</span>
												</div>
												<input type="text" class="form-control" placeholder="0,000000">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group input-group-lg">
												<div class="input-group-prepend">
													<span class="input-group-text">Total BPL</span>
												</div>
												<input type="text" class="form-control" placeholder="0,000000">
											</div>
										</div>
										<div class="row mt-4 align-items-center">
											<div class="col-sm-6 mb-2">
												<div>
													<p class="mb-0 fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
												</div>
											</div>
											<div class="col-sm-6 text-sm-right text-start">
												<a href="javascript:void(0);" class="btn  btn-success text-white mb-2">
												BUY
													<svg class="ms-4 scale3" width="16" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M16.9638 11.5104L16.9721 14.9391L3.78954 1.7565C3.22815 1.19511 2.31799 1.19511 1.75661 1.7565C1.19522 2.31789 1.19522 3.22805 1.75661 3.78943L14.9392 16.972L11.5105 16.9637L11.5105 16.9637C10.7166 16.9619 10.0715 17.6039 10.0696 18.3978C10.0677 19.1919 10.7099 19.8369 11.5036 19.8388L11.5049 19.3388L11.5036 19.8388L18.3976 19.8554L18.4146 19.8555L18.4159 19.8555C18.418 19.8555 18.42 19.8555 18.422 19.8555C19.2131 19.8533 19.8528 19.2114 19.8555 18.4231C19.8556 18.4196 19.8556 18.4158 19.8556 18.4117L19.8389 11.5035L19.8389 11.5035C19.8369 10.7097 19.1919 10.0676 18.3979 10.0695C17.604 10.0713 16.9619 10.7164 16.9638 11.5103L16.9638 11.5104Z" fill="white" stroke="white"></path>
													</svg>
												</a>
												<a href="javascript:void(0);" class="btn btn-danger ms-4 mb-2">
												SELL
													<svg class="ms-4 scale5" width="16" height="16" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M5.35182 13.4965L5.35182 13.4965L5.33512 6.58823C5.33508 6.5844 5.3351 6.58084 5.33514 6.57759M5.35182 13.4965L5.83514 6.58306L5.33514 6.58221C5.33517 6.56908 5.33572 6.55882 5.33597 6.5545L5.33606 6.55298C5.33585 6.55628 5.33533 6.56514 5.33516 6.57648C5.33515 6.57684 5.33514 6.57721 5.33514 6.57759M5.35182 13.4965C5.35375 14.2903 5.99878 14.9324 6.79278 14.9305C7.58669 14.9287 8.22874 14.2836 8.22686 13.4897L8.22686 13.4896L8.21853 10.0609M5.35182 13.4965L8.21853 10.0609M5.33514 6.57759C5.33752 5.789 5.97736 5.14667 6.76872 5.14454C6.77041 5.14452 6.77217 5.14451 6.77397 5.14451L6.77603 5.1445L6.79319 5.14456L13.687 5.16121L13.6858 5.66121L13.687 5.16121C14.4807 5.16314 15.123 5.80809 15.1211 6.6022C15.1192 7.3961 14.4741 8.03814 13.6802 8.03626L13.6802 8.03626L10.2515 8.02798L23.4341 21.2106C23.9955 21.772 23.9955 22.6821 23.4341 23.2435C22.8727 23.8049 21.9625 23.8049 21.4011 23.2435L8.21853 10.0609M5.33514 6.57759C5.33513 6.57959 5.33514 6.58159 5.33514 6.5836L8.21853 10.0609M6.77407 5.14454C6.77472 5.14454 6.77537 5.14454 6.77603 5.14454L6.77407 5.14454Z" fill="white" stroke="white"></path>
													</svg>
												</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="mb-0 text-black fs-20">Sell Order</h4>
										<div class="dropdown custom-dropdown mb-0 tbl-orders-style">
											<div class="btn sharp tp-btn" data-bs-toggle="dropdown">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
											</div>
											<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="javascript:void(0);">Details</a>
												<a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
											</div>
										</div>
									</div>
									<div class="card-body p-3">
										<div class="table-responsive">
											<table class="table text-center bg-danger-hover tr-rounded order-tbl">
												<thead>
													<tr>
														<th class="text-start">Price</th>
														<th class="text-center">Amount</th>
														<th class="text-end">Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="text-start">82.3</td>
														<td>0.15</td>
														<td class="text-end">$134,12</td>
													</tr>
													<tr>
														<td class="text-start">83.9</td>
														<td>0.18</td>
														<td class="text-end">$237,31</td>
													</tr>
													<tr>
														<td class="text-start">84.2</td>
														<td>0.25</td>
														<td class="text-end">$252,58</td>
													</tr>
													<tr>
														<td class="text-start">86.2</td>
														<td>0.35</td>
														<td class="text-end">$126,26</td>
													</tr>
													<tr>
														<td class="text-start">91.6</td>
														<td>0.75</td>
														<td class="text-end">$46,92</td>
													</tr>
													<tr>
														<td class="text-start">92.6</td>
														<td>0.21</td>
														<td class="text-end">$123,27</td>
													</tr>
													<tr>
														<td class="text-start">93.9</td>
														<td>0.55</td>
														<td class="text-end">$212,56</td>
													</tr>
													<tr>
														<td class="text-start">94.2</td>
														<td>0.18</td>
														<td class="text-end">$129,26</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="card-footer border-0 p-0 caret">
										<a href="{!! url('/coin-details'); !!}" class="btn-link"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
							<div class="col-sm-6 m-t25">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="mb-0 text-black fs-20">Buy Order</h4>
										<div class="dropdown custom-dropdown mb-0 tbl-orders-style">
											<div class="btn sharp tp-btn" data-bs-toggle="dropdown">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</div>
											<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="javascript:void(0);">Details</a>
												<a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
											</div>
										</div>
									</div>
									<div class="card-body p-3">
										<div class="table-responsive">
											<table class="table text-center bg-danger-hover tr-rounded order-tbl">
												<thead>
													<tr>
														<th class="text-start">Price</th>
														<th class="text-center">Amount</th>
														<th class="text-end">Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="text-start">82.3</td>
														<td>0.15</td>
														<td class="text-end">$134,12</td>
													</tr>
													<tr>
														<td class="text-start">83.9</td>
														<td>0.18</td>
														<td class="text-end">$237,31</td>
													</tr>
													<tr>
														<td class="text-start">84.2</td>
														<td>0.25</td>
														<td class="text-end">$252,58</td>
													</tr>
													<tr>
														<td class="text-start">86.2</td>
														<td>0.35</td>
														<td class="text-end">$126,26</td>
													</tr>
													<tr>
														<td class="text-start">91.6</td>
														<td>0.75</td>
														<td class="text-end">$46,92</td>
													</tr>
													<tr>
														<td class="text-start">92.6</td>
														<td>0.21</td>
														<td class="text-end">$123,27</td>
													</tr>
													<tr>
														<td class="text-start">93.9</td>
														<td>0.55</td>
														<td class="text-end">$212,56</td>
													</tr>
													<tr>
														<td class="text-start">94.2</td>
														<td>0.18</td>
														<td class="text-end">$129,26</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="card-footer border-0 p-0 caret">
										<a href="{!! url('/coin-details'); !!}" class="btn-link"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="Litecoin">
				<div class="row">
					<div class="col-xl-3 col-xxl-4 mt-4">
						<div class="card">
							<div class="card-header pb-0 border-0">
								<h4 class="mb-0 text-black fs-20">About</h4>
								<div class="dropdown custom-dropdown mb-0">
									<div class="btn sharp tp-btn" data-bs-toggle="dropdown">
										<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12.0049 13C12.5572 13 13.0049 12.5523 13.0049 12C13.0049 11.4477 12.5572 11 12.0049 11C11.4526 11 11.0049 11.4477 11.0049 12C11.0049 12.5523 11.4526 13 12.0049 13Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M12.0049 6C12.5572 6 13.0049 5.55228 13.0049 5C13.0049 4.44772 12.5572 4 12.0049 4C11.4526 4 11.0049 4.44772 11.0049 5C11.0049 5.55228 11.4526 6 12.0049 6Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M12.0049 20C12.5572 20 13.0049 19.5523 13.0049 19C13.0049 18.4477 12.5572 18 12.0049 18C11.4526 18 11.0049 18.4477 11.0049 19C11.0049 19.5523 11.4526 20 12.0049 20Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</div>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="javascript:void(0);">Details</a>
										<a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
									</div>
								</div>
							</div>
							<div class="card-body height400 dz-scroll" id="about-4">
								<div class="d-flex align-items-start mb-3 about-coin">
									<div>
										<img src="{{ asset('images/svg/lit3.svg') }}" alt="">
									</div>
									<div class="ms-3">
										<h2 class="font-w600 text-black mb-0 title">Digital Cash</h2>
										<p class="font-w600 text-black sub-title">LTC</p>
										<span>1 LTC = 68.48 USD</span>
									</div>	
								</div>
								<p class="fs-14">Dash is an open source cryptocurrency. It is an altcoin that was forked from the Bitcoin protocol. It is also a decentralized autonomous organization (DAO) run by a subset of its users, which are called "masternodes". The currency permits transactions that can be untraceable.</p>
								<p class="fs-14">Dash is an open source cryptocurrency. It is an altcoin that was forked from the Bitcoin protocol. It is also a decentralized autonomous organization (DAO) run by a subset of its users, which are called "masternodes". The currency permits transactions that can be untraceable.</p>
								<p class="fs-14">Dash is an open source cryptocurrency. It is an altcoin that was forked from the Bitcoin protocol. It is also a decentralized autonomous organization (DAO) run by a subset of its users, which are called "masternodes". The currency permits transactions that can be untraceable.</p>
							</div>
							<div class="card-footer border-0 p-0 caret">
								<a href="{!! url('/coin-details'); !!}" class="btn-link"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-xxl-8 mt-4">
						<div class="card">
							<div class="card-header pb-0 d-block d-sm-flex flex-wrap border-0 align-items-center">
								<div class="me-auto mb-3">
									<h4 class="fs-20 text-black">Coin Chart</h4>
									<p class="mb-0 fs-12">Lorem ipsum dolor sit amet, consectetur</p>
								</div>
								
								<div class="input-group detault-daterange me-3  mb-3" >
									<span class="input-group-text"><i class="las la-calendar"></i></span>
									<input type="text" class="form-control input-daterange-timepicker" name="daterange" value="04/01/2015 1:30 PM - 01/01/2015 2:00 PM">
								</div>
								<select class="btn-secondary style-1 default-select  mb-3">
									<option>USD ($ US Dollar)</option>
									<option>BTC ($ US Dollar)</option>
									<option>USD ($ US Dollar)</option>
								</select>
							</div>
							<div class="card-body pb-0 pt-sm-3 pt-0">
								<div class="row sp20 mb-4 align-items-center">
									<div class="col-lg-4 col-xxl-4 col-sm-4 d-flex flex-wrap align-items-center">
										<div class="px-2 info-group">
											<p class="fs-18 mb-1">Price</p>
											<h2 class="fs-28 font-w600 text-black">$11,898.15</h2>
										</div>
									</div>
									<div class="d-flex col-lg-8 col-xxl-8 col-sm-8 align-items-center mt-sm-0 mt-3 justify-content-end">
										<div class="px-2 info-group">
											<p class="fs-14 mb-1">24h% change</p>
											<h3 class="fs-20 font-w600"><span class="text-success">1.64%</span>
											<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M0 7L7.00001 -8.77983e-06L14 7H7.00001H0Z" fill="#2BC155"></path>
											</svg>
											</h3>
										</div>
										<div class="px-2 info-group">
											<p class="fs-14 mb-1">Volume (24h)</p>
											<h3 class="fs-20 font-w600 text-black">$47.22B</h3>
										</div>
										<div class="px-2 info-group">
											<p class="fs-14 mb-1">Market Cap</p>
											<h3 class="fs-20 font-w600 text-black">$219.24B</h3>
										</div>
									</div>
								</div>
								<div id="chartBarRunning3" class="bar-chart"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-12">
						<div class="card">
							<div class="card-header d-sm-flex d-block pb-0 border-0">
								<div>
									<h4 class="fs-20 text-black">Quick Trade</h4>
									<p class="mb-0 fs-12">Lorem ipsum dolor sit amet, consectetur</p>
								</div>
								<select class="form-control custom-image-select image-select mt-3 mt-sm-0">
									<option data-thumbnail="{{ asset('images/svg/ltc.svg') }}">Yearly (2021)</option>
									<option data-thumbnail="{{ asset('images/svg/eth.svg') }}">Weekly (2021)</option>
									<option data-thumbnail="{{ asset('images/svg/btc.svg') }}">Daily (2021)</option>
								</select>
							</div>
							<div class="card-body">
								<div class="basic-form">
									<form class="form-wrapper">
										<div class="form-group">
											<div class="input-group input-group-lg">
												<div class="input-group-prepend">
													<span class="input-group-text">Amount BTC</span>
												</div>
												<input type="text" class="form-control" placeholder="52.5">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group input-group-lg">
												<div class="input-group-prepend">
													<span class="input-group-text ">Price BPL</span>
												</div>
												<input type="text" class="form-control" placeholder="0,000000">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group input-group-lg">
												<div class="input-group-prepend">
													<span class="input-group-text">Fee (1%)</span>
												</div>
												<input type="text" class="form-control" placeholder="0,000000">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group input-group-lg">
												<div class="input-group-prepend">
													<span class="input-group-text">Total BPL</span>
												</div>
												<input type="text" class="form-control" placeholder="0,000000">
											</div>
										</div>
										<div class="row mt-4 align-items-center">
											<div class="col-lg-6">
												<div>
													<p class="mb-0 fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="d-flex justify-content-end">
													<a href="javascript:void(0);" class="btn  btn-success text-white">
													BUY
														<svg class="ms-4 scale3" width="16" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M16.9638 11.5104L16.9721 14.9391L3.78954 1.7565C3.22815 1.19511 2.31799 1.19511 1.75661 1.7565C1.19522 2.31789 1.19522 3.22805 1.75661 3.78943L14.9392 16.972L11.5105 16.9637L11.5105 16.9637C10.7166 16.9619 10.0715 17.6039 10.0696 18.3978C10.0677 19.1919 10.7099 19.8369 11.5036 19.8388L11.5049 19.3388L11.5036 19.8388L18.3976 19.8554L18.4146 19.8555L18.4159 19.8555C18.418 19.8555 18.42 19.8555 18.422 19.8555C19.2131 19.8533 19.8528 19.2114 19.8555 18.4231C19.8556 18.4196 19.8556 18.4158 19.8556 18.4117L19.8389 11.5035L19.8389 11.5035C19.8369 10.7097 19.1919 10.0676 18.3979 10.0695C17.604 10.0713 16.9619 10.7164 16.9638 11.5103L16.9638 11.5104Z" fill="white" stroke="white"></path>
														</svg>
													</a>
													<a href="javascript:void(0);" class="btn btn-danger ms-3">
													SELL
														<svg class="ms-4 scale5" width="16" height="16" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M5.35182 13.4965L5.35182 13.4965L5.33512 6.58823C5.33508 6.5844 5.3351 6.58084 5.33514 6.57759M5.35182 13.4965L5.83514 6.58306L5.33514 6.58221C5.33517 6.56908 5.33572 6.55882 5.33597 6.5545L5.33606 6.55298C5.33585 6.55628 5.33533 6.56514 5.33516 6.57648C5.33515 6.57684 5.33514 6.57721 5.33514 6.57759M5.35182 13.4965C5.35375 14.2903 5.99878 14.9324 6.79278 14.9305C7.58669 14.9287 8.22874 14.2836 8.22686 13.4897L8.22686 13.4896L8.21853 10.0609M5.35182 13.4965L8.21853 10.0609M5.33514 6.57759C5.33752 5.789 5.97736 5.14667 6.76872 5.14454C6.77041 5.14452 6.77217 5.14451 6.77397 5.14451L6.77603 5.1445L6.79319 5.14456L13.687 5.16121L13.6858 5.66121L13.687 5.16121C14.4807 5.16314 15.123 5.80809 15.1211 6.6022C15.1192 7.3961 14.4741 8.03814 13.6802 8.03626L13.6802 8.03626L10.2515 8.02798L23.4341 21.2106C23.9955 21.772 23.9955 22.6821 23.4341 23.2435C22.8727 23.8049 21.9625 23.8049 21.4011 23.2435L8.21853 10.0609M5.33514 6.57759C5.33513 6.57959 5.33514 6.58159 5.33514 6.5836L8.21853 10.0609M6.77407 5.14454C6.77472 5.14454 6.77537 5.14454 6.77603 5.14454L6.77407 5.14454Z" fill="white" stroke="white"></path>
														</svg>
													</a>
												</div>	
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="mb-0 text-black fs-20">Sell Order</h4>
										<div class="dropdown custom-dropdown mb-0 tbl-orders-style">
											<div class="btn sharp tp-btn" data-bs-toggle="dropdown">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</div>
											<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="javascript:void(0);">Details</a>
												<a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
											</div>
										</div>
									</div>
									<div class="card-body p-3">
										<div class="table-responsive">
											<table class="table text-center bg-info-hover tr-rounded order-tbl">
												<thead>
													<tr>
														<th class="text-start">Price</th>
														<th class="text-center">Amount</th>
														<th class="text-end">Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="text-start">82.3</td>
														<td>0.15</td>
														<td class="text-end">$134,12</td>
													</tr>
													<tr>
														<td class="text-start">83.9</td>
														<td>0.18</td>
														<td class="text-end">$237,31</td>
													</tr>
													<tr>
														<td class="text-start">84.2</td>
														<td>0.25</td>
														<td class="text-end">$252,58</td>
													</tr>
													<tr>
														<td class="text-start">86.2</td>
														<td>0.35</td>
														<td class="text-end">$126,26</td>
													</tr>
													<tr>
														<td class="text-start">91.6</td>
														<td>0.75</td>
														<td class="text-end">$46,92</td>
													</tr>
													<tr>
														<td class="text-start">92.6</td>
														<td>0.21</td>
														<td class="text-end">$123,27</td>
													</tr>
													<tr>
														<td class="text-start">93.9</td>
														<td>0.55</td>
														<td class="text-end">$212,56</td>
													</tr>
													<tr>
														<td class="text-start">94.2</td>
														<td>0.18</td>
														<td class="text-end">$129,26</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="card-footer border-0 p-0 caret">
										<a href="{!! url('/coin-details'); !!}" class="btn-link"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
							<div class="col-sm-6 m-t25">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="mb-0 text-black fs-20">Buy Order</h4>
										<div class="dropdown custom-dropdown mb-0 tbl-orders-style">
											<div class="btn sharp tp-btn" data-bs-toggle="dropdown">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</div>
											<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="javascript:void(0);">Details</a>
												<a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
											</div>
										</div>
									</div>
									<div class="card-body p-3">
										<div class="table-responsive">
											<table class="table text-center bg-info-hover tr-rounded order-tbl">
												<thead>
													<tr>
														<th class="text-start">Price</th>
														<th class="text-center">Amount</th>
														<th class="text-end">Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="text-start">82.3</td>
														<td>0.15</td>
														<td class="text-end">$134,12</td>
													</tr>
													<tr>
														<td class="text-start">83.9</td>
														<td>0.18</td>
														<td class="text-end">$237,31</td>
													</tr>
													<tr>
														<td class="text-start">84.2</td>
														<td>0.25</td>
														<td class="text-end">$252,58</td>
													</tr>
													<tr>
														<td class="text-start">86.2</td>
														<td>0.35</td>
														<td class="text-end">$126,26</td>
													</tr>
													<tr>
														<td class="text-start">91.6</td>
														<td>0.75</td>
														<td class="text-end">$46,92</td>
													</tr>
													<tr>
														<td class="text-start">92.6</td>
														<td>0.21</td>
														<td class="text-end">$123,27</td>
													</tr>
													<tr>
														<td class="text-start">93.9</td>
														<td>0.55</td>
														<td class="text-end">$212,56</td>
													</tr>
													<tr>
														<td class="text-start">94.2</td>
														<td>0.18</td>
														<td class="text-end">$129,26</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="card-footer border-0 p-0 caret">
										<a href="{!! url('/coin-details'); !!}" class="btn-link"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
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