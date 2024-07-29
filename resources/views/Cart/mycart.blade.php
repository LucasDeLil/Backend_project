<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <style>
        .div_design {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }

        .table_design {
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }

        th {
            background-color: black;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            color: white;
        }

        td {
            padding: 10px;
            border: 1px solid gray;
            text-align: center;
        }

        .cart_value {
            text-align: center;
            margin-bottom: 70px;
            padding: 18px;
        }

        .purchase_button {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .loading-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loading-overlay .spinner {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')
    </div>
    <div class="div_design">
        <table class="table_design">
            <tr>
                <th>Product title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Remove</th>
            </tr>

            @php
            $totalValue = 0;
            @endphp

            @foreach($cart as $cartItem)
            <tr>
                <td>{{ $cartItem->product->title }}</td>
                <td>{{ $cartItem->product->price }}</td>
                <td><img height="120" width="120" src="products/{{ $cartItem->product->image }}" alt="{{ $cartItem->product->title }}"></td>
                <td><a class="btn btn-danger" href="{{ url('remove_cart', $cartItem->id) }}">Remove</a></td>
            </tr>

            @php
            $totalValue += $cartItem->product->price;
            @endphp
            @endforeach
        </table>
    </div>

    <div class="cart_value">
        <h3>Total Value of Cart is: {{ $totalValue }} gold</h3>
    </div>

    <div class="purchase_button">
        <form action="{{ url('purchase') }}" method="POST" id="purchase-form">
            @csrf
            <button type="submit" class="btn btn-success">Purchase</button>
        </form>
    </div>

    <div class="loading-overlay" id="loading-overlay">
        <div class="spinner"></div>
    </div>

    @include('home.footer')

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
