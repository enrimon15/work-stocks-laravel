@extends('layouts.outline')

@section('content')

	<div class="Loader"></div>

	<div class="clearfix"></div>
			
			<!-- ============================ Blog Grid Start ================================== -->

			<section style="background-color: #f4f8fa !important">
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
											<span class="author"><i class="ti-comment-alt"></i>{{count($news->comments)}}</span>
											<span class="author" id="likesNumber"><i class="ti-heart"></i>{{count($news->likes)}}</span>
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
										<h4>{{__('blog.comments') . ' (' . count($news->comments) . ')'}}</h4>
									</div>
									
									<ul id="singlecomment-detail" class="comment-detail-list">
										@forelse($comments as $comment)
											<li class="comment" id="comment">
                                                <div class="row">
                                                    <div class="comment col">
                                                        <div class="comment__image">
                                                            <img alt="" src="{{asset('storage/' . $comment->user_avatar)}}" class="avatar avatar-75 photo" height="75" width="75">
                                                        </div>
                                                        <div class="comment__text">
                                                            <a href="{{route('profile', ['type' => 'user', 'id' => $comment->user_id])}}">
																<h5>{{$comment->user_name}}</h5>
															</a>
                                                            <span>
                                                            <em>{{date('d-m-Y',strtotime($comment->created_at))}}</em>
                                                        </span>
                                                            <p>{{$comment->body}}</p>
                                                        </div>
                                                    </div><!--end comment-->
													@guest
													@else
														@if($comment->user_id == Auth::user()->id)
														<div class="col text-right">
														   <a href="{{route('newsCommentDelete', ['id' => $comment->id])}}" data-toggle="tooltip" data-placement="top" title="{{__('dashboard/user/onlineCV.delete')}}"><i class="ti-trash"></i></a>
														</div>
														@endif
													@endguest
                                                    <hr>
                                                </div>
											</li><!-- #comment-## -->
										@empty
											<p class="mb-3">{{__('blog.noComments')}}</p>
										@endforelse
									</ul>

                                    {!! $comments->links('vendor/pagination/bootstrap-4')!!}
									
								</div>
							</div>
							
							<div class="comment-detail-form mt-3">
								<div class="section-title2">
									<h3 id="reply-title" class="comment-reply-title">{{__('blog.writeComment')}}</h3>
								</div>
								
								<form method="POST" action="{{ route('newsComment') }}">
									@csrf
									<div class="row">
										<div class="form-group col-md-12 col-sm-12">
											<input class="form-control" name="id" type="hidden" value="{{$news->id}}">
											<textarea name="message" class="form-control" placeholder="{{__('blog.comment')}}"></textarea>
										</div>
										
										<div class="col-md-12 col-sm-12">
											@if(Auth::user() && Auth::user()->hasRole('user'))
												<button class="btn btn-primary" type="submit">{{__('blog.submit')}}</button>
											@else
												<button disabled class="btn btn-primary" type="button">{{__('blog.submit')}}</button>
											@endif
										</div>
									</div>
								</form>
							</div>
									
						</div>
						
						<!-- Sidebar Start -->
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="sidebar">

								<div class="offer-btn-wrap mb-4">
									@if(Auth::user() && Auth::user()->hasRole('user'))
										@if($news->likes->contains(Auth::user()))
											<a id="like" href="#" onclick="sendLike('{{route('newsLike',['id'=> $news->id, 'opType' => 'remove'])}}')" class="btn btn-info btn-md full-width"><i id="heart" class="mr-2 lni lni-heart-filled"></i>{{__('blog.like')}}</a>
										@else
											<a id="like" href="#" onclick="sendLike('{{route('newsLike',['id'=> $news->id, 'opType' => 'add'])}}')" class="btn btn-info btn-md full-width"><i id="heart" class="mr-2 lni lni-heart"></i>{{__('blog.like')}}</a>
										@endif
									@else
										<a href="#" class="btn btn-info btn-md full-width" style="cursor: not-allowed"><i class="mr-2 lni lni-heart"></i>{{__('blog.like')}}</a>
									@endif
								</div>
								
								<div class="side-widget">
									<div class="side-widget-header">
										<h4><i class="ti-check-box"></i>{{__('blog.latest')}}</h4>
									</div>
									<div class="side-widget-body p-t-10">
										<div class="side-list">
											<ul class="side-blog-list">
												@foreach($latest as $latestNews)
													<li>
														<a href="#" style="cursor: default">
															<div class="blog-list-img">
																<img src="{{asset('storage/'.$latestNews->image_path)}}" class="img-responsive" alt="">
															</div>
														</a>
														<div class="blog-list-info">
															<h5><a href="{{ route('newsById', ['id' => $latestNews->id]) }}" title="blog">{{$latestNews->title}}</a></h5>
															<div class="blog-post-meta">
																<span class="updated">{{$latestNews->created_at->format('d/m')}}</span>
															</div>
														</div>
													</li>
												@endforeach

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

    <script>
        window.addEventListener('load', function () {
            // tooltip
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });
        });
    </script>

	<script>
		function sendLike(url) {
			console.log(url);
			$.ajax({
				type: "GET",
				url: url,
				dataType: 'json',
				success: function (result) {
					document.getElementById('heart').className = result.body;
					document.getElementById('like').setAttribute( "onClick", `sendLike('${result.url}')` );

					$icon = document.getElementById('likesNumber').innerHTML.split('</i>')[0] + '</i>';
					$number = result.opType === 'add'
						? parseInt(document.getElementById('likesNumber').innerHTML.split('</i>')[1]) + 1
						: parseInt(document.getElementById('likesNumber').innerHTML.split('</i>')[1]) - 1;
					document.getElementById('likesNumber').innerHTML = $icon + $number;
				},
				error: function (result) {
					console.log(result);
				}
			});
		}
	</script>

@endsection