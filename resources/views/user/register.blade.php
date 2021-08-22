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
        <form action="/user/register" method="post">
            @csrf
            @method('POST')
            <input type='text' key='nome'
                name='name'id='input_name' placeholder='Qual seu nome?' required />
            <input type='email' key='e-mail'
                name='email'id='input_email' placeholder='Qual seu melhor e-mail?' required />
            <input type='password' key='senha'
                name='password'id='input_password' placeholder='Digite uma senha.' required />
            <input type='password' key='confirme a senha'
                id='input_confirm' placeholder='Confirme a senha.' required />
            <input type='text' key='cpf' mask='cpf'
                name='cpf'id='input_cpf' placeholder='000.000.000-00' required />
            <input type='text' key='contato' mask='phone'
                name='phone'id='input_phone' placeholder='(00) 0000-0000' />
            <input type='text' key='endereço'
                name='address'id='input_address' placeholder='Qual seu endereço?' />
            <input type='text' key='cidade'
                name='city'id='input_city' placeholder='Qual sua cidade?' />
            <input type='text' key='estado'
                name='state'id='input_state' placeholder='Qual seu estado?' />
            <input type='text' key='pais'
                name='country'id='input_country' placeholder='Qual seu pais?' />

            <button>Cadastrar</button>
        </form>
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/validateForm.js') }}"></script>
        <script src="{{ asset('assets/js/mask.js') }}"></script>
        <!-- Scripts -->
    </body>
</html>
