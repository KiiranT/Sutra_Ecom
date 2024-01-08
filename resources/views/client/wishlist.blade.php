@extends('layouts.client')

@section('title', 'Munal Stores')

@section('style')
    <style>
        .cart-container {
            margin-top: 50px;
            margin-bottom: 50px
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

        .flash-message {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #ffffff;
            border: 1px solid #d6e9c6;
            border-radius: 4px;
            padding: 50px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .flash-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 20px
        }

        .close-btn {
            cursor: pointer;
            font-size: 24px;
            font-weight: bold;
            color: #31708f;
            position: absolute;
            top: 15px;
            /* Adjust the top spacing */
            right: 15px;
            /* Adjust the right spacing */
        }
    </style>
@endsection
@section('main-content')
    <div class="container cart-container">
        <h2>Your Wishlist</h2>

        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Unit Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wishlists as $key => $item)
                    <tr>
                        <td>{{ $item['title'] }}
                            <img src="{{ asset('uploads/product/' . $item['image']) }}" alt="Product Image"
                                class="product-image" style="width: 100px; height: auto;">
                        </td>
                        <td>{{ $item['price'] }}</td>
                        <td>
                            <div style="display: flex; gap: 0px 10px;">
                                <form action="{{ route('product.addToCart', ['id' => $item['id']]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                </form>
                                <button class="btn btn-danger" onclick="removeItem({{ $key }})">Remove</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (session('success'))
            <div class="flash-message">
                <div class="flash-content">
                    <p>{{ session('success') }}</p>
                    <span class="close-btn" onclick="closeFlashMessage()">&times;</span>
                </div>
            </div>
        @endif
        @if (session('info'))
            <div class="flash-message">
                <div class="flash-content">
                    <p>{{ session('info') }}</p>
                    <span class="close-btn" onclick="closeFlashMessage()">&times;</span>
                </div>
            </div>
        @endif
    </div>

@endsection

@section('scripts')
    <script>
        function removeItem(key) {
            if (confirm("Are you sure you want to remove this item?")) {
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(`/wishlist/remove/${key}`, {
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

        function closeFlashMessage() {
            $('.flash-message').fadeOut();
        }

        setTimeout(function() {
            $('.flash-message').fadeOut();
        }, 5000);
    </script>
@endsection
