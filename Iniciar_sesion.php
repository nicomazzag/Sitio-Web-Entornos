
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="iniciarSession.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="Logo_shopping.ico" type="image/x-icon">
    <title>Logueo</title>
    <style>
        button{
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="" class="form" method="$_POST">
        <h2 class="form_titulo">Iniciar Sesion</h2>     
            <div class="form_contenedor">
                <div class="form_grupo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="logito1" viewBox="0 0 16 16" aria-hidden="true">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                    </svg>
                    <input type="email" class="form_input"  name="email" id="email" placeholder=" " required >
                    <label for="email" class="form_label">Email:</label>
                    <span class="form_line"></span>
                </div>    
                <div class="form_grupo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="logito1" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                    </svg>
                    <input type="password"  name="contraseña" id="contraseña" class="form_input" placeholder=" " class="form_input">
                    <label for="contra" class="form_label">Contraseña:</label>
                    <span class="form_line"></span>
                </div>
                <button class="iniciar" name="Iniciar_Sesion" type="submit">
                    Iniciar Sesion
                </button>
            </div>
            <div class="separador">
                <div></div>
                <span>O</span>
                <div></div>
            </div>
        <div>
            <p class="form_parrafo">¿Quiéres registrarse?</p>
                <a href="registrarse_nuevo_usuario.php" class="form_link" aria-label="Registrarse como un nuevo usuario">Registrarse</a>
            <p class="form_parrafo" aria-label="Cambiar contraseña">¿Olvidaste tu contraseña?</p>
                <a href="recuperar_contra.php" class="form_link">Recuperar contraseña</a>
        </div>
    </form>
</body>
</html

<?php
session_start();
//conexion a la base de datos
    $conn = new mysqli('localhost','usuario','contraseña','base_de_datos');           
    if ($conn->connect_error) {
        die("Conexion fallida: " . $conn->connect_error);
    }

    if (isset($_POST['Iniciar_Sesion']) && !empty($_POST['email']) && !empty($_POST['contra'])){
        $email = $_POST['email'];
        $contra = $_POST['contra'];
        if (filter_var($email,FILTER_VALIDATE_EMAIL)){
        }
    }

?>