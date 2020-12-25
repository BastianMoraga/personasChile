<?php
    include('con_db.php');

    if(isset($_POST["enviar"]))
    {
        $nombre = $_POST["nombre"];

        $sql = "INSERT INTO persona (nombre) VALUES ('$nombre')";
        mysqli_query($conex, $sql);

        $ss = mysqli_query($conex, "SELECT MAX(id) as id_max FROM persona");
        if($rr=mysqli_fetch_array($ss))
        {
            $id_max = $rr['id_max'];
        }
        echo 'Se ha registrado con exito la informacion';

        $nameimg = $_FILES["imagen"]["name"];
        $tmpimg = $_FILES["imagen"]["tmp_name"];
        $url = "image/foto_". $id_max .".jpg";

        if(is_uploaded_file($tmpimg))
        {
            copy($tmpimg, $url);
            header('location: ../crearanuncio.php?id='.$id_max);
        }
        else
        {
            echo 'Error al cargar la imagen';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PersonasChile</title>
</head>
<body>
    <form action="subirimagen.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <br>
        <input type="text" name="nombre" id="nombre">
        <br><br>
        <label for="imagen">Imagen:</label>
        <br>
        <input type="file" name="imagen" id="imagen">
        <br><br>
        <input type="submit" name="enviar" id="enviar" value="Enviar">
    </form>
</body>
</html>