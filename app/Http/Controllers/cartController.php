<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Exception;

class cartController extends Controller
{
    /**
     * Metodo responsavel por obter uma lista de itens codicionada ao id do usuario e retornar uma view.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $items = Cart::getAllItems($id, 15);

        // return view('cart.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create() { }

    /**
     * Metodo responsavel por criar um novo registro no banco de dados.
     * @param  \Illuminate\Http\Request  $request
     * @return json
     */
    public function store(Request $request)
    {
        $request -> validate([
            'product_code' => ['required'],
            'user_id' => ['required'],
        ]);

        $post = $request -> post();
        $new_item = [
            'user_id' => $post['user_id'],
            'product_code' => $post['product_code'],
        ];

        try {
            Cart::create($new_item);

        } catch(Exception $error) {
            return $error -> getMessage();

        }
        
        return json_encode(['status' => 'Item added to cart', 'body' => $new_item]);
    }

    /**
     * Metodo responsavel por obter e retornar uma lista de items codicionado ao id usuario.
     * @param  int  $id
     * @return string
     */
    public function show($id) {
        $items = Cart::getAllItems($id, 15);
        
        return $items;
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) { }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) { }

    /**
     * Metodo responsavel por deletar um registro especifico do banco de dados.
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function destroy(Request $request)
    {
        $request -> validate([
            'user_id' => ['required'],
            'product_code' => ['required'],
        ]);

        $post = $request -> post();
        $item = [
            'user_id' => $post['user_id'],
            'product_code' => $post['product_code'],
        ];

        return Cart::deleteItemFromDatabase($item);
    }
}
