@extends('layouts.outline')

@section('content')
<!-- Preloader - style you can find in spinners.css -->
<div class="Loader"></div>

<!-- ============================ Hero Banner  Start================================== -->
<div class="hero-header jumbo-banner text-center" style="background: url({{asset($home->banner_img_path)}});" data-overlay="6">
	<div class="container">
		<h1>{{Lang::locale() == 'en' ? $home->banner_title_en : $home->banner_title_it}}</h1>
		<p class="lead">{{Lang::locale() == 'en' ? $home->banner_subtitle_en : $home->banner_subtitle_it}}</p>
		@if($home->show_search_bar == true)
			<form class="search-big-form no-border search-shadow" method="POST" action="{{ route('newsComment') }}">
				@csrf
				<div class="row m-0">
					<div class="col-lg-5 col-md-5 col-sm-12 p-0">
						<div class="form-group">
							<i class="ti-search"></i>
							<input name="jobTitle" type="text" class="form-control b-r" placeholder="{{__('home.jobTitle')}}">
						</div>
					</div>

					<div class="col-lg-5 col-md-5 col-sm-12 p-0">
						<div class="form-group">
							<i class="ti-location-pin"></i>
							<input name="location" type="text" class="form-control b-r" placeholder="{{__('home.location')}}">
						</div>
					</div>

					<div class="col-lg-2 col-md-2 col-sm-12 p-0">
						<button type="button" class="btn btn-primary full-width">{{__('home.submit')}}</button>
					</div>
				</div>
			</form>
		@endif
	</div>
</div>
<!-- ============================ Hero Banner End ================================== -->

<!-- ============================ Popular Companies ================================== -->
@if($home->homeComponents()->where('component_name', 'pupular_companies')->first()->active == true)
<section>
	<div class="container">

		<div class="row">
			<div class="col text-center">
				<div class="sec-heading mx-auto">
					<p>{{Lang::locale() == 'en' ? $home->homeComponents()->where('component_name', 'pupular_companies')->first()->component_title_en : $home->homeComponents()->where('component_name', 'pupular_companies')->first()->component_title_it}}</p>
					<h2>{{Lang::locale() == 'en' ? $home->homeComponents()->where('component_name', 'pupular_companies')->first()->component_subtitle_en : $home->homeComponents()->where('component_name', 'pupular_companies')->first()->component_subtitle_it}}</h2>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="owl-carousel" id="job-slide">

				@forelse($companies as $company)
				<!-- Single Job -->
				<div class="item">
					<div class="job-grid style-1">
						<div class="job-grid-wrap">
							<div class="job-grid-thumb">
								<a style="cursor: default;" href="#"><img src="{{asset('storage/' . $company->avatar)}}" class="img-fluid mx-auto" alt="" /></a>
							</div>
							<h4 class="job-title"><a href="{{route('profile', ['type' => 'company', 'id' => $company->id])}}">{{$company->name}}</a></h4>
							<hr>
							<div class="job-grid-detail">
								<h4 class="jbc-name">{{$company->slogan}}</h4>
								<p><i class="ti-location-pin"></i>{{\App\Models\Company::find($company->id)->mainPlaceOfWork()->city . ', ' . \App\Models\Company::find($company->id)->mainPlaceOfWork()->country}} </p>
							</div>
							<div class="job-grid-footer" style="justify-content: center;">
								<a href="{{route('profile', ['type' => 'company', 'id' => $company->id])}}" class="btn btn-outline-info btn-rounded">{{__('home.visitCompany')}}</a>
							</div>

						</div>
					</div>
				</div>
				@empty
					<div class="container">
						<p>{{__('home.noPopularCompanies')}}</p>
					</div>
				@endforelse

			</div>
		</div>

	</div>
</section>
@endif
<!-- ============================ Popular Companies End ================================== -->

<!-- ============================ Category Start ================================== -->
<!-- <section class="gray">
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
<div class="clearfix"></div> -->
<!-- ============================ Category End ================================== -->

<!-- ============================ Counter Facts  Start================================== -->
@if($home->homeComponents()->where('component_name', 'statistics_banner')->first()->active == true)
<section class="image-bg text-center" style="background:#00a94f" data-overlay="0">
	<div class="container">
		<div class="row">

			<div class="col-lg-3 col-md-3 col-sm-6 b-r">
				<div class="count-facts">
					<h4>{{$stats['jobs']}}</h4>
					<span>{{__('home.jobs')}}</span>
				</div>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-6 b-r">
				<div class="count-facts">
					<h4>{{$stats['applications']}}</h4>
					<span>{{__('home.applications')}}</span>
				</div>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-6 b-r">
				<div class="count-facts">
					<h4>{{$stats['companies']}}</h4>
					<span>{{__('home.companies')}}</span>
				</div>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="count-facts">
					<h4>{{$stats['users']}}</h4>
					<span>{{__('home.users')}}</span>
				</div>
			</div>

		</div>
	</div>
</section>
@endif
<!-- ============================ Counter Facts End ================================== -->

@if($home->homeComponents()->where('component_name', 'popular_jobs')->first()->active == true)
<!-- ============================ Popular Jobs Start ================================== -->
<section>
	<div class="container">

		<div class="row">
			<div class="col text-center">
				<div class="sec-heading mx-auto">
					<p>{{Lang::locale() == 'en' ? $home->homeComponents()->where('component_name', 'popular_jobs')->first()->component_title_en : $home->homeComponents()->where('component_name', 'popular_jobs')->first()->component_title_it}}</p>
					<h2>{{Lang::locale() == 'en' ? $home->homeComponents()->where('component_name', 'popular_jobs')->first()->component_subtitle_en : $home->homeComponents()->where('component_name', 'popular_jobs')->first()->component_subtitle_it}}</h2>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">

				@forelse($jobs as $job)
				<!-- Single Large Job List -->
				<div class="job-new-list" style="cursor: default">
					<div class="vc-thumb">
						<img class="img-fluid rounded-circle" src="{{asset('storage/'. \App\Models\JobOffer::find($job->id)->company->user->avatar)}}" alt="c2.jpg">
					</div>
					<div class="vc-content">
						<h5 class="title"><a href="{!! route('jobs/getById',['id'=>$job->id]) !!}">{{$job->title}}</a><span class="j-full-time">{{__('jobs/filters.'.$job->offers_type)}}</span></h5>
						<p>{{\App\Models\JobOffer::find($job->id)->company->name}}</p>
						<ul class="vc-info-list">
							<li class="list-inline-item"><h5>{{__('home.salary')}}</h5> <i class="ti-credit-card"></i>{{$job->min_salary . 'k' . '-' . $job->max_salary . 'k'}}</li>
							@if(!empty(\App\Models\JobOffer::find($job->id)->tagNames()))
							<li class="list-inline-item"><h5>{{__('home.skills')}}</h5>
								<div class="skills">
										@foreach(\App\Models\JobOffer::find($job->id)->tagNames() as $tag)
											@if($loop->iteration > 3)
												<span>+ {{' '.
                                                                            (count($job->tagNames())-3)
                                                                            .' '.
                                                                            trans_choice('jobs/jobs.others',(count($job->tagNames())-3))
                                                                            }}
                                                                    </span>
												@break
											@endif
											<span>{{$tag}}</span>
										@endforeach
									<!-- <span>Css3</span><span>photoshop</span><span>java</span><span>+3 more</span> -->
								</div>
							</li>
							@endif
						</ul>
					</div>
					<a class="btn btn-primary bn-det" href="{{route('jobs/getById', ['id'=>$job->id])}}">{{__('home.apply')}}<i class="ti-arrow-right ml-1"></i></a>
				</div>
				@empty
					<div class="container">
						<p>{{__('home.noJobs')}}</p>
					</div>
				@endforelse

			</div>
		</div>

	</div>
</section>
<div class="clearfix"></div>
@endif
<!-- ============================ Popular Jobs End ================================== -->

<!-- ============================ Blog Start ================================== -->
@if($home->homeComponents()->where('component_name', 'latest_news')->first()->active == true)
<section>
	<div class="container">

		<div class="row">
			<div class="col text-center">
				<div class="sec-heading mx-auto">
					<p>{{Lang::locale() == 'en' ? $home->homeComponents()->where('component_name', 'latest_news')->first()->component_title_en : $home->homeComponents()->where('component_name', 'latest_news')->first()->component_title_it}}</p>
					<h2>{{Lang::locale() == 'en' ? $home->homeComponents()->where('component_name', 'latest_news')->first()->component_subtitle_en : $home->homeComponents()->where('component_name', 'latest_news')->first()->component_subtitle_it}}</h2>
				</div>
			</div>
		</div>

		<div class="row">
			@forelse($news as $singleNews)
				<div class="col-lg-4 col-md-4">
					<div class="blog-grid-wrap mb-4">
						<div class="blog-grid-thumb" style="height: 235px">
							<a href="#"><img src="{{asset('storage/'.$singleNews->image_path)}}" class="img-responsive" style="height: 100%; width: auto!important" alt="" /></a>
							<h6 class="post-cat">{{$singleNews->created_at->format('d/m')}}</h6>
						</div>
						<div class="blog-grid-content" style="height: 170px">
							<h4 class="cnt-gb-title"><a href="{{ route('newsById', ['id' => $singleNews->id]) }}">{{$singleNews->title}}</a></h4>
							<p>{{  \Illuminate\Support\Str::limit(strip_tags($singleNews->body), 100,'...')  }}</p>
						</div>
						<div class="blog-grid-meta">
							<div class="gb-info-author">
							</div>
							<div class="gb-info-cmt">
								<ul>
									<li><a style="cursor: default" href="#">{{count($singleNews->comments)}}<i class="fa fa-comment text-info"></i></a></li>
									<li><a style="cursor: default" href="#">{{count($singleNews->likes)}}<i class="fa fa-heart text-info"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			@empty
				<div class="container">
					<p>{{__('home.noNews')}}</p>
				</div>
			@endforelse

		</div>

	</div>
</section>
@endif
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