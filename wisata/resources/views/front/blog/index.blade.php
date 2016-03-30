@extends('front.template')

@section('main')

    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Blog listing</h1>
                </div>
                <div class="col-md-6">
                    <ul class="breadcrumb">
                        <li>{!! link_to('/', 'Home') !!}</li>
                        <li>Blog listing</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div id="content">
        <div class="container">
            <div class="row">

                <!-- *** LEFT COLUMN ***-->
                <div class="col-md-12" id="blog-listing-small">
                    <div class="row">

                        @foreach($posts as $post)
                        <div class="col-md-4 col-sm-6 eqHeight">
                            <div class="box-image-text blog">
                                <div class="top">
                                    @if($post->thumbnail)
                                    <div class="image">
                                        <img src="{!! asset('filemanager/userfiles/thumbnail/'.$post->thumbnail) !!}" alt="" class="img-responsive">
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

                    {!! $links !!}

                </div>
                <!-- /.col-md-12 -->
                <!-- *** LEFT COLUMN END *** -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->

@stop

