<?php 
  include("../Include/Sesion.php");
  include('../BasesDeDatos/UnicaBaseDeDatos.php');
  // paginacion :
  $filasPorPagina = 5; //  filas por página
  $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1; 
  $inicio = ($paginaActual - 1) * $filasPorPagina; 

  $sqlTotal = "SELECT COUNT(*) as total FROM promociones";
  $resultadoTotal = mysqli_query($conn, $sqlTotal);
  $filaTotal = mysqli_fetch_assoc($resultadoTotal);
  $totalRegistros = $filaTotal['total'];   // numero total de registros

  $totalPaginas = ceil($totalRegistros / $filasPorPagina); // número  de paginas

  // Obtener los registros de la página actual
  $sql = "SELECT * FROM promociones LIMIT $inicio, $filasPorPagina";
  $resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Conexion con el icono de la pagina -->
    <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
    <!-- Conexion con hoja de estilo -->
    <link rel="stylesheet" href="EstiloParaTablas.css">
    <link rel="stylesheet" href="EstiloParaTitulos.css">
    <!-- Conexion con bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Conexion con font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- Para modificar las alertas y no usar el estilo predeterminado -->
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Reportes</title>
</head>
<body>
    <?php 
        include("headerAdmin.php");
    ?>
    <div class="contenedor1">
      <p id="Home"><a id="linkHome" href="PrincipalAdmin.php">Principal</a> /Reporte</p>
      <h1 id="titulo">Reporte</h1>
    </div>
    <div class="conteiner table-responsive">
        <table id="sinMargen" class="table">
          <thead>
            <tr>
              <th scope="col" class="text-center">Código Promoción</th>
              <th scope="col">Cantidad de Usos</th>
              <th scope="col">Texto</th>            
              <th scope="col" class="text-center">Días Disponible</th>            
              <th scope="col">&nbsp;</th>
              <!--En caso de tocar el boton inspeccionar, desplegar modal con la siguiente información            
                                Válida Desde
                                Válida Hasta
                                Para clientes
                                Local Asociado -->
            </tr>
          </thead>

          <tbody class="table-group-divider">
            <?php if (mysqli_num_rows($resultado) > 0): ?> 
            <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
            <tr>
              <th scope="row" class="text-center"><?php echo $fila['id']; ?></th>
              <?php
                $sql = "SELECT * FROM usopromociones WHERE codPromo = " . $fila['id'] . " AND estado = 'aceptada'";
                $result = mysqli_query($conn, $sql);
                $cantUsos = (mysqli_num_rows($result))  //cantidad de usos 
              ?>
              <td> <?php echo $cantUsos ?></td> 
              <td><?php echo $fila['descripcion']; ?></td>         
              <?php // Convertir los unos de $diasBinario en los días correspondientes
                $diasBinario = $fila['diasValidos'];
                $diasTexto = ["Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"];
                $diasResultado = [];
                for ($i = 0; $i < 7; $i++) {
                    if ($diasBinario[$i] === "1") {
                        $diasResultado[] = $diasTexto[$i];
                    }  }  ?>
              <td class="text-center"><?php echo implode(" - ", $diasResultado); ?></td>
              <td>
                  <button id="botonLupa" class="btn" data-bs-toggle="modal" data-bs-target="#Modal" >
                    <i class="fas fa-search"></i> Inspeccionar
                  </button>
                  <div class="modal fade" id="Modal" tabindex="-1" ria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          
                            <!--Falta con el PHP mostrar el codigo de de la Promoción en la modal-->
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Detalles de la promoción</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal_contenido">
                        <ul>
                          <li>Válida <?php echo $fila['fechaDesde']; ?></li>
                          <li>Válida Hasta: <?php echo $fila['fechaHasta']; ?></li>
                          <li>Para clientes: <?php echo $fila['categoriaMin']; ?></li>
                          <li>Local Asociado: <?php echo $fila['codLocal']; ?></li>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn" id="BotonCerrar" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </td>                 
            </tr>
              <?php endwhile; ?>
              <?php else: ?>
            <tr>
                  <td colspan="8" class="text-center">No se encontraron registros.</td>
              </tr>
          <?php endif; ?>
          </tbody>
        </table>
    </div>


    <!-- Paginación -->
    <nav aria-label="Page navigation example" id="paginacion">
        <ul class="pagination" id="enlaces">

                       <!-- Botón de retroceso -->
          <?php if ($paginaActual > 1): ?>
            <li class="page-item "><a class="page-link" id="item" href="?pagina=<?php echo $paginaActual - 1; ?>">Anterior</a></li>
          <?php else: ?>
            <li class="page-item "><a class="page-link" id="item" href="#">Anterior</a></li>
          <?php endif; ?>
                      <!-- Numero de pagina -->
          <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
            <li class="page-item" ><a class="page-link" id="item" href="?pagina=<?php echo $i; ?>" class="<?php echo ($i == $paginaActual) ? 'active' : ''; ?>"><?php echo $i; ?></a></li>
          <?php endfor; ?>
                      <!-- Botón de avance -->
          <?php if ($paginaActual < $totalPaginas): ?>
            <li class="page-item "><a class="page-link" id="item" href="?pagina=<?php echo $paginaActual + 1; ?>">Siguiente</a></li>
          <?php else: ?>
            <li class="page-item "><a class="page-link" id="item" href="#">Siguiente</a></li>
          <?php endif; ?>
        </ul>
    </nav>
</body>
</html>