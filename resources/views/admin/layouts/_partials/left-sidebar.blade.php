<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{asset('/assets/admin/images/admin-avatar.png')}}" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">{{ Auth::user()->name }}</div>
            </div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href=""><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">Menu</li>
            <li>
               <a href="">
                    <i class="sidebar-item-icon fa fa-globe"></i>
                    <span class="nav-label">Site Management</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
            </li>

            <li>
               <a href="">
                    <i class="sidebar-item-icon fa fa-wrench"></i>
                    <span class="nav-label">Navigation</span>
                    <!-- <i class="fa fa-angle-left arrow"></i> -->
                </a>
            </li>


            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-file"></i>
                    <span class="nav-label">Sliders</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="">
                            <span class="fa fa-plus"></span>
                            Add Slider
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="fa fa-circle-o"></span>
                            All slider
                        </a>
                    </li>

                </ul>
            </li>


            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">Products</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="">
                            <span class="fa fa-plus"></span>
                            Add Product
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="fa fa-circle-o"></span>
                            All Products
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">Awards</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="">
                            <span class="fa fa-plus"></span>
                            Add Award
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="fa fa-circle-o"></span>
                            All awards
                        </a>
                    </li>
                </ul>
            </li>
            {{--
            <li>
               <a href="">
                    <i class="sidebar-item-icon fa fa-shopping-cart"></i>
                    <span class="nav-label">Order Management</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
            </li>
            --}}



            <li>
               <a href="">
                    <i class="sidebar-item-icon fa fa-snapchat-ghost"></i>
                    <span class="nav-label">Messages</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
            </li>
            <li>
               <a href="">
                    <i class="sidebar-item-icon fa fa-snapchat-ghost"></i>
                    <span class="nav-label">Feedback</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-calendar"></i>
                    <span class="nav-label">Blogs</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="">
                            <span class="fa fa-plus"></span>
                            Add Blog
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="fa fa-circle-o"></span>
                            All Blog
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href=""><i class="sidebar-item-icon fa fa-file"></i>
                    <span class="nav-label">Pages</span></a>

            </li>


        </ul>
    </div>
</nav>
