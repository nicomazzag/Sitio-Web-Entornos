<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Web</title>
</head>
<body>
    <!-- Renombrar esta pagina como index.php en caso de querer que se ejecute desde el servidor de azure -->
    <?php
    // Redirect to another webpage
    header('Location: https://zorzal.azurewebsites.net/PaginaGeneral/home_Page.php');
    exit();
    ?>
</body>
</html>