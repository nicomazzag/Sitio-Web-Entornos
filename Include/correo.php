<?php //Probar funcionamiento una vez que se empiece a utilizar un hoosting
    if(isset($_POST['enviar'])){
        if(!empty($_POST['mail']) && !empty($_POST['descripcion'])){
            $mail = $_POST['mail'];
            $descripcion = $_POST['descripcion'];
            $asunto = "Problema/Asunto del usuario";
            $descripcion= '
            <!DOCTYPE html>
            <head>
                <title>Envio de mail</title>
            </head>
            <body><p>' + $descripcion = $_POST['descripcion']; + '</p></body></html>';
            $header = "MIME-Version: 1.0" ."\r\n";
            $header .= "Content-type: text/html; charset=utf-8" ."\r\n"; 
            //charset=utf-8 soporta una amplia gama de caracteres de diferentes idiomas y símbolos (más compatible que iso-8859-1 que solo oporta caracteres occidentales)
            $header .= "From: nicomazzaglia2005@gmail.com" ."\r\n";
            $header.= "Reply-To: nicomazzaglia2005@gmail.com" ."\r\n"; //dirección de respuesta distinta que la del remitente
            // $header.= "X-Mailer: PHP/".phpversion(); Esta linea especifica que el correo fue enviado usando PHP y la versión de PHP
            $mail = @mail($mail, $asunto, $descripcion, $header);

            // if($mail){
            //     echo "<h4>¡Mail enviado correctamente!</h4>";
            // }
        }
    }
?>