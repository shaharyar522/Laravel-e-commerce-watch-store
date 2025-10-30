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

                <div class="header-icon">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="cart-count">2</span>
                </div>

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
<style>
    /* Logout button styles */
    .logout-btn {
        background-color: transparent;
        border: 1px solid #d4af37;
        color: #d4af37;
        padding: 8px 15px;
        border-radius: 4px;
        cursor: pointer;
        display: flex;
        align-items: center;
        transition: all 0.3s;
        font-weight: 500;
        font-family: 'Inter', sans-serif;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-left: 10px;
    }

    .logout-btn:hover {
        background-color: #d4af37;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
    }

    .logout-btn i {
        margin-right: 8px;
        font-size: 0.9rem;
    }

    /* Update header actions to properly space items */
    .header-actions {
        display: flex;
        gap: 1.5rem;
        align-items: center;
    }

    /* Responsive design for logout button */
    @media (max-width: 768px) {
        .header-content {
            flex-direction: column;
            gap: 1.5rem;
        }

        .logout-btn {
            margin-left: 0;
            margin-top: 10px;
            justify-content: center;
            width: 100%;
            max-width: 150px;
        }

        .header-actions {
            flex-wrap: wrap;
            justify-content: center;
        }
    }
</style>
