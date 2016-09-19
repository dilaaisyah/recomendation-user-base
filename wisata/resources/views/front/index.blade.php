@extends('front.template')

@section('main')
<!-- *** HOMEPAGE CAROUSEL *** -->
<?php if(count($ads)>0):?>
<section>
    <div class="home-carousel">
        <div class="dark-mask"></div>
        <div class="container">
            <div class="homepage owl-carousel">
                @foreach($ads as $ads)
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-5 right">                                
                                {!! $ads->content !!}
                            </div>
                            <div class="col-sm-7">
                                @if($ads->thumbnail)
                                    <img src="{!! asset('filemanager/userfiles/slider/'.$ads->thumbnail) !!}" alt="{!! $ads->title !!}" class="img-responsive">
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /.project owl-slider -->
        </div>
    </div>
</section>
@endif
<!-- *** HOMEPAGE CAROUSEL END *** -->

<!-- *** BLOG HOMEPAGE *** -->
<section class="bar background-white no-mb">
    <div class="container recomended">
        @if(session('statut') != 'visitor') 
            @if($recomended)
            <div class="col-md-12">
                <div class="heading text-center">
                    <h2>Recomended for You</h2>
                </div>                

                <div class="row">
                    @foreach($recomended as $post)
                    <div class="col-md-4 col-sm-6 eqHeight">
                        <div class="box-image-text blog">
                            <div class="top">
                                @if($post->thumbnail)
                                <div class="image">
                                    <img src="{!! asset('filemanager/userfiles/thumbnail/'.$post->thumbnail) !!}" alt="{{ $post->title }}" class="img-responsive">
                                </div>
                                @else
                                <div class="image">
                                    <img src="{!! asset('filemanager/userfiles/thumbnail/default.jpg') !!}" alt="" class="img-responsive">
                                </div>
                                @endif
                                <div class="bg"></div>
                                <div class="text">
                                    <p class="buttons">
                                        {!! link_to('blog/' . $post->slug, 'Read more', ['class' => 'btn btn-template-transparent-primary']) !!}
                                    </p>
                                </div>
                            </div>
                            <div class="content">
                                <h4><a href="{!! url('blog/' . $post->slug) !!}">{{ $post->title }}</a></h4>
                                <p class="author-category">By <span class="author">{{ $post->user->username }}</span> in <a href="{!! url('blogs/category?category='. $post->wisata_type ) !!}">{{ $post->wisata_type }}</a>
                                </p>
                                <div class="stars">
                                    @if($post->vote)
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if($post->vote == $i)
                                                <input type="radio" name="star-{{$post->id}}" class="star-{!! $i !!} star" id="star-{!! $i !!}" value="{!! $i !!}" checked="checked">
                                            @else    
                                                <input type="radio" name="star-{{$post->id}}" class="star-{!! $i !!} star" id="star-{!! $i !!}" value="{!! $i !!}">
                                            @endif
                                        @endfor
                                    @else
                                        @for ($i = 1; $i <= 5; $i++)
                                            <input type="radio" name="star-{{$post->id}}" class="star-{!! $i !!} star" id="star-{!! $i !!}" value="{!! $i !!}">
                                        @endfor
                                    @endif
                                    <span></span>
                                    {!! Form::token() !!}
                                </div>
                                <p class="intro">{!! strip_tags($post->summary) !!}</p>
                                <p class="read-more">
                                    {!! link_to('blog/' . $post->slug, 'Continue reading', ['class' => 'btn btn-template-main']) !!}
                                </p>

                            </div>
                        </div>
                        <!-- /.box-image-text -->
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        @endif

        <?php if(count($popular)>0):?>
        <div class="col-md-12">
            <div class="heading text-center">
                <h2>Popular Post</h2>
            </div>                

            <div class="row">
                @foreach($popular as $post)
                <div class="col-md-4 col-sm-6 eqHeight">
                    <div class="box-image-text blog">
                        <div class="top">
                            @if($post->thumbnail)
                            <div class="image">
                                <img src="{!! asset('filemanager/userfiles/thumbnail/'.$post->thumbnail) !!}" alt="{{ $post->title }}" class="img-responsive">
                            </div>
                            @else
                            <div class="image">
                                <img src="{!! asset('filemanager/userfiles/thumbnail/default.jpg') !!}" alt="" class="img-responsive">
                            </div>
                            @endif
                            <div class="bg"></div>
                            <div class="text">
                                <p class="buttons">
                                    {!! link_to('blog/' . $post->slug, 'Read more', ['class' => 'btn btn-template-transparent-primary']) !!}
                                </p>
                            </div>
                        </div>
                        <div class="content">
                            <h4><a href="{!! url('blog/' . $post->slug) !!}">{{ $post->title }}</a></h4>
                            <p class="author-category">By <span class="author">{{ $post->user->username }}</span> in <a href="{!! url('blogs/category?category='. $post->wisata_type ) !!}">{{ $post->wisata_type }}</a>
                            </p>
                            <p class="intro">{!! strip_tags($post->summary) !!}</p>
                            <p class="read-more">
                                {!! link_to('blog/' . $post->slug, 'Continue reading', ['class' => 'btn btn-template-main']) !!}
                            </p>

                        </div>
                    </div>
                    <!-- /.box-image-text -->
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <?php if(count($recent)>0):?>
        <div class="col-md-12">
            <div class="heading text-center">
                <h2>Recent Post</h2>
            </div>                

            <div class="row">
                @foreach($recent as $post)
                <div class="col-md-4 col-sm-6 eqHeight">
                    <div class="box-image-text blog">
                        <div class="top">
                            @if($post->thumbnail)
                            <div class="image">
                                <img src="{!! asset('filemanager/userfiles/thumbnail/'.$post->thumbnail) !!}" alt="{{ $post->title }}" class="img-responsive">
                            </div>
                            @else
                            <div class="image">
                                <img src="{!! asset('filemanager/userfiles/thumbnail/default.jpg') !!}" alt="" class="img-responsive">
                            </div>
                            @endif
                            <div class="bg"></div>
                            <div class="text">
                                <p class="buttons">
                                    {!! link_to('blog/' . $post->slug, 'Read more', ['class' => 'btn btn-template-transparent-primary']) !!}
                                </p>
                            </div>
                        </div>
                        <div class="content">
                            <h4><a href="{!! url('blog/' . $post->slug) !!}">{{ $post->title }}</a></h4>
                            <p class="author-category">By <span class="author">{{ $post->user->username }}</span> in <a href="{!! url('blogs/category?category='. $post->wisata_type ) !!}">{{ $post->wisata_type }}</a>
                            </p>
                            <p class="intro">{!! strip_tags($post->summary) !!}</p>
                            <p class="read-more">
                                {!! link_to('blog/' . $post->slug, 'Continue reading', ['class' => 'btn btn-template-main']) !!}
                            </p>

                        </div>
                    </div>
                    <!-- /.box-image-text -->
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
    <!-- /.container -->
</section>
<!-- /.bar -->
<!-- *** BLOG HOMEPAGE END *** -->
@stop


