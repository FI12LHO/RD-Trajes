<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <style>
            form {
                display: flex;
                flex-direction: column;
            }
        </style>
    </head>
    <body>
        <form action="/user/login" method="post">
            @csrf
            @method('POST')
            <input type='email' key='e-mail'
                name='email'id='input_email' placeholder='Qual seu melhor e-mail?' required />
            <input type='password' key='senha'
                name='password'id='input_password' placeholder='Digite uma senha.' required />

            <button>Entrar</button>
        </form>
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/validateForm.js') }}"></script>
        <!-- Scripts -->
    </body>
</html>
