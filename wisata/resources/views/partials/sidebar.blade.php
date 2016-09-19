<!-- *** RIGHT COLUMN ***-->
                <div class="col-md-3">

                    <!-- *** MENUS AND WIDGETS ***-->
                    <div class="panel panel-default sidebar-menu">
                        <div class="panel-heading">
                            <h3 class="panel-title">Search</h3>
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['url' => 'blogs/search', 'method' => 'get', 'role' => 'form']) !!}  
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search in Blog" name="search">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu">
                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{!! url('blogs/category?category=kuliner') !!}">Kuliner</a></li>
                                <li><a href="{!! url('blogs/category?category=populer') !!}">Populer</a></li>
                                <li><a href="{!! url('blogs/category?category=religi') !!}">Religi</a></li>
                                <li><a href="{!! url('blogs/category?category=alam') !!}">Alam</a></li>
                                <li><a href="{!! url('blogs/category?category=sejarah') !!}">Sejarah</a></li>
                            </ul>
                        </div>
                    </div>

                    <?php if(count($get_tags)>0):?>
                    <div class="panel sidebar-menu">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tags</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="tag-cloud">
                                @foreach($get_tags as $tag)
                                <li><a href="{!! url('blogs/tag?tag='.$tag->id) !!}"><i class="fa fa-tags"></i> {{ $tag->tag }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    <!-- *** MENUS AND FILTERS END *** -->

                </div>
                <!-- /.col-md-3 -->
                <!-- *** RIGHT COLUMN END *** -->