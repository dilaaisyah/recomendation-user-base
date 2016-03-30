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
                                <li><a href="blog.html">Kuliner</a>
                                <li><a href="blog.html">Populer</a>
                                <li><a href="blog.html">Religi</a>
                                <li><a href="blog.html">Alam</a>
                                <li><a href="blog.html">Sejarah</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel sidebar-menu">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tags</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="tag-cloud">
                                <li><a href="#"><i class="fa fa-tags"></i> html5</a> 
                                </li>
                                <li><a href="#"><i class="fa fa-tags"></i> css3</a> 
                                </li>
                                <li><a href="#"><i class="fa fa-tags"></i> jquery</a> 
                                </li>
                                <li><a href="#"><i class="fa fa-tags"></i> ajax</a> 
                                </li>
                                <li><a href="#"><i class="fa fa-tags"></i> php</a> 
                                </li>
                                <li><a href="#"><i class="fa fa-tags"></i> responsive</a> 
                                </li>
                                <li><a href="#"><i class="fa fa-tags"></i> visio</a> 
                                </li>
                                <li><a href="#"><i class="fa fa-tags"></i> bootstrap</a> 
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- *** MENUS AND FILTERS END *** -->

                </div>
                <!-- /.col-md-3 -->
                <!-- *** RIGHT COLUMN END *** -->