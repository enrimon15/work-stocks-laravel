@extends('layouts.outline')

@section('content')

	<div class="Loader"></div>

	<div class="clearfix"></div>
			
			
			<!-- ============================ Hero Banner  Start================================== -->
			<div class="page-title-wrap pt-img-wrap" style="background-image:url({{asset('img/banner-blog.jpeg')}});">
				<div class="container">
					<div class="col-lg-12 col-md-12">
						<div class="pt-caption text-center">
							<h1>{{__('blog.title')}}</h1>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<!-- ============================ Hero Banner End ================================== -->
			
			<!-- ============================ Blog Grid Start ================================== -->
			<section>
				<div class="container">

					<div class="row mb-4">
						<div class="col mx-auto p-t-10 mb-3">
							<div class="input-group small">
								<input id="searchInput" type="text" class="form-control b-r" placeholder="{{__('blog.search')}}" style="background-color: #f4f8fa" value="{{$query ?? null}}">
								<span class="input-group-btn">
									<button type="button" onclick="search()" class="btn btn-primary">{{__('blog.go')}}</button>
								</span>
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
							<p>{{__('blog.noNews')}}</p>
						@endforelse
					
					</div>
				</div>
				{!! $news->links('vendor/pagination/bootstrap-4')!!}
			</section>
			<div class="clearfix"></div>
			<!-- ============================ Blog Grid End ================================== -->

	<script>
		function search() {
			$input = document.getElementById('searchInput').value;
			window.location.href = '/blog/search/' + $input;
		}
	</script>

@endsection