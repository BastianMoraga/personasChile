<?php
    include('con_db.php');

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql = "SELECT nombre, edad, d.contextura, d.estatura, d.tez, d.cabello, d.ojos, descripcion, lf.region, lf.zona, lf.fecha, c.telefono, c.facebook, c.correo FROM persona AS p INNER JOIN datos as d ON p.id_datos = d.id INNER JOIN lugarfecha AS lf ON p.id_lugar_fecha = lf.id INNER JOIN contacto AS c ON p.id_contacto = c.id WHERE p.id = $id";
        $res = mysqli_query($conex, $sql);

        if($res)
        {
            $row = $res->fetch_array();

            $nombre = $row["nombre"];
            $edad = $row["edad"];
            $contextura = $row["contextura"];
            $estatura = $row["estatura"];
            $tez = $row["tez"];
            $ojos = $row["ojos"];
            $cabello = $row["cabello"];
            $descripcion = $row["descripcion"];
            $region = $row["region"];
            $zona = $row["zona"];
            $fecha = $row["fecha"];
            $facebook = $row["facebook"];
            $email = $row["correo"];
            $telefono = $row["telefono"];
            /*echo "$id , $nombre, $edad, $contextura, $estatura, $tez, $ojos, $cabello, $descripcion, $region, $zona, $fecha, $facebook, $email, $telefono";
            header("Content-Type: text/html;charset=utf-8");*/

            header('location: generadorPDF.php?id='. $id .'&nombre='. $nombre .'&edad='. $edad .'&contextura=' . $contextura . '&estatura='. $estatura .'&tez='. $tez .'&ojos='. $ojos .'&cabello='. $cabello .'&descripcion='. $descripcion .'&region='. $region .'&zona='. $zona .'&fecha='. $fecha .'&telefono='. $telefono .'&facebook='. $facebook .'&email='. $email);
        }


    }
?>