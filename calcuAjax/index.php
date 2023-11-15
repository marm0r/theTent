<!DOCTYPE html>
<html>
<head>
    <title>Calculadora Básica</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .calculator {
            width: 260px;
            border: 1px solid #ccc;
            border-color: black;
            padding: 10px;
            margin: 0 auto;
            background-color: black;
            border-radius: 5px;
            font-family: Calibri;
            font-weight: bold;
        }

        input[type="text"] {
            width: calc(100% - 20px);
            background-color: black;
            color: white;
            height: 60px;
            font-size: 40px;
            text-align: right;
            margin-bottom: 10px;
            border: 0px;
            border-color: #000000;
            border-radius: 3px;
            margin-right: 10px;
            float: left;
            font-family: Calibri;
            font-weight: bold;
        }

        input[type="button"] {
            width: 50px;
            height: 50px;
            font-size: 18px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 0px;
            border-color: #000000;
            background-color: #333333; 
            color: white;
            cursor: pointer;
            border-radius: 50%;
            font-family: Calibri;
            font-weight: bold;
            font-size: 22px;
        }

        input[type="button"]:hover {
            background-color: #ccc;

        }

        .row:after {
            content: "";
            clear: both;
            display: table;
        }

        
        input[value="C"] {
            background-color: #FF9F0A; 
            color: #000000; 
            font-family: Calibri;
            font-weight: bold;
            font-size: 22px;
        }

        input[value="ans"] {
            background-color: #FF9F0A; 
            color: #000000; 
            font-family: Calibri;
            font-weight: bold;
            font-size: 22px;
        }

        input[value="="] {
            background-color: #FF9F0A; 
            color: #000000; 
            font-family: Calibri;
            font-weight: bold;
            font-size: 22px;
        }
    </style>
</head>
<body>

<div class="calculator">
    <input type="text" name="display" readonly>
    <div class="row">
        <input type="button" value="7" onclick="addToDisplay('7')">
        <input type="button" value="8" onclick="addToDisplay('8')">
        <input type="button" value="9" onclick="addToDisplay('9')">
        <input type="button" value="/" onclick="addToDisplay('/')">
    </div>
    <div class="row">
        <input type="button" value="4" onclick="addToDisplay('4')">
        <input type="button" value="5" onclick="addToDisplay('5')">
        <input type="button" value="6" onclick="addToDisplay('6')">
        <input type="button" value="*" onclick="addToDisplay('*')">
    </div>
    <div class="row">
        <input type="button" value="1" onclick="addToDisplay('1')">
        <input type="button" value="2" onclick="addToDisplay('2')">
        <input type="button" value="3" onclick="addToDisplay('3')">
        <input type="button" value="-" onclick="addToDisplay('-')">
    </div>
    <div class="row">
        <input type="button" value="0" onclick="addToDisplay('0')">
        <input type="button" value="." onclick="addToDisplay('.')">
        <input type="button" value="C" onclick="limpiarDisplay()">
        <input type="button" value="ans" onclick="usarAns()">
        <input type="button" value="=" onclick="calcular()">
        <input type="button" value="+" onclick="addToDisplay('+')">
    </div>
</div>

<script>
    var ans = 0;
    var clicks = 0;

    function addToDisplay(value) {
        var display = document.querySelector('input[name=display]');
        display.value += value;
    }

    function limpiarDisplay() {
        var display = document.querySelector('input[name=display]');
        display.value = '';
        clicks = 0;
    }

    function usarAns() {
        var display = document.querySelector('input[name=display]');
        display.value += ans;
    }

    function calcular() {
        var expresion = document.querySelector('input[name=display]').value;

        $.ajax({
            type: "POST",
            url: "calculadora.php",
            data: { expresion: expresion },
            success: function(response) {
                ans = parseFloat(response) * (Math.pow(2, clicks)); // Multiplicar por 2 elevado a la cantidad de clicks
                document.querySelector('input[name=display]').value = ans;
                clicks++; // Incrementar el contador de clicks
            }
        });
    }
</script>
</body>
</html>
