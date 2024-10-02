<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Conexion con el icono de la pagina -->
    <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
    <!-- Conexion con hoja de estilo -->
    <link rel="stylesheet" href="EstiloParaTablas.css">
    <!-- Conexion con bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Conexion con font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Reportes</title>
</head>
<body>
    <?php 
        include("headerAdmin.php");
    ?>
    <div class="conteiner table-responsive">
        <table id="sinMargen" class="table">
          <thead>
            <tr>
              <th scope="col" class="text-center">Código Promoción</th>
              <th scope="col">Texto</th>
              <th scope="col">Días Disponible</th>            
              <th scope="col" class="text-center">Cantidad de Usos</th>            
              <th scope="col">&nbsp;</th>
              <!--En caso de tocar el boton inspeccionar, desplegar modal con la siguiente información            
                                Válida Desde
                                Válida Hasta
                                Para clientes
                                Local Asociado -->
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <tr>
              <th scope="row" class="text-center">XXX</th>
              <td>20% OFF calzados</td>
              <td>L-M-Mi-J-V-S-D</td>
              <td class="text-center">4</td>
              <td><button id="botonLupa" class="btn"><i class="fas fa-search"></i> Inspeccionar</button></td>            
            </tr>
            <tr>
              <th scope="row" class="text-center">XXX</th>
              <td>2x1 Combos Hamburguesa</td>
              <td>L-M-Mi</td>
              <td class="text-center">10</td>
              <td><button id="botonLupa" class="btn"><i class="fas fa-search"></i> Inspeccionar</button><td>            
            </tr>
            <tr>
              <th scope="row" class="text-center">XXX</th>
              <td>50% OFF Boxer</td>
              <td>J-V-S-D</td>
              <td class="text-center">2</td>
              <td>
                  <button id="botonLupa" class="btn" data-bs-toggle="modal" data-bs-target="#Modal" ><i class="fas fa-search"></i> Inspeccionar
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="Modal" tabindex="-1"          aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                            <!--Falta con el PHP mostrar el codigo de de la Promoción en la modal-->
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Detalles de la promoción</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal_contenido">
                        <ul>
                          <li>Válida Desde: 01/01/2024</li>
                          <li>Válida Hasta: 31/01/2022</li>
                          <li>Para clientes: Premium</li>
                          <li>Local Asociado: XXX</li>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn" id="BotonCerrar" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </td>                 
            </tr>
          </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example" id="paginacion">
        <ul class="pagination" id="enlaces">
          <li class="page-item "><a class="page-link" id="item" href="#">Anterior</a></li>
          <li class="page-item" ><a class="page-link" id="item" href="#">1</a></li>
          <li class="page-item" ><a class="page-link" id="item" href="#">2</a></li>
          <li class="page-item" ><a class="page-link" id="item" href="#">3</a></li>
          <li class="page-item" ><a class="page-link" id="item" href="#">Siguiente</a></li>
        </ul>
    </nav>
</body>
</html>