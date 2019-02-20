<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title">
                <div class="hidden-xs hidden-sm">
                    <img src="{{ asset('svg/catalogue.svg') }}" alt="logo" style="height:49px;">
                    <span style="margin-left: 10px;">E-Catalog</span>
                </div>
                <div class="show-xs show-sm">
                    <img src="{{ asset('svg/catalogue.svg') }}" alt="logo" style="height:49px;">
                </div>
            </a>
        </div>
        
        <div class="clearfix"></div>
        
        <br />
        
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ url('/admin/home') }}">
                            <i class="fa fa-home"></i> Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/supplier') }}">
                            <i class="fa fa-users"></i> Supplier
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/produk') }}">
                            <i class="fa fa-barcode"></i> Produk
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>