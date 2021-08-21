<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

/**
 * @author Marlom Marques
 * @version 1.0
 * @since 20/80/2021
 */
class Cart extends Model
{
    use HasFactory;

    /**
     * Tabela associada a classe (Model)
     * @var string
     */
    protected $table = 'carts';

    /**
     * Chave primaria da tabela associada
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Campos da tabela associada
     * @var array
     */
    protected $fillable = [
        'user_id', 'product_code',
    ];

    /**
     * Metodo responsavel por executar uma busca dentro do banco de dados e retornar o resultado.
     * Caso no parametro exista um valor nao numerico, esse sera o valor que ordena a busca.
     * A quantidade de registros obtidos pela busca se limita ao valor recebido pelo parametro paginate, que por padrao e 15.
     * @param string $id - Condiciona a busca para retornar apenas items com user_id igual ao id do usuario.
     * @param array $parameters - [campo que ordena a busca, quantidade de registro para paginacao]
     * @return array - Os registros encontrados.
     */
    static function getAllItems($id, ...$parameters) {
        if (!is_numeric($parameters[0])) {
            $paginate = ($parameters[1] < 15) ? 15 : $parameters[1];
            $data = DB::table('carts')->where('user_id', $id)->orderByDesc($parameters[0])->paginate($paginate);

        } else {
            $paginate = ($parameters[0] < 15) ? 15 : $parameters[0];
            $data = DB::table('carts')->where('user_id', $id)->paginate($paginate);

        }

        return $data;
    }

    /**
     * Metodo responsavel por buscar dentro do banco de dados um registro especifico.
     * O(s) parametro(s) condiciona(m) a busca.
     * @param array $parameters
     * @return array
     */
    static function findItemInDatabase(...$parameters) {
        $query = DB::table('carts');

        foreach($parameters[0] as $parameter => $value) {
            $query -> where($parameter, $value);
        }

        $item = $query -> get('*') -> first();

        if (!$item) {
            return json_encode(['error' => 'Item does not exist or not found.']);
        }

        return $item;
    }

    /**
     * Metodo responsavel por deletar um registro especifico do banco de dados.
     * @param array $parameters
     * @return string $item
     */
    static function deleteItemFromDatabase(...$parameters) {
        $query = DB::table('carts');

        foreach($parameters[0] as $parameter => $value) {
            $query->where($parameter, $value);
        }

        $item = $query->get('*')->first();
        
        if (!$item) {
            return json_encode(['error' => 'Item does not exist or not found.']);
        }

        $id = $item->id;
        DB::table('carts')->delete($id);

        return json_encode(['status' => 'Item removed from cart', 'body' => $item]);
        
    }
}
