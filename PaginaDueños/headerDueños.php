<head>
    <style>
            #botonCerraSesion {
                margin-left: 5px;
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
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="PrincipalDueños.php">
                <img src="../Imagenes/Logo_Shopping_Blanco.png"  style="height: 50px; width: 50px;" alt="Logo" title="Logo de la empresa">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarNav" aria-expanded="false" aria-label="Abrir barra navegación">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="PrincipalDueños.php">Principal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="CrearDescuentos.php">Crear Descuentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="SolicitudesDescuento.php">Solicitudes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ReporteDueño.php">Reporte</a>
                    </li>
                </ul>
                <a class="nav-link" href="/Logeo/Iniciar_sesion.php">
                    <button class="btn" id="botonCerraSesion" type="button" aria-label="Cerrar Sesión"><span class="text">Cerrar Sesión</span>
                    <i class="fas fa-sign-out-alt"></i>
                </button>
                </a>
            </div>
        </div>
    </nav>
</header>