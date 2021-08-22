<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('user.login');
    }

    /**
     * Metodo responsavel por realizar uma busca dentro do banco de dados.
     * Busca e retorna um registro especifico segunda a condicao.
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function signIn(Request $request)
    {
        $request -> validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required', 'max:255'],
        ]);

        $post = $request -> post();

        $user = User::singIn($post['email'], $post['password']);
        return $user;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('user.register');
    }

    /**
     * Metodo responsavel por "cadastrar" o usuario.
     * Cria um novo registro dentro do banco de dados.
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function signUp(Request $request)
    {
        $request -> validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required', 'max:255'],
            'cpf' => ['required', 'size:14'],
            'phone' => ['nullable'],
            'address' => ['max:255', 'nullable'],
            'city' => ['max:255', 'nullable'],
            'state' => ['max:255', 'nullable'],
            'country' => ['max:255', 'nullable'],
        ]);

        $post = $request -> post();

        $data = [
            'name' => $post['name'],
            'email' => $post['email'],
            'password' => $post['password'],
            'cpf' => $post['cpf'],
            'phone' => ($post['phone']) ? $post['phone'] : null,
            'address' => ($post['address']) ? $post['address'] : null,
            'city' => ($post['city']) ? $post['city'] : null,
            'state' => ($post['state']) ? $post['state'] : null,
            'country' => ($post['country']) ? $post['country'] : null,
        ];
        
        try {
            User::create($data);
            return json_encode($data);

        } catch (Exception $error) {
            return json_encode(['error' => $error -> getMessage()]);
        }
        
    }
}
