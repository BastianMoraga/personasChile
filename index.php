<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('reutilizable/head.html') ?>
</head>

<body>
    <?php include('reutilizable/header.html') ?>

    <div class="contenedor">
        <div class="buscador">
            <form action="index.php" method="POST">
                <input type="text" name="buscador" require placeholder="Nombre de la persona">
                <input type="submit" name="buscar" value="buscar">
            </form>
        </div>
        <div class="contenedor-articulos">
            <?php
                if(isset($_POST['buscar']))
                {
                    include('funciones/buscar.php');
                }
                else
                {
                    include('funciones/mostrar.php');
                }
            ?>
        </div>
    </div>

    <?php include('reutilizable/footer.html') ?>
</body>


</html>