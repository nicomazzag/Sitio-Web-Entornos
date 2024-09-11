<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="iniciar_sesion.css">
</head>
<body>
    <form style="align-items: center; margin: auto; width: 25%;" action="" class="form">
        <p>
            Bienvenido,<span>Vamos a cambiar la contraseña, ingrese los siguientes datos:</span>
        </p>
        <label for="email"></label>
        <input type="email" placeholder="Email" name="email" id="email" required>
        <label for="password"></label>
        <input type="password" placeholder="Contraseña" name="password" id="password" required>
        <label for="password"></label>
        <input type="password" placeholder="Confirmar Contraseña" name="password" id="password">

        <button class="oauthButton">
                        Confirmar
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 17 5-5-5-5"></path><path d="m13 17 5-5-5-5"></path></svg>
                    </button>
</form>
</body>
</html>