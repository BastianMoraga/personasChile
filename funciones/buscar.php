<?php
    setlocale(LC_TIME, "spanish");
    include('con_db.php');

 
    $clave = $_POST['buscador'];
    
    $sql = "SELECT persona.id, nombre, region, zona, fecha FROM persona INNER JOIN lugarfecha ON persona.id_lugar_fecha = lugarfecha.id WHERE nombre LIKE '%$clave%'";
    $res = mysqli_query($conex, $sql);

    if($res)
    {
        while($row = $res->fetch_array())
        {
            $id = $row['id'];
            $nombre = $row['nombre'];
            $region = $row['region'];
            $zona = $row['zona'];
            $fecha = $row['fecha'];
            $fecha = str_replace("/", "-", $fecha);
            $fec = date("d-m-Y", strtotime($fecha));
            $formatoNuevo = strftime("%d de %B de %Y", strtotime($fec));
            ?>
            <article class="articulo">
                <h3 class="nombre"><?php echo $nombre ?></h3>
                <div class="principal-articulo">
                    <img src="funciones/image/foto_<?php echo $id ?>.jpg" alt="imagen publicacion">
                </div>

                <div class="contenido-articulo">
                <?php
                    if($region != "select")
                    {
                ?>
                    <p class="lugar"><?php echo $region ?>-<?php echo $zona ?></p>
                <?php 
                    }
                    else
                    {
                 ?>
                    <p class="lugar"><?php echo $zona ?></p>
                    <?php } ?>
                    <p class="fecha"><?php echo $formatoNuevo ?></p>
                </div>
                <a href="funciones/seleccionarDatos.php?id=<?php echo $id ?>" class="btn btn-negro" target="_blank">Descargar PDF</a>
            </article>
            <?php
        }
    }
    


?>