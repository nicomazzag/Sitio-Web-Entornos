<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Dueños.css">
    <link rel="icon" href="../Iconos/Logo_Shopping_Blanco.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Solicitudes de Dueños</title>
</head>
<body>
    <?php
        include("headerAdmin.php");
    ?>
    <div class="conteiner mt-5 d-flex justify-content-center ">
        <table class="tabla table-bordered text-center">
            <tr>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Correo</td>
                <td>Telefono</td>
                <td>Estado</td>
                <td>
                    <button type="button" class="btn btn-success">Aceptar</button>
                    <button type="button" class="btn btn-danger">Rechazar</button>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>