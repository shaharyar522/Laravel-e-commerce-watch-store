@extends('layouts.app');


@section('content')
    <section class="products-section">

        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">Masterpieces</span>
                <h2 class="section-title">Signature Collection</h2>
            </div>
            
            <div class="products-grid">
                <!-- Product 1 -->

                <div class="product-card">
                    <div class="product-badge">Limited Edition</div>
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1523170335258-f5ed11844a49?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=880&q=80"
                            alt="Heritage Chronograph">
                        <div class="product-overlay">
                            <p>Swiss automatic movement with 72-hour power reserve</p>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-category">Men's Collection</div>
                        <h3 class="product-name">Heritage Chronograph</h3>
                        <p class="product-description">Crafted with sapphire crystal and 18k gold accents</p>
                        <div class="product-price">$4,850</div>
                        <div class="product-actions">
                            <button class="btn-add-to-cart">Add to Cart</button>
                            <button class="btn-wishlist"><i class="far fa-heart"></i></button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1587836374828-4dbafa94cf0e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=880&q=80"
                            alt="Mariner Professional">
                        <div class="product-overlay">
                            <p>Water resistant to 300m with unidirectional bezel</p>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-category">Sports Collection</div>
                        <h3 class="product-name">Mariner Professional</h3>
                        <p class="product-description">Professional diving watch with ceramic bezel</p>
                        <div class="product-price">$3,950</div>
                        <div class="product-actions">
                            <button class="btn-add-to-cart">Add to Cart</button>
                            <button class="btn-wishlist"><i class="far fa-heart"></i></button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="product-card">
                    <div class="product-badge">Exclusive</div>
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1611591437281-460bfbe1220a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=880&q=80"
                            alt="Minimalist Artisan">
                        <div class="product-overlay">
                            <p>Hand-finished movement with 80-hour power reserve</p>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-category">Artisan Collection</div>
                        <h3 class="product-name">Minimalist Artisan</h3>
                        <p class="product-description">Skeleton dial revealing the intricate movement</p>
                        <div class="product-price">$12,500</div>
                        <div class="product-actions">
                            <button class="btn-add-to-cart">Add to Cart</button>
                            <button class="btn-wishlist"><i class="far fa-heart"></i></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
