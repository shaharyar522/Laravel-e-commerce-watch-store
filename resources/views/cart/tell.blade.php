@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Your Cart</h2>

        @foreach ($carts as $item)
            <div class="cart-item" data-id="{{ $item->id }}">
                <img src="{{ $item->product->image_url }}" width="50">
                {{ $item->product->name }}
                <input type="number" min="1" value="{{ $item->quantity }}" data-id="{{ $item->id }}"
                    class="update-quantity">
                <span>$<span class="item-total">{{ $item->product->price * $item->quantity }}</span></span>
                <!-- Remove button -->
                <button class="btn btn-danger btn-remove" data-id="{{ $item->id }}">Remove</button>
            </div>
        @endforeach


        <h3>Total: $<span id="cart-total">{{ $total }}</span></h3>

        <button class="btn btn-primary" id="update-cart">Update Cart</button>
        <a href="" class="btn btn-success">Proceed to Checkout</a>

    </div>

    <script>
        document.getElementById('update-cart').addEventListener('click', function() {
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
                    // Reload page after update
                    location.reload();
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
@endsection
