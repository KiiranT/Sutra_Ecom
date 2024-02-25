<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
        <nav class="navbar navbar-expand-md custom_nav-container"
            style="display: flex; justify-content: space-between; align-items: center;">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-brand" style="margin-left: 150px;">
                    @if (auth()->check())
                        <a href="{{ route('customer') }}">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="Munal Store">
                        </a>
                    @else
                        <a href="{{ route('front.home') }}">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="Munal Store">
                        </a>
                    @endif
                </div>
                <ul class="navbar-nav">
                    @if (auth()->check())
                        <li class="nav-item {{ request()->is('customer') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('customer') }}">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>
                    @else
                        <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('front.home') }}">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>
                    @endif
                    <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('about')}}">About</a>
                    </li>
                    <li class="nav-item {{ request()->is('shop') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('front.shop') }}">Shop</a>
                    </li>
                    <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('contact')}}">Contact</a>
                    </li>
                    <li class="nav-item {{ request()->is('customer/myOrders') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('front.myOrders') }}">My Orders</a>
                    </li>
                </ul>
                <div class="header_icons user_option">
                    <div class="search_container">
                        <form class="search_form" action="{{ route('front.search') }}">
                            <input type="text" class="search_box" name="term" placeholder="Search">
                            <button class="btn nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>

                    <div class="icon_container">
                        <!-- Assuming you are using Font Awesome for the cart icon -->
                        <div class="icon">
                            <a href="{{ route('front.cart') }}" style="position: relative; display: inline-block;">
                                <i class="fa fa-shopping-cart" aria-hidden="true"
                                    style="color: #ffffff; font-size: 20px;"></i>
                                @php
                                    $cartItemCount = count(session('cart', []));
                                @endphp
                                @if ($cartItemCount > 0)
                                    <span
                                        style="position: absolute; bottom: 0; left: 10; background-color: red; color: white; border-radius: 50%; padding: 4px 8px; font-size: 8px;">
                                        {{ $cartItemCount }}
                                    </span>
                                @endif
                            </a>
                        </div>

                        <div class="icon">
                            <a href="{{ route('front.wishlist') }}"
                                style="position: relative; display: inline-block; color: white">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                                @php
                                    $wishlistItemCount = count(session('wishlist', []));
                                @endphp
                                @if ($wishlistItemCount > 0)
                                    <span
                                        style="position: absolute; bottom: 0; left: 10; background-color: red; color: white; border-radius: 50%; padding: 4px 8px; font-size: 8px;">
                                        {{ $wishlistItemCount }}
                                    </span>
                                @endif
                            </a>

                        </div>
                        @auth
                            <span>{{ auth()->user()->name }}</span>
                        @endauth
                        <div class="icon user-dropdown" onclick="toggleDropdown()">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <div class="dropdown-content">
                                @if (auth()->check())
                                    <!-- User is authenticated -->
                                    <!-- Display the customer's name -->
                                    {{-- <a href="{{ route('profile') }}">Profile</a>
                                    <a href="#">Settings</a> --}}
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off u-s-m-r-9"></i>
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                @else
                                    <!-- User is not authenticated -->
                                    <a href="{{ route('login') }}">Login/Signup</a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
        </nav>
    </header>
    <!-- end header section -->
</div>
<!-- end hero area -->
