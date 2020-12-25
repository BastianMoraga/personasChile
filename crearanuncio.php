<?php
    include('funciones/con_db.php');

    if(isset($_POST['enviar']))
    {
        $id_dos = trim($_POST["id_dos"]);
        $edad = trim($_POST["edad"]);
        $contextura = trim($_POST["contextura"]);
        $estatura = trim($_POST["estatura"]);
        $tez = trim($_POST["tez"]);
        $ojos = trim($_POST["ojos"]);
        $cabello = trim($_POST["color-cabello"]);
        $descripcion = trim($_POST["descripcion"]);
        $region = trim($_POST["region"]);
        $zona = trim($_POST["zona"]);
        $fecha = trim($_POST["fecha"]);
        $telefono = trim($_POST["telefono"]);
        $facebook = trim($_POST["facebook"]);
        $correo = trim($_POST["email"]);
                  
        header('location: registrar.php?id='. $id_dos .'&edad='. $edad .'&contextura=' . $contextura . '&estatura='. $estatura .'&tez='. $tez .'&ojos='. $ojos .'&cabello='. $cabello .'&descripcion='. $descripcion .'&region='. $region .'&zona='. $zona .'&fecha='. $fecha .'&telefono='. $telefono .'&facebook='. $facebook .'&correo='. $correo .'&enviar=0');
        
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('reutilizable/head.html') ?>
</head>
<body>

<?php include('reutilizable/header.html') ?>

    <main class="contenedor">

        <h2 class="fw-300 centrar-texto">Llena el Formulario de la Persona Desaparecida</h2>
        <div class="grid centrar-columnas">
            <div class="columna-12">
                <img src="IMG/personas.jpg" alt="Imagen Formulario">
            </div>
        </div>
        <div class="columna-10 formulario-contacto">

            <p>Subir una Imagen <a href="funciones/subirImagen.php">Aqui</a></p>
            <form action="crearanuncio.php" method="POST">
                <legend>Datos Persona Personales</legend>
                <?php
                    if(isset($_GET["id"]))
                    {
                        $id = $_GET["id"];
                        $res = mysqli_query($conex, "SELECT nombre AS 'name' FROM persona WHERE id='$id'");
                        $nombre = $res->fetch_array();
                        $name = $nombre["name"];
                        
                        echo '<div class="campo">
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" value="'. $name .'" disabled>
                            </div>';

                        ?>
                            <input type="hidden" name="id_dos" value="<?php echo $id ?>">
                        <?php
                    }
                    else
                    {
                        echo '<div class="campo">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" required placeholder="Ingrese Nombre completo">
                        </div>';
                    }
                ?>

                <div class="campo">
                    <label for="edad">Edad:</label>
                    <input type="number" min="1" max="100" id="edad" name="edad" placeholder="Ingrese Edad">
                </div>

                <div class="campo">
                    <label for="contextura">Contextura:</label>

                    <select name="contextura" id="contextura">
                        <option value="select" disable selected>-- Seleccione --</option>
                        <option value="Delgada">Delgada</option>
                        <option value="Media">Media</option>
                        <option value="Gruesa">Gruesa</option>
                    </select>
                </div>

                <div class="campo">
                    <label for="estatura">Estatura:</label>
                    <input type="text" id="estatura" name="estatura" placeholder="Ingrese Estatura" pattern="[0-9]{3}" title="Debe Ingresar la Estatura en centimetros">
                </div>

                <div class="campo">
                    <label for="tez">Tez:</label>

                    <select name="tez" id="tez">
                        <option value="select" selected>-- Seleccione --</option>
                        <option value="Muy Clara">Muy Clara</option>
                        <option value="Clara">Clara</option>
                        <option value="Morena Clara">Morena Clara</option>
                        <option value="Morena Oscura">Morena Oscura</option>
                        <option value="Oscura">Oscura</option>
                        <option value="Muy Oscura">Muy Oscura</option>
                    </select>
                </div>

                <div class="campo">
                    <label for="ojos">Ojos</label>

                    <select name="ojos" id="ojos">
                        <option value="select" selected>-- Seleccione --</option>
                        <option value="Castaños">Castaños</option>
                        <option value="Cafes">Cafés</option>
                        <option value="Verdes">Verdes</option>
                        <option value="Azules">Azules</option>
                        <option value="Grises">Grises</option>
                        <option value="Varios Colores">Varios Colores</option>
                        <option value="Negros">Negros</option>
                    </select>
                </div>

                <div class="campo">
                    <label for="color-cabello">cabello:</label>

                    <select name="color-cabello" id="color-cabello">
                        <option value="select" selected>-- Seleccione --</option>
                        <option value="Negro">Negro</option>
                        <option value="Moreno">Moreno</option>
                        <option value="Castaño">Castaño</option>
                        <option value="Rubio">Rubio</option>
                        <option value="Pelirojo">Pelirojo</option>
                        <option value="Canoso">Canoso</option>
                    </select>
                </div>

                <div class="campo mensaje">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" maxlength="300" required placeholder="Ingrese una breve descripcion de la persona como por ejemplo con que ropa va vestido, marcas en el cuerpo, tatuajes, enfermedades"></textarea>
                </div>

                <legend>Lugar y Fecha</legend>

                <div class="campo">

                    <label for="region">Region:</label>

                    <select name="region" id="region">
                        <option value="select" selected>-- Seleccione --</option>
                        <option value="Region de Arica">Region de Arica</option>
                        <option value="Region de Tarapacá">Region de  Tarapacá</option>
                        <option value="Region de Antofagasta">Region de Antofagasta</option>
                        <option value="Region de Atacama">Region de Atacama</option>
                        <option value="Region de Coquimbo">Region de Coquimbo</option>
                        <option value="Region de Valparaiso">Region de Valparaiso</option>
                        <option value="Region Metropolitana">Region Metropolitana</option>
                        <option value="Region de Ñuble">Region de Ñuble</option>
                        <option value="Region Bernardo O'Higgins">Region de Bernardo O'Higgins</option>
                        <option value="Region del Maule">Region del Maule</option>
                        <option value="Region de Bio Bío">Region de Bio Bío</option>
                        <option value="Region de La Araucanía">Region de La Araucanía</option>
                        <option value="Region de Los Ríos">Region de Los Ríos</option>
                        <option value="Region de Los Lagos">Region de Los Lagos</option>
                        <option value="Region de Aisén">Region de Aisén</option>
                        <option value="Region de Magallanes">Region de Magallanes</option>
                    </select>

                </div>

                <div class="campo">
                    <label for="zona">Zona:</label>
                    <input type="text " name="zona" id="zona" required placeholder="Ingrese la zona donde desparecio ejeplo: Valdivia">
                </div>

                <div class="campo">
                    <label for="fecha">Fecha:</label>
                    <input type="date" name="fecha" id="fecha" max="<?php echo date("Y-m-d") ?>" required>
                </div>

                <p class="mensaje"></p>

                <legend>Datos de Contacto</legend>

                <div class="campo">
                    <label for="telefono ">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" placeholder="Ingrese Numero de Celular o Teléfono">
                </div>

                <div class="campo">
                    <label for="facebook">Facebook</label>
                    <input type="text" name="facebook" id="facebook"  placeholder="Ingrese su nombre de Facebook">
                </div>

                <div class="campo">
                    <label for="email">Correo:</label>
                    <input type="email" id="email" name="email" placeholder="Ingrese Correo Electronico">
                </div>
                <?php
                    if(isset($_GET["id"]))
                    {
                ?>
                <div class="campo enviar">
                    <input type="submit" name="enviar" id="enviar" value="Enviar" class="btn btn-negro">
                </div>
                <?php
                    }
                ?>
            </form>
        </div>
    </main>
    <?php include('reutilizable/footer.html') ?>
</body>

</html>