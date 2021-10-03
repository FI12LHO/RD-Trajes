# RD Trajes

## Modelo de e-commerce

### Getting started

Para executar o projeto, será necessário ter instalado:

- Composer: 1.10.13
- Laravel: 7x
- PHP: 7x
- MySQL

### Desenvolvimento

Para iniciar o projeto é necessario somente clonar o repositorio no diretorio escolhido.  
`$ cd "diretorio escolhido"`  
`$ git clone https://github.com/FI12LHO/RD-Trajes.git`

### Construção  

- Crie o arquivo .env na raiz do projeto com base no exemplo (.env.example) e utilize o comando `$ php artisan key:generate`.
- Dentro da raiz do projeto utilize o comando `$ composer install`, para baixar todas as dependências necessarias no projeto Laravel.
- É necessario gerar o banco de dados SQL e executar as *migrations* através do comando `$ php artisan migrate`.
- Popule o banco de dados executando as *seeds* através do comando `$ php artisan db:seed`.

### Features

Este projeto é construído usando o framework __Laravel: 7x__, onde a principal função é apresentar um modelo simples de e-commerce com algumas funções basicas.  
Ele demonstra de forma simples: a validação e manipulação do banco de dados através do framework; uso do jquery e js nativo para requisições e manipulações da DOM; uso do padrão MVC (Model View Controller).
