@extends('layouts.outline')

@section('content')

	<style>
		@media screen and (max-width: 768px) {
			#showMore {
				text-align: start!important;
				margin-top: 10px!important;
			}
		}

		@media screen and (min-width: 769px) {
			#showMore {
				text-align: end!important;
				margin-top: 0px!important;
			}
		}
	</style>

<!-- ======================= Start Banner ===================== -->
<section class="page-title-banner" style="background-image:url({{asset('img/companies-banner.jpeg')}});">
	<div class="container">
		<div class="row m-0 align-items-end detail-swap">
			<div class="tr-list-wrap">
				<div class="tr-list-detail">
					<div class="tr-list-thumb">
						<img src="{{asset('storage/'. $company->user->avatar)}}" class="img-responsive" alt="" />
					</div>
					<div class="tr-list-info">
						<h4 class="mb-1">{{$company->name}}</h4>
						<p class="mb-1"><i class="ti-location-pin mr-2"></i>{{$company->mainPlaceOfWork()->city . ', ' . $company->mainPlaceOfWork()->country}}</p>
					</div>
				</div>
				<div class="listing-detail_right">
					<div class="listing-detail-item">
						<a href="#" class="btn btn-list full-width color--linkedin"><i class="ti-email mr-2"></i> {{__('profile/companyProfile.message')}}</a>
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
						<h4><i class="ti-info"></i>{{__('profile/companyProfile.overview')}}</h4>
					</div>
					<div class="tr-single-body">
						{{ $company->overview ?? __('profile/companyProfile.noDesc') }}
					</div>
				</div>

				<!-- Job Qualifications -->
				<div class="tr-single-box">
					<div class="tr-single-header">
						<h4><i class="ti-map-alt"></i>{{__('profile/companyProfile.workingPlaces')}}</h4>
					</div>
					<div class="tr-single-body">
						<ul class="jb-detail-list">
							@foreach($company->workingPlaces as $workingPlace)
								@if($workingPlace->primary)
								<li>{{$workingPlace->address . ', ' . $workingPlace->city . ' (' . $workingPlace->country . ') - '}} <strong>{{__('profile/companyProfile.' . $workingPlace->type)}}</strong></li>
								@endif
							@endforeach
						</ul>
					</div>
				</div>


				<!-- Job Latest -->
				<div class="tr-single-box">
					<div class="tr-single-header row">
						<div class="col-sm-12 col-lg col-md">
							<h4><i class="ti-cup"></i>{{__('profile/companyProfile.openPosition')}}</h4>
						</div>
						<div id="showMore" class="col-sm-12 col-lg col-md" style="text-align: end">
							@if(count($latestJobs) > 0)
							<a href="{{url('/jobs?filter[company.name]=' . $company->name)}}">
								{{__('profile/companyProfile.showMore')}}
							</a>
							@endif
						</div>

					</div>
					<div class="tr-single-body">
						<div  class="owl-carousel" id="rl-list">

							@forelse($latestJobs as $job)
								<!-- Single Job -->
									<div class="item">
										<div class="job-grid style-1">
											<div class="job-grid-wrap">
												<span class="job-type j-part-time">{{$job->offers_type}}</span>
												<div class="job-grid-thumb">
													<a style="cursor: auto" href="#"><img src="{{asset('storage/'. $company->user->avatar)}}" class="img-fluid mx-auto" alt="" /></a>
												</div>
												<h4 class="job-title"><a href="{{route('jobs/getById', ['id' => $job->id])}}">{{$job->title}}</a></h4>
												<hr>
												<div class="job-grid-detail">
													<h4 class="jbc-name"><a style="cursor: auto" href="#">{{$company->name}}</a></h4>
													<p><i class="ti-location-pin"></i>{{$job->workingPlace->address . ', ' . $job->workingPlace->city . ' (' . $job->workingPlace->country . ')'}} </p>
												</div>
												<div class="job-grid-footer">
													<h4 class="job-price">{{__('profile/companyProfile.upTo') . ' ' . $job->max_salary . 'k'}}</h4>
													<a href="{{route('jobs/getById', ['id' => $job->id])}}" class="btn btn-outline-info btn-rounded">{{__('profile/companyProfile.apply')}}</a>
												</div>

											</div>
										</div>
									</div>
							@empty
								<p>{{__('profile/companyProfile.noJobs')}}</p>
							@endforelse

						</div>
					</div>
				</div>


			</div>

			<!-- Sidebar Start -->
			<div class="col-md-4 col-sm-12">

				<div class="offer-btn-wrap mb-4">
					<a href="#" class="btn btn-info btn-md full-width"><i class="mr-2 ti-bell"></i>{{__('profile/companyProfile.jobAlert')}}</a>
				</div>

				<!-- Company Overview -->
				<div class="tr-single-box">
					<div class="tr-single-header">
						<h4><i class="ti-direction"></i> {{__('profile/companyProfile.description')}}</h4>
					</div>

					<div class="tr-single-body">
						<ul class="extra-service">
							<li>
								<div class="icon-box-icon-block">
									<div class="icon-box-round">
										<i class="lni-users"></i>
									</div>
									<div class="icon-box-text">
										<strong class="d-block">{{__('profile/companyProfile.employee')}}</strong>
										{{$company->employees_number}}
									</div>
								</div>
							</li>

							<li>
								<div class="icon-box-icon-block">
									<div class="icon-box-round">
										<i class="lni-text-format"></i>
									</div>
									<div class="icon-box-text">
										<strong class="d-block">{{__('profile/companyProfile.vatNumber')}}</strong>
										{{$company->vat_number}}
									</div>
								</div>
							</li>

							<li>
								<div class="icon-box-icon-block">
									<div class="icon-box-round">
										<i class="ti-home"></i>
									</div>
									<div class="icon-box-text">
										<strong class="d-block">C{{__('profile/companyProfile.form')}}</strong>
										{{$company->company_form}}
									</div>
								</div>
							</li>

							<li>
								<div class="icon-box-icon-block">
									<div class="icon-box-round">
										<i class="lni-certificate"></i>
									</div>
									<div class="icon-box-text">
										<strong class="d-block">{{__('profile/companyProfile.year')}}</strong>
										{{$company->foundation_year}}
									</div>
								</div>
							</li>

							@if(isset($company->slogan))
							<li>
								<div class="icon-box-icon-block">
									<div class="icon-box-round">
										<i class="lni-pencil"></i>
									</div>
									<div class="icon-box-text">
										<strong class="d-block">{{__('profile/companyProfile.slogan')}}</strong>
										{{$company->slogan}}
									</div>
								</div>
							</li>
							@endif

						</ul>
					</div>

				</div>

				<!-- Company Address -->
				<div class="tr-single-box">
					<div class="tr-single-header">
						<h4><i class="ti-direction"></i> {{__('profile/companyProfile.addressTitle')}}</h4>
					</div>

					<div class="tr-single-body">
						<ul class="extra-service">
							<li>
								<div class="icon-box-icon-block">
									<a href="https://www.google.com/maps/search/?api=1&query={{str_replace(' ','%20',$company->mainPlaceOfWork()->address).'%20'.
                                                                                                str_replace(' ','%20',$company->mainPlaceOfWork()->city).'%20'.
                                                                                                str_replace(' ','%20',$company->mainPlaceOfWork()->country)}}">
										<div class="icon-box-round">
											<i class="lni-map-marker"></i>
										</div>
										<div class="icon-box-text">
											{{$company->mainPlaceOfWork()->address . ', ' . $company->mainPlaceOfWork()->city . ' (' . $company->mainPlaceOfWork()->country . ')'}}
										</div>
									</a>
								</div>
							</li>

							@if(isset($company->telephone))
							<li>
								<div class="icon-box-icon-block">
									<a href="tel:{{$company->telephone}}">
										<div class="icon-box-round">
											<i class="lni-phone-handset"></i>
										</div>
										<div class="icon-box-text">
											{{$company->telephone}}
										</div>
									</a>
								</div>
							</li>
							@endif

							<li>
								<div class="icon-box-icon-block">
									<a href="mailto:{{$company->user->email}}">
										<div class="icon-box-round">
											<i class="lni-envelope"></i>
										</div>
										<div class="icon-box-text">
											{{$company->user->email}}
										</div>
									</a>
								</div>
							</li>

							@if(isset($company->website))
							<li>
								<div class="icon-box-icon-block">
									<a href="{{'//'.$company->website}}">
										<div class="icon-box-round">
											<i class="lni-world"></i>
										</div>
										<div class="icon-box-text">
											{{$company->website}}
										</div>
									</a>
								</div>
							</li>
							@endif

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

