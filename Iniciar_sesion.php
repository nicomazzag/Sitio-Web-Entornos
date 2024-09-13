<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="iniciarSession.css">
    <title>Logueo</title>
</head>
<body>
    <form action="" class="form">
        <h2 class="form_titulo">Iniciar Sesion</h2>     
            <div class="form_contenedor">
                <div class="form_grupo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="logito1" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                    </svg>
                    <input type="email" class="form_input"  name="email" id="email" placeholder=" " required >
                    <label for="email" class="form_label">Email:</label>
                    <span class="form_line"></span>
                </div>    
                <div class="form_grupo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="logito1" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                    </svg>
                    <input type="password"  name="password" id="contraseña" class="form_input" placeholder=" ">
                    <label for="email" class="form_label">Contraseña:</label>
                    <span class="form_line"></span>
                </div>
                <button type="submit" >
                    Iniciar Sesion
                </button>
            </div>
            <div class="separator">
                <span>O</span>
            </div>
        <div>
            <p class="form_parrafo">¿Quiéres registrarse?
                <a href="registrarse_nuevo_usuario.php" class="form_link">Registrarse</a>
            </p>
            <p class="form_parrafo">¿Olvidaste tu contraeña?
                <a href="recuperar_contra.php" class="form_link">Recuperar contraseña</a>
            </p>
        </div>
    </form>
</body>
</html