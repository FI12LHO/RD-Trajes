<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

/**
 * @author Marlom Marques
 * @version 1.0
 * @since 20/80/2021
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * Tabela associada a classe (Model)
     * @var string
     */
    protected $table = 'users';

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
        'name',
        'email',
        'password',
        'cpf',
        'address',
        'phone',
        'city',
        'state',
        'country',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
                'name' => 'User' . rand(0, 100),
                'email' => strtolower(Str::random(8)) . '@mail.com',
                'password' => '123',
                'cpf' => '000.000.000-00',
                'phone' => '(00) 0000-0000',
                'address' => strtolower(Str::random(8) . ', ' . Str::random(8) . ' - ') . rand(0, 999),
                'city' => 'City ' . rand(0, 100),
                'state' => 'State ' . rand(0, 100),
                'country' => 'Country ' . rand(0, 100),
            ];

            User::create($data);
            return null;
        }

        for ($i = 1; $i <= $parameters[0]; $i++) {
            $data = [
                'name' => 'User' . rand(0, 100),
                'email' => strtolower(Str::random(8)) . '@mail.com',
                'password' => '123',
                'cpf' => '000.000.000-00',
                'phone' => '(00) 0000-0000',
                'address' => strtolower(Str::random(8) . ', ' . Str::random(8) . ' - ') . rand(0, 999),
                'city' => 'City ' . rand(0, 100),
                'state' => 'State ' . rand(0, 100),
                'country' => 'Country ' . rand(0, 100),
            ];

            User::create($data);
        }
    }

    /**
     * Metodo responsavel por fazer "login" do usuario.
     * Efeteua uma busca na tabela e retorna os dados especificos condicionados pelos parametros.
     * @param string $email - Valor que condiciona a busca dentro do banco de dados.
     * @param string $password - Valor que condiciona a busca dentro do banco de dados.
     * @return array $user - Dados do usuario.
     */
    static function singIn($email, $password) {
        $user = DB::table('users')
            ->where('email', $email)
            ->where('password', $password)
            ->get('*')->first();

        if (!isset($user)) {
            return json_encode(['error' => 'Unknown user.', 'body' => [$email, $password]]);
        }

        return $user;
    }
}
