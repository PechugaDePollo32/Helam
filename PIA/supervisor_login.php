<?php include('conexion.php'); session_start(); ?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Login Supervisor</title></head>
<body>
    <h2>Login Supervisor</h2>
    <form method="post">
        Matrícula: <input type="text" name="matricula" required><br>
        Contraseña: <input type="password" name="contrasena" required><br>
        <button type="submit" name="login">Iniciar Sesión</button>
    </form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['matricula'] === '2001233' && $_POST['contrasena'] === 'tick250707') {
        $_SESSION['supervisor'] = true;
        header("Location: supervisor_panel.php");
        exit;
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>
</body>
</html>
