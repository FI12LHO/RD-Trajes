/**
 * Função responsavel por "gerar" popup.
 * Atraves do id da imagem, busca a correspondencia dentro da pasta assets e altera o valor 
 * do atributo src da tag <img> e a do atributo href da tag <a>.
 * @param {string} image_id
 * @returns {null}
 */
function openPopup(image_id) {
    const URL = 'http://127.0.0.1:8000/';
    var url_image = URL + 'assets/images/' + image_id + '.jpeg';

    $('#popup-container').hide().fadeIn(1000);
    $('#popup-image-container').css('background-image', `url(${url_image})`);
    $('#popup-link-add').attr('href', URL + 'products/show/' + image_id);

    return null;
}

/**
 * Função responsavel por ocultar o popup
 * @returns {null}
 */
function closePopup() {
    $("#popup-container").fadeOut(1000);
    return null;
}

/**
 * Funcao responsavel por ocultar o popup apos o carregamento da pagina
 * @returns {void} 
 */
$(document).ready(function () {
    $("#popup-container").hide();
    console.log("Hello");
});