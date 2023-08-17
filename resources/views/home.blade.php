@extends('templates.home.main')

@section('navbar')
	<nav class="navbar navbar-expand-lg navbar-custom navbar-light">
		<a class="mr-auto navbar-brand " href="index.html">
			<img src="{{ asset('img/logo.png') }}" alt="Awesome Image" class="default-logo" width="70px">
			<img src="{{ asset('img/logo-2.png') }}" alt="Awesome Image" class="stick-logo" width="70px">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
			aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fas fa-bars"></i>
		</button>
		<div class="collapse navbar-collapse navbar-nav" id="navbarToggler">
			<ul class="ml-auto">
				<li><a class="nav-link active" href="#banner">Beranda</a></li>
				<li><a class="nav-link" href="#fitur">Fitur</a></li>
				<li><a class="nav-link" href="#harga">Harga</a></li>
				<li><a class="nav-link" href="#ilustrasi">Ilustrasi</a></li>
			</ul>
		</div>
		<div class="sign-up-btn">
			<a href="#" class="sign-btn">Rekrutmen</a>
		</div>
	</nav>
@endsection

@section('beranda')
	<section class="banner-static" id="banner">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="banner-content">
						<h3>Awesome App for Your <br /> Modern Lifestyle</h3>
						<p>Increase productivity with a simple to-do app. app for <br /> managing your personal budgets.
						</p>
						<a href="#" class="thm-btn"><span>Download App</span></a><a href="#"
							class="thm-btn borderd"><span>Discover more</span></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="clearfix banner-moc-box">
						<img src="{{ asset('img/slider-moc-2.png') }}" alt="Awesome Image" class="float-right" />
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="fun-fact">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<div class="single-fun-fact">
						<p><span class="counter">1,265</span> Users</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<div class="single-fun-fact">
						<p><span class="counter">1,000</span> Download</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<div class="single-fun-fact">
						<p><span class="counter">508</span> Likes</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<div class="single-fun-fact">
						<p><span class="counter">809</span> 5 star Rating</p>
					</div>
				</div>
			</div>
		</div>
		<div class="separator"></div>
	</div>
@endsection

@section('fitur')
	<section class="app-features" id="fitur">
		<div class="container">
			<div class="text-center sec-title">
				<h2>Awesome Apps Features</h2>
				<p>A Private Limited is the most popular type of partnership Malta. The limited liability <br /> is, in
					fact, the only type of company allowed by Companies.</p>
			</div>
			<div class="app-features-carousel owl-theme owl-carousel">
				<div class="item">
					<div class="text-center single-app-features">
						<i class="flaticon-paint-palette-and-brush"></i>
						<h3>Design & Branding</h3>
						<p>We use a customized application <br /> specifically designed a testing gnose <br /> to keep
							away for people.</p>
						<div class="line"></div>
					</div>
				</div>
				<div class="item">
					<div class="text-center single-app-features">
						<i class="flaticon-secure-shield"></i>
						<h3>Fully Secured</h3>
						<p>We use a customized application <br /> specifically designed a testing gnose <br /> to keep
							away for people.</p>
						<div class="line"></div>
					</div>
				</div>
				<div class="item">
					<div class="text-center single-app-features">
						<i class="flaticon-cloud-computing"></i>
						<h3>Easy to Edit</h3>
						<p>We use a customized application <br /> specifically designed a testing gnose <br /> to keep
							away for people.</p>
						<div class="line"></div>
					</div>
				</div>
				<div class="item">
					<div class="text-center single-app-features">
						<i class="flaticon-paint-palette-and-brush"></i>
						<h3>Design & Branding</h3>
						<p>We use a customized application <br /> specifically designed a testing gnose <br /> to keep
							away for people.</p>
						<div class="line"></div>
					</div>
				</div>
				<div class="item">
					<div class="text-center single-app-features">
						<i class="flaticon-secure-shield"></i>
						<h3>Fully Secured</h3>
						<p>We use a customized application <br /> specifically designed a testing gnose <br /> to keep
							away for people.</p>
						<div class="line"></div>
					</div>
				</div>
				<div class="item">
					<div class="text-center single-app-features">
						<i class="flaticon-cloud-computing"></i>
						<h3>Easy to Edit</h3>
						<p>We use a customized application <br /> specifically designed a testing gnose <br /> to keep
							away for people.</p>
						<div class="line"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="how-app-work-section">
		<div class="container">

			<div class="row">
				<div class="col-md-6 how-app-work-slider-content">
					<img src="img/circle.png" class="circled-img" alt="Awesome Image" />
					<div class="how-app-work-slider-wrapper">
						<div class="how-app-work-screen-mobile-image"></div>

						<ul class="slider">
							<li class="slide-item">
								<img src="img/how-we-work-slide-1.png" alt="Awesome Image" />
							</li>
							<li class="slide-item">
								<img src="img/how-we-work-slide-2.png" alt="Awesome Image" />
							</li>
							<li class="slide-item">
								<img src="img/how-we-work-slide-4.png" alt="Awesome Image" />
							</li>
						</ul>
					</div>

				</div>
				<div class="col-md-6">
					<div class="how-app-work-content-wrap">
						<div class="title">
							<h3>How does this App Work?</h3>
						</div>
						<div class="how-app-work-content" id="how-app-work-slider-pager">
							<a href="#" class="pager-item active" data-slide-index="0">
								<div class="single-how-app-work ">
									<div class="icon-box">
										<div class="inner">
											<i class="flaticon-responsive-design-symbol"></i>
										</div>
									</div>
									<div class="text-box">
										<h4>Make a Profile</h4>
										<p>We use a customized application tobe <br /> specifically designed a testing
											gnose <br /> to keep away for people.</p>
									</div>
								</div>
							</a>
							<a href="#" class="pager-item" data-slide-index="1">
								<div class="single-how-app-work">
									<div class="icon-box">
										<div class="inner">
											<i class="flaticon-cloud-computing"></i>
										</div>
									</div>
									<div class="text-box">
										<h4>Download it for Free</h4>
										<p>We use a customized application tobe <br /> specifically designed a testing
											gnose <br /> to keep away for people.</p>
									</div>
								</div>
							</a>
							<a href="#" class="pager-item" data-slide-index="2">
								<div class="single-how-app-work ">
									<div class="icon-box">
										<div class="inner">
											<i class="flaticon-quality"></i>
										</div>
									</div>
									<div class="text-box">
										<h4>Enjoy this App</h4>
										<p>We use a customized application tobe <br /> specifically designed a testing
											gnose <br /> to keep away for people.</p>
									</div>
								</div>
							</a>
						</div>
						<a href="#" class="download-btn active">
							<i class="fab fa-apple"></i>
							<span class="inner"> <span class="avail">Available on</span> <span class="store-name">App
									Store</span></span>
						</a>
						<a href="#" class="download-btn">
							<i class="fab fa-google-play"></i>
							<span class="inner"><span class="avail">Available on</span> <span class="store-name">Google
									play</span></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="separator no-border mt135 full-width"></div>

	<section class="features-style-one">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="feature-style-content">
						<i class="flaticon-tools"></i>
						<h3>Easy to Manage Your All Data <br /> by This App</h3>
						<p>In order to design a mobile app that is going to be module <br /> downloaded and accessed
							frequently by users, you need <br /> offer an experience that isn’t available elsewhere.
							Often <br /> businesses get caught up.</p>
						<a href="#" class="more">Discover <i class="fa fa-angle-right"></i></a>
					</div>
				</div>
				<div class="col-md-6">
					<img src="img/data-moc.png" class="has-dropshadow" alt="Awesome Image" />
				</div>
			</div>
		</div>
	</section>

	<div class="separator no-border mt135 full-width"></div>

	<section class="features-style-one">
		<div class="container">
			<div class="row">
				<div class="clearfix col-md-6">
					<img src="img/responsive-moc.png" class="float-right" alt="" />
				</div>
				<div class="col-md-6">
					<div class="feature-style-content pt70 pl40">
						<i class="flaticon-responsive-design-symbol"></i>
						<h3>Responsive Design for All <br /> Devices with Quality</h3>
						<p>In order to design a mobile app that is going to be module <br /> downloaded and accessed
							frequently by users, you need <br /> offer an experience that isn’t available elsewhere.
							Often <br /> businesses get caught up.</p>
						<a href="#" class="more">Discover <i class="fa fa-angle-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="separator no-border mb90 full-width"></div>

	<section class="video-box">
		<div class="container text-center">
			<h3>Watch a Quick Tutorial</h3>
			<a href="//www.youtube.com/watch?v=7-7knsP2n5w" class="video-popup video-btn hvr-pulse"><i
					class="fa fa-play"></i></a>
		</div>
	</section>

	<div class="separator no-border mt135 full-width"></div>

	<section class="app-secreenshots">
		<div class="container">
			<div class="text-center sec-title">
				<h2>App ScreenShots</h2>
				<p>A Private Limited is the most popular type of partnership Malta. The limited liability <br /> is, in
					fact, the only type of company allowed by Companies.</p>
			</div>
		</div>
		<div class="swiper-slider-area">
			<div class="container">
				<div class="row appScreenshotCarousel-container swiper-container">
					<div class="screen-mobile-image"></div>
					<div class="swiper-wrapper">
						<div class="swiper-slide" style="background-image:url(img/slider-01.png)"></div>
						<div class="swiper-slide" style="background-image:url(img/slider-02.png)"></div>
						<div class="swiper-slide" style="background-image:url(img/slider-03.png)"></div>
						<div class="swiper-slide" style="background-image:url(img/slider-04.png)"></div>
						<div class="swiper-slide" style="background-image:url(img/slider-02.png)"></div>
						<div class="swiper-slide" style="background-image:url(img/slider-01.png)"></div>
						<div class="swiper-slide" style="background-image:url(img/slider-02.png)"></div>
						<div class="swiper-slide" style="background-image:url(img/slider-03.png)"></div>
						<div class="swiper-slide" style="background-image:url(img/slider-04.png)"></div>
						<div class="swiper-slide" style="background-image:url(img/slider-02.png)"></div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<div class="separator no-border mb115 full-width"></div>

	<section class="intigration-section">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="intigration-content">
						<h3>Designed & Worked <br /> by the Latest Integration</h3>
						<p>A Private Limited is the most popular type of partnership <br /> Malta. The limited
							liabilityis, in fact, the only type of the <br /> company allowed by Companies.</p>
						<a href="#" class="more">All integration <i class="fa fa-angle-right"></i></a>
					</div>
				</div>
				<div class="col-md-7">
					<div class="text-right intigration-img-box">
						<img src="img/intigration-1-1.png" alt="Awesome Image" />
						<img src="img/intigration-1-2.png" alt="Awesome Image" />
						<img src="img/intigration-1-3.png" alt="Awesome Image" />
						<img src="img/intigration-1-4.png" alt="Awesome Image" />
						<img src="img/intigration-1-5.png" alt="Awesome Image" />
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="testimonials-style-one">
		<div class="container">
			<div class="title">
				<div class="row">
					<div class="col-md-5"></div>
					<div class="col-md-7">
						<h3>Some Talk of Our <br /> Honorable Clients</h3>
					</div>
				</div>
			</div>
			<div id="testimonials-slider-pager">
				<a href="#" class="pager-item active" data-slide-index="0"><img src="img/testi-thumb-1-1.png"
						alt="Awesome Image" /></a>
				<a href="#" class="pager-item" data-slide-index="1"><img src="img/testi-thumb-1-2.png"
						alt="Awesome Image" /></a>
				<a href="#" class="pager-item" data-slide-index="2"><img src="img/testi-thumb-1-3.png"
						alt="Awesome Image" /></a>
				<a href="#" class="pager-item" data-slide-index="3"><img src="img/testi-thumb-1-4.png"
						alt="Awesome Image" /></a>
				<a href="#" class="pager-item" data-slide-index="4"><img src="img/testi-thumb-1-5.png"
						alt="Awesome Image" /></a>
				<a href="#" class="pager-item" data-slide-index="5"><img src="img/testi-thumb-1-6.png"
						alt="Awesome Image" /></a>
			</div>
			<div class="testimonials-slider">

				<ul class="slider">
					<li class="slide-item">
						<div class="single-testimonial">
							<div class="img-box">
								<img src="img/testi-1-1.png" alt="Awesome Image" />
							</div>
							<div class="text-box">
								<img src="img/testi-qoute.png" alt="Awesome Image" />
								<p>The number of ICOs being launched is increasing every day. The right team can help
									your ICO stand out from the crowd. We're that team.</p>
								<h3>Kyong Bacco</h3>
								<span>CEO</span>
							</div>
						</div>
					</li>
					<li class="slide-item">
						<div class="single-testimonial">
							<div class="img-box">
								<img src="img/testi-1-2.png" alt="Awesome Image" />
							</div>
							<div class="text-box">
								<img src="img/testi-qoute.png" alt="Awesome Image" />
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia rerum molestias
									magnam libero in doloremque minus quis molestiae amet sequi.</p>
								<h3>Stacy Fouty</h3>
								<span>CEO</span>
							</div>
						</div>
					</li>
					<li class="slide-item">
						<div class="single-testimonial">
							<div class="img-box">
								<img src="img/testi-1-3.png" alt="Awesome Image" />
							</div>
							<div class="text-box">
								<img src="img/testi-qoute.png" alt="Awesome Image" />
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero hic, numquam
									accusantium. Ad obcaecati dicta animi dolorem natus consequatur ipsam.</p>
								<h3>Tameika Norling</h3>
								<span>CEO</span>
							</div>
						</div>
					</li>
					<li class="slide-item">
						<div class="single-testimonial">
							<div class="img-box">
								<img src="img/testi-1-4.png" alt="Awesome Image" />
							</div>
							<div class="text-box">
								<img src="img/testi-qoute.png" alt="Awesome Image" />
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo voluptate culpa velit,
									aut temporibus odio! Fugiat molestiae odit, dolores ab!</p>
								<h3>Federico Guitreau</h3>
								<span>CEO</span>
							</div>
						</div>
					</li>
					<li class="slide-item">
						<div class="single-testimonial">
							<div class="img-box">
								<img src="img/testi-1-1.png" alt="Awesome Image" />
							</div>
							<div class="text-box">
								<img src="img/testi-qoute.png" alt="Awesome Image" />
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia expedita itaque
									repellendus officiis eligendi fugit animi obcaecati quis quam illo?</p>
								<h3>Clemmie Berner</h3>
								<span>CEO</span>
							</div>
						</div>
					</li>
					<li class="slide-item">
						<div class="single-testimonial">
							<div class="img-box">
								<img src="img/testi-1-2.png" alt="Awesome Image" />
							</div>
							<div class="text-box">
								<img src="img/testi-qoute.png" alt="Awesome Image" />
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis est dignissimos
									ab et praesentium repudiandae quaerat, provident expedita?</p>
								<h3>Teri Clausing</h3>
								<span>CEO</span>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</section>
@endsection

@section('harga')
	<section class="pricing-section" id="harga">
		<div class="container">
			<div class="text-center sec-title">
				<h2>Get in Reasonable Price</h2>
				<p>A Private Limited is the most popular type of partnership Malta. The limited liability <br /> is, in
					fact, the only type of company allowed by Companies.</p>
			</div>
			<ul class="text-center list-inline switch-toggler-list" role="tablist" id="switch-toggle-tab">
				<li class="month active"><a href="#">Monthly</a></li>
				<li>

					<label class="switch on">
						<span class="slider round"></span>
					</label>
				</li>
				<li class="year"><a href="#">Yearly</a></li>
			</ul>
			<div class="tabed-content">
				<div id="month">
					<div class="row pricing-row">
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="text-center single-pricing">
								<div class="inner">
									<h3 class="title">Personal</h3>
									<p class="price">$00</p>
									<p class="price-label">Limited access</p>
									<ul class="list-item">
										<li><i class="fa fa-check"></i> 100 MB Disk Space</li>
										<li><i class="fa fa-check"></i> 2 Subdo mains</li>
										<li><i class="fa fa-check"></i> 5 Email Accounts</li>
										<li><i class="fas fa-times"></i> No License</li>
										<li><i class="fas fa-times"></i> Phone & Mail Support</li>
									</ul>
									<a href="#" class="thm-btn borderd"><span>Get Started</span></a>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="text-center single-pricing popular">
								<div class="inner">
									<h3 class="title">Business</h3>
									<p class="price">$12</p>
									<p class="price-label">Limited access</p>
									<ul class="list-item">
										<li><i class="fa fa-check"></i> 100 MB Disk Space</li>
										<li><i class="fa fa-check"></i> 2 Subdo mains</li>
										<li><i class="fa fa-check"></i> 5 Email Accounts</li>
										<li><i class="fa fa-check"></i> 6 Month License</li>
										<li><i class="fas fa-times"></i> Phone & Mail Support</li>
									</ul>
									<a href="#" class="thm-btn borderd"><span>Get Started</span></a>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="text-center single-pricing">
								<div class="inner">
									<h3 class="title">Enterprise</h3>
									<p class="price">$22</p>
									<p class="price-label">Ultimate access</p>
									<ul class="list-item">
										<li><i class="fa fa-check"></i> 100 MB Disk Space</li>
										<li><i class="fa fa-check"></i> 2 Subdo mains</li>
										<li><i class="fa fa-check"></i> 5 Email Accounts</li>
										<li><i class="fa fa-check"></i> 2 Year License</li>
										<li><i class="fa fa-check"></i> Phone & Mail Support</li>
									</ul>
									<a href="#" class="thm-btn borderd"><span>Get Started</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="year">
					<div class="row pricing-row">
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="text-center single-pricing">
								<div class="inner">
									<h3 class="title">Personal</h3>
									<p class="price">$00</p>
									<p class="price-label">Limited access</p>
									<ul class="list-item">
										<li><i class="fa fa-check"></i> 100 MB Disk Space</li>
										<li><i class="fa fa-check"></i> 2 Subdo mains</li>
										<li><i class="fa fa-check"></i> 5 Email Accounts</li>
										<li><i class="fas fa-times"></i> No License</li>
										<li><i class="fas fa-times"></i> Phone & Mail Support</li>
									</ul>
									<a href="#" class="thm-btn borderd"><span>Get Started</span></a>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="text-center single-pricing popular">
								<div class="inner">
									<h3 class="title">Business</h3>
									<p class="price">$12</p>
									<p class="price-label">Limited access</p>
									<ul class="list-item">
										<li><i class="fa fa-check"></i> 100 MB Disk Space</li>
										<li><i class="fa fa-check"></i> 2 Subdo mains</li>
										<li><i class="fa fa-check"></i> 5 Email Accounts</li>
										<li><i class="fa fa-check"></i> 6 Month License</li>
										<li><i class="fas fa-times"></i> Phone & Mail Support</li>
									</ul>
									<a href="#" class="thm-btn borderd"><span>Get Started</span></a>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="text-center single-pricing">
								<div class="inner">
									<h3 class="title">Enterprise</h3>
									<p class="price">$22</p>
									<p class="price-label">Ultimate access</p>
									<ul class="list-item">
										<li><i class="fa fa-check"></i> 100 MB Disk Space</li>
										<li><i class="fa fa-check"></i> 2 Subdo mains</li>
										<li><i class="fa fa-check"></i> 5 Email Accounts</li>
										<li><i class="fa fa-check"></i> 2 Year License</li>
										<li><i class="fa fa-check"></i> Phone & Mail Support</li>
									</ul>
									<a href="#" class="thm-btn borderd"><span>Get Started</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('ilustrasi')
	<section class="blog-style-one" id="ilustrasi">
		<div class="container">
			<div class="text-center sec-title">
				<h2>Illustration Videos</h2>
				<p>A Private Limited is the most popular type of partnership Malta. The limited liability <br /> is, in
					fact, the only type of company allowed by Companies.</p>
			</div>
			<div class="blog-carousel owl-theme owl-carousel">
				<div class="item">
					<div class="single-blog-post">
						<div class="img-box">
							<img src="img/blog-1-1.png" alt="Awesome Image" />
						</div>
					</div>
				</div>
				<div class="item">
					<div class="single-blog-post">
						<div class="img-box">
							<img src="img/blog-1-2.png" alt="Awesome Image" />
						</div>
					</div>
				</div>
				<div class="item">
					<div class="single-blog-post">
						<div class="img-box">
							<img src="img/blog-1-3.png" alt="Awesome Image" />
						</div>
					</div>
				</div>
				<div class="item">
					<div class="single-blog-post">
						<div class="img-box">
							<img src="img/blog-1-1.png" alt="Awesome Image" />
						</div>
					</div>
				</div>
				<div class="item">
					<div class="single-blog-post">
						<div class="img-box">
							<img src="img/blog-1-2.png" alt="Awesome Image" />
						</div>
					</div>
				</div>
				<div class="item">
					<div class="single-blog-post">
						<div class="img-box">
							<img src="img/blog-1-3.png" alt="Awesome Image" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('footer')
	<footer class="footer">
		<div class="footer-widget-wrapper">
			<div class="container">
				<div class="row masonary-layout">
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="footer-widget about-widget">
							<a href="index.html"><img src="img/logo.png" alt="Awesome Image" width="70px" /></a>
							<p>Be the first to find out about exclusive deals, the latest Lookbooks trends. We're on a
								mission to build a better future where technology.</p>
							<div class="social">
								<a href="#" class="fab fa-facebook-f"></a><a href="#" class="fab fa-twitter"></a><a
									href="#" class="fab fa-google-plus-g"></a><a href="#" class="fab fa-instagram"></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="footer-widget contact-widget">
							<div class="title">
								<h3>Address</h3>
							</div>
							<p><span>Phone:</span> +1 605 722 2032</p>
							<p><span>Email:</span> example@mail.com</p>
							<p><span>Address:</span> Charlotte, North Carolina, <br /> United States</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="footer-widget links-widget">
							<div class="title">
								<h3>Quick Links</h3>
							</div>
							<ul class="list-inline link-list">
								<li><a href="#">What is ICO</a></li>
								<li><a href="#">ICO Apps</a></li>
								<li><a href="#">Join Us</a></li>
								<li><a href="#">Tokens</a></li>
								<li><a href="#">Clients</a></li>
								<li><a href="#">Whitepaper</a></li>
								<li><a href="#">Contact</a></li>
								<li><a href="#">Roadmap</a></li>
								<li><a href="#">Teams</a></li>
								<li><a href="#">FAQ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="footer-widget tweets-widget">
							<div class="title">
								<h3>Tweets</h3>
							</div>
							<div class="tweets-carousel owl-theme owl-carousel">
								<div class="item">
									<div class="single-tweet">
										<p><i class="fab fa-twitter"></i>Lorem ipsum dolor sit amet, con sectetur
											adipiscing elit, sed do eius mod tempor incididunt.</p>
										<a href="#">@JohnDoe</a>
									</div>
								</div>
								<div class="item">
									<div class="single-tweet">
										<p><i class="fab fa-twitter"></i>Lorem ipsum dolor sit amet, con sectetur
											adipiscing elit, sed do eius mod tempor incididunt.</p>
										<a href="#">@JohnDoe</a>
									</div>
								</div>
								<div class="item">
									<div class="single-tweet">
										<p><i class="fab fa-twitter"></i>Lorem ipsum dolor sit amet, con sectetur
											adipiscing elit, sed do eius mod tempor incididunt.</p>
										<a href="#">@JohnDoe</a>
									</div>
								</div>
								<div class="item">
									<div class="single-tweet">
										<p><i class="fab fa-twitter"></i>Lorem ipsum dolor sit amet, con sectetur
											adipiscing elit, sed do eius mod tempor incididunt.</p>
										<a href="#">@JohnDoe</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom" id="footer-id">
			<div class="container">
				<div class="footer-copyright">
					<div class="float-left left-content">
						<p>© 2023, Barangku <span class="sep">|</span> <a href="#">Privacy
								Policy</a> <span class="sep">|</span> <a href="#">Sitemap</a></p>
					</div>
					<div class="float-right right-content">
						<p>All Rights Reserved.</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
@endsection
