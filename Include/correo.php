<?php //Probar funcionamiento una vez que se empiece a utilizar un hoosting
    if(isset($_POST['enviar'])){
        if(!empty($_POST['mail']) && !empty($_POST['descripcion'])){
            $mail = $_POST['mail'];
            $descripcion = $_POST['descripcion'];
            $asunto = "Problema/Asunto del usuario";
            $header = "From: nicomazzaglia2005@gmail.com" ."\r\n";
            $header.= "Reply-To: nicomazzaglia2005@gmail.com" ."\r\n";
            $header.= "X-Mailer: PHP/".phpversion();
            $mail = @mail($mail, $asunto, $descripcion, $header);
            // if($mail){
            //     echo "<h4>¡Mail enviado correctamente!</h4>";
            // }
        }
    }
?>