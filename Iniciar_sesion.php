<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="iniciar_sesion.css">
    <title>Logueo</title>
</head>
<body>
    <button class="button">Iniciar Sesión</button>
    <br>
    <form style="align-items: center; margin: auto; width: 25%;" action="" class="form">
        <p>
            Bienvenido,<span>Iniciar sesión para continuar</span>
        </p>
        <label for="email"></label>
        <input type="email" placeholder="Email" name="email" id="email" required>
        <input type="password" placeholder="Contraseña" name="password" required >

        <button class="oauthButton">
                        Iniciar Sesión
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 17 5-5-5-5"></path><path d="m13 17 5-5-5-5"></path></svg>
                    </button>
                    <div class="separator">
            <div></div>
            <span>O</span>
            <div></div>
        </div>
                    <p>¿Quieres?</p>
</form>
</body>
</html