<?php
if(isset($_POST['cerrarSession'])){
    session_unset();
    session_destroy();
    header("Location: ../Logeo/Iniciar_sesion.php");
    exit();
}
?>
<head>
    <style>
            #botonCerraSesion {
                margin-left: 5px;
                background-color: #0d6efd; 
                color: #ffffff; 
                border: none; 
                border-radius: 5px; 
                cursor: pointer; 
                transition: transform 0.5s ease-in, background-color 0.5s ease-in;
                align-items: center; 
                }

                #botonCerraSesion .text {
                    display: inline-block;
                }

            #botonCerraSesion:hover {
                transform: scale(1.1); 
                background-color: #ff0000;
                }   
            i {
                padding-left: 5px;
                }
            #botonCerraSesion i {
                margin-right: 8px;
                }
            
            @media(max-width:767px){
                #botonCerraSesion .text {
                    display: none;
                }
                #botonCerraSesion  {
                    margin-right: 0;
                    margin-left: 0;
                }
            }
    </style>
</head>
<header>
    <nav class="navbar navbar-expand-md bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="PrincipalCliente.php">
                <img src="../Imagenes/Logo_Shopping_Blanco.png"  style="height: 50px; width: 50px;" alt="Logo" title="Logo de la empresa">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarNav" aria-expanded="false" aria-label="Abrir barra navegación">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="PrincipalCliente.php #locales">Nuestros Locales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="Promociones.php">Promociones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="Novedades.php">Novedades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#contactanos">Contáctanos</a>
                    </li>
                </ul>
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" class="sinMargen" method="post">
                    <button class="btn" id="botonCerraSesion" name="cerrarSession" type="submit" aria-label="Cerrar Sesión"><span class="text">Cerrar Sesión</span>
                    <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>
</header>