@extends('front.template')

@section('main')
<!-- *** HOMEPAGE CAROUSEL *** -->
<section>
    <div class="home-carousel">
        <div class="dark-mask"></div>
        <div class="container">
            <div class="homepage owl-carousel">
            @if($ads)
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
            @endif
            </div>
            <!-- /.project owl-slider -->
        </div>
    </div>
</section>
<!-- *** HOMEPAGE CAROUSEL END *** -->

<!-- *** BLOG HOMEPAGE *** -->
<section class="bar background-white no-mb">
    <div class="container">
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
                                <h4><a href="blog-post.html">{{ $post->title }}</a></h4>
                                <p class="author-category">By <span class="author">{{ $post->user->username }}</span> in <a href="blog.html">{{ $post->wisata_type }}</a>
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
        @endif

        @if($popular)
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
                            <h4><a href="blog-post.html">{{ $post->title }}</a></h4>
                            <p class="author-category">By <span class="author">{{ $post->user->username }}</span> in <a href="blog.html">{{ $post->wisata_type }}</a>
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

        @if($recent)
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
                            <h4><a href="blog-post.html">{{ $post->title }}</a></h4>
                            <p class="author-category">By <span class="author">{{ $post->user->username }}</span> in <a href="blog.html">{{ $post->wisata_type }}</a>
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


