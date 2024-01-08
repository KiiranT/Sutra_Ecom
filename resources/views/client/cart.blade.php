@extends('layouts.client')

@section('title', 'Munal Stores')

@section('style')
    <style>
        .cart-container {
            margin-top: 50px;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .cart-table th,
        .cart-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .cart-table th {
            background-color: #f2f2f2;
        }

        .cart-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .btn-update,
        .btn-checkout {
            background-color: #e44d26;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-left: 10px;
        }

        .quantity-input {
            width: 50px;
            text-align: center;
        }
    </style>
@endsection

@section('main-content')
    <div class="container cart-container">
        <h2>Your Shopping Cart</h2>

        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- {{ dd($cartItems) }} --}}
                @foreach ($cartItems as $key => $item)
                    <tr>
                        <td>{{ $item['title'] }}
                            <img src="{{ asset('uploads/product/' . $item['image']) }}" alt="Product Image"
                                class="product-image" style="width: 100px; height: auto;">
                        </td>
                        <td>{{ $item['price'] }}</td>
                        <td>
                            <input type="number" class="quantity-input" value="{{ $item['quantity'] }}"
                                data-key="{{ $key }}" data-price="{{ $item['price'] }}">
                        </td>
                        <td class="total">{{ $item['price'] * $item['quantity'] }}</td>
                        <td>
                            <button class="btn btn-success" onclick="updateQuantity({{ $key }})">Update</button>
                            <button class="btn btn-danger" onclick="removeItem({{ $key }})">Remove</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="cart-actions">
            <a href="{{ route('front.checkout') }}" class="btn btn-checkout"
                style="margin-bottom: 50px; background: rgb(51, 207, 51); color: white">Proceed
                to Checkout</a>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function updateQuantity(key) {
            var newQuantity = parseInt(prompt("Enter new quantity:"));

            if (!isNaN(newQuantity) && newQuantity > 0) {
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(`/cart/update/${key}`, {
                        method: 'PATCH', // Use the correct method
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({
                            quantity: newQuantity
                        })
                    })
                    .then(response => {
                        if (response.ok) {
                            location.reload();
                        } else {
                            alert('Error updating quantity in the cart.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while updating the quantity.');
                    });
            }
        }

        function removeItem(key) {
            if (confirm("Are you sure you want to remove this item?")) {
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(`/cart/remove/${key}`, {
                        method: 'DELETE', // Use the correct method
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            location.reload();
                        } else {
                            alert('Error removing item from the cart.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while removing the item.');
                    });
            }
        }
    </script>
@endsection
