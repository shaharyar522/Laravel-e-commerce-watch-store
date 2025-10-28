@extends('layouts.app');


@section('content')
    <section class="products-section">

        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">Masterpieces</span>
                <h2 class="section-title">Signature Collection</h2>
            </div>

            <div class="products-grid">
                @foreach ($products as $product)
                    <div class="product-card">
                        @if ($product->badge)
                            <div class="product-badge">{{ $product->badge }}</div>
                        @endif
                        <div class="product-image">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                            @if ($product->overlay_description)
                                <div class="product-overlay">
                                    <p>{{ $product->overlay_description }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="product-info">
                            <div class="product-category">{{ $product->category }}</div>
                            <h3 class="product-name">{{ $product->name }}</h3>
                            <p class="product-description">{{ $product->description }}</p>
                            <div class="product-price">${{ number_format($product->price, 2) }}</div>
                            <div class="product-actions">
                                <button class="btn-add-to-cart">Add to Cart</button>
                                <button class="btn-wishlist"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
