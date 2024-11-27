<?php
    include('BaseDeDatos_Usuario.php');
    //FALTRIA VER COMO HACER QUE LE LLEGUE EL MAIL AL USUSARIO PARA CUNDO CONFIRME SU EXISTENCIA INGRESE A ESTA PAGINA A CMBIAR LA CONTRASEÑA
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevas Contraseñas</title>
    <link rel="stylesheet" href="iniciarSession.css">
    <link rel="icon" href="../Iconos/Logo_shopping_blanco.ico" type="image/x-icon">
    <style>
        button{
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
        // if (isset($_GET['recuperar']) && $_GET['recuperar'] == 'error') {
        //             echo '<a href="Alertas/alerta_de_contraseña_mal.html" id="linkExito" style="display:none;"></a>';
        //             echo '<script>
        //             document.getElementById("linkExito").click();
        //             </script>';
        //         } elseif(isset($_GET['recuperar']) && $_GET['recuperar'] == 'faltante'){
        //             echo '<a href="Alertas/alerta_de_faltante.html" id="linkExito" style="display:none;"></a>';
        //             echo '<script>
        //             document.getElementById("linkExito").click();
        //             </script>';
        //         } elseif(isset($_GET['recuperar']) && $_GET['recuperar'] == 'exito'){
        //             echo '<a href="Alertas/alerta_contraseña_cambiada.html" id="linkExito" style="display:none;"></a>';
        //             echo '<script>
        //             document.getElementById("linkExito").click();
        //             </script>';
        //         }
    ?>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="form" method="post">
        <h2 class="form_titulo">Cambiar Contraseña</h2>
        <a href="Iniciar_sesion.php" class="volver"> 
                <img src="../Imagenes/Flecha_de_salida.png" style="height: 50px; " alt="Flecha volver" title="Flecha Volver"> 
            </a>  
        <div class="form_contenedor">
            <div class="form_grupo">
                <input type="password" class="form_input" placeholder=" " name="contraseña1" id="contraseña" required>
                <label for="password" class="form_label" >Contraseña: </label>
                <span class="form_line"></span>
                <img src="../Imagenes/Ocultar.png" class="logitoOjo" alt="Mostrar contraseña" title="Mostrar contraseña" id="togglePassword1">
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
                    <input type="password" class="form_input" placeholder=" " name="contraseña2" id="confirmarPassword" required>
                    <label for="confirmarPassword" class="form_label">Confirmar Contraseña:</label>
                    <span class="form_line"></span>
                    <img src="../Imagenes/Ocultar.png" class="logitoOjo" alt="Mostrar contraseña" title="Mostrar contraseña" id="togglePassword2">
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
                        </script> 
            </div>
                <button type="submit">
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
        $contra1 = filter_input(INPUT_POST, 'contraseña1', FILTER_SANITIZE_STRING);
        $contra2 = filter_input(INPUT_POST, 'contraseña2', FILTER_SANITIZE_STRING);
    

    if(empty($usuario) || empty($contra1) || empty($contra2)){
        header("Location: ".$_SERVER['PHP_SELF']."?recuperar=faltante");
        exit();
    }

    if($contra1 != $contra2){
        header("Location: ".$_SERVER['PHP_SELF']."?recuperar=error");
        exit();
    }

    $sql = "SELECT * FROM registracion WHERE usuario = '$usuario'"; 
    $resultado = mysqli_query($conn, $sql);
    $hash = password_hash($contra1, PASSWORD_DEFAULT);
    $sql="UPDATE registracion SET contraseña = '$hash' WHERE usuario = '$usuario'";
    mysqli_query($conn, $sql);
    header("Location: ".$_SERVER['PHP_SELF']."?recuperar=exito");
    exit();
    }

mysqli_close($conn);
?>