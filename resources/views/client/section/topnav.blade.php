<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
        <nav class="navbar navbar-expand-lg custom_nav-container"
            style="display: flex; justify-content: space-between; align-items: center;">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-brand" style="margin-right: auto;">
                    <a href="index.html">
                        <span>Munal Stores</span>
                    </a>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('front.home') }}">Home <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item {{ request()->is('shop') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('front.shop') }}">Shop</a>
                    </li>
                </ul>
                <div class="user_option" style="margin-left: auto;">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle">
                            <span>User's Account</span>
                        </a>
                        <div class="dropdown-menu">
                            <a href="#">Login</a>
                            <a href="#">Signup</a>
                        </div>
                    </div>

                    <a href="">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </a>
                    <a href="">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </a>

                    <form class="form-inline ">
                        <button class="btn nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <!-- end header section -->
</div>
<!-- end hero area -->
