<?php
    include('../BasesDeDatos/UnicaBaseDeDatos.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="iniciarSession.css">
    <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
    <title>Recuperar Contraseña</title>
    <style>
        button{
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
        if (isset($_GET['recuperar']) && $_GET['recuperar'] == 'error') {
                    echo '<a href="Alertas/alerta_de_contraseña_mal.html" id="linkExito" style="display:none;"></a>';
                    echo '<script>
                    document.getElementById("linkExito").click();
                    </script>';
                } elseif($_GET['recuperar'] == 'faltante'){
                    echo '<a href="Alertas/alerta_de_faltante.html" id="linkExito" style="display:none;"></a>';
                    echo '<script>
                    document.getElementById("linkExito").click();
                    </script>';
                } elseif($_GET['recuperar'] == 'exito'){
                    echo '<a href="Alertas/alerta_cambio_de_contraseña_enviada.html" id="linkExito" style="display:none;"></a>';
                    echo '<script>
                    document.getElementById("linkExito").click();
                    </script>';
                }
    ?>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="form" method="post">
        <h2 class="form_titulo">Cambiar Contraseña</h2>
        <a href="Iniciar_sesion.php" class="volver"> 
                <img src="../Imagenes/Flecha_de_salida.png" style="height: 50px; " alt="Flecha volver" title="Flecha Volver"> 
            </a>  
        <div class="form_contenedor">
                <div class="form_grupo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="logito1" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                    </svg>
                    <input type="email" placeholder=" " name="usuario" id="email" class="form_input" >
                    <label for="email" class="form_label">Email:</label>
                    <span class="form_line"></span>
                </div>
            <!-- <div class="form_grupo">
                <input type="password" class="form_input" placeholder=" " name="contraseña1" id="contraseña" required>
                <label for="contraseña" class="form_label" >Contraseña: </label>
                <span class="form_line"></span>
                <img src="../Imagenes/Ocultar.png" class="logitoOjo" alt="Mostrar contraseña" title="Ver contraseña" id="togglePassword1">
                <script>
                            document.getElementById('togglePassword1').addEventListener('click', function () {
                                const passwordField = document.getElementById('contraseña');
                                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                                passwordField.setAttribute('type', type);
                                if (type === 'text') {
                                    this.src = '../Imagenes/Mostrar.png'
                                } else {
                                    this.src = '../Imagenes/Ocultar.png'
                                }
                            });
                        </script> 
            </div>
            <div class="form_grupo">
                    <input type="password" class="form_input" placeholder=" " name="contraseña2" id="confirmarcontraseña" required>
                    <label for="confirmarcontraseña" class="form_label">Confirmar Contraseña:</label>
                    <span class="form_line"></span>
                    <img src="../Imagenes/Ocultar.png" class="logitoOjo" alt="Mostrar contraseña" title="Ver contraseña" id="togglePassword2">
                        <script>
                            document.getElementById('togglePassword2').addEventListener('click', function () {
                                const passwordField = document.getElementById('confirmarPassword');
                                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                                passwordField.setAttribute('type', type);
                                if (type === 'text') {
                                    this.src = '../Imagenes/Mostrar.png'
                                } else {
                                    this.src = '../Imagenes/Ocultar.png'
                                }
                            });
                        </script>  -->
            </div>
                <button type="submit" style="margin-top: 2em;">
                    Confirmar
                </button>
        </div>
    </form>
    <!-- JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_EMAIL);
        if(empty($usuario)){
            header("Location: ".$_SERVER['PHP_SELF']."?recuperar=faltante");
            exit();
        }
        $sql = "SELECT * FROM registracion WHERE usuario = '$usuario'";
        $resultado = mysqli_query($conn, $sql);
        if(mysqli_num_rows($resultado) == 1){
            $usuarioEmail = $usuario; // Email del usuario
            $hashedEmail = base64_encode($usuarioEmail);
        
            $link = "https://zorzal.online/Sitio_Web/Logeo/reestablecer.php?email=" . urlencode($hashedEmail);
            $asunto = "Recuperar Contraseña - Zorzal Online";
            $mensaje = "
            <html>
            <head><title>Recuperar tu contraseña</title></head>
            <body>
                <p>Haz clic en el siguiente enlace para cambiar tu contraseña:</p>
                <a href='$link'>Cambiar mi contraseña</a>
            </body>
            </html>";
        
            $cabeceras  = "MIME-Version: 1.0" . "\r\n";
            $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $cabeceras .= "From: admin@zorzal.online";
        
            if (mail($usuarioEmail, $asunto, $mensaje, $cabeceras)) {
                 echo "
                    <script>
                        alert('Se le ha enviado un email para cambiar la contraseña.');
                        window.location.href = 'https://mail.google.com/mail/u/0/#inbox/FMfcgzQXKWhVxhfQPVrkrhqjkTtNcfdB';
                    </script>"; 
            } else {
                    echo "
                        <script>
                            alert('Hubo un error al cambiar la contraseña.');
                        </script>";
                    }
        }
    } 
    //     $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_EMAIL);
    //     // $contra1 = filter_input(INPUT_POST, 'contraseña1', FILTER_SANITIZE_STRING);
    //     // $contra2 = filter_input(INPUT_POST, 'contraseña2', FILTER_SANITIZE_STRING);
    

    // // if(empty($usuario) || empty($contra1) || empty($contra2)){
    //     header("Location: ".$_SERVER['PHP_SELF']."?recuperar=faltante");
    //     exit();
    // }

    // // if($contra1 != $contra2){
    // //     header("Location: ".$_SERVER['PHP_SELF']."?recuperar=error");
    // //     exit();
    // // }

    // $sql = "SELECT * FROM registracion WHERE usuario = '$usuario'"; 
    // $resultado = mysqli_query($conn, $sql);
    // $hash = password_hash($contra1, PASSWORD_DEFAULT);
    // $sql="UPDATE registracion SET contraseña = '$hash' WHERE usuario = '$usuario'";
    // mysqli_query($conn, $sql);
    // header("Location: ".$_SERVER['PHP_SELF']."?recuperar=exito");
    // exit();
    // }

mysqli_close($conn);
?>