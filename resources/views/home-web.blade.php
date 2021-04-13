@extends('layouts.outline')

@section('content')
<!-- Preloader - style you can find in spinners.css -->
<div class="Loader"></div>

<!-- ============================ Hero Banner  Start================================== -->
<div class="hero-header jumbo-banner text-center" style="background: url(https://via.placeholder.com/1920x800);" data-overlay="6">
	<div class="container">
		<h1>Find All Jobs in Canada</h1>
		<p class="lead">Find Jobs, Employment & Best Career Opportunities</p>
		<form class="search-big-form no-border search-shadow">
			<div class="row m-0">
				<div class="col-lg-4 col-md-4 col-sm-12 p-0">
					<div class="form-group">
						<i class="ti-search"></i>
						<input type="text" class="form-control b-r" placeholder="Job Title or Keywords">
					</div>
				</div>

				<div class="col-lg-3 col-md-3 col-sm-12 p-0">
					<div class="form-group">
						<i class="ti-location-pin"></i>
						<input type="text" class="form-control b-r" placeholder="Location">
					</div>
				</div>

				<div class="col-lg-3 col-md-3 col-sm-12 p-0">
					<div class="form-group">
						<select id="category" class="js-states form-control">
							<option value="">&nbsp;</option>
							<option value="1">SEO & Web Design</option>
							<option value="2">Wealth & Healthcare</option>
							<option value="3">Account / Finance</option>
							<option value="4">Education</option>
							<option value="5">Banking Jobs</option>
						</select>
						<i class="ti-layers"></i>
					</div>
				</div>

				<div class="col-lg-2 col-md-2 col-sm-12 p-0">
					<button type="button" class="btn btn-primary full-width">Find Jobs</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- ============================ Hero Banner End ================================== -->

<!-- ============================ Latest job ================================== -->
<section>
	<div class="container">

		<div class="row">
			<div class="col text-center">
				<div class="sec-heading mx-auto">
					<p>New & Trending Jobs</p>
					<h2>Most Popular & Trending Jobs</h2>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="owl-carousel" id="job-slide">

				<!-- Single Job -->
				<div class="item">
					<div class="job-grid style-1">
						<div class="job-grid-wrap">
							<span class="job-type j-part-time">Part Time</span>
							<div class="job-grid-thumb">
								<a href="job-detail.html"><img src="https://via.placeholder.com/90x90" class="img-fluid mx-auto" alt="" /></a>
							</div>
							<h4 class="job-title"><a href="job-detail.html">Product Manager</a></h4>
							<hr>
							<div class="job-grid-detail">
								<h4 class="jbc-name"><a href="employer-detail.html">Alliziance Tech</a></h4>
								<p><i class="ti-location-pin"></i>325, New Market, New York </p>
							</div>
							<div class="job-grid-footer">
								<h4 class="job-price">$7,247</h4>
								<a href="job-detail.html" class="btn btn-outline-info btn-rounded">Apply</a>
							</div>

						</div>
					</div>
				</div>

				<!-- Single Job -->
				<div class="item">
					<div class="job-grid style-1">
						<div class="job-grid-wrap">
							<div class="featured-job"><i class="ti-star filled"></i></div>
							<span class="job-type j-full-time">Full Time</span>
							<div class="job-grid-thumb">
								<a href="job-detail.html"><img src="https://via.placeholder.com/90x90" class="img-fluid mx-auto" alt="" /></a>
							</div>
							<h4 class="job-title"><a href="job-detail.html">Project & Team Head</a></h4>
							<hr>
							<div class="job-grid-detail">
								<h4 class="jbc-name"><a href="employer-detail.html">Asana Inc.</a></h4>
								<p><i class="ti-location-pin"></i>356, Blick Shop, London </p>
							</div>
							<div class="job-grid-footer">
								<h4 class="job-price">$3,254</h4>
								<a href="job-detail.html" class="btn btn-outline-info btn-rounded">Apply</a>
							</div>

						</div>
					</div>
				</div>

				<!-- Single Job -->
				<div class="item">
					<div class="job-grid style-1">
						<div class="job-grid-wrap">
							<span class="job-type j-full-time">Full Time</span>
							<div class="job-grid-thumb">
								<a href="job-detail.html"><img src="https://via.placeholder.com/90x90" class="img-fluid mx-auto" alt="" /></a>
							</div>
							<h4 class="job-title"><a href="job-detail.html">Web Designer</a></h4>
							<hr>
							<div class="job-grid-detail">
								<h4 class="jbc-name"><a href="employer-detail.html">Drive Tech</a></h4>
								<p><i class="ti-location-pin"></i>New Market, United State </p>
							</div>
							<div class="job-grid-footer">
								<h4 class="job-price">$5,747</h4>
								<a href="job-detail.html" class="btn btn-outline-info btn-rounded">Apply</a>
							</div>

						</div>
					</div>
				</div>

				<!-- Single Job -->
				<div class="item">
					<div class="job-grid style-1">
						<div class="job-grid-wrap">
							<div class="featured-job"><i class="ti-star filled"></i></div>
							<span class="job-type j-freelance-time">Freelance</span>
							<div class="job-grid-thumb">
								<a href="job-detail.html"><img src="https://via.placeholder.com/90x90" class="img-fluid mx-auto" alt="" /></a>
							</div>
							<h4 class="job-title"><a href="job-detail.html">Sales Analytics</a></h4>
							<hr>
							<div class="job-grid-detail">
								<h4 class="jbc-name"><a href="employer-detail.html">Photos Info.</a></h4>
								<p><i class="ti-location-pin"></i>325, New Market, New York </p>
							</div>
							<div class="job-grid-footer">
								<h4 class="job-price">$6,357</h4>
								<a href="job-detail.html" class="btn btn-outline-info btn-rounded">Apply</a>
							</div>

						</div>
					</div>
				</div>

				<!-- Single Job -->
				<div class="item">
					<div class="job-grid style-1">
						<div class="job-grid-wrap">
							<span class="job-type j-part-time">Part Time</span>
							<div class="job-grid-thumb">
								<a href="job-detail.html"><img src="https://via.placeholder.com/90x90" class="img-fluid mx-auto" alt="" /></a>
							</div>
							<h4 class="job-title"><a href="job-detail.html">Product Manager</a></h4>
							<hr>
							<div class="job-grid-detail">
								<h4 class="jbc-name"><a href="employer-detail.html">Google Info.</a></h4>
								<p><i class="ti-location-pin"></i>325, Rack Newer, England </p>
							</div>
							<div class="job-grid-footer">
								<h4 class="job-price">$10,047</h4>
								<a href="job-detail.html" class="btn btn-outline-info btn-rounded">Apply</a>
							</div>

						</div>
					</div>
				</div>

				<!-- Single Job -->
				<div class="item">
					<div class="job-grid style-1">
						<div class="job-grid-wrap">
							<div class="featured-job"><i class="ti-star filled"></i></div>
							<span class="job-type j-temporary-time">Temporary</span>
							<div class="job-grid-thumb">
								<a href="job-detail.html"><img src="https://via.placeholder.com/90x90" class="img-fluid mx-auto" alt="" /></a>
							</div>
							<h4 class="job-title"><a href="job-detail.html">Team Director</a></h4>
							<hr>
							<div class="job-grid-detail">
								<h4 class="jbc-name"><a href="employer-detail.html">PayPal Info.</a></h4>
								<p><i class="ti-location-pin"></i>254, New Buklack, London </p>
							</div>
							<div class="job-grid-footer">
								<h4 class="job-price">$8,247</h4>
								<a href="job-detail.html" class="btn btn-outline-info btn-rounded">Apply</a>
							</div>

						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
</section>
<!-- ============================ Latest Job End ================================== -->

<!-- ============================ Category Start ================================== -->
<section class="gray">
	<div class="container">

		<div class="row">
			<div class="col text-center">
				<div class="sec-heading mx-auto">
					<p>Browse Your jobs By Category</p>
					<h2>Popular Category Jobs</h2>
				</div>
			</div>
		</div>

		<div class="row">
			<ul class="category-wrap">

				<li>
					<a href="search.html" class="standard-category-box">
						<i class="ti-hummer"></i>
						<h4>Construction Work</h4>
						<span>6 new job posted</span>
					</a>
				</li>

				<li>
					<a href="search.html" class="standard-category-box">
						<i class="ti-money"></i>
						<h4>Account / Finance</h4>
						<span>10 new job posted</span>
					</a>
				</li>

				<li>
					<a href="search.html" class="standard-category-box">
						<i class="ti-headphone-alt"></i>
						<h4>Telecommunications</h4>
						<span>12 new job posted</span>
					</a>
				</li>

				<li>
					<a href="search.html" class="standard-category-box">
						<i class="ti-heart-broken"></i>
						<h4>Healthcare</h4>
						<span>6 new job posted</span>
					</a>
				</li>

				<li>
					<a href="search.html" class="standard-category-box">
						<i class="ti-desktop"></i>
						<h4>Designing & Jobs</h4>
						<span>40 new job posted</span>
					</a>
				</li>

				<li>
					<a href="search.html" class="standard-category-box">
						<i class="ti-book"></i>
						<h4>Education Training</h4>
						<span>8 new job posted</span>
					</a>
				</li>

				<li>
					<a href="search.html" class="standard-category-box">
						<i class="ti-car"></i>
						<h4>Automotive Jobs</h4>
						<span>16 new job posted</span>
					</a>
				</li>

				<li>
					<a href="search.html" class="standard-category-box">
						<i class="ti-gift"></i>
						<h4>Banking Jobs</h4>
						<span>10 new job posted</span>
					</a>
				</li>

			</ul>

		</div>

	</div>
</section>
<div class="clearfix"></div>
<!-- ============================ Category End ================================== -->

<!-- ============================ Counter Facts  Start================================== -->
<section class="image-bg text-center" style="background:#00a94f url(assets/img/bg2.png);" data-overlay="0">
	<div class="container">
		<div class="row">

			<div class="col-lg-3 col-md-3 col-sm-6 b-r">
				<div class="count-facts">
					<h4>2120</h4>
					<span>Jobs Posted</span>
				</div>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-6 b-r">
				<div class="count-facts">
					<h4>3117</h4>
					<span>Jobs Filled</span>
				</div>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-6 b-r">
				<div class="count-facts">
					<h4>872</h4>
					<span>Companies</span>
				</div>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="count-facts">
					<h4>3740</h4>
					<span>Freelancer</span>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- ============================ Counter Facts End ================================== -->

<!-- ============================ Popular Jobs Start ================================== -->
<section>
	<div class="container">

		<div class="row">
			<div class="col text-center">
				<div class="sec-heading mx-auto">
					<p>Browse Popular jobs</p>
					<h2>Top Trending Jobs</h2>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">

				<!-- Single Large Job List -->
				<div class="job-new-list">
					<div class="vc-thumb">
						<img class="img-fluid rounded-circle" src="https://via.placeholder.com/90x90" alt="c2.jpg">
					</div>
					<div class="vc-content">
						<h5 class="title"><a href="job-detail.html">Web Developer</a><span class="j-full-time">Full Time</span></h5>
						<p>Google Inc</p>
						<ul class="vc-info-list">
							<li class="list-inline-item"><h5>Sallery</h5> <i class="ti-credit-card"></i>$3.5k-$5k P.A</li>
							<li class="list-inline-item"><h5>Skills</h5>
								<div class="skills">
									<span>Css3</span><span>photoshop</span><span>java</span><span>+3 more</span>
								</div>
							</li>
						</ul>
					</div>
					<a class="btn btn-primary bn-det" href="job-detail.html">Apply Now<i class="ti-arrow-right ml-1"></i></a>
				</div>

				<!-- Single Large Job List -->
				<div class="job-new-list">
					<div class="vc-thumb">
						<img class="img-fluid rounded-circle" src="https://via.placeholder.com/90x90" alt="c2.jpg">
					</div>
					<div class="vc-content">
						<h5 class="title"><a href="job-detail.html">App Developer</a><span class="j-part-time">Part Time</span></h5>
						<p>Apple Soft.</p>
						<ul class="vc-info-list">
							<li class="list-inline-item"><h5>Sallery</h5> <i class="ti-credit-card"></i>$4.5k-$5k P.A</li>
							<li class="list-inline-item"><h5>Skills</h5>
								<div class="skills">
									<span>Html</span><span>Css3</span><span>java</span><span>+3 more</span>
								</div>
							</li>
						</ul>
					</div>
					<a class="btn btn-primary bn-det" href="job-detail.html">Apply Now<i class="ti-arrow-right ml-1"></i></a>
				</div>

				<!-- Single Large Job List -->
				<div class="job-new-list">
					<div class="vc-thumb">
						<img class="img-fluid rounded-circle" src="https://via.placeholder.com/90x90" alt="c2.jpg">
					</div>
					<div class="vc-content">
						<h5 class="title"><a href="job-detail.html">Product Manager</a><span class="j-part-time">Part Time</span></h5>
						<p>Google Inc</p>
						<ul class="vc-info-list">
							<li class="list-inline-item"><h5>Sallery</h5> <i class="ti-credit-card"></i>$4.5k-$6k P.A</li>
							<li class="list-inline-item"><h5>Skills</h5>
								<div class="skills">
									<span>Html5</span><span>photoshop</span><span>java</span><span>+1 more</span>
								</div>
							</li>
						</ul>
					</div>
					<a class="btn btn-primary bn-det" href="job-detail.html">Apply Now<i class="ti-arrow-right ml-1"></i></a>
				</div>

				<!-- Single Large Job List -->
				<div class="job-new-list">
					<div class="vc-thumb">
						<img class="img-fluid rounded-circle" src="https://via.placeholder.com/90x90" alt="c2.jpg">
					</div>
					<div class="vc-content">
						<h5 class="title"><a href="job-detail.html">Expert Bidder</a><span class="j-full-time">Full Time</span></h5>
						<p>Shiverianer Inc</p>
						<ul class="vc-info-list">
							<li class="list-inline-item"><h5>Sallery</h5> <i class="ti-credit-card"></i>$3.5k-$5k P.A</li>
							<li class="list-inline-item"><h5>Skills</h5>
								<div class="skills">
									<span>Html</span><span>Css3</span><span>java</span><span>+3 more</span>
								</div>
							</li>
						</ul>
					</div>
					<a class="btn btn-primary bn-det" href="job-detail.html">Apply Now<i class="ti-arrow-right ml-1"></i></a>
				</div>

				<!-- Single Large Job List -->
				<div class="job-new-list">
					<div class="vc-thumb">
						<img class="img-fluid rounded-circle" src="https://via.placeholder.com/90x90" alt="c2.jpg">
					</div>
					<div class="vc-content">
						<h5 class="title"><a href="job-detail.html">Iphone Developer</a><span class="j-part-time">Part Time</span></h5>
						<p>Megrolia Soft</p>
						<ul class="vc-info-list">
							<li class="list-inline-item"><h5>Sallery</h5> <i class="ti-credit-card"></i>$7.5k-$15k P.A</li>
							<li class="list-inline-item"><h5>Skills</h5>
								<div class="skills">
									<span>Html</span><span>Css3</span><span>java</span><span>+3 more</span>
								</div>
							</li>
						</ul>
					</div>
					<a class="btn btn-primary bn-det" href="job-detail.html">Apply Now<i class="ti-arrow-right ml-1"></i></a>
				</div>

			</div>
		</div>

	</div>
</section>
<div class="clearfix"></div>
<!-- ============================ Popular Jobs End ================================== -->

<!-- ============================ Blog Start ================================== -->
<section>
	<div class="container">

		<div class="row">
			<div class="col text-center">
				<div class="sec-heading mx-auto">
					<p>Our Top News</p>
					<h2>See Latest Updates</h2>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4 col-md-4">
				<div class="blog-grid-wrap mb-4">
					<div class="blog-grid-thumb">
						<a href="blog-detail.html"><img src="https://via.placeholder.com/1280x820" class="img-responsive" alt=""></a>
						<div class="bg-cat-info">
							<div class="post-m-info">
								<h5 class="pm-date">12</h5>
								<h5 class="pm-month">Dec</h5>
							</div>
						</div>
						<h6 class="post-cat">Travel &amp; Tour</h6>
					</div>
					<div class="blog-grid-content">
						<h4 class="cnt-gb-title"><a href="blog-detail.html">Why most People used bootstrap framework?</a></h4>
						<p>In varius varius justo, eget ultrices mauris rhoncus non. Morbi tristique, mauris eu bibendum, velit diam.</p>
					</div>
					<div class="blog-grid-meta">
						<div class="gb-info-author">
							<p><strong>By </strong>Javid Akhtar</p>
						</div>
						<div class="gb-info-cmt">
							<ul>
								<li><a href="#">110<i class="fa fa-comment text-info"></i></a></li>
								<li><a href="#">50<i class="fa fa-heart text-info"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-4">
				<div class="blog-grid-wrap mb-4">
					<div class="blog-grid-thumb">
						<a href="blog-detail.html"><img src="https://via.placeholder.com/1280x820" class="img-responsive" alt=""></a>
						<div class="bg-cat-info">
							<div class="post-m-info">
								<h5 class="pm-date">10</h5>
								<h5 class="pm-month">Jan</h5>
							</div>
						</div>
						<h6 class="post-cat">Technology &amp; Fashion</h6>
					</div>
					<div class="blog-grid-content">
						<h4 class="cnt-gb-title"><a href="blog-detail.html">drizvato Launch New &amp; powerful template</a></h4>
						<p>In varius varius justo, eget ultrices mauris rhoncus non. Morbi tristique, mauris eu bibendum, velit diam.</p>
					</div>
					<div class="blog-grid-meta">
						<div class="gb-info-author">
							<p><strong>By </strong>Javid Akhtar</p>
						</div>
						<div class="gb-info-cmt">
							<ul>
								<li><a href="#">20<i class="fa fa-comment text-info"></i></a></li>
								<li><a href="#">40<i class="fa fa-heart text-info"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-4">
				<div class="blog-grid-wrap mb-4">
					<div class="blog-grid-thumb">
						<a href="blog-detail.html"><img src="https://via.placeholder.com/1280x820" class="img-responsive" alt=""></a>
						<div class="bg-cat-info">
							<div class="post-m-info">
								<h5 class="pm-date">10</h5>
								<h5 class="pm-month">Feb</h5>
							</div>
						</div>
						<h6 class="post-cat">Business</h6>
					</div>
					<div class="blog-grid-content">
						<h4 class="cnt-gb-title"><a href="blog-detail.html">Which Features is best in drizvato Theme?</a></h4>
						<p>In varius varius justo, eget ultrices mauris rhoncus non. Morbi tristique, mauris eu bibendum, velit diam.</p>
					</div>
					<div class="blog-grid-meta">
						<div class="gb-info-author">
							<p><strong>By </strong>Javid Akhtar</p>
						</div>
						<div class="gb-info-cmt">
							<ul>
								<li><a href="#">250<i class="fa fa-comment text-info"></i></a></li>
								<li><a href="#">40<i class="fa fa-heart text-info"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
<!-- ============================ Blog End ================================== -->
@endsection


<!-- Log In Modal
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="registermodal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ti-close"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="modal-header-title">SignIn</h4>
                <div class="social-login">
                    <ul>
                        <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Login with Facebook</a></li>
                        <li><a href="#" class="btn connect-gplus"><i class="ti-google"></i>Login with Gmail</a></li>
                    </ul>
                </div>

                <div class="devide-wrap"><span>OR</span></div>

                <div class="login-form">
                    <form>

                        <div class="form-group">
                            <label>User Name</label>
                            <div class="input-with-gray">
                                <input type="text" class="form-control" placeholder="Username">
                                <i class="ti-user theme-cl"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-with-gray">
                                <input type="password" class="form-control" placeholder="*******">
                                <i class="ti-unlock theme-cl"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-md full-width pop-login">Login</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <div class="mf-link"><i class="ti-user"></i>Haven't An Account?<a href="javascript:void(0)" data-toggle="modal" data-target="#signup" data-dismiss="modal"> Sign Up</a></div>
                <div class="mf-forget"><a href="#"><i class="ti-help"></i>Forget Password</a></div>
            </div>
        </div>
    </div>
</div>
End Modal -->

<!-- Sign Up Modal
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="sign-up" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="sign-up">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ti-close"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="modal-header-title">Sign Up</h4>
                <div class="social-login">
                    <ul>
                        <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Login with Facebook</a></li>
                        <li><a href="#" class="btn connect-gplus"><i class="ti-google"></i>Login with Gmail</a></li>
                    </ul>
                </div>

                <div class="devide-wrap"><span>OR</span></div>

                <div class="login-form">
                    <form>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <div class="input-with-gray">
                                        <input type="text" class="form-control" placeholder="Your Name">
                                        <i class="ti-user theme-cl"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-with-gray">
                                        <input type="email" class="form-control" placeholder="Email ID">
                                        <i class="ti-user theme-cl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>User Name</label>
                                    <div class="input-with-gray">
                                        <input type="text" class="form-control" placeholder="Username">
                                        <i class="ti-user theme-cl"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="input-with-gray">
                                        <input type="password" class="form-control" placeholder="*******">
                                        <i class="ti-unlock theme-cl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-md full-width pop-login">Login</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <div class="mf-link"><i class="ti-user"></i>Already Have Account? Sign In</a></div>
                <div class="mf-forget"><a href="#"><i class="ti-help"></i>Need Help</a></div>
            </div>
        </div>
    </div>
</div>
End Modal -->