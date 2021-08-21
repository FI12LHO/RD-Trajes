<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RD Trajes</title>

    <!-- StyleSheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/product_index_page.css') }}">
     <!-- StyleSheet -->

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/popup.js') }}"></script>
    <!-- Scripts -->
</head>
<body>
    @forelse ($products_list as $product)
        <div class="product-container" id="product-container">
            <img src="{{ asset("assets/images/$product.jpeg") }}" alt="">
            <span>{{$product}}</span>
        </div>
        <br>
    @empty
        Sem produtos no momento.
    @endforelse    
</body>
</html>