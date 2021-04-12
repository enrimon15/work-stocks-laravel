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
							<img src="https://via.placeholder.com/400x400" class="img-fluid mx-auto img-circle" alt="" />
						</div>
						<h4 class="mb-1">Adam Muklarial</h4>
						<span class="text-success">Web Designer</span>
					</div>

					<!-- Nav tabs -->
					<ul class="nav dashboard-verticle-nav">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#profile" id="testr"><i class="ti-user"></i>Profilo</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#change-password"><i class="lni-lock"></i>Cambia Password</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#resume"><i class="ti-file"></i>Online CV</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#shortlisted"><i class="lni-heart-filled"></i>Offerte Salvate</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#applied"><i class="lni-briefcase"></i>Candidature</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#alert"><i class="lni-alarm"></i>Job Alert</a>
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

					<!-- My Profile -->
					<div class="tab-pane {{empty(Session::get('tab')) ? 'active' : (Session::get('tab') == 'profile' ? 'active container' : '')}}" id="profile">

						<!-- Basic Info -->
						<div class="tr-single-box">
							<div class="tr-single-header">
								<h4><i class="ti-desktop"></i> Dettagli Profilo</h4>
							</div>

							<div class="tr-single-body">
								<div class="row">

									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label>Nome</label>
											<input class="form-control" type="text" value="Adam Muklarial">
										</div>
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label>Cognome</label>
											<input class="form-control" type="text" value="Adam Muklarial">
										</div>
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label>Titolo di lavoro</label>
											<input class="form-control" type="text" value="Web Designer & Developer">
										</div>
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label>Salario minimo</label>
											<input class="form-control" ttype="text" value="10000">
										</div>
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label>Descrizione</label>
											<div id="summernote"><p>Hello Description</p></div>
										</div>
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label>Avatar</label>
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="clogo">
												<label class="custom-file-label" for="clogo">Scegli immagine</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<label>Data di nascita</label>
											<input class="form-control" type="date" value="15/05/1997">
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<label>Sesso</label>
											<select class="form-control" name="sex">
												<option value="M">M</option>
												<option value="F">F</option>
											</select>
										</div>
									</div>

								</div>
							</div>

						</div>
						<!-- /Basic Info -->

						<!-- Contact Info -->
						<div class="tr-single-box">
							<div class="tr-single-header">
								<h4><i class="ti-headphone"></i> Contatti</h4>
							</div>

							<div class="tr-single-body">
								<div class="row">

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<label class="social-nfo">Telefono</label>
											<input class="form-control" type="text" value="91 254 548 7584">
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<label class="social-nfo">Email</label>
											<input class="form-control" type="text" value="drizvato@gmail.com">
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<label class="social-nfo">Nazionalità</label>
											<input class="form-control" type="text" value="India">
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<label class="social-nfo">Città</label>
											<input class="form-control" type="text" value="Chandigarh">
										</div>
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<label class="social-nfo">Sito web</label>
											<input class="form-control" type="text" value="https://drizvato.com">
										</div>
									</div>

								</div>
							</div>

						</div>
						<!-- /Contact Info -->

						<a href="#" class="btn btn-info btn-md full-width">Salva<i class="ml-2 ti-arrow-right"></i></a>

					</div>

					<!-- My Resume and Online CV -->
					<div class="tab-pane {{Session::get('tab') == 'cv' ? 'active container' : ''}}" id="resume">

						<!-- Add Educations -->
						<div class="tr-single-box">
							<div class="tr-single-header">
								<h4><i class="lni-graduation"></i> Add Education</h4>
							</div>

							<div class="tr-single-body">
								<table class="table table-striped mb-5">
									<thead class="thead-dark">
									<tr>
										<th scope="col">Qualification</th>
										<th scope="col">Dates</th>
										<th scope="col">School / Colleges</th>
										<th scope="col">Action</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<th scope="row">Masters In Fine Arts</th>
										<td>2002 - 2004</td>
										<td>Virazia University</td>
										<td>
											<div class="dash-action">
												<a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
												<a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<th scope="row">Tommers College</th>
										<td>2012 - 2015</td>
										<td>Bachlors in Fine Arts</td>
										<td>
											<div class="dash-action">
												<a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
												<a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<th scope="row">Diploma In Fine Arts</th>
										<td>2014 - 2015</td>
										<td>Imperieal of Art Direction</td>
										<td>
											<div class="dash-action">
												<a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
												<a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
											</div>
										</td>
									</tr>
									</tbody>
								</table>

								<table class="price-list-wrap">
									<tbody class="ui-sortable"><tr class="pricing-list-item pattern ui-sortable-handle">
										<td>
											<div class="box-close"><a class="delete" href="#"><i class="ti-close"></i></a></div>
											<div class="row">

												<div class="col-lg-12 col-md-12 col-sm-12">
													<div class="form-group">
														<label>Title</label>
														<input class="form-control" type="text" value="Adam Muklarial">
													</div>
												</div>

												<div class="col-lg-6 col-md-6 col-sm-6">
													<div class="form-group">
														<label>From</label>
														<input placeholder="06.11.2007" type="text" class="form-control datepicker">
													</div>
												</div>

												<div class="col-lg-6 col-md-6 col-sm-6">
													<div class="form-group">
														<label>To</label>
														<input placeholder="07.17.2010" type="text" class="form-control datepicker">
													</div>
												</div>


												<div class="col-lg-12 col-md-12 col-sm-12">
													<div class="form-group">
														<label>University</label>
														<input placeholder="University Name" type="text" class="form-control">
													</div>
												</div>

											</div>
										</td>
									</tr>
									</tbody>
								</table>
								<a href="#" class="btn add-pr-item-btn">Add Item</a>
							</div>

						</div>
						<!-- /Education Info -->

						<!-- Add Experience -->
						<div class="tr-single-box">
							<div class="tr-single-header">
								<h4><i class="lni-briefcase"></i> Experience</h4>
							</div>

							<div class="tr-single-body">
								<table class="table table-striped mb-5">
									<thead class="thead-dark">
									<tr>
										<th scope="col">Skills @ Company</th>
										<th scope="col">Dates</th>
										<th scope="col">Action</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<th scope="row">Wordpress Developer at Gio Tech</th>
										<td>2002 - 2004</td>
										<td>
											<div class="dash-action">
												<a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
												<a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<th scope="row">PHP Developer at Hint Solution</th>
										<td>2012 - 2015</td>
										<td>
											<div class="dash-action">
												<a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
												<a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<th scope="row">Web Designer at Indo Soft</th>
										<td>2014 - 2015</td>
										<td>
											<div class="dash-action">
												<a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
												<a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
											</div>
										</td>
									</tr>
									</tbody>
								</table>

								<table class="price-list-wrap">
									<tbody class="ui-sortable"><tr class="pricing-list-item pattern ui-sortable-handle">
										<td>
											<div class="box-close"><a class="delete" href="#"><i class="ti-close"></i></a></div>
											<div class="row">

												<div class="col-lg-12 col-md-12 col-sm-12">
													<div class="form-group">
														<label>Title</label>
														<input class="form-control" type="text" value="Skill & Company">
													</div>
												</div>

												<div class="col-lg-6 col-md-6 col-sm-6">
													<div class="form-group">
														<label>From</label>
														<input placeholder="06.11.2007" type="text" class="form-control datepicker">
													</div>
												</div>

												<div class="col-lg-6 col-md-6 col-sm-6">
													<div class="form-group">
														<label>To</label>
														<input placeholder="07.17.2010" type="text" class="form-control datepicker">
													</div>
												</div>


												<div class="col-lg-12 col-md-12 col-sm-12">
													<div class="form-group">
														<label>Company</label>
														<input placeholder="Company Name" type="text" class="form-control">
													</div>
												</div>

											</div>
										</td>
									</tr>
									</tbody>
								</table>
								<a href="#" class="btn add-pr-item-btn">Add Item</a>
							</div>

						</div>
						<!-- /Experience Info -->

						<!-- Add Skills -->
						<div class="tr-single-box">
							<div class="tr-single-header">
								<h4><i class="lni-briefcase"></i> Skill Or Expertise</h4>
							</div>

							<div class="tr-single-body">
								<table class="table table-striped mb-5">
									<thead class="thead-dark">
									<tr>
										<th scope="col">Skills @ Company</th>
										<th scope="col">Lavel</th>
										<th scope="col">Action</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<th scope="row">Graphic Design</th>
										<td>65</td>
										<td>
											<div class="dash-action">
												<a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
												<a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<th scope="row">PHP Developer</th>
										<td>75</td>
										<td>
											<div class="dash-action">
												<a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
												<a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<th scope="row">Web Designer</th>
										<td>88</td>
										<td>
											<div class="dash-action">
												<a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
												<a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
											</div>
										</td>
									</tr>
									</tbody>
								</table>

								<table class="price-list-wrap">
									<tbody class="ui-sortable"><tr class="pricing-list-item pattern ui-sortable-handle">
										<td>
											<div class="box-close"><a class="delete" href="#"><i class="ti-close"></i></a></div>
											<div class="row">

												<div class="col-lg-9 col-md-9 col-sm-8">
													<div class="form-group">
														<label>Skills</label>
														<input class="form-control" type="text" value="Skills">
													</div>
												</div>

												<div class="col-lg-3 col-md-3 col-sm-4">
													<div class="form-group">
														<label>Lavel</label>
														<input placeholder="68" type="text" class="form-control">
													</div>
												</div>

											</div>
										</td>
									</tr>
									</tbody>
								</table>
								<a href="#" class="btn add-pr-item-btn">Add Item</a>
							</div>

						</div>
						<!-- /Skills Info -->

						<a href="#" class="btn btn-info btn-md full-width">Save & Update<i class="ml-2 ti-arrow-right"></i></a>

					</div>

					<!-- shortlisted -->
					<div class="tab-pane {{Session::get('tab') == 'favorite' ? 'active container' : ''}}" id="shortlisted">

						<div class="tr-single-box">
							<div class="tr-single-header">
								<h4><i class="ti-check"></i> Shortlisted Jobs</h4>
							</div>

							<div class="tr-single-body">

								<!-- Single Manage List -->
								<div class="manage-list">

									<div class="mg-list-wrap">
										<div class="mg-list-thumb">
											<img src="https://via.placeholder.com/90x90" class="mx-auto" alt="" />
										</div>
										<div class="mg-list-caption">
											<h4 class="mg-title">Web Designer</h4>
											<span class="mg-subtitle">Google Info</span>
											<span><em>Last activity</em> 4 weeks ago. <em>Posted</em> 4 weeks ago</span>

										</div>
									</div>

									<div class="mg-action">
										<div class="btn-group ml-2">
											<a href="job-detail.html" class="btn btn-view" data-toggle="tooltip" data-placement="top" title="View Job"><i class="ti-eye"></i></a>
										</div>
									</div>

								</div>

								<!-- Single Manage List -->
								<div class="manage-list">

									<div class="mg-list-wrap">
										<div class="mg-list-thumb">
											<img src="https://via.placeholder.com/90x90" class="mx-auto" alt="" />
										</div>
										<div class="mg-list-caption">
											<h4 class="mg-title">Web Designer</h4>
											<span class="mg-subtitle">Google Info</span>
											<span><em>Last activity</em> 4 weeks ago. <em>Posted</em> 4 weeks ago</span>

										</div>
									</div>

									<div class="mg-action">
										<div class="btn-group ml-2">
											<a href="job-detail.html" class="btn btn-view" data-toggle="tooltip" data-placement="top" title="View Job"><i class="ti-eye"></i></a>
										</div>
									</div>

								</div>

								<!-- Single Manage List -->
								<div class="manage-list">

									<div class="mg-list-wrap">
										<div class="mg-list-thumb">
											<img src="https://via.placeholder.com/90x90" class="mx-auto" alt="" />
										</div>
										<div class="mg-list-caption">
											<h4 class="mg-title">Web Designer</h4>
											<span class="mg-subtitle">Google Info</span>
											<span><em>Last activity</em> 4 weeks ago. <em>Posted</em> 4 weeks ago</span>

										</div>
									</div>

									<div class="mg-action">
										<div class="btn-group ml-2">
											<a href="job-detail.html" class="btn btn-view" data-toggle="tooltip" data-placement="top" title="View Job"><i class="ti-eye"></i></a>
										</div>
									</div>

								</div>

							</div>
						</div>

					</div>

					<!-- applied job -->
					<div class="tab-pane {{Session::get('tab') == 'applied' ? 'active container' : ''}}" id="applied">

						<div class="tr-single-box">
							<div class="tr-single-header">
								<h4><i class="ti-briefcase"></i> Applied job</h4>
							</div>

							<div class="tr-single-body">

								<!-- Single Manage List -->
								<div class="manage-list">

									<div class="mg-list-wrap">
										<div class="mg-list-thumb">
											<img src="https://via.placeholder.com/90x90" class="mx-auto" alt="" />
										</div>
										<div class="mg-list-caption">
											<h4 class="mg-title">Web Designer</h4>
											<span class="mg-subtitle">Google Info</span>
											<span><em>Last activity</em> 4 weeks ago. <em>Posted</em> 4 weeks ago</span>

										</div>
									</div>

									<div class="mg-action">
										<div class="btn-group ml-2">
											<a href="job-detail.html" class="btn btn-view" data-toggle="tooltip" data-placement="top" title="View Job"><i class="ti-eye"></i></a>
											<a href="#" class="mg-delete ml-2" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
										</div>
									</div>

								</div>

							</div>
						</div>

					</div>

					<!-- alert job -->
					<div class="tab-pane {{Session::get('tab') == 'alert' ? 'active container' : ''}}" id="alert">

						<div class="tr-single-box">
							<div class="tr-single-header">
								<h4><i class="ti-bell"></i> Alert Jobs</h4>
							</div>

							<div class="tr-single-body">
								<div class="alert alert-success">
									<strong>Hi Dear!</strong> There is no any job alert.
								</div>
							</div>
						</div>

					</div>

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

					<!-- change-password -->
					<div class="tab-pane {{Session::get('tab') == 'password' ? 'active container' : ''}}" id="change-password">

						@if(Session::get('successPassword'))
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								{{Session::get('successPassword')}}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						@endif

						<div class="tr-single-box">
							<div class="tr-single-header">
								<h4><i class="lni-lock"></i> Cambia Password</h4>
							</div>

							<form method="POST" action="{{ route('changePass') }}">
								@csrf
								<div class="tr-single-body">
									<div class="form-group">
										<label>Password Attuale</label>
										<input class="form-control" type="text" name="old_password" value="{{old('old_password')}}" required>
										<!-- Error -->
										@if ($errors->has('old_pass'))
											<p class="color--error mb-2"><strong>{{ $errors->first('old_pass') }}</strong></p>
										@endif
									</div>
									<div class="form-group">
										<label>Nuova Password</label>
										<input class="form-control" type="text" name="new_password" value="{{old('new_password')}}" required>
										<!-- Error -->
										@if ($errors->has('new_pass'))
											<p class="color--error mb-2"><strong>{{ $errors->first('new_pass') }}</strong></p>
										@endif
									</div>
									<div class="form-group">
										<label>Conferma Password</label>
										<input class="form-control" type="text" name="confirm_password" value="{{old('confirm_password')}}" required>
									</div>
								</div>

								<button type="submit" class="btn btn-info btn-md full-width">Salva<i class="ml-2 ti-arrow-right"></i></button>
							</form>

						</div>

					</div>


				</div>
			</div>

		</div>
	</div>
</section>
<!-- ============== Candidate Dashboard ====================== -->

@endsection