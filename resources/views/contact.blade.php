@extends('layouts.main')
@section('content')
<div class="page-title-wrap typo-white">
                <div class="page-title-wrap-inner section-bg-img" data-bg="images/page-title.jpg">
					<span class="theme-overlay"></span>
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-md-12">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page-header -->
            <!-- Page Content -->
            <div class="content-wrapper pad-none">
                <div class="content-inner">
					<!-- Contact Section -->
                    <section id="contact-section" class="contact-section pad-bottom-none">
                        <div class="container">
                            <!-- Row -->
                            <div class="row">
                                <!-- Col -->
                                <div class="col-lg-4 mb-lg-0 mb-4">
									<div class="div-bg-img b-radius-20" data-bg="web/rs-plugin/assets/nab.jpg">
										<div class="f-box c-page text-center typo-white">
											<div class="feature-icon margin-bottom-10">
												<i class="ti-location-pin"></i>
											</div>
											<div class="feature-content">
												<div class="feature-title">
													<h5 class="mb-2">Our Location</h5>
												</div>
												<p class="mb-0">Kiambu Road, KENYA</p>
											</div>											
										</div>
									</div>
                                </div>
                                <!-- Col -->
                                <div class="col-lg-4 mb-lg-0 mb-4">
                                    <div class="div-bg-img b-radius-20" data-bg="web/rs-plugin/assets/nla.jpg">
										<div class="f-box c-page text-center typo-white">
											<div class="feature-icon margin-bottom-10">
												<i class="ti-headphone-alt"></i>
											</div>
											<div class="feature-content">
												<div class="feature-title">
													<h5 class="mb-2">Phone Number</h5>
												</div>
												<a href="tel:(+254)724825746">(+254) </a>
												<br>
												<a href="tel:(+254)724825746">(+254) </a>
											</div>											
										</div>
									</div>
                                </div>
                                <!-- Col -->
                                <div class="col-lg-4">
                                    <div class="div-bg-img b-radius-20" data-bg="web/rs-plugin/assets/pl.jpg">
										<div class="f-box c-page text-center typo-white">
											<div class="feature-icon margin-bottom-10">
												<i class="ti-email"></i>
											</div>
											<div class="feature-content">
												<div class="feature-title">
													<h5 class="mb-2">Email Address</h5>
												</div>
												<a href="Info@newbreedcitychapel.org">Info@newbreedcitychapel.org</a>
												<br>
												<a href="Info@newbreedcitychapel.org">newbreedchapelcity@gmail.com</a>
											</div>											
										</div>
									</div>
                                </div>
                            </div>
                            <!-- Row -->
                        </div>
						<!-- Container -->
                    </section>
                    <!-- Contact Section End -->
					<!-- Contact Section -->
                    <section class="contact-form-section form-with-img">
                        <div class="container">
                            <div class="row">
                                <!-- col -->
                                <div class="col-lg-8 pe-0">                                    
                                    <!-- Contact Form -->
                                    <div class="contact-form-4 bg-white">
                                        <!-- Form -->
                                        <div class="contact-form-wrap">
                                            <!-- form inputs -->
                                            <form id="contact-form" class="contact-form" action=" " enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <!-- form group -->
                                                        <div class="form-group">
                                                            <input id="name" class="form-control" name="name" placeholder="Name" data-bv-field="name" type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <!-- form group -->
                                                        <div class="form-group">
                                                            <input id="email" class="form-control" name="email" placeholder="Email" data-bv-field="email" type="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <!-- form group -->
                                                        <div class="form-group">                                                            
															<input id="phone" class="form-control" name="phone" placeholder="Phone" data-bv-field="phone" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="contact-message">
                                                            <!-- form group -->
                                                            <div class="form-group">
                                                                <textarea id="message" class="form-control textarea" rows="5" name="message" placeholder="Your Message" data-bv-field="message"></textarea>
                                                            </div>
                                                        </div> 
														<!-- form group -->
                                                        <div class="form-group height-zero mb-0">
                                                            <input class="height-zero" type="text" id="hidden-grecaptcha" name="hidden-grecaptcha" value=""/>
                                                        </div>
                                                        <!-- form button -->
                                                        <button type="submit" id="contact-submit" class="btn btn-default mt-0 theme-btn">Send Now</button>
                                                    </div>
                                                </div>
                                                <span class="clearfix"></span>
                                            </form>
											<div class="captcha-parent">
												<div class="g-recaptcha" data-sitekey="6LcuIvEcAAAAAFnQUTIoRRn6Gvc54vbWAf0GSEdP" data-callback="verifyRecaptchaCallback"></div>
											</div>
                                            <!-- form inputs end -->
                                            <p id="contact-status-msg" class="hide"></p>
                                        </div>
                                        <!-- Form End-->
                                    </div>
                                    <!-- contact-form-1 -->
                                </div>
                                <!-- .col -->
                                <div class="col-lg-4 pad-none">
                                    <div class="contact-img">
                                        <img class="img-fluid" src="web/rs-plugin/assets/berick.jpg" width="752" height="888" alt="Contact Map">
                                    </div>
                                </div>
                                 <!-- Col -->
                            </div>
                        </div>
                    </section>
                    <!-- Contact Form Section End -->					
				
													
                </div>
            </div>

@endsection