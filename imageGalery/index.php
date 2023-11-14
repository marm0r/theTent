<!DOCTYPE html>
<html>
<head>
    <title>Insertar imágenes</title>
    <style>
        .title{
            font-size: 50px;
            font-family: cursive;
        }
        .boton{
            font-size: 25px;
            font-family: cursive;
        }
    </style>
</head>
<body style="text-align: center">
    <h2 class="title">Sube tus imagenes</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file[]" multiple accept="image/*" class="boton">
        </br></br>
        <input type="submit" value="Ver imágenes en la galería"class="boton">
    </form>
</body>
</html>
