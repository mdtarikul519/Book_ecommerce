<div class="page-sidebar custom-scrollbar page-sidebar-open print-d-none">
    <!--Page Sidebar Start-->
    <div class="sidebar-user text-center">
        <div><img class="img-50 rounded-circle" src="/assets/backend/1.jpg" alt="#" /></div>
        <h6 class="mt-3 f-12">Admin</h6>
    </div>
    <ul class="sidebar-menu">
     

        <li class="active">
     
            <a href="javascript:void(0)" class="sidebar-header">
                <i class="icon-desktop"></i><span>User</span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="{{ route('dashboard.user.create') }}"><i class="fa fa-angle-right"></i>create</a></li>
                <li><a href="{{ route('dashboard.user.view') }}"><i class="fa fa-angle-right"></i>All</a></li>
                <li><a href="{{ route('dashboard.role.view') }}"><i class="fa fa-angle-right"></i>User Roll</a></li>

            </ul>
        </li>

        <li class="active">
            <a href="javascript:void(0)" class="sidebar-header">
                <i class="icon-desktop"></i><span>Banner</span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="{{ route('dashboard.banner.view') }}"><i class="fa fa-angle-right"></i>All</a></li>
            </ul>
        </li>


        <li class="active">
            <a href="javascript:void(0)" class="sidebar-header">
                <i class="icon-desktop"></i><span>Product</span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="{{ route('dashboard.product.view') }}"><i class="fa fa-angle-right"></i>Product All</a></li>
                <li><a href="{{ route('dashboard.product_category.view') }}"><i class="fa fa-angle-right"></i>Product Category</a></li>
                <li><a href="{{ route('dashboard.product_tag.view') }}"><i class="fa fa-angle-right"></i>Product Tag</a></li>
            </ul>
        </li>


        <li class="active">  
            <a href="javascript:void(0)" class="sidebar-header">
                <i class="icon-desktop"></i><span>Order</span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="{{ route('dashboard.order.view') }}"><i class="fa fa-angle-right"></i>All Order</a></li>
            </ul>
        </li>
    </ul>
    <!--Page Sidebar Ends-->
</div>
