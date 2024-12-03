
<?php
include("../BasesDeDatos/UnicaBaseDeDatos.php");
if (isset($_GET['email'])) {
    $emailDecodificado = base64_decode($_GET['email']);
    $redireccion = htmlspecialchars($_SERVER['PHP_SELF']);
    echo "
    <div style='display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #f3f4f6;'>
        <div style='width: 100%; max-width: 400px; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);'>
            <h2 style='text-align: center; color: #333; margin-bottom: 20px;'>Cambiar Contraseña</h2>
            <form action='{$redireccion}' method='post' style='display: flex; flex-direction: column; gap: 15px;'>
                <input type='hidden' name='email' value='" . htmlspecialchars($emailDecodificado) . "' />
                <label for='password' style='color: #555; font-size: 14px;'>Nueva Contraseña:</label>
                <div style='position: relative;'>
                    <input 
                        type='password' 
                        id='password' 
                        name='password' 
                        required 
                        style='padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;'
                    />
                    <span 
                        onclick='togglePasswordVisibility()' 
                        style='position: absolute; top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;'>
                        👁️
                    </span>
                </div>
                <button 
                    type='submit' 
                    style='padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 14px;'>
                    Cambiar Contraseña
                </button>
            </form>
        </div>
    </div>
    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        }
    </script>
    ";
} else {
    if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
        echo "
        <script>
            alert('Hubo un problema al crear la novedad.');
        </script>";
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE registracion SET contraseña = '$password' WHERE usuario = '$email'";
    if ($conn->query($sql)) {
        echo "
        <script>
            alert('Contraseña cambiada con éxito.');
            window.location.href = '/ruta/a/inicio-de-sesion.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Hubo un error al cambiar la contraseña.');
        </script>";
    }
}
?>
