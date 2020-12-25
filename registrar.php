<?php
    include('funciones/con_db.php');

    if(isset($_GET['enviar']))
    {
        $contextura = trim($_GET["contextura"]);
        $estatura = trim($_GET["estatura"]);
        $tez = trim($_GET["tez"]);
        $ojos = trim($_GET["ojos"]);
        $cabello = trim($_GET["cabello"]);

        $sql_datos = "INSERT INTO datos (contextura, estatura, tez, cabello, ojos) VALUES ('$contextura', '$estatura', '$tez', '$cabello', '$ojos')";
        $res_datos = mysqli_query($conex, $sql_datos);
        $a = mysqli_query($conex, "SELECT MAX(id) as 'max_id' FROM datos");
        $id_datos = $a->fetch_array();
        $max_datos = $id_datos['max_id'];
        
        $region = trim($_GET["region"]);
        $zona = trim($_GET["zona"]);
        $fecha = trim($_GET["fecha"]);

        $sql_lugarfecha = "INSERT INTO lugarfecha (region, zona, fecha) VALUES ('$region', '$zona', '$fecha')";
        $res_lugarfecha = mysqli_query($conex, $sql_lugarfecha);
        $b = mysqli_query($conex, "SELECT MAX(id) as 'max_id' FROM lugarfecha");
        $id_lugarfecha = $b->fetch_array();
        $max_lugarfecha = $id_lugarfecha['max_id'];

        $telefono = trim($_GET["telefono"]);
        $facebook = trim($_GET["facebook"]);
        $correo = trim($_GET["correo"]);

        $sql_contacto = "INSERT INTO contacto (telefono, facebook, correo) VALUES ('$telefono' ,'$facebook' ,'$correo')";
        $res_contacto = mysqli_query($conex, $sql_contacto);
        $c = mysqli_query($conex, "SELECT MAX(id) as 'max_id' FROM contacto");
        $id_contacto = $c->fetch_array();
        $max_contacto = $id_contacto['max_id'];
        

        $id = trim($_GET["id"]);
        $edad = trim($_GET["edad"]);
        $descripcion = trim($_GET["descripcion"]);
        

        if($res_datos && $res_lugarfecha && $res_contacto)
        {
            $sql_persona = "UPDATE persona SET edad='$edad',id_datos='$max_datos',descripcion='$descripcion',id_lugar_fecha='$max_lugarfecha',id_contacto='$max_contacto' WHERE id='$id'";
            $res_persona = mysqli_query($conex, $sql_persona);
            $consulta = mysqli_query($conex, "SELECT * FROM persona WHERE id='$id'");
            $ressultado = $consulta->fetch_array();
            $nombre = $ressultado['nombre'];
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('reutilizable/head.html') ?>
</head>
<body class="footer-fijo">
    <?php include('reutilizable/header.html') ?>

    <main class="contenedor">
        <img src="IMG/personasChileLogo.jpg" alt="Imagen de PersonasChile">
        <a href="funciones/generadorPDF.php?id=<?php echo $id ?>&nombre=<?php echo $nombre ?>&edad=<?php echo $edad ?>&contextura=<?php echo $contextura ?>&estatura=<?php echo $estatura ?>&tez=<?php echo $tez?>&ojos=<?php echo $ojos ?>&cabello=<?php echo $cabello ?>&descripcion=<?php echo $descripcion?>&region=<?php echo $region ?>&zona=<?php echo $zona ?>&fecha=<?php echo $fecha ?>&facebook=<?php echo $facebook ?>&email=<?php echo $correo?>&telefono=<?php echo $telefono?>" target="_blank" class="btn btn-negro">Generar Anuncio</a>
    </main>

    <?php include('reutilizable/footer.html') ?>
</body>
</html>
