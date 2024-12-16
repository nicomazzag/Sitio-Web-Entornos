<?php
    session_start();

    $valoresClientes = ['usuario', 'dueño', 'administrador'];

    //Redirecciona a la inicio de sesión si no hay una sesión activa
    if (empty($_SESSION['tipo']) || !in_array($_SESSION['tipo'], $valoresClientes)) {
        header("Location: ../Logeo/Iniciar_sesion.php");
        exit();
    } else {
        include('../BasesDeDatos/UnicaBaseDeDatos.php');

        $sql = "SELECT tipoCliente FROM registracion WHERE codigo = {$_SESSION['cod']}";
        $res = $conn->query($sql);
        $arr = $res->fetch_assoc();
        $_SESSION['categoria'] = $arr['tipoCliente'];

        $conn->close();
    }

?>