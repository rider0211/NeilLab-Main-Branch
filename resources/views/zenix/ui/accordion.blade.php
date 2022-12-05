{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
    <div class="container-fluid">
		<div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>Accordion</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Bootstrap</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Accordion</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <!-- Row starts -->
        <div class="row">
            <!-- Column starts -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header d-block">
                        <h4 class="card-title">Default Accordion</h4>
                        <p class="m-0 subtitle">Default accordion. Add <code>accordion</code> class in root</p>
                    </div>
                    <div class="card-body">
                        <!-- Default accordion -->
        
						<div class="accordion accordion-primary" id="accordion-one">
						  <div class="accordion-item">
							<div class="accordion-header  rounded-lg" id="headingOne" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-controls="collapseOne"   aria-expanded="true" role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header One</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion-one">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="headingTwo" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-controls="collapseTwo"   role="button" aria-expanded="true">
							  <span class="accordion-header-text">Accordion Header Two</span>
							 <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion-one">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="headingThree" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-controls="collapseThree"  role="button"  aria-expanded="true">
							  <span class="accordion-header-text">Accordion Header Three</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordion-one">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						</div>
                    </div>
                </div>
            </div>
            <!-- Column ends -->
            <!-- Column starts -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header d-block">
                        <h4 class="card-title">Accordion bordered</h4>
                        <p class="m-0 subtitle">Accordion with border. Add class <code>accordion-bordered</code> with the class <code> accordion</code></p>
                    </div>
                    <div class="card-body">
                        
						<div class="accordion accordion-danger-solid" id="accordion-two">
						  <div class="accordion-item">
							<div class="accordion-header  rounded-lg" id="accord-2One" data-bs-toggle="collapse" data-bs-target="#collapse2One" aria-controls="collapse2One"   aria-expanded="true"  role="button">
							  <span class="accordion-header-text">Accordion Header One</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse2One" class="collapse accordion__body show" aria-labelledby="accord-2One" data-bs-parent="#accordion-two">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-2Two" data-bs-toggle="collapse" data-bs-target="#collapse2Two" aria-controls="collapse2Two"   aria-expanded="true"  role="button">
							  <span class="accordion-header-text">Accordion Header Two</span>
							 <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse2Two" class="collapse accordion__body" aria-labelledby="accord-2Two" data-bs-parent="#accordion-two">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-2Three" data-bs-toggle="collapse" data-bs-target="#collapse2Three" aria-controls="collapse2Three"   aria-expanded="true"  role="button">
							  <span class="accordion-header-text">Accordion Header Three</span>
							 <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse2Three" class="collapse accordion__body" aria-labelledby="accord-2Three" data-bs-parent="#accordion-two">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						</div>
                    </div>
                </div>
            </div>
            <!-- Column ends -->
            <!-- Column starts -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header d-block">
                        <h4 class="card-title">Accordion without space</h4>
                        <p class="m-0 subtitle">Add <code>accordion-no-gutter</code> class with <code>accordion</code></p>
                    </div>
                    <div class="card-body">
                        
						<div class="accordion accordion-no-gutter accordion-header-bg" id="accordion-three">
						  <div class="accordion-item">
							<div class="accordion-header  rounded-lg" id="accord-3One" data-bs-toggle="collapse" data-bs-target="#collapse3One" aria-controls="collapse3One"   aria-expanded="true"  role="button">
							  <span class="accordion-header-text">Accordion Header One</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse3One" class="collapse accordion__body show" aria-labelledby="accord-3One" data-bs-parent="#accordion-three">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-3Two" data-bs-toggle="collapse" data-bs-target="#collapse3Two" aria-controls="collapse3Two"   aria-expanded="true"  role="button">
							  <span class="accordion-header-text">Accordion Header Two</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse3Two" class="collapse accordion__body" aria-labelledby="accord-3Two" data-bs-parent="#accordion-three">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-3Three" data-bs-toggle="collapse" data-bs-target="#collapse3Three" aria-controls="collapse3Three"   aria-expanded="true"  role="button">
							  <span class="accordion-header-text">Accordion Header Three</span>
							 <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse3Three" class="collapse accordion__body" aria-labelledby="accord-3Three" data-bs-parent="#accordion-three">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						</div>
                    </div>
                </div>
            </div>
            <!-- Column ends -->
            <!-- Column starts -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header d-block">
                        <h4 class="card-title">Accordion without space with border</h4>
                        <p class="m-0 subtitle">Add <code>accordion-no-gutter accordion-bordered</code> class with <code>accordion</code></p>
                    </div>
                    <div class="card-body">
                       
						<div class="accordion accordion-no-gutter accordion-bordered" id="accordion-four">
						  <div class="accordion-item">
							<div class="accordion-header  rounded-lg" id="accord-4One" data-bs-toggle="collapse" data-bs-target="#collapse4One" aria-controls="collapse4One"   aria-expanded="true"  role="button">
							  <span class="accordion-header-text">Accordion Header One</span>
							 <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse4One" class="collapse accordion__body show" aria-labelledby="accord-4One" data-bs-parent="#accordion-four">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-4Two" data-bs-toggle="collapse" data-bs-target="#collapse4Two" aria-controls="collapse4Two"   aria-expanded="true"  role="button">
							  <span class="accordion-header-text">Accordion Header Two</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse4Two" class="collapse accordion__body" aria-labelledby="accord-4Two" data-bs-parent="#accordion-four">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-4Three" data-bs-toggle="collapse" data-bs-target="#collapse4Three" aria-controls="collapse4Three"   aria-expanded="true"  role="button">
							  <span class="accordion-header-text">Accordion Header Three</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse4Three" class="collapse accordion__body" aria-labelledby="accord-4Three" data-bs-parent="#accordion-four">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						</div>
                    </div>
                </div>
            </div>
            <!-- Column ends -->
            <!-- Column starts -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header d-block">
                        <h4 class="card-title">Accordion indicator in left position</h4>
                        <p class="m-0 subtitle">Add <code>accordion-start-indicator</code> class with <code>accordion</code></p>
                    </div>
                    <div class="card-body">
                       
						<div class="accordion accordion-start-indicator" id="accordion-five">
						  <div class="accordion-item">
							<div class="accordion-header  rounded-lg" id="accord-5One" data-bs-toggle="collapse" data-bs-target="#collapse5One" aria-controls="collapse5One"   aria-expanded="true"  role="button">
							  <span class="accordion-header-text">Accordion Header One</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse5One" class="collapse accordion__body show" aria-labelledby="accord-5One" data-bs-parent="#accordion-five">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-5Two" data-bs-toggle="collapse" data-bs-target="#collapse5Two" aria-controls="collapse5Two"   aria-expanded="true"  role="button">
							  <span class="accordion-header-text">Accordion Header Two</span>
							   <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse5Two" class="collapse accordion__body" aria-labelledby="accord-5Two" data-bs-parent="#accordion-five">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-5Three" data-bs-toggle="collapse" data-bs-target="#collapse5Three" aria-controls="collapse5Three"   aria-expanded="true"  role="button">
							  <span class="accordion-header-text">Accordion Header Three</span>
							   <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse5Three" class="collapse accordion__body" aria-labelledby="accord-5Three" data-bs-parent="#accordion-five">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						</div>
                    </div>
                </div>
            </div>
            <!-- Column ends -->
            <!-- Column starts -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header d-block">
                        <h4 class="card-title">Accordion with icon</h4>
                        <p class="m-0 subtitle">Add <code>accordion-with-icon</code> class with <code>accordion</code></p>
                    </div>
                    <div class="card-body">
                       
						<div class="accordion accordion-with-icon" id="accordion-six">
						  <div class="accordion-item">
							<div class="accordion-header  rounded-lg" id="accord-6One" data-bs-toggle="collapse" data-bs-target="#collapse6One" aria-controls="collapse6One"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header One</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse6One" class="collapse accordion__body show" aria-labelledby="accord-6One" data-bs-parent="#accordion-six">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-6Two" data-bs-toggle="collapse" data-bs-target="#collapse6Two" aria-controls="collapse6Two"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header Two</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse6Two" class="collapse accordion__body" aria-labelledby="accord-6Two" data-bs-parent="#accordion-six">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-6Three" data-bs-toggle="collapse" data-bs-target="#collapse6Three" aria-controls="collapse6Three"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header Three</span>
							   <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse6Three" class="collapse accordion__body" aria-labelledby="accord-6Three" data-bs-parent="#accordion-six">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						</div>
                    </div>
                </div>
            </div>
            <!-- Column ends -->
            <!-- Column starts -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header d-block">
                        <h4 class="card-title">Accordion header background</h4>
                        <p class="m-0 subtitle">Add <code>accordion-header-bg</code> class with <code>accrodion</code></p>
                    </div>
                    <div class="card-body">
                       
						<div class="accordion accordion-header-bg accordion-bordered" id="accordion-seven">
						  <div class="accordion-item">
							<div class="accordion-header  rounded-lg" id="accord-7One" data-bs-toggle="collapse" data-bs-target="#collapse7One" aria-controls="collapse7One"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header One</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse7One" class="collapse accordion__body show" aria-labelledby="accord-7One" data-bs-parent="#accordion-seven">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-7Two" data-bs-toggle="collapse" data-bs-target="#collapse7Two" aria-controls="collapse7Two"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header Two</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse7Two" class="collapse accordion__body" aria-labelledby="accord-7Two" data-bs-parent="#accordion-seven">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-7Three" data-bs-toggle="collapse" data-bs-target="#collapse7Three" aria-controls="collapse7Three"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header Three</span>
							   <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse7Three" class="collapse accordion__body" aria-labelledby="accord-7Three" data-bs-parent="#accordion-seven">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						</div>
                    </div>
                </div>
            </div>
            <!-- Column ends -->
            <!-- Column starts -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header d-block">
                        <h4 class="card-title">Accordion solid background</h4>
                        <p class="m-0 subtitle">Add class <code>accordion-solid-bg</code> with <code>accordion</code></p>
                    </div>
                    <div class="card-body">
                        
						<div class="accordion accordion-solid-bg" id="accordion-eight">
						  <div class="accordion-item">
							<div class="accordion-header  rounded-lg" id="accord-8One" data-bs-toggle="collapse" data-bs-target="#collapse8One" aria-controls="collapse8One"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header One</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse8One" class="collapse accordion__body show" aria-labelledby="accord-8One" data-bs-parent="#accordion-eight">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-8Two" data-bs-toggle="collapse" data-bs-target="#collapse8Two" aria-controls="collapse8Two"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header Two</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse8Two" class="collapse accordion__body" aria-labelledby="accord-8Two" data-bs-parent="#accordion-eight">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-8Three" data-bs-toggle="collapse" data-bs-target="#collapse8Three" aria-controls="collapse8Three"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header Three</span>
							   <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse8Three" class="collapse accordion__body" aria-labelledby="accord-8Three" data-bs-parent="#accordion-eight">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						</div>
                    </div>
                </div>
            </div>
            <!-- Column ends -->
            <!-- Column starts -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header d-block">
                        <h4 class="card-title">Accordion active background</h4>
                        <p class="m-0 subtitle">Add class <code>accordion-active-header</code> with <code>accordion</code></p>
                    </div>
                    <div class="card-body">
                        
						<div class="accordion accordion-active-header" id="accordion-nine">
						  <div class="accordion-item">
							<div class="accordion-header  rounded-lg" id="accord-9One" data-bs-toggle="collapse" data-bs-target="#collapse9One" aria-controls="collapse9One"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header One</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse9One" class="collapse accordion__body show" aria-labelledby="accord-9One" data-bs-parent="#accordion-nine">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-9Two" data-bs-toggle="collapse" data-bs-target="#collapse9Two" aria-controls="collapse9Two"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header Two</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse9Two" class="collapse accordion__body" aria-labelledby="accord-9Two" data-bs-parent="#accordion-nine">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-9Three" data-bs-toggle="collapse" data-bs-target="#collapse9Three" aria-controls="collapse9Three"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header Three</span>
							   <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse9Three" class="collapse accordion__body" aria-labelledby="accord-9Three" data-bs-parent="#accordion-nine">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						</div>
                    </div>
                </div>
            </div>
            <!-- Column ends -->
            <!-- Column starts -->
            <div class="col-xl-6">
                <div class="card transparent-card">
                    <div class="card-header d-block">
                        <h4 class="card-title">Accordion header shadow</h4>
                        <p class="m-0 subtitle">Add <code>accordion-header-shadow</code> and <code>accordion-rounded</code> class with <code>accordion</code></p>
                    </div>
                    <div class="card-body">
                       
						<div class="accordion accordion-header-shadow accordion-rounded" id="accordion-ten">
						  <div class="accordion-item">
							<div class="accordion-header  rounded-lg" id="accord-10One" data-bs-toggle="collapse" data-bs-target="#collapse10One" aria-controls="collapse10One"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header One</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse10One" class="collapse accordion__body show" aria-labelledby="accord-10One" data-bs-parent="#accordion-ten">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-10Two" data-bs-toggle="collapse" data-bs-target="#collapse10Two" aria-controls="collapse10Two"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header Two</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse10Two" class="collapse accordion__body" aria-labelledby="accord-10Two" data-bs-parent="#accordion-ten">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-10Three" data-bs-toggle="collapse" data-bs-target="#collapse10Three" aria-controls="collapse9Three"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header Three</span>
							   <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse10Three" class="collapse accordion__body" aria-labelledby="accord-10Three" data-bs-parent="#accordion-ten">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						</div>
                    </div>
                </div>
            </div>
            <!-- Column ends -->
            <!-- Column starts -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header d-block">
                        <h4 class="card-title">Accordion rounded stylish</h4>
                        <p class="m-0 subtitle">Add <code>accordion-rounded-stylish</code> class with <code>accordion</code></p>
                    </div>
                    <div class="card-body">
                       
						<div class="accordion accordion-rounded-stylish accordion-bordered" id="accordion-eleven">
						  <div class="accordion-item">
							<div class="accordion-header  rounded-lg" id="accord-11One" data-bs-toggle="collapse" data-bs-target="#collapse11One" aria-controls="collapse11One"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header One</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse11One" class="collapse accordion__body show" aria-labelledby="accord-11One" data-bs-parent="#accordion-eleven">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-11Two" data-bs-toggle="collapse" data-bs-target="#collapse11Two" aria-controls="collapse11Two"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header Two</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse11Two" class="collapse accordion__body" aria-labelledby="accord-11Two" data-bs-parent="#accordion-eleven">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-11Three" data-bs-toggle="collapse" data-bs-target="#collapse11Three" aria-controls="collapse11Three"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header Three</span>
							   <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse11Three" class="collapse accordion__body" aria-labelledby="accord-11Three" data-bs-parent="#accordion-eleven">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						</div>
                    </div>
                </div>
            </div>
            <!-- Column ends -->
            <!-- Column starts -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header d-block">
                        <h4 class="card-title">Accordion gradient</h4>
                        <p class="m-0 subtitle">Add <code>accordion-gradient</code> class with <code>accordion</code></p>
                    </div>
                    <div class="card-body">
                        
						<div class="accordion accordion-rounded-stylish accordion-gradient" id="accordion-twelve">
						  <div class="accordion-item">
							<div class="accordion-header  rounded-lg" id="accord-12One" data-bs-toggle="collapse" data-bs-target="#collapse12One" aria-controls="collapse12One"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header One</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse12One" class="collapse accordion__body show" aria-labelledby="accord-12One" data-bs-parent="#accordion-twelve">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-12Two" data-bs-toggle="collapse" data-bs-target="#collapse12Two" aria-controls="collapse12Two"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header Two</span>
							  <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse12Two" class="collapse accordion__body" aria-labelledby="accord-12Two" data-bs-parent="#accordion-twelve">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						  <div class="accordion-item">
							<div class="accordion-header collapsed rounded-lg" id="accord-12Three" data-bs-toggle="collapse" data-bs-target="#collapse12Three" aria-controls="collapse12Three"   aria-expanded="true"  role="button">
								<span class="accordion-header-icon"></span>
							  <span class="accordion-header-text">Accordion Header Three</span>
							   <span class="accordion-header-indicator"></span>
							</div>
							<div id="collapse12Three" class="collapse accordion__body" aria-labelledby="accord-12Three" data-bs-parent="#accordion-twelve">
							  <div class="accordion-body-text">
								 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
							  </div>
							</div>
						  </div>
						</div>
                    </div>
                </div>
            </div>
            <!-- Column ends -->
        </div>
        <!-- Row ends -->
    </div>
@endsection