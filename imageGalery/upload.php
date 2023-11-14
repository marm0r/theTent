<!DOCTYPE html>
<html>
<head>
    <title>Galería de imágenes</title>
    <style>
        .title{
            font-size: 50px;
            font-family: cursive;
        }
        .text{
            font-size: 25px;
            font-family: cursive;
        }
    </style>
</head>
<body style="text-align: center">
    <h2 class="title">Galería de imagenes</h2>

    <?php
    if ($_FILES['file']) {
        $uploadDir = 'uploads/';

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        foreach ($_FILES['file']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['file']['name'][$key];
            $file_tmp = $_FILES['file']['tmp_name'][$key];

            move_uploaded_file($file_tmp, $uploadDir . $file_name);
        }
    }

    $files = glob($uploadDir . '*');
    foreach ($files as $file) {
        echo '<img src="' . $file . '" width="200" height="150" /><br>';
    }
    ?>

    <a href="index.php" class="text">Subir más imágenes</a>
</body>
</html>
