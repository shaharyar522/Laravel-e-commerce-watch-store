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
                                <button class="btn-add-to-cart" data-id="{{ $product->id }}">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </section>


    {{-- add to Add to Cart update --}}
    <script>
        document.querySelectorAll('.btn-add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                let productId = this.getAttribute('data-id');

                fetch("{{ route('cart.add') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            product_id: productId
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        // Update the cart count dynamically
                        document.getElementById('cart-count').innerText = data.cart_count;

                        // Optional: show small toast message
                        showToast('Product added to cart!');
                        // Redirect to Cart page
                        window.location.href = "{{ route('cart.view') }}";
                    });
            });
        });

        // Simple toast message (looks modern)
        function showToast(message) {
            const toast = document.createElement('div');
            toast.innerText = message;
            toast.style.position = 'fixed';
            toast.style.bottom = '30px';
            toast.style.right = '30px';
            toast.style.backgroundColor = '#d4af37';
            toast.style.color = 'white';
            toast.style.padding = '10px 20px';
            toast.style.borderRadius = '6px';
            toast.style.fontWeight = '500';
            toast.style.zIndex = '9999';
            toast.style.transition = 'opacity 0.5s ease';
            document.body.appendChild(toast);
            setTimeout(() => toast.remove(), 2000);
        }
    </script>



@endsection
