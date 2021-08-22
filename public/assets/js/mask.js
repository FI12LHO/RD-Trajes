var inputs = document.getElementsByTagName('input');

for (const input of inputs) {
    let mask = input.getAttribute('mask');

    if (mask != null) {
        mask = mask.toLowerCase();
    }

    switch(mask) {
        case 'phone':
            input.addEventListener('keypress', (event) => { maskPhone(event); });
            break;

        case 'cpf':
            input.addEventListener('keypress', (event) => { maskCPF(event); });
            break;
        
        case 'decimal(br)':
            input.addEventListener('keypress', (event) => { maskDecimal(event, 'br'); });
            break;

        case 'decimal(en)':
            input.addEventListener('keypress', (event) => { maskDecimal(event, 'en'); });
            break;
    }
}

function maskPhone (event) {
    let key = event.key;
    let lasPos = event.target.value.length;
    let isNumber = true;

    if (isNaN(key) || key == ' ') {
        event.preventDefault();
        isNumber = false;
    }

    if (lasPos > 14) {
        event.preventDefault();
    }

    if (lasPos == 0 && isNumber && key !== ' ') {
        event.target.value += '(';
    }

    if (lasPos == 3 && isNumber && key !== ' ') {
        event.target.value += ') ';
    }

    if (lasPos == 10 && isNumber && key !== ' ') {
        event.target.value += '-';
    }
}

function maskCPF (event) {
    let key = event.key;
    let lasPos = event.target.value.length;
    let isNumber = true;

    if (isNaN(key) || key == ' ') {
        event.preventDefault();
        isNumber = false;
    }

    if (lasPos > 13) {
        event.preventDefault();
    }

    if (lasPos == 3 && isNumber && key !== ' ') {
        event.target.value += '.';
    }

    if (lasPos == 7 && isNumber && key !== ' ') {
        event.target.value += '.';
    }

    if (lasPos == 11 && isNumber && key !== ' ') {
        event.target.value += '-';
    }
}

function maskDecimal (event, format = 'br') {
    event.preventDefault();

    let key = event.key;
    let isNumber = true;
    let currentValue = + key + event.target.value;
    let delimiter = (format.toLowerCase() == 'br') ? ',' : '.';

    if (isNaN(key) || key == ' ') {
        isNumber = false;
    }

    if (isNumber) {
        currentValue = currentValue.replace(',', '');
        currentValue = currentValue.replace('.', '');

        let uniFixed = currentValue.slice(currentValue.length - 2, currentValue.length);
        let hunFixed = currentValue.slice(0, currentValue.length - 2);

        currentValue = hunFixed + delimiter + uniFixed;
        event.target.value = currentValue;
    }
}
