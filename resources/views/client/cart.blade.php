@extends('layouts.client')

@section('title', 'Sutra Accessories')

@section('style')
    <style>
        .cart-container {
            margin-top: 50px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .cart-item {
            width: calc(33.33% - 20px);
            margin-bottom: 40px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .cart-item:hover {
            transform: translateY(-5px);
        }

        .cart-item img {
            width: 100%;
            height: auto;
            border-radius: 8px 8px 0 0;
        }

        .cart-item-content {
            padding: 20px;
            background-color: #fff;
        }

        .cart-item-title {
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: bold;
        }

        .cart-item-price {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        .cart-item-quantity {
            margin-bottom: 10px;
        }

        .quantity-input {
            width: 50px;
            text-align: center;
        }

        .total {
            font-weight: bold;
            color: #e44d26;
        }

        .action-buttons {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
            gap: 10px 10px
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 10px;
            transition: background-color 0.3s;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-success:hover,
        .btn-danger:hover {
            filter: brightness(90%);
        }

        .cart-actions {
            width: 100%;
            margin-top: 20px;
            text-align: right;
        }

        .btn-checkout {
            background-color: #e44d26;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn-checkout:hover {
            filter: brightness(90%);
            color: white;
            text-decoration: none;

        }
    </style>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

            <h2 style="text-align: center">Your Shopping Cart</h2>
        </div>
        <div class="col-md-3">
            <div class="cart-actions" style="margin-bottom: 20px">
                <a href="{{ route('front.checkout') }}" class="btn-checkout">Proceed to Checkout</a>
            </div>
        </div>
        
    </div>

    <div class="container cart-container">

        @foreach ($cartItems as $key => $item)
            <div class="cart-item">
                <img src="{{ asset('uploads/product/' . $item['image']) }}" alt="Product Image">
                <div class="cart-item-content">
                    <div class="cart-item-title">{{ $item['title'] }}</div>
                    <div class="cart-item-price">Unit Price: Rs {{ $item['price'] }}</div>
                    <div class="cart-item-quantity">
                        Quantity:
                        <input type="" class="quantity-input" value="{{ $item['quantity'] }}"
                            data-key="{{ $key }}" data-price="{{ $item['price'] }}" disabled>
                    </div>
                    <div class="total">Total Price: Rs {{ $item['price'] * $item['quantity'] }}</div>
                    <div class="action-buttons">
                        <button class="btn btn-primary" onclick="updateQuantity({{ $key }})">Update
                            Quantity</button>
                        <button class="btn btn-danger" onclick="removeItem({{ $key }})">Delete</button>
                    </div>
                </div>
            </div>
        @endforeach

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
