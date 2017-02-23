<!-- Aside Start-->
<aside class="left-panel">

    <!-- brand -->
    <div class="logo">
        <a href="{{ url('/user') }}" class="logo-expanded">
            <i class="ion-social-buffer"></i>
            <span class="nav-label">个人中心</span>
        </a>
    </div>
    <!-- / brand -->

    <!-- Navbar Start -->
    <nav class="navigation">
        <ul class="list-unstyled">



            <li class="has-submenu"><a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <span class="nav-label">博客管理</span><span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{url('/curd/')}}">添加分类</a></li>
                    <li><a href="{{url('/curd/create')}}">添加博客</a></li>
                    <li><a href="{{url('')}}">修改博客</a></li>
                </ul>
            </li>


            <li class="has-submenu"><a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <span class="nav-label">评论管理</span><span class="menu-arrow"></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{url('/user_management')}}"></a></li>
                    <li><a href="{{url('/role_management')}}"></a></li>
                </ul>
            </li>


        </ul>
    </nav>

</aside>
<!-- Aside Ends-->

