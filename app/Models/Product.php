<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * @author Marlom Marques
 * @version 1.0
 * @since 20/08/2021
 */
class Product extends Model
{
    /**
     * Tabela associada a classe (Model)
     * @var string
     */
    protected $table = 'products';

    /**
     * Chave primaria da tabela associada
     * @var string
     */
    protected $primaryKey = 'code';

    /**
     * Campos da tabela associada
     * @var array
     */
    protected $fillable = [
        'name', 'amount', 'price', 'description',
    ];

    /**
     * Metodo responsavel por executar uma busca dentro do banco de dados e retornar o resultado.
     * Caso no parametro exista um valor nao numerico, esse sera o valor que ordena a busca.
     * A quantidade de registros obtidos pela busca se limita ao valor recebido pelo parametro paginate, que por padrao e 15.
     * @param array $parameters - [campo que ordena a busca, quantidade de registro para paginacao]
     * @return array - Os registros encontrados
     */
    static function getAllProducts(...$parameters) {
        if (!is_numeric($parameters[0])) {
            $paginate = ($parameters[1] < 15) ? 15 : $parameters[1];
            $data = DB::table('products')->orderByDesc($parameters[0])->paginate($paginate);
        } else {
            $paginate = ($parameters[0] < 15) ? 15 : $parameters[0];
            $data = DB::table('products')->paginate($paginate);
        }

        return $data;
    }

    /**
     * Metodo responsavel por executar uma busca dentro do banco de dados e retornar um registro especifico.
     * Busca o registro com base no parametro id.
     * @param int $id - ID do registro que sera buscado dentro do banco de dados.
     * @return array
     */
    static function getProduct($id) {
        if (!isset($id) || empty($id)) {
            return null;
        }

        $data = DB::table('products')->where('code', '=', $id)->get('*');
        return $data;
    }

    /**
     * Metodo responsavel por popular a tabela (seeds).
     * Gera de acordo com o parametro, registros randonicos e insere no banco de dados.
     * Testa se o(s) parametro(s) recebido(s) e um inteiro.
     * Caso nao seja cria apenas um registro dentro do BD e retorna null.
     * @param array $parameters - Quantidade de registros que devem ser gerados.
     * @return null
     */
    static function factory(...$parameters) {
        if (!is_numeric($parameters[0])) {
            $data = [
                'name' => 'Produto ' . rand(0, 100),
                'amount' => 10,
                'price' => rand(10, 40),
                'description' => Str::random(50),
            ];

            Product::create($data);
            return null;
        }

        for ($i = 1; $i <= $parameters[0]; $i++) {
            $data = [
                'name' => 'Produto ' . $i,
                'amount' => 10,
                'price' => rand(10, 40),
                'description' => Str::random(50),
            ];

            Product::create($data);
        }

        return null;
    }
}
