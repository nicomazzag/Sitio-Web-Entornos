<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="iniciarSession.css">
    <title>Registrarse</title>
</head>
<body>
    <form action="" class="form">
        <h2 class="form_titulo">Cambiar contraseña</h2>     
        <!-- <img src="https://thumbs.dreamstime.com/b/%C3%ADcone-de-usu%C3%A1rio-m%C3%ADdia-social-vetor-imagem-perfil-do-avatar-padr%C3%A3o-retrato-182347582.jpg" alt="Logo de usuario" class="logo_de_usuario"  title="Logo de usuario"> -->
        <div class="form_contenedor">
            <div class="form_grupo">
                <input type="email" class="form_input"  name="email" id="email" placeholder=" " required>
                <label for="email" class="form_label">Email:</label>
                <span class="form_line"></span>
            </div>    
            <div class="form_grupo">
                <input type="password"  name="password" id="contraseña" class="form_input" placeholder=" ">
                <label for="email" class="form_label">Contraseña:</label>
                <span class="form_line"></span>
            </div>
            <div class="form_grupo">
                <input type="password"  name="password" id="contraseña" class="form_input" placeholder=" ">
                <label for="email" class="form_label"> Confirmar Contraseña:</label>
                <span class="form_line"></span>
            </div>
            <input class="boton" value="Confirmar" type="submit">
        <!--<button class="oauthButton">
                        Registrarse
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 17 5-5-5-5"></path><path d="m13 17 5-5-5-5"></path></svg>
                    </button>-->
        </div>
    </form>
</body>
</html>