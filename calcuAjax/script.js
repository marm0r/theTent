let memoria = '';
let operando = '';
let operador = '';

function actualizarDisplay(valor) {
    document.getElementById('display').innerText = valor;
}

function agregarNumero(numero) {
    operando += numero;
    actualizarDisplay(operando);
}

function agregarOperador(op) {
    operador = op;
    memoria = operando;
    operando = '';
    actualizarDisplay('');
}

function agregarPunto() {
    if (!operando.includes('.')) {
        operando += '.';
    }
    actualizarDisplay(operando);
}

function calcular() {
    if (memoria !== '' && operando !== '' && operador !== '') {
        fetch('calcular.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                operando1: parseFloat(memoria),
                operando2: parseFloat(operando),
                operador: operador
            })
        })
        .then(response => response.json())
        .then(data => {
            operando = data.resultado;
            actualizarDisplay(operando);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}

function limpiar() {
    memoria = '';
    operando = '';
    operador = '';
    actualizarDisplay('');
}
