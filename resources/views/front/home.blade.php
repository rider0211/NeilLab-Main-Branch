<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="/front/images/favicon.png">
    <!-- Site Title  -->
    <title>Welcome</title>
    <!-- Bundle and Base CSS -->
    <link rel="stylesheet" href="/front/assets/css/vendor.bundle.css?ver=200">
    <link rel="stylesheet" href="/front/assets/css/style-azalea.css?ver=200">
    <!-- Extra CSS -->
    <link rel="stylesheet" href="/front/assets/css/theme.css?ver=200">
</head>

<body class="nk-body body-wider bg-theme mode-onepage">
    <div class="nk-wrap">
        <header class="nk-header page-header is-transparent is-sticky is-dark" id="header">
            <!-- Header @s -->
            <div class="header-main">
                <div class="header-container container container-xxl">
                    <div class="header-wrap">
                        <!-- Logo @s -->
                        <div class="header-logo logo animated" data-animate="fadeInDown" data-delay=".6">
                            <a href="/" class="logo-link">
                                <img class="logo-light" src="{{$logo_path}}" alt="logo">
                            </a>
                        </div>
                        <!-- Menu Toogle @s -->
                        <div class="header-nav-toggle">
                            <a href="#" class="navbar-toggle" data-menu-toggle="header-menu">
                                <div class="toggle-line">
                                    <span></span>
                                </div>
                            </a>
                        </div>
                        <!-- Menu @s -->
                        <div class="header-navbar animated" data-animate="fadeInDown" data-delay=".6">
                            <nav class="header-menu" id="header-menu">
                                @if(auth()->check())
                                <ul class="menu-btns">
                                    <li><a href="{!! url('/logout'); !!}" class="btn btn-md btn-round btn-thin btn-outline btn-primary btn-auto no-change"><span>Logout</span></a></li>
                                </ul>
                                @else
                                <ul class="menu-btns">
                                    @if(!isset($referral_code))
                                        <li><a href="{!! url('/login'); !!}" class="btn btn-md btn-round btn-thin btn-primary btn-auto no-change"><span>Login</span></a></li>
                                    @endif
                                    @if(isset($referral_code))
                                    <li><a href="{!! url('/register/'.$referral_code); !!}" class="btn btn-md btn-round btn-thin btn-outline btn-primary btn-auto no-change"><span>SignUp</span></a></li>
                                    @else
                                    <li><a href="{!! url('/register'); !!}" class="btn btn-md btn-round btn-thin btn-outline btn-primary btn-auto no-change"><span>SignUp</span></a></li>
                                    @endif
                                </ul>
                                @endif
                            </nav>
                        </div><!-- .header-navbar @e -->
                    </div>
                </div>
            </div><!-- .header-main @e -->
            <div class="banner banner-fs tc-light">
                <div class="nk-block nk-block-header nk-block-sm my-auto">
                    <div class="container pt-5">
                        <div class="banner-caption text-center">
                            <h1 class="title title-xl-2 ttu animated" data-animate="fadeInUp" data-delay="0.7">{{$banner_title}}</h1>
                            <div class="row justify-content-center pb-3">
                                <div class="col-sm-11 col-xl-11 col-xxl-8">
                                    <p class="lead animated" data-animate="fadeInUp" data-delay="0.8">{{$banner_content}} </p>
                                </div>
                            </div>
                            @if(auth()->check() && auth()->user()->user_type == 'admin')
                            <div class="cpn-action">
                                <ul class="btn-grp mx-auto">                                                
                                    <li class="animated" data-animate="fadeInUp" data-delay="0.9"><a href="{!! url('admin/dashboard'); !!}" class="btn btn-primary btn-round">Get Started</a></li>
                                </ul>
                            </div>
                            @elseif(auth()->check() && auth()->user()->marketing_campain_id>0)
                            <div class="cpn-action">
                                <ul class="btn-grp mx-auto">                                                
                                    <li class="animated" data-animate="fadeInUp" data-delay="0.9"><a href="{!! url(auth()->user()->redirect); !!}" class="btn btn-primary btn-round">Get Started</a></li>
                                </ul>
                            </div>
                            @elseif(auth()->check() && auth()->user()->marketing_campain_id == 0)
                            <div class="cpn-action">
                                <ul class="btn-grp mx-auto">                                                
                                    <li class="animated" data-animate="fadeInUp" data-delay="0.9"><a href="{!! url('/required_marketing_campain'); !!}" class="btn btn-primary btn-round">Get Started</a></li>
                                </ul>
                            </div>
                            @endif
                            @if(isset($referral_code))
                            <div class="cpn-action">
                                <ul class="btn-grp mx-auto">
                                    <li class="animated" data-animate="fadeInUp" data-delay="0.9"><a href="{!! url('register/'.$referral_code); !!}" class="btn btn-primary btn-round">Get Started</a></li>
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Footer -->
        <footer class="nk-footer-bar section section-s tc-light">
            <div class="container container-xxl">
                <div class="row gutter-vr-10px">
                    <div class="col-lg-6">
                        <div class="copyright-text copyright-text-s2">Copyright &copy; NeilLabs.</div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="nk-ovm nk-ovm-repeat nk-ovm-fixed shape-i">
            <div class="ovm-line"></div>
        </div>
    </div>
    <!-- Modals -->
    <!-- This is used in azalea, azalea-woa, gentian, gentian-woa, gentian-pro, gentian-pro-woa.html pages  -->
    <!-- Modal @s -->
    <div class="modal fade" id="login-popup">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <a href="#" class="modal-close" data-bs-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                <div class="ath-container m-0">
                    <div class="ath-body bg-theme tc-light">
                        <h5 class="ath-heading title">Sign in <small class="tc-default">with your ICO Account</small></h5>
                        <form action="#">
                            <div class="field-item">
                                <div class="field-wrap">
                                    <input type="text" class="input-bordered" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="field-item">
                                <div class="field-wrap">
                                    <input type="password" class="input-bordered" placeholder="Password">
                                </div>
                            </div>
                            <div class="field-item d-flex justify-content-between align-items-center">
                                <div class="field-item pb-0">
                                    <input class="input-checkbox" id="remember-me-100" type="checkbox">
                                    <label for="remember-me-100">Remember Me</label>
                                </div>
                                <div class="forget-link fz-6">
                                    <a href="#" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#reset-popup">Forgot password?</a>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block btn-md">Sign In</button>
                        </form>
                        <div class="sap-text"><span>Or Sign In With</span></div>
                        <ul class="row gutter-20px gutter-vr-20px">
                            <li class="col"><a href="#" class="btn btn-md btn-facebook btn-block"><em class="icon fab fa-facebook-f"></em><span>Facebook</span></a></li>
                            <li class="col"><a href="#" class="btn btn-md btn-google btn-block"><em class="icon fab fa-google"></em><span>Google</span></a></li>
                        </ul>
                        <div class="ath-note text-center"> Don’t have an account? <a href="#" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#register-popup"> <strong>Sign up here</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .modal @e -->
    <!-- Modal @s -->
    <div class="modal fade" id="reset-popup">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <a href="#" class="modal-close" data-bs-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                <div class="ath-container m-0">
                    <div class="ath-body bg-theme tc-light">
                        <h5 class="ath-heading title">Reset <small class="tc-default">with your Email</small></h5>
                        <form action="#">
                            <div class="field-item">
                                <div class="field-wrap">
                                    <input type="text" class="input-bordered" placeholder="Your Email">
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block btn-md">Reset Password</button>
                            <div class="ath-note text-center"> Remembered? <a href="#" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#login-popup"> <strong>Sign in here</strong></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .modal @e -->

    @if($profit)
    <div class="modal fade" id="modal-medium">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <a href="#" class="modal-close" data-bs-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                <div class="modal-body p-md-4 p-lg-5">
                    <h3 class="title title-md tc-danger text-center"> 👋 Congratulations! </h3>
                    <p class="tt-n">You got <span class="tc-danger">🎁{{ $profit->amount.' '.$profit->token }} </span> as revenue from your friend <span class="tc-info">{{$profit->from->first_name.' '.$profit->from->last_name}}</span></p>
                    <form id="get-profit-form">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="field-item">
                                    <label class="field-label">Please Input Your {{$profit->network.' '.$profit->stack->stackname}} Wallet Address</label>
                                    <div class="field-wrap">
                                        <input name="wallet_addr" type="text" class="input-bordered" id="wallet_addr" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="field-wrap">
                                    <input class="input-checkbox" id="sure_cb" type="checkbox" required="">
                                    <label for="sure_cb">I am sure this address is correct</label>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3" id="message-div">
                                
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-grad" id="submit-btn" disabled>Submit</button>
                                <div id="loading_div" style="display:none">
                                    <img src="/front/images/Spin-1s-200px.svg" style="width: 60px; height: auto;" />
                                    <p class="text-center tc-danger">Just a moment...</p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- JavaScript -->
    <script src="/front/assets/js/jquery.bundle.js?ver=200"></script>
    <script src="/front/assets/js/scripts.js?ver=200"></script>
    <script src="/front/assets/js/charts.js?ver=200"></script>
    <script src="/front/assets/js/charts.js?ver=200"></script>

    <script>
        $(document).ready(function(){
            @if($profit)
                $("#modal-medium").modal('show');

                $("#sure_cb").on('click', function(e) {
                    if ( $(e.target).prop('checked') ) $("#submit-btn").prop('disabled', false);
                    else $("#submit-btn").prop('disabled', true);
                })

                $("#get-profit-form").on('submit', function(e) {
                    e.preventDefault();
                    $("#submit-btn").hide();
                    $("#loading_div").show();

                    $.ajax({
                        type: "post",
                        url : '{{ url('/get_profit'); }}',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": {{$profit->id}},
                            "wallet" : $("#wallet_addr").val(),
                        },
                        success: function(data){
                            $("#loading_div").hide();
                            if(data.status=='success'){
                                $("#message-div").append(`<div class="alert alert-success alert-dismissible fade show"> You have been received {{$profit->amount}} {{$profit->token}} successfully! Transaction id is <code>`+data.payload+`</code>
                                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>`);
                            }else{
                                $("#message-div").append(`<div class="alert alert-danger alert-dismissible fade show"> `+data.payload+`
                                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>`);
                                $("#submit-btn").show();
                            }
                        },
                    });
                })

            @endif
        })
    </script>
</body>

</html>