@extends('layouts.outline')

@section('content')

<!-- ======================= Start Banner ===================== -->
<section class="page-title-banner" style="background-image:url({{asset('img/banner-subscriber.jpeg')}});">
	<div class="container">
		<div class="row m-0 align-items-end detail-swap">
			<div class="tr-list-wrap">
				<div class="tr-list-detail">
					<div class="tr-list-thumb">
						<img src="{{asset('storage/' . $user->avatar)}}" class="img-responsive" alt="" />
					</div>
					<div class="tr-list-info">
						<h4 class="mb-1">{{$user->name . ' ' . $user->surname}}</h4>
						<p class="mb-1 text-warning">{{$user->profile->job_title ?? null}}</p>
						<p class="mb-1">
							@if(isset($user->profile->city) || isset($user->profile->country))
								<i class="ti-location-pin mr-2"></i>
							@endif
							{{isset($user->profile->city) ? $user->profile->city . ', ' : null}} {{$user->profile->country ?? null}}</p>
					</div>
				</div>
				<div class="listing-detail_right">
					<div class="listing-detail-item">
						<a href="#" data-toggle="modal" data-target="#mail" class="btn btn-list full-width color--linkedin"><i class="ti-email mr-2"></i> {{__('profile/userProfile.message')}}</a>
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
		@if(Session::get('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{Session::get('success')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif

		<div class="row">

			<div class="col-md-8 col-sm-12">

				<!-- Candidate Overview -->
				<div class="tr-single-box">
					<div class="tr-single-header">
						<h4><i class="ti-info"></i>{{__('profile/userProfile.overview')}}</h4>
					</div>
					<div class="tr-single-body">
						{!! $user->profile->overview ?? __('profile/userProfile.noDesc') !!}
					</div>
				</div>

				<!-- Extra Skill& Knowledge -->
				<div class="tr-single-box">
					<div class="tr-single-header">
						<h4><i class="ti-book"></i>{{__('profile/userProfile.skill')}}</h4>
					</div>
					<div class="tr-single-body">
						<!-- Skills -->
						<div class="row">

							@forelse($user->skills as $skill)
								<div class="col-lg-6 col-md-6 col-sm-12">
									<label>{{$skill->name}}</label>
									<div class="progress">
										<div class="progress-bar progress-bar-striped bg-{{$skill->getSkillColor()}}" role="progressbar" style="width: {{$skill->getSkillLevel()}}%" aria-valuenow="{{$skill->getSkillLevel()}}" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							@empty
								<p class="ml-4">{{__('profile/userProfile.noSkill')}}</p>
							@endforelse

						</div>

					</div>
				</div>


				<!-- Education & Qualification -->
				<div class="tr-single-box">
					<div class="tr-single-header">
						<h4><i class="ti-cup"></i>{{__('profile/userProfile.education')}}</h4>
					</div>
					<div class="tr-single-body">
						<ul class="qa-skill-list" style="{{count($user->qualifications) <= 0 ? 'border-left: none!important' : ''}}">

							@forelse($user->qualifications as $qualification)
								<!-- Single List -->
								<li>
									<div class="qa-skill-box">
										<h4 class="qa-skill-title">{{$qualification->name}}<span class="qa-time">{{date('d-m-y', strtotime($qualification->start_date)) . ' - '}}{{isset($qualification->end_date) ? date('d-m-y', strtotime($qualification->end_date)) : 'in corso'}}</span></h4>
										<h5 class="qa-subtitle">{{$qualification->institute}}</h5>
										@if(isset($qualification->description))
											<div class="qa-content">
												<p>{{$qualification->description}}</p>
											</div>
										@endif

										@if(isset($qualification->valuation))
											<div class="qa-content">
												<p>{{__('profile/userProfile.valuation') . $qualification->valuation}}</p>
											</div>
										@endif
									</div>
								</li>
							@empty
								<p>{{__('profile/userProfile.noEducation')}}</p>
							@endforelse

						</ul>
					</div>
				</div>

				<!-- Experience -->
				<div class="tr-single-box">
					<div class="tr-single-header">
						<h4><i class="lni lni-briefcase"></i>{{__('profile/userProfile.experience')}}</h4>
					</div>
					<div class="tr-single-body">
						<ul class="qa-skill-list" style="{{count($user->workingExperiences) <= 0 ? 'border-left: none!important' : ''}}">

						@forelse($user->workingExperiences as $experience)
							<!-- Single List -->
							<li>
								<div class="qa-skill-box">
									<h4 class="qa-skill-title">{{$experience->job_position}}<span class="qa-time">{{date('d-m-y', strtotime($experience->start_date)) . ' - '}}{{isset($experience->end_date) ? date('d-m-y', strtotime($experience->end_date)) : 'in corso'}}</span></h4>
									<h5 class="qa-subtitle">{{$qualification->company}}</h5>
									@if(isset($experience->description))
										<div class="qa-content">
											<p>{{$experience->description}}</p>
										</div>
									@endif
								</div>
							</li>
						@empty
							<p>{{__('profile/userProfile.noExperience')}}</p>
						@endforelse

						</ul>
					</div>
				</div>

				<!-- Certificate -->
				<div class="tr-single-box">
					<div class="tr-single-header">
						<h4><i class="lni-certificate"></i>{{__('profile/userProfile.certificate')}}</h4>
					</div>
					<div class="tr-single-body">
						<ul class="qa-skill-list" style="{{count($user->certificates) <= 0 ? 'border-left: none!important' : ''}}">

						@forelse($user->certificates as $certificate)
							<!-- Single List -->
								<li>
									<div class="qa-skill-box">
										<h4 class="qa-skill-title">{{$certificate->name}}<span class="qa-time">{{date('d-m-y', strtotime($certificate->date))}}{{isset($certificate->end_date) ? ' - ' . date('d-m-y', strtotime($certificate->end_date)) : ' - ' . __('profile/userProfile.noExp')}}</span></h4>
										<h5 class="qa-subtitle">{{__('profile/userProfile.society')}} {{$certificate->society}}</h5>
										<div class="qa-content">
											<p>{{__('profile/userProfile.credential')}} <a href="{{$certificate->link ?? '#'}}">{{$certificate->credential}}</a></p>
										</div>
									</div>
								</li>
							@empty
								<p>{{__('profile/userProfile.noCertificate')}}</p>
							@endforelse

						</ul>
					</div>
				</div>


			</div>

			<!-- Sidebar Start -->
			<div class="col-md-4 col-sm-12">

				<div class="offer-btn-wrap mb-4">
					@if($user->profile == null || $user->profile->cv_path == null)
						<a href="#" style="cursor: not-allowed" class="btn btn-info btn-md full-width"><i class="mr-2 ti-download"></i>{{__('profile/userProfile.cv')}}</a>
					@elseif($user->profile != null && $user->profile->cv_path != null)
						<a href="{{ route('profileCV', ['idUser' => $user->id]) }}" class="btn btn-info btn-md full-width"><i class="mr-2 ti-download"></i>{{__('profile/userProfile.cv')}}</a>
					@endif
				</div>

				<!-- Candidate Detail -->
				<div class="tr-single-box">
					<div class="tr-single-header">
						<h4><i class="ti-direction"></i> {{__('profile/userProfile.detail')}}</h4>
					</div>


					<div class="tr-single-body">
						<ul class="extra-service">

							@if(isset($user->profile->min_salary))
							<li>
								<div class="icon-box-icon-block">
									<div class="icon-box-round">
										<i class="ti-money"></i>
									</div>
									<div class="icon-box-text">
										<strong class="d-block">{{__('profile/userProfile.salary')}}</strong>
										{{$user->profile->min_salary . 'K'}}
									</div>
								</div>
							</li>
							@endif

							@if(isset($user->profile->sex))
							<li>
								<div class="icon-box-icon-block">
									<div class="icon-box-round">
										<i class="lni-users"></i>
									</div>
									<div class="icon-box-text">
										<strong class="d-block">{{__('profile/userProfile.gender')}}</strong>
										{{$user->profile->sex}}
									</div>
								</div>
							</li>
							@endif

						</ul>
					</div>

				</div>

				<!-- Candidate Address -->
				<div class="tr-single-box">
					<div class="tr-single-header">
						<h4><i class="ti-direction"></i> {{__('profile/userProfile.address')}}</h4>
					</div>

					<div class="tr-single-body">
						<ul class="extra-service">
							@if(isset($user->profile->country) || isset($user->profile->city))
							<li>
								<div class="icon-box-icon-block">
									<a href="https://www.google.com/maps/search/?api=1&query={{ str_replace(' ','%20',$user->profile->city).'%20'.
                                                                                                str_replace(' ','%20',$user->profile->country)}}">
										<div class="icon-box-round">
											<i class="lni-map-marker"></i>
										</div>
										<div class="icon-box-text">
											{{isset($user->profile->city) ? $user->profile->city . ', ' : null}} {{$user->profile->country ?? null}}
										</div>
									</a>
								</div>
							</li>
							@endif

							@if(isset($user->profile->telephone))
							<li>
								<div class="icon-box-icon-block">
									<a href="tel:{{$user->profile->telephone}}">
										<div class="icon-box-round">
											<i class="lni-phone-handset"></i>
										</div>
										<div class="icon-box-text">
											{{$user->profile->telephone}}
										</div>
									</a>
								</div>
							</li>
							@endif

							<li>
								<div class="icon-box-icon-block">
									<a href="mailto:{{$user->email}}">
										<div class="icon-box-round">
											<i class="lni-envelope"></i>
										</div>
										<div class="icon-box-text">
											{{$user->email}}
										</div>
									</a>
								</div>
							</li>

							@if(isset($user->profile->website))
							<li>
								<div class="icon-box-icon-block">
									<a href="{{'//'.$user->profile->website}}">
										<div class="icon-box-round">
											<i class="lni-world"></i>
										</div>
										<div class="icon-box-text">
											{{$user->profile->website}}
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

<!-- Modal -->
<div class="modal fade" id="mail" tabindex="-1" role="dialog" aria-labelledby="mail" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">{{__('profile/userProfile.message')}}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="form-contact" method="POST" action="{{ route('sendMail', ['idRecipient' => $user->id]) }}">
					@csrf
					<div class="row">
						<div class="form-group col-md-12 col-sm-12">
							<input class="form-control" name="idUser" type="hidden" value="{{Auth::user()->id ?? null}}">
							<textarea name="message" class="form-control" placeholder="{{__('profile/userProfile.mail')}}"></textarea>
						</div>

						<div class="col-md-12 col-sm-12">
							@guest
								<button disabled class="btn btn-primary" type="button">{{__('blog.submit')}}</button>
							@else
								<button id="spinner" onclick="handleMail()" class="btn btn-primary" type="submit">{{__('blog.submit')}}</button>
							@endguest
						</div>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>

<script>
	function htmlToElement(html) {
		let template = document.createElement('template');
		html = html.trim(); // Never return a text node of whitespace as the result
		template.innerHTML = html;
		return template.content.firstChild;
	}

	function handleMail() {
		const $button = document.getElementById('spinner');

		const spinner = htmlToElement('<div class="spinner-border text-success" role="status"><span class="sr-only">Loading...</span></div>');
		$button.replaceWith(spinner);

		document.getElementById('form-contact').submit()
	}
</script>

@endsection
