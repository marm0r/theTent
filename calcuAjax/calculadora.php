<?php
$expresion = $_POST['expresion'];

if (!empty($expresion)) {
    $resultado = eval("return $expresion;");
    echo $resultado;
} else {
    echo "Error: Expresión vacía.";
}
?>
