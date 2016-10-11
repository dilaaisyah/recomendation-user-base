@extends('front.template')

@section('main')
	
	<div id="heading-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>{{ $post->title }}</h1>
                </div>
                <div class="col-md-6">
                    <ul class="breadcrumb">
                        <li>{!! link_to('/', 'Home') !!}</li>
                        <li>{!! link_to('blogs', 'Wisata') !!}</li>
                        <li>Blog Post</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div id="content">
        <div class="container">
            <div class="row">

                <!-- *** LEFT COLUMN ***-->
                <div class="col-md-9" id="blog-post">

                    <p class="text-muted text-uppercase mb-small text-right">
                    	By <span class="author">{{ $post->user->username }}</span> | 
                    	{!! $post->created_at !!}
                    </p>
                    
                    <div id="post-content">
                        @if($post->thumbnail)
                            <img src="{!! asset('filemanager/userfiles/thumbnail/'.$post->thumbnail) !!}" alt="{!! $post->title !!}" class="img-responsive">
                            <br>  
                        @endif    
						{!! $post->content !!}                        
                    </div>
                    <!-- /#post-content -->
                   
                    @if($post->tags->count())
                         <hr>
						<div class="text-center">
							@if($post->tags->count() > 0)
								<small>{{ trans('front/blog.tags') }}</small> 
								@foreach($post->tags as $tag)
									{!! link_to('blogs/tag?tag=' . $tag->id, $tag->tag, ['class' => 'btn btn-template-main btn-xs']) !!}
								@endforeach
							@endif
						</div>
					@endif

					@if($comments->count())
                    <div id="comments">
                        <h4 class="text-uppercase">{!! $comments->count() !!} comments</h4>
                        
                        @foreach($comments as $comment)
                        <div class="row comment commentitem">
                            <div class="col-md-12">
                                <h5 class="text-uppercase">{{ $comment->user->username }}</h5>
                                <p class="posted"><i class="fa fa-clock-o"></i> {{ $comment->created_at }}</p>
                                <div id="contenu{!! $comment->id !!}">{!! $comment->content !!}</div>
                                <!-- <p class="reply"><a href="#"><i class="fa fa-reply"></i> Reply</a></p> -->
                            </div>
                        </div>
                        @endforeach
                        <!-- /.comment -->

                    </div>
                    <!-- /#comments -->
                    @endif


                    @if(session('statut') != 'visitor')
                        <hr>
                        <h4 class="text-uppercase vote-label">Leave Vote</h4>
                        <div class="stars">
                            <input type="hidden" name="post_id" value="{!! $post->id !!}">
                            @if($vote)
                                @for ($i = 1; $i <= 5; $i++)
                                    @if($vote->vote == $i)
                                        <input type="radio" name="star" class="star-{!! $i !!} star" id="star-{!! $i !!}" value="{!! $i !!}" checked="checked">
                                        <label class="star-{!! $i !!}" for="star-{!! $i !!}">{!! $i !!}</label>
                                    @else    
                                        <input type="radio" name="star" class="star-{!! $i !!} star" id="star-{!! $i !!}" value="{!! $i !!}">
                                        <label class="star-{!! $i !!}" for="star-{!! $i !!}">{!! $i !!}</label>
                                    @endif
                                @endfor
                            @else
                                @for ($i = 1; $i <= 5; $i++)
                                    <input type="radio" name="star" class="star-{!! $i !!} star" id="star-{!! $i !!}" value="{!! $i !!}">
                                    <label class="star-{!! $i !!}" for="star-{!! $i !!}">{!! $i !!}</label>
                                @endfor
                            @endif
                            <span></span>
                            {!! Form::token() !!}
                        </div>
                    @endif 

					@if(session('statut') != 'visitor')
                    <div id="comment-form">
                    	@if(session()->has('warning'))
							@include('partials/error', ['type' => 'warning', 'message' => session('warning')])
						@endif
                        <h4 class="text-uppercase">Leave comment</h4>
                        {!! Form::open(['url' => 'comment']) !!}	
							{!! Form::hidden('post_id', $post->id) !!}
							{!! Form::control('textarea', null, 'comments', $errors, 'Comment') !!}
							{!! Form::submit('Post comment', ['text-right']) !!}
						{!! Form::close() !!}
                    </div>
                    @else
						<div class="text-center" style="padding: 50px 0px;">
                            <i class="text-center">{{ trans('front/blog.info-comment') }}</i>
                        </div>
					@endif
                    <!-- /#comment-form -->

                </div>
                <!-- /#blog-post -->
                <!-- *** LEFT COLUMN END *** -->

        		@include('partials.sidebar')

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->

@stop



@section('scripts')

  <script>
    
    $(function() {

      $(document).ready(function(){
        $('.star').click(function(){
            var id = $('input[name="post_id"]').val();
            var token = $('input[name="_token"]').val();
            var value = $(this).val();
            $.ajax({
              url: '{{ url('postvote') }}' + '/' + id,
              type: 'PUT',
              data: "vote= " + value + "&_token=" + token
            })
            .fail(function() {
              alert('failed');
            });
        });
      });

    });

  </script>

@stop