@extends('layouts.client')

@section('title', 'Order Confirmation - Munal Stores')

@section('style')
    <style>
        /* Add any specific styles for the confirmation page if needed */
        .confirmation-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .confirmation-container h2 {
            color: #333;
        }

        .confirmation-container p {
            color: #555;
            margin-bottom: 20px;
        }

        .order-details {
            margin-top: 20px;
        }

        .order-details strong {
            color: #e44d26;
        }

        /* Additional styles for any additional information or instructions as needed */
        .additional-info {
            margin-top: 20px;
            color: #777;
        }

        /* Styles for the contact information */
        .contact-info {
            margin-top: 20px;
            font-weight: bold;
        }

        .contact-info a {
            color: #e44d26;
            text-decoration: none;
        }

        .contact-info a:hover {
            text-decoration: underline;
        }
    </style>
@endsection

@section('main-content')
    <div class="confirmation-container">
        <h2>Thank You for Your Order!</h2>
        <p>Your order has been successfully placed.</p>

        <div class="order-details">
            <strong>Order ID:</strong> {{ $order_id }} <!-- Assuming $order contains order details -->
        </div>

        <!-- Add any additional information or instructions as needed -->

        <p>For any inquiries regarding your order, please contact our customer support.</p>
    </div>
@endsection
