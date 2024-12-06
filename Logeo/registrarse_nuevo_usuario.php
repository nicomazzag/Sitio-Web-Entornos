<?php 
    include('../BasesDeDatos/UnicaBaseDeDatos.php');
?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Conexión con Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="iniciarSession.css">
    <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
    <title>Registrarse</title>
    <style>
        button{
            cursor: pointer;
        }
        legend {
        font-size: 20px; 
        font-weight: normal; 
        margin-bottom: 10px; 
    }
    </style>
</head>
<body>
<?php
    if (isset($_GET['registro']) && $_GET['registro'] == 'exito') {
                echo '<a href="Alertas/alerta_login_exitoso.html" id="linkExito" style="display:none;"></a>';
                echo '<script>
                document.getElementById("linkExito").click();
                </script>';
            } elseif (isset($_GET['registro']) && $_GET['registro'] == 'faltante') {
                echo '<a href="Alertas/alerta_de_faltante.html" id="linkExito" style="display:none;"></a>';
                echo '<script>
                document.getElementById("linkExito").click();
                </script>';
            } elseif (isset($_GET['registro']) && $_GET['registro'] == 'error') {
                echo '<a href="Alertas/alerta_de_error.html" id="linkExito" style="display:none;"></a>';
                echo '<script>
                document.getElementById("linkExito").click();
                </script>';
            } elseif (isset($_GET['registro']) && $_GET['registro'] == 'pendiente') {
                echo '<a href="Alertas/alerta_dueno.html" id="linkExito" style="display:none;"></a>';
                echo '<script>
                document.getElementById("linkExito").click();
                </script>';
            }
?>


    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="form">
        <h2 class="form_titulo">Registrarse</h2>
            <a href="Iniciar_sesion.php" class="volver"> 
                <img src="../Imagenes/Flecha_de_salida.png" style="height: 50px; " alt="Flecha volver" title="Flecha Volver"> 
            </a>     
        <div class="form_contenedor">
            <div class="form_grupo">
                <input type="email" class="form_input"  name="usuario" id="email" placeholder=" " required>
                <label for="email" class="form_label">Email:</label>
                    <span class="form_line"></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="logito1"   viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                    </svg>  
            </div>    
            <div class="form_grupo">
                <input type="password"  name="contraseña" id="contraseña" class="form_input" placeholder=" ">
                <label for="contraseña" class="form_label">Contraseña:</label>
                <span class="form_line"></span>
                <img src="../Imagenes/Ocultar.png" class="logitoOjo" id="togglePassword" alt="Mostrar contraseña" title="Ver contraseña">
                </svg>  
                    <!-- Efecto de mostrar y ocultar contraseña -->
                <script>
                    document.getElementById('togglePassword').addEventListener('click', function () {
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
                <fieldset>
                    <legend>Seleccione su rol:</legend>
                    <div class="box">
                        <input  class="form-check-input" type="radio" id="Dueño" name="rol" value="dueño" required> 
                        <label class="form-check-label" for="Dueño">Dueño</label>
                    </div>
                    <div class="box">
                        <input class="form-check-input" type="radio" id="Usuario" name="rol" value="usuario" required > 
                        <label class="form-check-label" for="Usuario">Usuario</label>
                    </div>
                </fieldset>
                
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

$registro_exitoso = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Filtrar la entrada del formulario
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_EMAIL); 
    $contra = filter_input(INPUT_POST, 'contraseña', FILTER_SANITIZE_STRING);
    $tipo = isset($_POST['rol']) ? filter_input(INPUT_POST, 'rol', FILTER_SANITIZE_STRING) : null;
    

    // Validar que no estén vacíos los campos
    if(empty($usuario) || empty($contra) || empty($tipo)) {
        header("Location: ".$_SERVER['PHP_SELF']."?registro=faltante");
        exit();
    } 

    $sql = "SELECT * FROM registracion";
    $resultado = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultado) > 0) {
        while($fila = mysqli_fetch_assoc($resultado)) {
            if($fila['usuario'] == $usuario) {
                header("Location: ".$_SERVER['PHP_SELF']."?registro=error");
                exit();
            }
        };
    }
    if (!$registro_exitoso) {
        if ($tipo == 'dueño') {
            $tipoCliente = null;
        } else {
            //Asignando cliente del tipo inicial
            $tipoCliente = 'inicial';
        }
        if($tipo == 'dueño') {
            $estado = 'pendiente';
            $hash = password_hash($contra, PASSWORD_DEFAULT);
            $sql = "INSERT INTO registracion (usuario, contraseña, tipoUsuario, tipoCliente,estadoDueño) VALUES ('$usuario', '$hash', '$tipo', '$tipoCliente','$estado')";
            mysqli_query($conn, $sql);
            header("Location: ".$_SERVER['PHP_SELF']."?registro=pendiente"); 
            exit();  
        } else {
            $hash = password_hash($contra, PASSWORD_DEFAULT);
            $sql = "INSERT INTO registracion (usuario, contraseña, tipoUsuario, tipoCliente) VALUES ('$usuario', '$hash', '$tipo', '$tipoCliente')";
            mysqli_query($conn, $sql);
            header("Location: ".$_SERVER['PHP_SELF']."?registro=exito");
            exit();
        }
    }
}
mysqli_close($conn);
?>