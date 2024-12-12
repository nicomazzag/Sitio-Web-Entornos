<?php 
    include("../Include/Sesion.php");
    include('../BasesDeDatos/UnicaBaseDeDatos.php');

    // paginacion
    $resultados_por_pagina = 3;
    $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
    $inicio = ($pagina_actual - 1) * $resultados_por_pagina;

        //cod dueño
    $cod_dueño = $_SESSION['cod'];
    $sql_locales = "SELECT id FROM locales WHERE codUsuario = '$cod_dueño'";
    $resultado_locales = mysqli_query($conn, $sql_locales);

    // Construir una lista de IDs de locales
    $ids_locales = [];
    while ($fila = mysqli_fetch_assoc($resultado_locales)) {
        $ids_locales [] = $fila['id'];
    }
    
    // Convertir los IDs de locales en una cadena para la consulta
    $ids_locales_str = implode(",", $ids_locales);

    if (empty($ids_locales)) {
        die("No se encontraron locales para este usuario.");
    } 

    // Contar las promociones aprobadas de los locales
    $sql_total = "SELECT COUNT(*) as total FROM promociones
                WHERE codLocal IN ($ids_locales_str) AND estadoPromo = 'aprobada'";
    $resultado_total = mysqli_query($conn, $sql_total);
    $fila_total = mysqli_fetch_assoc($resultado_total);
    $total_registros = $fila_total['total'];

        //total de paginas
    $total_paginas = ceil($total_registros / $resultados_por_pagina);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Conexion con bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Conexion con font awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Conexion con hoja de estilo -->
    <link rel="stylesheet" href="EstilosDeDueño.css">
    <!-- Conexion con el icono de la pagina -->
    <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
    <!-- Conexion con el google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Batang:wght@400;700&family=Protest+Guerrilla&display=swap" rel="stylesheet">
    
    <title>Reporte</title>
</head>
<body>
    <?php
        include ('headerDuenos.php');
    ?>
    <h1 class="text-center" id="Titulos" >Reporte de Descuentos</h1>
    <div class="conteiner">
        <table id="sinMargen" class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Código de local</th>
                    <th scope="col">Nombre de Local</th>  
                    <th scope="col">Descripcion</th>
                    <th scope="col">Dias disponibles</th>
                    <th scope="col">Cantidad de usos</th>
                </tr>
            </thead>
                <?php            // Obtener las promociones de la página actual
                    $sql_promociones = "SELECT * 
                                        FROM promociones 
                                        WHERE codLocal IN ($ids_locales_str) AND estadoPromo = 'aprobada' 
                                        LIMIT $inicio, $resultados_por_pagina";
                    $resultado_promociones = mysqli_query($conn, $sql_promociones);

                    while ($filaP = mysqli_fetch_assoc($resultado_promociones)) {
                        $sql_local = "SELECT * FROM locales WHERE id = '" . $filaP['codLocal'] . "'";
                        $resultado_local = mysqli_query($conn, $sql_local);
                        $filaL = mysqli_fetch_assoc($resultado_local);
                        ?>
                            <tbody class="table-group-divider">
                                <tr>
                                    <th scope="row" class="text-center"><?php echo $filaL['id']; ?></th>
                                    <td><?php echo $filaL['nombre'] ; ?></td>
                                    <td><?php echo $filaP['descripcion']; ?></td>   
                                        <?php // Convertir los unos de $diasBinario en los días correspondientes
                                            $diasBinario = $filaP['diasValidos'];
                                            $diasTexto = ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"];
                                            $diasResultado = [];
                                            for ($i = 0; $i < 7; $i++) {
                                                if ($diasBinario[$i] === "1") {
                                                    $diasResultado[] = $diasTexto[$i];
                                                }  
                                            }  
                                        ?>
                                    <td class="text-left"><?php echo implode(" - ", $diasResultado); ?></td>
                                        <?php //cantidad de usos
                                                $sql = "SELECT * FROM usopromociones WHERE codPromo = " . $filaP['id'] . " AND estado = 'aceptada'";
                                                $result = mysqli_query($conn, $sql);
                                                $cantUsos = (mysqli_num_rows($result)) // cantidad de usos
                                            ?>
                                    <td class="text-center"> <?php echo $cantUsos ?></td>                              
                                  </tr>
                            </tbody>    
                        <?php
                    }
                    
                ?>

        </table>
    </div>

            <!-- Paginación -->
    <nav aria-label="Page navigation example" id="paginacion">
        <ul class="pagination justify-content-center" id="enlaces">
                       <!-- Botón de retroceso -->
            <?php if ($pagina_actual > 1): ?>
                <li class="page-item "><a class="page-link" id="item" href="?pagina=<?php echo $pagina_actual - 1; ?>">Anterior</a></li>
            <?php else: ?>
                <li class="page-item "><a class="page-link" id="item" href="#">Anterior</a></li>
            <?php endif; ?>
                        <!-- Numero de pagina -->
            <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                <li class="page-item" ><a class="page-link" id="item" href="?pagina=<?php echo $i; ?>" class="<?php echo ($i == $papagina_actualginaActual) ? 'active' : ''; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>
                        <!-- Botón de avance -->
            <?php if ($pagina_actual < $total_paginas): ?>
                <li class="page-item "><a class="page-link" id="item" href="?pagina=<?php echo $pagina_actual + 1; ?>">Siguiente</a></li>
            <?php else: ?>
                <li class="page-item "><a class="page-link" id="item" href="#">Siguiente</a></li>
            <?php endif; ?>
        </ul>
    </nav></body>
</html>