<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RD Trajes</title>

    <!-- StyleSheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/index_page.css') }}">
     <!-- StyleSheet -->

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/popup.js') }}"></script>
    <!-- Scripts -->
</head>
<body>
    <main>
        <img src="{{ asset('assets/images/product1.jpeg') }}" alt="Product"
        onclick="openPopup('product1')">
        <img src="{{ asset('assets/images/product2.jpeg') }}" alt="Product"
            onclick="openPopup('product2')">
        <img src="{{ asset('assets/images/product3.jpeg') }}" alt="Product"
            onclick="openPopup('product3')">
        <img src="{{ asset('assets/images/product4.jpeg') }}" alt="Product"
            onclick="openPopup('product4')">
        <img src="{{ asset('assets/images/product5.jpeg') }}" alt="Product"
            onclick="openPopup('product5')">
        <img src="{{ asset('assets/images/product6.jpeg') }}" alt="Product"
            onclick="openPopup('product6')">
    </main>
    
    <!-- Popup -->
    <div class="popup-container" id="popup-container">
        <div class="popup-image-container" id="popup-image-container">
            <button onclick="closePopup()">Close</button>
            <a href="" class="popup-link-add" id="popup-link-add">
                <button>Add</button>
            </a>
        </div>
    </div>
    <!-- Popup -->
</body>
</html>