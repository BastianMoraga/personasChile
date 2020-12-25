<?php

    $plantilla = '<body>
    <div class="contenedor">
        <header class="site-header">
            <h1>EXTRAVIADOS <span>@PERSONASCHILE</span></h1>
        </header>
    </div>

    <div class="contenedor contenido-principal">
        <main class="mainbar">
            <div class="nombre">
                <p>'. $nombre .'</p>
            </div>

            <article class="entrada">
                <div class="imagen">
                    <img src="image/foto_'. $id .'.jpg" alt="Imagen desaparecid@">
                </div>
                <div class="datos">';

                if(!empty($edad))
                {
                    $plantilla .= '<p>Edad: ' . $edad .'</p>';
                }
                if(!empty($estatura))
                {
                    $plantilla .= '<p>Estatura: '. $estatura .'cm</p>';                    
                }
                if($contextura != "select")
                {
                    $plantilla .= '<p>Contextura: '. $contextura .'</p>';
                }
                if($tez != "select")
                {
                    $plantilla .= '<p>Tez: '. $tez .'</p>';

                }
                if($ojos != "select")
                {
                    $plantilla .= '<p>Ojos: '. $ojos .'</p>';
                }
                if($cabello != "select")
                {
                    $plantilla .= '<p>Cabello: '. $cabello .'</p>';
                }

            $plantilla .= '</div>

            </article>
            <div class="descripcion">
                <p>'. $descripcion .'</p>
            </div>

            <div class="lugar-fecha">
                <p>'. $mesDesc .'</p>';

                if($region != "select")
                {
                    $plantilla .= '<p>'. $region .' - '. $zona .'</p>';
                }
                else
                {
                    $plantilla .= '<p>'. $zona .'</p>';
                }
            $plantilla .= '</div>';

            if(!empty($email) or !empty($telefono))
            {
                $plantilla .= '<div class="contacto-main">
                                <h2>Contacto</h2>';
                if(!empty($email) and empty($telefono))
                {
                    $plantilla .= '<p>Correo: '. $email .'</p>';
                }
                else
                {
                    if(!empty($telefono) and empty($email))
                    {
                        $plantilla .= '<p>Teléfono: ' . $telefono .'</p>';
                    }
                    else{
                        $plantilla .= '<p>Correo: '. $email .'</p>
                                    <p>Telefono: +56'. $telefono .'</p>';
                    }
                }

                $plantilla .= '</div>';
            }
            

        $plantilla .= '</main>
            <aside class="asidebar">
                <ul>';

                    $actual = date("Y");

                    if($onlyYear == $actual)
                    {
                        $plantilla .= '<li>
                                            <p class="fecha">'. $onlyYear .'</p>
                                        </li>';
                    }
                    else
                    {
                        $plantilla .= '<li>
                                            <p class="fecha">'. $actual .'</p>
                                            <p class="antigua">'. $onlyYear .'</p>
                                        </li>';
                    }
                    

                    $plantilla .= '<li>
                        <p class="lugar">#'. $zona .'</p>
                    </li>

                    <li>
                        <p class="difucion">MÁXIMA DIFUSIÓN</p>
                    </li>

                    <li>
                        <p class="contacto">CONTACTO</p>
                        <img src="img/rss.jpg" alt="Redes Sociales">
                        <p>'. $facebook .'</p>
                    </li>

                    <li>
                        <img src="img/pdi.jpg" alt="PDI">
                    </li>

                    <li>
                        <img src="img/carabineros.jpg" alt="Carabineros">
                    </li>
                </ul>
            </aside>

        </div>

        <div class="contenedor">
            <footer>
                <div class="site-footer">
                    <div class="footer-left">
                        <p>#HastaEncontrarte</p>
                        <p>#LeyExtraviados</p>
                    </div>
                </div>
            </footer>
            </div>
            </body>';

