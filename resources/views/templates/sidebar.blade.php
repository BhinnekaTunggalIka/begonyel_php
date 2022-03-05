<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item @if(Request::segment(1) == 'master-data') active @endif has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="submenu @if(Request::segment(1) == 'products') active @endif">
                        <li class="submenu-item @if(Request::segment(2) == 'products') active @endif">
                            <a href="{{ url ('/master-data/products/')}}">Product Data</a>
                        </li>
                        <li class="submenu-item @if(Request::segment(2) == 'order') active @endif">
                            <a href="{{ url ('/master-data/order/')}}">Order Data</a>
                        </li>
                        <li class="submenu-item @if(Request::segment(2) == 'table') active @endif">
                            <a href="{{ url ('/master-data/table/')}}">Table Data</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="..">Cart Data</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="..">Photos Data</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="{{ url('/logout') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>