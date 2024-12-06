<?php 
  include("../Include/Sesion.php");
  include('../BasesDeDatos/UnicaBaseDeDatos.php');
// Paginación:
$filasPorPagina = 3; // filas por página
$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1; 
$inicio = ($paginaActual - 1) * $filasPorPagina; 

$totalRegistros = 0;

$codUsuario = $_SESSION['cod']; // cod del usuario dueño    
$sqlL = "SELECT * FROM locales WHERE codUsuario = $codUsuario LIMIT $inicio, $filasPorPagina";
$resultL = mysqli_query($conn, $sqlL); // locales del dueño

while ($filaL = mysqli_fetch_assoc($resultL)): // recorrer locales

    $sqlP = "SELECT * FROM promociones WHERE codLocal = " . (int)$filaL['id'] . " AND estadoPromo = 'aprobada'";
    $resultP = mysqli_query($conn, $sqlP); // promociones aceptadas del local

    while ($filaP = mysqli_fetch_assoc($resultP)): // recorrer las promociones de cada local
        $totalRegistros = $totalRegistros + 1;
    endwhile;
endwhile;

// Calcular el total de páginas
$sqlTotal = "SELECT COUNT(*) as total FROM locales WHERE codUsuario = $codUsuario";
$resultTotal = mysqli_query($conn, $sqlTotal);
$rowTotal = mysqli_fetch_assoc($resultTotal);
$totalPaginas = ceil($rowTotal['total'] / $filasPorPagina);
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Conexion con hoja de estilo -->
    <link rel="stylesheet" href="EstilosDeDueno.css">
    <!-- Conexion con el icono de la pagina -->
    <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
    <!-- Conexion con el google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Batang:wght@400;700&family=Protest+Guerrilla&display=swap" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
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
            <tbody class="table-group-divider">
                <?php 
                    $codUsuario = $_SESSION['cod']; // cod del usuario dueño    
                    $sqlL = "SELECT * FROM locales WHERE codUsuario = $codUsuario";
                    $resultL = mysqli_query($conn, $sqlL); // locales del dueño
                    
                    while ($filaL = mysqli_fetch_assoc($resultL)): // recorrer locales

                        $sqlP = "SELECT * FROM promociones WHERE codLocal = " . (int)$filaL['id'] . " AND estadoPromo = 'aprobada' LIMIT $inicio, $filasPorPagina";
                        $resultP = mysqli_query($conn, $sqlP); // promociones aceptadas del local

                        while ($filaP = mysqli_fetch_assoc($resultP)): // recorrer las promociones ?>
                            <tr>
                                <th scope="row" class="text-center"><?php echo $filaL['id']; ?></th>
                                <td><?php echo $filaL['nombre']; ?></td>
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
                                    <?php
                                        $sql = "SELECT * FROM usopromociones WHERE codPromo = " . $filaP['id'] . " AND estado = 'aceptada'";
                                        $result = mysqli_query($conn, $sql);
                                        $cantUsos = (mysqli_num_rows($result)) // cantidad de usos
                                    ?>
                                <td class="text-center"> <?php echo $cantUsos ?></td> 
                            </tr>
                        <?php endwhile; ?>
                    <?php endwhile; ?>
            </tbody>
        </table>
    </div>
<!-- Paginación -->
    <nav>
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <li class="page-item <?php if ($i == $paginaActual) echo 'active'; ?>">
                    <a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</body>
</html>