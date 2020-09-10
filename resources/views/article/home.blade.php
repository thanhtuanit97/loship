@extends('layout.master')
@section('title')
Tin tức Thị Trường 24H
@endsection
@section('content')
		<!-- article-details start -->
		<div class="main-aticle-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 mb-5 mb-lg-0">
						<div class="blog_left_sidebar">
							@foreach($articles as $article)
							<article class="blog_item">
								<div class="blog_item_img">
									<img class="card-img rounded-0" src="{{ $article['avatar']}}"alt="" style="width: 768px; height:400px; ">
								</div>
								<div class="blog_details">
							
										<a href="{{ route('article.show.byID',[$article->slug, $article->id])}}"><h4 style="color: #2d2d2d;margin-top: 15px;">{{ $article->title}}</h4></a>
								
									<p style="font-size: 15px;">{!! $article['description'] !!}</p>
									<ul class="blog-info-link" style="display: flex;margin-bottom: 20px">
										<li><a href="#"><i class="fa fa-thumbs-up"></i> Thích</a></li>
										<li ><a href="#" style="margin-left: 10px;"><i class="fa fa-comments"></i> Bình Luận (3)</a></li>
									</ul>
								</div>
							</article>	
							@endforeach
						</div>
					</div>

					<div class="col-lg-4 mb-7 mb-lg-0">
						<h4 class="widget_title" style="color: #2d2d2d;">Tin Tức Vừa Cập Nhật</h4>
						@foreach($articles as $value)
						<aside class="single_sidebar_widget popular_post_widget">
							
							<div class="media post_item" style="display: flex;margin-bottom: 15px">
								<img src="{{ $value->avatar}}" alt="post" width="100px" height="100px">
								<div class="media-body" style="margin-left: 15px;line-height: normal;">
									<a href="{{ route('article.show.byID',[$article->slug, $article->id])}}">
										<h6 style="color: #2d2d2d;line-height: 20px">{{ $value->title }}</h6>
									</a>
									<p>{{ $value->date}}</p>
								</div>
							</div>
						
						</aside>
						@endforeach
					</div>
				</div>
			</div>	
		</div>
		<!-- contact-details end -->

@endsection