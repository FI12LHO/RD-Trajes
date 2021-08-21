/**
 * Constante que guardar token CSRF.
 * @const {string} CSRF
 */
const CSRF = ($('meta[name="__token"]')) ? $('meta[name="__token"]').attr('content') : null;

/**
 * Funcao responsavel por adicionar item ao carrinho.
 * @param {string} code 
 * @param {string} id
 * @returns {null}
 */
function insertIntoShoppingCart(code, id) {
    if (CSRF == '' || CSRF == null || !CSRF) {
        console.log('ERROR: CSRF token is invalid or does not exist.');
        return null;
    }

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost:8000/cart/create');

    // Definindo cabecalho da requisicao.
    xhr.setRequestHeader('X-CSRF-Token', CSRF);
    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

    // Definindo corpo da requisicao.
    var params = {
        'code': code,
        'id': id,
    }

    xhr.send(JSON.stringify(params));

    // Validando resposta da requisicao.
    xhr.onload = function() {
        if (xhr.status != 200) {
            alert(`Error ${xhr.status}: ${xhr.statusText}`); 
        
        } else { 
            // show the result
            alert(`Done, got ${xhr.response.length} bytes`);
            console.log(xhr.response);
        
        }
    };

    return null;
}

/**
 * Funcao responsavel por remover item do carrinho.
 * @param {string} code 
 * @param {string} id
 * @returns {null}
 */
function deleteFromShoppingCart(code, id) {
    if (CSRF == '' || CSRF == null || !CSRF) {
        console.log('ERROR: CSRF token is invalid or does not exist.');
        return null;
    }

    let xhr = new XMLHttpRequest();
    xhr.open('DELETE', 'http://localhost:8000/cart/delete');

    // Definindo cabecalho da requisicao.
    xhr.setRequestHeader('X-CSRF-Token', CSRF);
    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

    // Definindo corpo da requisicao.
    var params = {
        'code': code,
        'id': id,
    }

    xhr.send(JSON.stringify(params));

    // Validando resposta da requisicao.
    xhr.onload = function() {
        if (xhr.status != 200) {
            alert(`Error ${xhr.status}: ${xhr.statusText}`); 
        
        } else { 
            // show the result
            alert(`Done, got ${xhr.response.length} bytes`);
            console.log(xhr.response);
        
        }
    };

    return null;
}