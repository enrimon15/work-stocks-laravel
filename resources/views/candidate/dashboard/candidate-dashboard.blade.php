@extends('layouts.outline')

@section('content')

<!-- ============== Candidate Dashboard ====================== -->
<section class="tr-single-detail gray-bg">
	<div class="container">
		<div class="row">

			<!-- Sidebar Start -->
			<div class="col-md-4 col-sm-12">
				<div class="dashboard-wrap">

					<div class="dashboard-thumb">
						<div class="dashboard-th-pic">
							<img src="{{asset('images/avatar/' . Auth::user()->avatar)}}" class="img-fluid mx-auto img-circle" alt="" />
						</div>
						<h4 class="mb-1">{{Auth::user()->name." ".Auth::user()->surname}}</h4>
						<span class="text-success">{{Auth::user()->profile->job_title ?? null}}</span>
					</div>

					<!-- Nav tabs -->
					<ul class="nav dashboard-verticle-nav"> <!--nav-pills-->
						<li class="nav-item">
							<a class="nav-link {{Route::currentRouteName() == 'dashboard' ? 'active' : ''}}" href="{{route('dashboard')}}"><i class="ti-user"></i>Profilo</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{Route::currentRouteName() == 'changePassword' ? 'active' : ''}}" href="{{route('changePassword')}}"><i class="lni-lock"></i>Cambia Password</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{Route::currentRouteName() == 'onlineCV' ? 'active' : ''}}" href="{{route('onlineCV')}}"><i class="ti-file"></i>Online CV</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{Route::currentRouteName() == 'favorite' ? 'active' : ''}}" href="{{route('favorite')}}"><i class="lni-heart-filled"></i>Offerte Salvate</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{Route::currentRouteName() == 'appliedJobs' ? 'active' : ''}}" href="{{route('appliedJobs')}}"><i class="lni-briefcase"></i>Candidature</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{Route::currentRouteName() == 'jobAlert' ? 'active' : ''}}" href="{{route('jobAlert')}}"><i class="lni-alarm"></i>Job Alert</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{route('profile', ['id' => Auth::user()->id])}}"><i class="lni-user"></i>Visualizza Profilo</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i class="lni-exit"></i>
								{{ __('Log Out') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</li>
					</ul>

				</div>
			</div>
			<!-- /col-md-4 -->

			<div class="col-md-8 col-sm-12">
				<!-- Tab panes -->
				<div class="tab-content">

					<!-- yields here the main content page -->
					@yield('content-dashboard')

					<!-- CV & Cover letter -->
					<div class="tab-pane" id="cv">
						<!-- CV & Cover letter -->
						<div class="tr-single-box">
							<div class="tr-single-header">
								<h4><i class="ti-desktop"></i> CV & Cover letter</h4>
							</div>

							<div class="tr-single-body">
								<div class="row">

									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label>Full Name</label>
											<input class="form-control" type="text" value="Adam Muklarial">
										</div>
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label>Job Title</label>
											<input class="form-control" type="text" value="Web Designer & Developer">
										</div>
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label>Overview</label>
											<div id="cv-cover"><p>Hello Description</p></div>
										</div>
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12">
										<form>
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="customFile">
												<label class="custom-file-label" for="customFile">Choose file</label>
											</div>
										</form>
									</div>

								</div>
							</div>

						</div>
						<!-- /CV -->

						<a href="#" class="btn btn-info btn-md full-width">Save & Update<i class="ml-2 ti-arrow-right"></i></a>

					</div>

				</div>
			</div>

		</div>
	</div>
</section>
<!-- ============== Candidate Dashboard ====================== -->

@endsection