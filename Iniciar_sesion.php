<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="iniciarSession.css">
    <title>Logueo</title>
</head>
<body>
    <form style="align-items: center; margin: auto;" action="" class="form">
        <p>
            Bienvenido,<span>Iniciar sesión para continuar</span>
        </p>
        <!-- <img src="https://thumbs.dreamstime.com/b/%C3%ADcone-de-usu%C3%A1rio-m%C3%ADdia-social-vetor-imagem-perfil-do-avatar-padr%C3%A3o-retrato-182347582.jpg" alt="Logo de usuario" class="logo_de_usuario"  title="Logo de usuario"> -->
        <label for="email"></label>
        <input type="email" placeholder="Email" name="email" id="email" required>
        <label for="password"></label>
        <input type="password" placeholder="Contraseña" name="password" id="password" required >

        <button class="oauthButton">
                        Iniciar Sesión
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 17 5-5-5-5"></path><path d="m13 17 5-5-5-5"></path></svg>
                    </button>
                    <div class="separator">
            <div></div>
            <span>O</span>
            <div></div>
        </div>
        <p>¿Quiéres registrarse?
            <a href="registrarse_nuevo_usuario.php">Registrarse</a>
        </p>
        <p>¿Olvidaste tu contraeña?
            <a href="recuperar_contra.php">Recuperar contraseña</a>
        </p>
    </form>
</body>
</html