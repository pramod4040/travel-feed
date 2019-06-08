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
               <a href="{{route('destination.list')}}">
                    <i class="sidebar-item-icon fa fa-globe"></i>
                    <span class="nav-label">Destnation Manage</span>
                    <!-- <i class="fa fa-angle-left arrow"></i> -->
                </a>
            </li>

            


            <!-- <li>
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
            </li> -->


      


        </ul>
    </div>
</nav>
