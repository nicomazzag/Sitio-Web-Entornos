<?php 
    if(isset($_POST['enviar'])){
        if(!empty($_POST['mail']) && !empty($_POST['descripcion'])){
            $fecha=date("d-m-Y");
            $hora= date("H :i:s");
            $mail = $_POST['mail'];
            $correoAdmin = "admin@zorzal.online";
            $descrip = $_POST['descripcion'];
            $asunto = "Asunto del usuario";
            $descripcion= "
            <!DOCTYPE html>
            <head>
                <title>Envio de mail</title>
            </head>
            <body>
            <p><strong>Correo del usuario: </strong> {$mail} </p>
            <p>Enviado: {$fecha} - {$hora}</p>
            <p>Descripción: {$descrip}</p>
            </body>
            </html>";
            $header = "MIME-Version: 1.0" ."\r\n";
            $header .= "Content-type: text/html; charset=utf-8" ."\r\n"; 
            //charset=utf-8 soporta una amplia gama de caracteres de diferentes idiomas y símbolos (más compatible que iso-8859-1 que solo oporta caracteres occidentales)
            $header .= "From: admin@zorzal.online" ."\r\n";
            $header.= "Reply-To: {$mail}" ."\r\n"; // Email del usuario para responder

            if(mail($correoAdmin, $asunto, $descripcion, $header)){
                echo "
                <script>
                Swal.fire({
                    icon: 'success',
                    title: 'ENVIADO',
                    text: 'El mail fue enviado correctamente'
                });
                </script>";
            } else {
                echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'ERROR',
                    text: 'Hubo un error al enviar el mail'
                });
                </script>";
            }
        }
    }
?>