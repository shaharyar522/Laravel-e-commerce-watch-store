<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart - Luxury Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Payment/cart.css') }}">
    <style>
        #update-cart.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        #update-cart.loading #update-icon {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="cart-header">
            <h1 class="cart-title">Your Shopping Cart</h1>
            <div class="cart-subtitle">Luxury Items</div>
        </div>

        <!-- Cart Items -->
        <div class="cart-items">
            @if (count($carts) > 0)
                @foreach ($carts as $item)
                    <div class="cart-item" data-id="{{ $item->id }}">
                        <img src="{{ $item->product->image_url }}" class="cart-item-image"
                            alt="{{ $item->product->name }}">
                        <div class="cart-item-details">
                            <div class="cart-item-name">{{ $item->product->name }}</div>
                            <div class="cart-item-price">${{ $item->product->price }}</div>
                        </div>

                        <div class="quantity-control">
                            <button class="quantity-btn minus" data-id="{{ $item->id }}">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" min="1" value="{{ $item->quantity }}"
                                data-id="{{ $item->id }}" class="update-quantity">
                            <button class="quantity-btn plus" data-id="{{ $item->id }}">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                        <div class="item-total">${{ $item->product->price * $item->quantity }}</div>
                        <button class="btn btn-danger btn-remove" data-id="{{ $item->id }}">Remove</button>
                    </div>
                @endforeach
            @else
                <div class="empty-cart">
                    <div class="empty-cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3 class="empty-cart-title">Your cart is empty</h3>
                    <p class="empty-cart-text">Start adding some luxury items to your cart</p>
                    <a href="{{ route('home') }}" class="btn btn-checkout">
                        <i class="fas fa-shopping-bag"></i> Continue Shopping
                    </a>
                </div>
            @endif
        </div>


        @if (count($carts) > 0)
            <!-- Cart Summary -->
            <div class="cart-summary">
                <div class="cart-total">
                    <span class="cart-total-label">Total:</span>
                    <span class="cart-total-amount" id="cart-total">${{ $total }}</span>
                </div>
                <div class="cart-actions">
                    <button class="btn btn-update" id="update-cart">
                        <i class="fas fa-sync-alt me-2" id="update-icon"></i>
                        <span id="update-text">Update Cart</span>
                    </button>

                    <a class="btn btn-checkout">
                        <i class="fas fa-credit-card"></i> Proceed to Checkout
                    </a>
                </div>
            </div>
        @endif

        <!-- Plus Icon for adding new items -->
        <div class="plus-icon-container">
            <button class="plus-icon" id="add-item" onclick="window.location.href=''">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>

    <script>
        document.getElementById('update-cart').addEventListener('click', function() {
            const button = this;
            const icon = document.getElementById('update-icon');
            const text = document.getElementById('update-text');

            // Add loading state
            button.classList.add('loading');
            text.innerText = 'Updating...';

            const items = document.querySelectorAll('.update-quantity');
            let updates = [];

            items.forEach(input => {
                updates.push({
                    id: input.getAttribute('data-id'),
                    quantity: parseInt(input.value)
                });
            });

            fetch("{{ route('cart.update') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        items: updates
                    })
                })
                .then(res => res.json())
                .then(data => {
                    // Simulate short delay for UX
                    setTimeout(() => {
                        button.classList.remove('loading');
                        text.innerText = 'Updated!';
                        icon.classList.remove('fa-sync-alt');
                        icon.classList.add('fa-check');

                        // Reload after a short pause
                        setTimeout(() => {
                            location.reload();
                        }, 700);
                    }, 500);
                })
                .catch(() => {
                    // Handle error gracefully
                    button.classList.remove('loading');
                    text.innerText = 'Try Again';
                });
        });
    </script>



    {{-- for remove product item --}}

    <script>
        document.querySelectorAll('.btn-remove').forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.dataset.id;

                fetch(`/cart/remove/${itemId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        // Remove the item div from page
                        const itemDiv = document.querySelector(`.cart-item[data-id='${itemId}']`);
                        if (itemDiv) {
                            itemDiv.remove();
                        }

                        // Update total
                        let total = 0;
                        document.querySelectorAll('.item-total').forEach(span => {
                            total += parseFloat(span.innerText);
                        });
                        document.getElementById('cart-total').innerText = total.toFixed(2);

                        // Update cart count dynamically in header
                        document.getElementById('cart-count').innerText = data.cart_count;
                    });
            });

        });
    </script>


    {{-- now this is update the plus/minus  --}}

    <script>
        document.querySelectorAll('.quantity-btn.plus').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                const input = document.querySelector(`.update-quantity[data-id='${id}']`);
                input.value = parseInt(input.value) + 1;

                // Optionally, update item total immediately
                const itemDiv = this.closest('.cart-item');
                const price = parseFloat(itemDiv.querySelector('.cart-item-price').innerText.replace('$',
                    ''));
                itemDiv.querySelector('.item-total').innerText = '$' + (price * parseInt(input.value))
                    .toFixed(2);
            });
        });

        document.querySelectorAll('.quantity-btn.minus').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                const input = document.querySelector(`.update-quantity[data-id='${id}']`);
                let currentValue = parseInt(input.value);
                if (currentValue > 1) {
                    input.value = currentValue - 1;

                    // Optionally, update item total immediately
                    const itemDiv = this.closest('.cart-item');
                    const price = parseFloat(itemDiv.querySelector('.cart-item-price').innerText.replace(
                        '$', ''));
                    itemDiv.querySelector('.item-total').innerText = '$' + (price * parseInt(input.value))
                        .toFixed(2);
                }
            });
        });
    </script>


</body>

</html>
