<!-- START SIDEBAR-->
<nav class="page-sidebar" style="background-color: #4362D6">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            {{-- <div>
                @if (file_exists(public_path() . '/uploads/user/' . auth()->user()->nimage))
                    <img src="{{ asset('uploads/user' . auth()->user()->image) }}" alt="" width="45px">
                @else
                    <img src="../../../assets/img/admin-avatar.png"/>
                @endif
            </div> --}}
            {{-- <div class="admin-info">
                <div class="font-strong">{{ auth()->user()->name }}</div>
                <small>{{ ucfirst(auth()->user()->role) }}</small>
            </div> --}}
        </div>
        <div class="input-group search-bar">
            <input type="text" class="form-control" placeholder="Search...">
            <div class="input-group-append">
                <button class="btn btn-outline-success" type="button"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="{{ route(auth()->user()->role) }}" style="text-decoration: none">
                    <span class="" style="color: white; font-size: 15px"> 📈 Dashboard</span>
                </a>
            </li>
            <li>
                <a class="" href="{{ route('banner.index') }}" style="text-decoration: none">
                    <span class="nav-label" style="color: white; font-size: 15px">🖼️ Banner Manager</span>
                </a>
            </li>
            <li>
                <a class="" href="{{ route('category.index') }}" style="text-decoration: none">
                    <span class="nav-label" style="color: white; font-size: 15px">✳️ Category Manager</span>
                </a>
            </li>
            <li>
                <a class="" href="{{ route('product.index') }}" style="text-decoration: none">
                    <span class="nav-label" style="color: white; font-size: 15px">🛒 Product Manager</span>
                </a>
            </li>
            <li>
                <a class="" href="{{ route('order.index') }}" style="text-decoration: none">
                    <span class="nav-label" style="color: white; font-size: 15px">✅ Order Manager</span>
                </a>
            </li>
            <li>
                <a class="" href="" style="text-decoration: none">
                    <span class="nav-label" style="color: white; font-size: 15px">👨 Users Manager</span>
                </a>
            </li>
            <!-- Add additional menu items or elements here -->
        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->
