<header id="header">
    <div class="container">
        <div class="header-content">
            <a href="#" class="logo">
                <div class="logo-icon">
                    <i class="fas fa-crown"></i>
                </div>
                <div class="logo-text">Shari Watch Store</div>
            </a>

            <nav>

                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Collections</a></li>
                    <li><a href="#">Craftsmanship</a></li>
                    <li><a href="#">Heritage</a></li>
                    <li><a href="#">Boutiques</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>

            </nav>

            <div class="header-actions">
                <div class="header-icon">
                    <i class="fas fa-search"></i>
                </div>

                <div class="header-icon">
                    <i class="fas fa-user"></i>
                </div>

                <a href="{{ route('cart.view') }}" class="header-icon" id="cart-icon">
                    
                    <i class="fas fa-shopping-bag"></i>

                    <span class="cart-count" id="cart-count">
                        {{ session('cart_count', 0) }}
                    </span>

                </a>



                <!-- Moved logout button here -->

                <form action="{{ route('user.logout.post') }}">

                    @csrf
                    <button type="submit" id="logout-btn" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </button>
                </form>

            </div>
        </div>
    </div>
</header>
