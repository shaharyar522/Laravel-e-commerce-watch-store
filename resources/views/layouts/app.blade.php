<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChronoLux | Premium Timepieces</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>

    <!-- Premium Header -->
  @include('partials.header');


    <!-- Luxury Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <span class="hero-subtitle">Since 1895</span>
            <h1 class="hero-title">Timeless Elegance, Modern Precision</h1>
            <p class="hero-description">Discover our exclusive collection of handcrafted timepieces, where Swiss precision meets unparalleled luxury.</p>
            <a href="#" class="btn">Explore Collection <i class="fas fa-arrow-right"></i></a>
        </div>
    </section>

    {{-- page content --}}
    <!-- Premium Products Section -->

    <main>
        @yield('content');
    </main>


    <!-- Luxury Features -->
    <section class="luxury-features">
        <div class="container">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3>Swiss Made</h3>
                    <p>Each timepiece is crafted in Switzerland with precision and excellence.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h3>Premium Materials</h3>
                    <p>We use only the finest materials including sapphire crystal and 18k gold.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-history"></i>
                    </div>
                    <h3>5-Year Warranty</h3>
                    <p>Comprehensive warranty covering manufacturing defects for 5 years.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-cog"></i>
                    </div>
                    <h3>Personalization</h3>
                    <p>Custom engraving and strap options available for a personal touch.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Exclusive Newsletter -->
    <section class="newsletter">
        <div class="container">
            <div class="newsletter-content">
                <h2>Join Our Exclusive Circle</h2>
                <p>Be the first to discover new collections, private events, and special offers reserved for our discerning clients.</p>
                <form class="newsletter-form">
                    <input type="email" class="newsletter-input" placeholder="Your email address">
                    <button type="submit" class="newsletter-btn">Subscribe</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Premium Footer -->
   @include('partials.footer');

  <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
