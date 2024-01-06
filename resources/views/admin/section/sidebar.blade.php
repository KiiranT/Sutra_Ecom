<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            {{-- <div>
                @if(file_exists(public_path(). '/uploads/user/'. auth()->user()->nimage))
                    <img src="{{ asset('uploads/user' . auth()->user()->image) }}" alt="" width="45px">
                @else
                    <img src="../../../assets/img/admin-avatar.png"/>
                @endif
            </div> --}}
            <div class="admin-info">
                <div class="font-strong">{{ auth()->user()->name }}</div>
                <small>{{ ucfirst(auth()->user()->role) }}</small></div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="{{ route(auth()->user()->role) }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">FEATURES</li>
            <li>
                <a class="" href="{{ route('banner.index') }}"><i class="sidebar-item-icon fa fa-image"></i>
                    <span class="nav-label">Banner Manager</span>
                </a>
            </li>
            <li>
                <a class="" href="{{ route('category.index') }}"><i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">Category Manager</span>
                </a>
            </li>
            <li>
                <a class="" href="{{ route('product.index') }}"><i class="sidebar-item-icon fa fa-shopping-bag"></i>
                    <span class="nav-label">Product Manager</span>
                </a>
            </li>
            <li>
                <a class="" href=""><i class="sidebar-item-icon fa fa-shopping-cart"></i>
                    <span class="nav-label">Order Manager</span>
                </a>
            </li>
            <li>
                <a class="" href=""><i class="sidebar-item-icon fa fa-gift"></i>
                    <span class="nav-label">Offer Manager</span>
                </a>
            </li>
            <li>
                <a class="" href=""><i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">Users Manager</span>
                </a>
            </li>
            <li>
                <a class="" href=""><i class="sidebar-item-icon fa fa-comment"></i>
                    <span class="nav-label">Review Manager</span>
                </a>
            </li>
            <li>
                <a class="" href=""><i class="sidebar-item-icon fa fa-file"></i>
                    <span class="nav-label">Pages Manager</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->
