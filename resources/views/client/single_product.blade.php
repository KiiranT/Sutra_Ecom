@extends('layouts.client')

@section('title', 'Munal Stores')

@section('style')
    <style>
        .single-product-section {
            margin-top: 50px;
        }

        .product-image img {
            max-width: 100%;
            height: auto;
            object-fit: cover;
        }

        .product-details {
            padding: 20px;
            background-color: #f8f8f8;
            border-radius: 8px;
        }

        .product-details h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .product-details .price {
            font-size: 18px;
            color: #e44d26;
            /* Adjust the color to match your design */
            margin-bottom: 15px;
        }

        .product-details .description {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        .action-buttons {
            display: flex
        }

        .action-buttons button {
            display: inline-block;
            margin-right: 10px;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #e44d26;
            color: #fff;
        }

        .btn-outline-secondary {
            background-color: #fff;
            color: #333;
            border: 1px solid #333;
        }

        /* Add this CSS to your existing styles or create a new style section */
        .product-description {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-description h3 {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }

        .product-description p {
            font-size: 16px;
            color: #555;
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
    <section class="single-product-section layout_padding">
        <div class="container">
            <div class="row">
                <!-- Product Image Section (Left Side) -->
                <div class="col-md-6">
                    <div class="product-image">
                        <img src="{{ asset('uploads/product/' . $product->image) }}" alt="{{ $product->title }}">
                    </div>
                </div>

                <!-- Product Details Section (Right Side) -->
                <div class="col-md-6">
                    <div class="product-details">
                        <h2>{{ $product->title }}</h2>
                        <p class="price">Rs {{ $product->price }}</p>
                        <p class="description">
                            {{ $product->summary }}
                        </p>

                        <!-- Add to Cart and Add to Wishlist Buttons -->
                        <div class="action-buttons">
                            <form action="{{ route('product.addToCart', ['id' => $product->id]) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                            <form action="{{ route('product.addToWishlist', ['id' => $product->id]) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-secondary">Add to Wishlist</button>
                            </form>
                        </div>
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
                </div>

                <!-- Product Description Section (Below Product Details) -->
                <div class="col-md-12 mt-4">
                    <div class="product-description">
                        <!-- You can style the description box here -->
                        <h3>Description</h3>
                        <p>
                            {{ $product->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Use this script if you are using jQuery
        function closeFlashMessage() {
            $('.flash-message').fadeOut();
        }

        // Automatically close the flash message after 5 seconds
        setTimeout(function() {
            $('.flash-message').fadeOut();
        }, 5000);
    </script>

@endsection
