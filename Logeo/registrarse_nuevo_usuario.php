<?php 
    /*include('BaseDeDatos_Usuario.php');*/
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="iniciarSession.css">
    <link rel="icon" href="../Iconos/Logo_shopping_blanco.ico" type="image/x-icon">
    <!-- JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Registrarse</title>
    <style>
        button{
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php
    if (isset($_GET['registro']) && $_GET['registro'] == 'exito') {
                echo '<a href="../Alertas/alerta_login_exitoso.php" id="linkExito" style="display:none;"></a>';
                echo '<script>
                document.getElementById("linkExito").click();
                </script>';
            }
?>
    <form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post" class="form">
        <h2 class="form_titulo">Registrarse</h2>
            <a href="Iniciar_sesion.php" class="volver"> 
                <img src="../Imagenes/Flecha_de_salida.png" style="height: 50px; " alt="Flecha volver" title="Flecha Volver"> 
            </a>     
        <div class="form_contenedor">
            <div class="form_grupo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="logito1" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                    </svg>
                <input type="email" class="form_input"  name="usuario" id="email" placeholder=" " required>
                <label for="email" class="form_label">Email:</label>
                <span class="form_line"></span>
            </div>    
            <div class="form_grupo">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="logito1" viewBox="0 0 16 16" aria-hidden="true">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                </svg>
                <input type="password"  name="contraseña" id="contraseña" class="form_input" placeholder=" ">
                <label for="contraseña" class="form_label">Contraseña:</label>
                <span class="form_line"></span>
            </div>
            <button type="submit">
                    Confirmar
            </button>
        </div>
    </form>
</body>
</html>

<?php
$registro_exitoso = false;

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí iría la lógica de procesamiento del registro
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    // Simulamos un registro exitoso (lógica para el registro aquí)
    $registro_exitoso = true; // Cambiar a true si el registro fue exitoso

    if ($registro_exitoso) {
        // Redirigir al usuario a la misma página con el parámetro ?registro=exito
        header("Location: ".$_SERVER['PHP_SELF']."?registro=exito");
        exit();
    }
}
?>