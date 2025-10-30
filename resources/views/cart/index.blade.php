@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Cart</h2>
    @foreach($carts as $item)
        <div class="cart-item">
            <img src="{{ $item->product->image_url }}" width="50">
            {{ $item->product->name }}
            <input type="number" min="1" value="{{ $item->quantity }}"
                   data-id="{{ $item->id }}" class="update-quantity">
            <span>${{ $item->product->price * $item->quantity }}</span>
        </div>
    @endforeach

    <button class="btn btn-primary" id="update-cart">Update Cart</button>
    <a href="/checkout" class="btn btn-success">Proceed to Checkout</a>
</div>

{{-- ✅ Add your script here, at the end of the file --}}
<script>
document.getElementById('update-cart').addEventListener('click', function() {
    const items = document.querySelectorAll('.update-quantity');
    let updates = [];

    items.forEach(input => {
        updates.push({
            id: input.getAttribute('data-id'),
            quantity: input.value
        });
    });

    fetch("{{ route('cart.update') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ items: updates })
    })
    .then(res => res.json())
    .then(data => location.reload());
});
</script>
@endsection
