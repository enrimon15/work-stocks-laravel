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
								<img src="{{asset('storage/' . Auth::user()->avatar)}}" class="img-fluid mx-auto img-circle" alt="" />
							</div>
							<h4 class="mb-1">{{Auth::user()->company->name}}</h4>
							<span class="text-success">{{Auth::user()->company->slogan ?? null}}</span>
						</div>

						<!-- Nav tabs -->
						<ul class="nav dashboard-verticle-nav"> <!--nav-pills-->
							<li class="nav-item">
								<a class="nav-link {{Route::currentRouteName() == 'dashboardCompany' ? 'active' : ''}}" href="{{route('dashboardCompany')}}"><i class="ti-home"></i>{{__('dashboard/company/menu.profile')}}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{Route::currentRouteName() == 'workingPlacesCompany' ? 'active' : ''}}" href="{{route('workingPlacesCompany')}}"><i class="ti-pin"></i>{{__('dashboard/company/menu.workingPlaces')}}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{Route::currentRouteName() == 'changePassword' ? 'active' : ''}}" href="{{route('changePassword')}}"><i class="lni-lock"></i>{{__('dashboard/company/menu.changePass')}}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{Route::currentRouteName() == 'postNewJobCompany' ? 'active' : ''}}" href="{{route('postNewJobCompany')}}"><i class="ti-plus"></i>{{__('dashboard/company/menu.newJob')}}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{(Route::currentRouteName() == 'manageJobsCompany' || Route::currentRouteName() == 'manageJobsCompanyCandidate') ? 'active' : ''}}" href="{{route('manageJobsCompany')}}"><i class="lni-briefcase"></i>{{__('dashboard/company/menu.createdJobs')}}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{route('profile', ['type' => 'company','id' => Auth::user()->id])}}"><i class="lni-user"></i>{{__('dashboard/company/menu.showProfile')}}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									<i class="lni-exit"></i>
									{{__('dashboard/user/menu.logout')}}
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

					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- ============== Candidate Dashboard ====================== -->

@endsection