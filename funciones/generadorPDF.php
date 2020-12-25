<?php

    setlocale(LC_TIME, "spanish");
    header("Content-Type: text/html;charset=utf-8");
    
    $id = $_GET["id"];
    $nombre = $_GET["nombre"];
    $edad = $_GET["edad"];
    $contextura = $_GET["contextura"];
    $estatura = $_GET["estatura"];
    $tez = $_GET["tez"];
    $ojos = $_GET["ojos"];
    $cabello = $_GET["cabello"];
    $descripcion = $_GET["descripcion"];
    $region = $_GET["region"];
    $zona = $_GET["zona"];
    /** Transformar fecha en español **/
    $fecha = $_GET["fecha"];
    $fecha = str_replace("/", "-", $fecha);
    $newDate = date("d-m-Y", strtotime($fecha));//cabiar formato de fecha a dia-mes-año
    $mesDesc = strftime("%d de %B de %Y", strtotime($newDate));//escribe la fecha en español %d = numero del mes, %B = mes, %Y = año
    $onlyYear = strftime("%Y", strtotime($newDate));
    $facebook = $_GET["facebook"];
    $email = $_GET["email"];
    $telefono = $_GET["telefono"];

    /*echo $imagen . "," . $nombre . "," . $edad . "," . $contextura . "," . $estatura . "," . $tez . "," . $ojos . "," . $cabello;
    echo $descripcion;
    echo $region . "," . $zona . "," . $fecha . "," . $email . "," . $telefono;*/

    require_once __DIR__ . '/vendor/autoload.php';
    include 'afiche.php';
    $css = file_get_contents('estilo.css');

    //echo $nombre .", ". $edad .", ". $rut .", ". $telefono;

    
    $mpdf = new \Mpdf\Mpdf(["format" => "A4"]);
    
    /*$plantilla = '<body>
    <div>
        <header>
            <h1>EXTRAVIADOS <span>@PERSONASCHILE</span></h1>
        </header>
    </div>        
    <main>
        <p>' . $nombre . '</p>
        <p>' . $edad . '</p>
        <p>' . $rut . '</p>
        <p>' . $telefono . '</p>
        
    </main>
</body>';*/
    //unlink('image/foto_' . $nombre);
    
    $mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->writeHtml($plantilla);
    
    $mpdf->Output("Afiche.pdf", "I");//I es para ver el pdf, D es para descargar directamente el pdf

?>