<?php
if(isset($_POST['cerrarSession'])){
    session_unset();
    session_destroy();
    header("Location: ../Logeo/Iniciar_sesion.php");
    exit();
}
?>
<header>
    <style>
            .sinMargen {
                margin: 0;
            }
            #botonCerraSesion {
                margin-left: 5px;
                margin-right: 4px;
                background-color: #212529; 
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
                .profile-picture {
                cursor: pointer;
                display: flex;
                align-items: right;
            }
            .profile-picture img {
                height: 50px;
                width: 50px;
                border-radius: 50%;
                margin-left: 5px; 
            }
            .profile-picture span {
                color: #ffffff;
                font-size: 16px;
                font-weight: bold;
                margin-right: 5px;
            }
            .profile-picture button {
                background: none;
                border: none;
                color: inherit;
                font: inherit;
                cursor: pointer;
                display: flex;
                align-items: center;
            }
            .navbar-collapse {
                justify-content: space-between;
            }
            .navbar-nav{
                flex-grow:1;
            }
            @media(max-width:767px){
                #botonCerraSesion .text {
                    display: none;
                }
                #botonCerraSesion  {
                    margin-right: 0;
                    margin-left: 0;
                }
                .profile-picture img{
                    display: none;
                }
            }
    </style>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="PrincipalDuenos.php">
                <img src="../Imagenes/Logo_Shopping_Blanco.png"  style="height: 50px; width: 50px;" alt="Logo" title="Logo de la empresa">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarNav" aria-expanded="false" aria-label="Abrir barra navegación">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="PrincipalDuenos.php">Principal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="CrearDescuentos.php">Crear Descuentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="SolicitudesDescuento.php">Solicitudes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ReporteDueno.php">Reporte</a>
                    </li>
                </ul>
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" class="sinMargen" method="post">
                    <button class="btn" id="botonCerraSesion" name="cerrarSession" type="submit" aria-label="Cerrar Sesión"><span class="text">Cerrar Sesión</span>
                    <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
                <form action="perfil.php" method="post" class="profile-picture"> 
                        <button type="submit">
                            <span>Ver perfil</span>
                            <img src="../Imagenes/perfil.png" alt="ver perfil" title="Perfil de Usuario">
                        </button>
                </form>
            </div>
        </div>
    </nav>
</header>