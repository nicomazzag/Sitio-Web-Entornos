<?php
    session_start();

    //Redirecciona a la inicio de sesión si no hay una sesión activa
    if (empty($_SESSION['tipo'])) {
        header("Location: ../Logeo/Iniciar_sesion.php");
        exit();
    }

?>