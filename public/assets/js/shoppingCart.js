/**
 * Constante que guardar token CSRF.
 * @const {string} CSRF
 */
const CSRF = ($('meta[name="__token"]')) ? $('meta[name="__token"]').attr('content') : null;

/**
 * Constante que guardar o id do usuario.
 * @const {string} USER
 */
const USER = ($('meta[name="__user"')) ? $('meta[name="__user"]').attr('content') : null;

/**
 * Funcao responsavel por adicionar item ao carrinho.
 * @param {string} code - Codigo do produto
 * @returns {null}
 */
function insertIntoShoppingCart(code) {
    if (CSRF == '' || CSRF == null || !CSRF) {
        console.log('ERROR: CSRF token is invalid or does not exist.');
        return null;
    }

    if (USER == '' || USER == null || !USER) {
        console.log('ERROR: Unknown user.');
        return null;
    }

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost:8000/cart/create');

    // Definindo cabecalho da requisicao.
    xhr.setRequestHeader('X-CSRF-Token', CSRF);
    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

    // Definindo corpo da requisicao.
    var params = {
        'product_code': code,
        'user_id': USER,
    }

    xhr.send(JSON.stringify(params));

    // Validando resposta da requisicao.
    xhr.onload = function() {
        if (xhr.status != 200) {
            console.log(`Error ${xhr.status}: ${xhr.statusText}`); 
        
        } else {
            console.log(xhr.response);
        
        }
    };

    return null;
}

/**
 * Funcao responsavel por remover item do carrinho.
 * @param {string} code - Codigo do produto.
 * @returns {null}
 */
function deleteFromShoppingCart(code) {
    if (CSRF == '' || CSRF == null || !CSRF) {
        console.log('ERROR: CSRF token is invalid or does not exist.');
        return null;
    }

    if (USER == '' || USER == null || !USER) {
        console.log('ERROR: Unknown user.');
        return null;
    }

    let xhr = new XMLHttpRequest();
    xhr.open('DELETE', 'http://localhost:8000/cart/delete');

    // Definindo cabecalho da requisicao.
    xhr.setRequestHeader('X-CSRF-Token', CSRF);
    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

    // Definindo corpo da requisicao.
    var params = {
        'product_code': code,
        'user_id': USER,
    }

    xhr.send(JSON.stringify(params));

    // Validando resposta da requisicao.
    xhr.onload = function() {
        if (xhr.status != 200) {
            console.log(`Error ${xhr.status}: ${xhr.statusText}`); 
        
        } else {
            console.log(xhr.response);
        
        }
    };

    return null;
}

/**
 * Funcao responsavel por requisitar e retornar todos os items do carrinho.
 * @returns {object}
 */
function getAllItemsFromCart() {
    if (USER == '' || USER == null || !USER) {
        console.log('ERROR: Unknown user.');
        return null;
    }

    let data = [];
    let xhr = new XMLHttpRequest();
    xhr.open('GET', `http://localhost:8000/cart/show/${USER}`);

    // Definindo cabecalho da requisicao.
    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

    xhr.send();

    // Validando resposta da requisicao.
    xhr.onload = function() {
        if (xhr.status != 200) {
            console.log(`Error ${xhr.status}: ${xhr.statusText}`); 
        
        } else {
            let response = JSON.parse(xhr.response).data;
            console.log(response);
            data = response;
            
        }
    };

    return data;
 }