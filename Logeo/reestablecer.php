
<?php
include("../BasesDeDatos/UnicaBaseDeDatos.php");
if (isset($_GET['email'])) {
    $emailDecodificado = base64_decode($_GET['email']);
    $redireccion = htmlspecialchars($_SERVER['PHP_SELF']);
        echo "
        <form action='{$redireccion}' method='post'>
            <input type='hidden' name='email' value='" . htmlspecialchars($emailDecodificado) . "' />
            <label for='password'>Nueva Contraseña:</label>
            <input type='password' name='password' required />
            <button type='submit'>Cambiar Contraseña</button>
        </form>
        ";
} else {
    if(!($_SERVER['REQUEST_METHOD'] == 'POST')){
    echo "Acceso no autorizado.";
    }
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE registracion SET  contraseña = '$password' WHERE usuario = '$email'";
    if($conn->query($sql)){
        echo "Contraseña cambiada con éxito."; //Cambiar sussi
    }else{
        echo "Error al cambiar la contraseña."; //Cambiar sussi
    }
}
?>