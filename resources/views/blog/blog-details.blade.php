@extends('layouts.outline')

@section('content')

	<div class="Loader"></div>

	<div class="clearfix"></div>
			
			<!-- ============================ Blog Grid Start ================================== -->
			<section style="background-color: #f4f8fa !important">
				<div class="container">
					
					<div class="row">
	
						<div class="col-lg-8 col-md-8 col-sm-12">
							<article class="blog-news big-detail-wrap">
								<div class="blog-detail-wrap">
								
									<!-- Featured Image -->
									<figure class="img-holder">
										<a href="blog-details.blade.php"><img src="{{asset('storage/'.$news->image_path)}}" class="img-responsive" alt="News"></a>
										<div class="blog-post-date theme-bg">
											{{$news->created_at->format(' d-m-Y')}}
										</div>
									</figure>
									
									<!-- Blog Content -->
									<div class="full blog-content">
										<div class="post-meta">
											<span class="author"><i class="ti-calendar"></i>{{$news->created_at->format(' d-m-Y')}}</span>
											<span class="author"><i class="ti-comment-alt"></i>{{count($news->comments) . ' Comments'}}</span>
										</div>
										<h3>{{$news->title}}</h3>
										<div class="blog-text">
											{!! $news->body !!}
										</div>
										
									</div>
									<!-- Blog Content -->
									<hr>
									
								</div>
							</article>


							
							<!-- Comment -->
							<div class="comment-wrap">
								<div class="comment-detail">      
									<div class="comment-detail-title">
										<h4>comment-detail ({{count($news->comments)}})</h4>
									</div>
									
									<ul id="singlecomment-detail" class="comment-detail-list">		
										<li class="comment" id="comment-56">
											<div class="comment">
												<div class="comment__image">
													<img alt="" src="https://via.placeholder.com/1280x820" class="avatar avatar-75 photo" height="75" width="75">
												</div>
												<div class="comment__text">
													<h5>danny</h5>
													<span>
														<em>August 9, 2016</em>
													</span>
													<p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur.</p>
									
												</div>
												<hr>
											</div><!--end comment-->
										</li><!-- #comment-## -->
									</ul>
									
								</div>
							</div>
							
							<div class="comment-detail-form"> 
								<div class="section-title2">
									<h3 id="reply-title" class="comment-reply-title">Write a Comment</h3>
								</div>
								
								<form>
									<div class="row">
										<div class="form-group col-md-12 col-sm-12">
											<textarea class="form-control" placeholder="Comment"></textarea>
										</div>
										
										<div class="col-md-12 col-sm-12">
											<button class="btn btn-primary" type="submit">submit now</button>
										</div>
									</div>
								</form>
							</div>
									
						</div>
						
						<!-- Sidebar Start -->
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="sidebar">
								
								<div class="side-widget">
									<div class="side-widget-header">
										<h4><i class="ti-check-box"></i>Latest Blogs</h4>
									</div>
									<div class="side-widget-body p-t-10">
										<div class="side-list">
											<ul class="side-blog-list">
												<li>
													<a href="#">
														<div class="blog-list-img">
															<img src="https://via.placeholder.com/1280x820" class="img-responsive" alt="">
														</div>
													</a>
													<div class="blog-list-info">
														<h5><a href="#" title="blog">Freel Documentry</a></h5>
														<div class="blog-post-meta">
															<span class="updated">Nov 26, 2017</span> | <a href="#" rel="tag">Documentry</a>					
														</div>
													</div>
												</li>
												
												<li>
													<a href="#">
														<div class="blog-list-img">
															<img src="https://via.placeholder.com/1280x820" class="img-responsive" alt="">
														</div>
													</a>
													<div class="blog-list-info">
														<h5><a href="#" title="blog">Preez Food Rock</a></h5>
														<div class="blog-post-meta">
															<span class="updated">Oct 10, 2017</span> | <a href="#" rel="tag">Food</a>					
														</div>
													</div>
												</li>
												
												<li>
													<a href="#">
														<div class="blog-list-img">
															<img src="https://via.placeholder.com/1280x820" class="img-responsive" alt="">
														</div>
													</a>
													<div class="blog-list-info">
														<h5><a href="#" title="blog">Cricket Buzz High</a></h5>
														<div class="blog-post-meta">
															<span class="updated">Oct 07, 2017</span> | <a href="#" rel="tag">Sport</a>					
														</div>
													</div>
												</li>
												
												<li>
													<a href="#">
														<div class="blog-list-img">
															<img src="https://via.placeholder.com/1280x820" class="img-responsive" alt="">
														</div>
													</a>
													<div class="blog-list-info">
														<h5><a href="#" title="blog">Tour travel Tick</a></h5>
														<div class="blog-post-meta">
															<span class="updated">Sep 27, 2017</span> | <a href="#" rel="tag">Travel</a>					
														</div>
													</div>
												</li>

											</ul>
										</div>
									</div>
								</div>
								
							</div>
						</div>
						
					</div>
					
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- ============================ Blog Grid End ================================== -->
			
@endsection