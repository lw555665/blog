<!-- Header -->
<header class="top-head container-fluid">
    <button type="button" class="navbar-toggle pull-left">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>



    <!-- Left navbar -->
    <nav class=" navbar-default" role="navigation">


        <!-- Right navbar -->
        <ul class="nav navbar-nav navbar-right top-menu top-right-menu">


            <!-- user login dropdown start-->
            <li class="dropdown text-center">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="" class="img-circle profile-img thumb-sm">
                    <span class="username">{{ Session::get('user')->email }}</span> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
                    <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out"></i>退出</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!-- End right navbar -->
    </nav>

</header>
<!-- Header Ends -->