<?php 
    session_start();
    include('../BasesDeDatos/UnicaBaseDeDatos.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="iniciarSession.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
        <title>Logeo</title>
        <style>
            button{
                cursor: pointer;
            }
        </style>
    </head>
    <body>
    <?php
        if (isset($_GET['iniciarsesion']) && $_GET['iniciarsesion'] == 'exito') {
                    echo '<a href="../PaginaGeneral/home_Page.php" id="linkExito" style="display:none;"></a>';
                    echo '<script>
                    document.getElementById("linkExito").click();
                    </script>';
                } elseif (isset($_GET['iniciarsesion']) && $_GET['iniciarsesion'] == 'faltante') {
                    echo '<a href="Alertas/alerta_de_faltante.html" id="linkExito" style="display:none;"></a>';
                    echo '<script>
                    document.getElementById("linkExito").click();
                    </script>';
                } elseif (isset($_GET['iniciarsesion']) && $_GET['iniciarsesion'] == 'error') {
                    echo '<a href="Alertas/alerta_de_error.html" id="linkExito" style="display:none;"></a>';
                    echo '<script>
                    document.getElementById("linkExito").click();
                    </script>';
                }
    ?>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" class="form" method="post">
            <h2 class="form_titulo">Iniciar Sesion</h2>
                <a href="../PaginaGeneral/home_Page.php">
                    <img src="../Imagenes/Logo_shopping.png" style="height: 50px;" alt="Logo del shopping" title="Logo" >
                </a> 
                <div class="form_contenedor">
                    <div class="form_grupo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="logito1" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                        </svg>
                        <input type="email" class="form_input"  name="usuario" id="email" placeholder=" " required >
                        <label for="email" class="form_label">Email:</label>
                        <span class="form_line"></span>
                    </div>    
                    <div class="form_grupo">
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
                        <input type="password"  name="contraseña" id="contraseña" class="form_input" placeholder=" " class="form_input">
                        <label for="contratraseña" class="form_label">Contraseña:</label>
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
        <!-- JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html

<?php
    $iniciar=false;
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $usuario= filter_input(INPUT_POST,'usuario',FILTER_SANITIZE_STRING);
            $contra= filter_input(INPUT_POST,'contraseña',FILTER_SANITIZE_STRING);
            
            if(empty($usuario) || empty($contra)){
                header("Location: ".$_SERVER['PHP_SELF']."?iniciarsesion=faltante");
                exit();
            } 
            $sql = "SELECT * FROM registracion";
            $resultado= mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($resultado) > 0){
                while($fila = mysqli_fetch_assoc($resultado)){
                    if(($fila['usuario'] == $usuario) && (password_verify($contra, $fila['contraseña'])) ){ 
                        $iniciar=true;
                        if($fila['estadoDueño'] == 'rechazado'){
                            header("Location: Alertas/alerta_dueno_rechazado.html");
                            exit();
                        } 
                        $_SESSION['usuario'] = $usuario;
                        $_SESSION['tipo'] = $fila['tipoUsuario'];
                        $_SESSION['cod'] = $fila['codigo'];
                        $_SESSION['categoria'] = $fila['tipoCliente'];
                        if($fila['tipoUsuario'] == "administrador"){
                            header("Location: ../PaginaAdmin/PrincipalAdmin.php");
                        }
                        elseif($fila['tipoUsuario'] == "dueño" && $fila['estadoDueño'] == "pendiente"){
                            header("Location: Alertas/alerta_dueno_pendiente.html");
                            exit();
                        } elseif($fila['tipoUsuario'] == "dueño" && $fila['estadoDueño'] == "aceptado"){
                            header("Location: ../PaginaDuenos/PrincipalDuenos.php");
                        }
                        else{
                            header("Location: ../PaginaCliente/PrincipalCliente.php");
                        }
                        exit();
                    } 
                };    
            }
            if(!$iniciar){
                header("Location: ".$_SERVER['PHP_SELF']."?iniciarsesion=error");
                exit();
        } 
    }
    mysqli_close($conn);
?>