/**
 * @var {array} forms - Array com todas as forms da pagina.
 */
var forms = document.getElementsByTagName('form');

for (var form of forms) {
    form.addEventListener('submit', (e) => validateForm(e));
}

/**
 * Funcao responsavel por validar o(s) campo(s) de um formulario.
 * @param {event} e 
 */
function validateForm(e) {
    e.preventDefault();

    var formChildren = e.target.children;

    for (var child of formChildren) {
        var tag = child.tagName;
        var id = (child.getAttribute('id')) ? child.getAttribute('id') : null;
        var isRequired = child.getAttribute('required');
        var key = (child.getAttribute('key')) ? child.getAttribute('key').toUpperCase() : 'CAMPO';
        var element = (document.getElementById(id)) ? document.getElementById(id) : null;
        var value = (element != null) ? element.value : null;

        if (tag == 'INPUT' || tag == 'TEXTAREA') {
            if (isRequired != null && value == '') {
                alert(`${key} não informado`);
                document.getElementById(id).value = '';

                return ;
            }
        }

        if (tag == 'INPUT' && id == 'input_confirm') {
            let input_password = document.getElementById('input_password');

            if (input_password.value !== value) {
                alert('Senhas não coincidissem');
                document.getElementById(id).value = '';
                document.getElementById('input_password').value = '';

                return ;
            }
        }
    }

    e.target.submit();
}