<!-- resources/views/client/myOrders.blade.php -->

@extends('layouts.client')

@section('title', 'My Orders - Munal Stores')

@section('style')
    <!-- Add any specific styles for the My Orders page if needed -->
    <style>
        .orders-container {
            max-width: 800px;
            margin: 20px auto;
        }

        .order-item {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .order-item:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .order-details {
            margin-top: 15px;
        }

        .product-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            align-items: center;
        }

        .product-image {
            max-width: 80px;
            max-height: 80px;
            margin-right: 20px;
            border-radius: 5px;
            object-fit: cover;
            border: 1px solid #ddd;
        }

        .product-info {
            flex: 1;
        }

        .product-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .product-price {
            color: #e44d26;
            font-size: 16px;
        }

        .product-quantity {
            font-size: 14px;
            color: #888;
        }

        .total-amount {
            font-size: 16px;
            margin-top: 10px;
        }

        .order-status {
            font-size: 16px;
            color: #4caf50;
            font-weight: bold;
        }

        .no-orders {
            text-align: center;
            color: #888;
            margin-top: 20px;
        }
    </style>
@endsection

@section('main-content')
    <div class="orders-container">
        <h2>My Orders</h2>

        @if (count($userOrders) > 0)
            @foreach ($userOrders as $order)
                <div class="order-item">
                    <h3>Order #{{ $order->order_number }}</h3>

                    <div class="order-details">
                        @foreach ($order->products as $product)
                            <div class="product-details">
                                <img src="{{ asset('uploads/product/' . $product->image) }}" alt="Product Image"
                                    class="product-image">
                                <div class="product-info">
                                    <div class="product-title">{{ $product->title }}</div>
                                    <div class="product-price">Price: {{ $product->price }}</div>
                                    <div class="product-quantity">Quantity: {{ $product->pivot->quantity }}</div>
                                </div>
                            </div>
                        @endforeach

                        <p class="total-amount">Total Amount: {{ $order->total_amount }}</p>
                        <p class="order-status">Order Status: {{ $order->condition }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p class="no-orders">No orders available.</p>
        @endif
    </div>
@endsection
