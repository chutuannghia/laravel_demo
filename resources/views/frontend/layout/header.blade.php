    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Tin Tức</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('fetrangchu')}}">Laravel_demo</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{route('fegioithieu')}}">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="{{route('felienhe')}}">Liên hệ</a>
                    </li>
                </ul>

                <form class="navbar-form navbar-left" role="search">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Search">
			        </div>
			        <button type="submit" class="btn btn-default">Submit</button>
			    </form>

			    <ul class="nav navbar-nav pull-right">
                    @if (!Auth::check())
                    <li>
                        <a href="{{route('register')}}">Đăng ký</a>
                    </li>
                    <li>
                        <a href="{{route('login')}}">Đăng nhập</a>
                    </li>
                    @else
                    <li>
                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="{{route('felienhe')}}" data-bs-toggle="dropdown">
                            <img src="{{Auth::user()->avatar?(Auth::user()->avatar):$avatar}}"
                            class="avatar me-1" width="30" style="border-radius:50%" height="30" alt="{{Auth::user()->name}}" /> <span class="text-dark">{{Auth::user()->name}}</span>
                        </a>
                    </li>

                    <li>
                    	<a href="{{route('logout')}}">Đăng xuất</a>
                    </li>
                    @endif

                </ul>
            </div>



            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
