@extends('layouts.outline')

@section('content')

<!-- ======================= Start Banner ===================== -->
<section class="page-title-banner" style="background-image:url(https://via.placeholder.com/1920x800);">
	<div class="container">
		<div class="row m-0 align-items-end detail-swap">
			<div class="tr-list-wrap">
				<div class="tr-list-detail">
					<div class="tr-list-thumb">
						<img src="https://via.placeholder.com/90x90" class="img-responsive" alt="" />
					</div>
					<div class="tr-list-info">
						<h4 class="mb-1">{{$company->name}}</h4>
						<p class="mb-1"><i class="ti-location-pin mr-2"></i>{{$company->mainPlaceOfWork()->city . ', ' . $company->mainPlaceOfWork()->country}}</p>
					</div>
				</div>
				<div class="listing-detail_right">
					<div class="listing-detail-item">
						<a href="#" class="btn btn-list full-width color--linkedin"><i class="ti-email mr-2"></i> Send a Message</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ======================= End Banner ===================== -->

<!-- ============== Job Detail ====================== -->
<section class="tr-single-detail gray-bg">
	<div class="container">
		<div class="row">

			<div class="col-md-8 col-sm-12">

				<!-- Job Overview -->
				<div class="tr-single-box">
					<div class="tr-single-header">
						<h4><i class="ti-info"></i>Company Overview</h4>
					</div>
					<div class="tr-single-body">
						{{ $company->overview }}
					</div>
				</div>

				<!-- Job Qualifications -->
				<div class="tr-single-box">
					<div class="tr-single-header">
						<h4><i class="ti-cup"></i>Features & Award</h4>
					</div>
					<div class="tr-single-body">
						<ul class="jb-detail-list">
							<li>Hand On experience with Wordpress</li>
							<li>Good understanding of front-end technologies, including HTML5, CSS3, JavaScript, jQuery</li>
							<li>Experience building user interfaces for websites and/or web applications</li>
							<li>Experience designing and developing responsive design websites</li>
							<li>Comfortable working with debugging tools like Firebug, Chrome inspector, etc.</li>
							<li>Ability to understand CSS changes and their ramifications to ensure consistent style across platforms and browsers</li>
							<li>Ability to convert comprehensive layout and wireframes into working HTML pages</li>
							<li>Knowledge of how to interact with RESTful APIs and formats (JSON, XML)</li>
							<li>Proficient understanding of code versioning tool GIT</li>
							<li>Strong understanding of PHP back-end development</li>
						</ul>
					</div>
				</div>


				<!-- Job Education -->
				<div class="tr-single-box">
					<div class="tr-single-header">
						<h4><i class="ti-cup"></i>4 Current Opening</h4>
					</div>
					<div class="tr-single-body">
						<div  class="owl-carousel" id="rl-list">

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
											<h4 class="jbc-name"><a href="company-details.blade.php">Alliziance Tech</a></h4>
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
											<h4 class="jbc-name"><a href="company-details.blade.php">Asana Inc.</a></h4>
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
											<h4 class="jbc-name"><a href="company-details.blade.php">Drive Tech</a></h4>
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
											<h4 class="jbc-name"><a href="company-details.blade.php">Photos Info.</a></h4>
											<p><i class="ti-location-pin"></i>325, New Market, New York </p>
										</div>
										<div class="job-grid-footer">
											<h4 class="job-price">$6,357</h4>
											<a href="job-detail.html" class="btn btn-outline-info btn-rounded">Apply</a>
										</div>

									</div>
								</div>
							</div>

						</div>
					</div>
				</div>


			</div>

			<!-- Sidebar Start -->
			<div class="col-md-4 col-sm-12">

				<div class="offer-btn-wrap mb-4">
					<a href="#" class="btn btn-info btn-md full-width"><i class="mr-2 ti-bell"></i>Get Job Alert</a>
				</div>

				<!-- Company Overview -->
				<div class="tr-single-box">
					<div class="tr-single-header">
						<h4><i class="ti-direction"></i> Company Overview</h4>
					</div>

					<div class="tr-single-body">
						<ul class="extra-service">
							<li>
								<div class="icon-box-icon-block">
									<div class="icon-box-round">
										<i class="lni-users"></i>
									</div>
									<div class="icon-box-text">
										<strong class="d-block">Total Employee</strong>
										5,410
									</div>
								</div>
							</li>

							<li>
								<div class="icon-box-icon-block">
									<div class="icon-box-round">
										<i class="fa fa-leaf"></i>
									</div>
									<div class="icon-box-text">
										<strong class="d-block">Branches</strong>
										102+
									</div>
								</div>
							</li>

							<li>
								<div class="icon-box-icon-block">
									<div class="icon-box-round">
										<i class="ti-home"></i>
									</div>
									<div class="icon-box-text">
										<strong class="d-block">Industry</strong>
										Management
									</div>
								</div>
							</li>

							<li>
								<div class="icon-box-icon-block">
									<div class="icon-box-round">
										<i class="lni-certificate"></i>
									</div>
									<div class="icon-box-text">
										<strong class="d-block">Success Year</strong>
										10+ Years
									</div>
								</div>
							</li>

							<li>
								<div class="icon-box-icon-block">
									<div class="icon-box-round">
										<i class="lni-graduation"></i>
									</div>
									<div class="icon-box-text">
										<strong class="d-block">Min Qualification</strong>
										Master Degree
									</div>
								</div>
							</li>

						</ul>
					</div>

				</div>

				<!-- Company Address -->
				<div class="tr-single-box">
					<div class="tr-single-header">
						<h4><i class="ti-direction"></i> Company Address</h4>
					</div>

					<div class="tr-single-body">
						<ul class="extra-service">
							<li>
								<div class="icon-box-icon-block">
									<a href="#">
										<div class="icon-box-round">
											<i class="lni-map-marker"></i>
										</div>
										<div class="icon-box-text">
											524 New Ave, CA 548, USA
										</div>
									</a>
								</div>
							</li>

							<li>
								<div class="icon-box-icon-block">
									<a href="#">
										<div class="icon-box-round">
											<i class="lni-phone-handset"></i>
										</div>
										<div class="icon-box-text">
											+1 415-989-1002
										</div>
									</a>
								</div>
							</li>

							<li>
								<div class="icon-box-icon-block">
									<a href="#">
										<div class="icon-box-round">
											<i class="lni-envelope"></i>
										</div>
										<div class="icon-box-text">
											helpsupport.com@finding.com
										</div>
									</a>
								</div>
							</li>

							<li>
								<div class="icon-box-icon-block">
									<a href="#">
										<div class="icon-box-round">
											<i class="lni-world"></i>
										</div>
										<div class="icon-box-text">
											www.myfinding.com
										</div>
									</a>
								</div>
							</li>

						</ul>
					</div>

				</div>

				<!-- Follow this -->
				<div class="tr-single-box">
					<div class="tr-single-header">
						<h4><i class="ti-share"></i> Follow Us</h4>
					</div>

					<div class="tr-single-body">
						<ul class="extra-service half">
							<li>
								<div class="icon-box-icon-block">
									<a href="#">
										<div class="icon-box-round">
											<i class="lni-facebook"></i>
										</div>
										<div class="icon-box-text">
											Facebook
										</div>
									</a>
								</div>
							</li>

							<li>
								<div class="icon-box-icon-block">
									<a href="#">
										<div class="icon-box-round">
											<i class="lni-google-plus"></i>
										</div>
										<div class="icon-box-text">
											Google plus
										</div>
									</a>
								</div>
							</li>

							<li>
								<div class="icon-box-icon-block">
									<a href="#">
										<div class="icon-box-round">
											<i class="lni-twitter"></i>
										</div>
										<div class="icon-box-text">
											Twitter
										</div>
									</a>
								</div>
							</li>

							<li>
								<div class="icon-box-icon-block">
									<a href="#">
										<div class="icon-box-round">
											<i class="lni-linkedin"></i>
										</div>
										<div class="icon-box-text">
											LinkedIn
										</div>
									</a>
								</div>
							</li>

							<li>
								<div class="icon-box-icon-block">
									<a href="#">
										<div class="icon-box-round">
											<i class="lni-instagram"></i>
										</div>
										<div class="icon-box-text">
											Instagram
										</div>
									</a>
								</div>
							</li>

							<li>
								<div class="icon-box-icon-block">
									<a href="#">
										<div class="icon-box-round">
											<i class="fa fa-pinterest"></i>
										</div>
										<div class="icon-box-text">
											Pinterest
										</div>
									</a>
								</div>
							</li>

						</ul>
					</div>

				</div>

			</div>
			<!-- /col-md-4 -->
		</div>
	</div>
</section>
<!-- ============== Job Detail ====================== -->


		<!-- <script src="assets/js/counterup.min.js"></script>
		<script src="assets/js/custom.js"></script> -->
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->

@endsection

