<?php include('conexion.php'); session_start(); ?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Login Alumno</title></head>
<body>
    <h2>Login / Registro Alumno</h2>
    <form method="post">
        Matrícula: <input type="text" name="matricula" required><br>
        Contraseña: <input type="password" name="contrasena" required><br>
        <button type="submit" name="login">Iniciar Sesión</button>
        <button type="submit" name="register">Registrarse</button>
    </form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST['matricula'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
    if (isset($_POST['register'])) {
        $stmt = $conn->prepare("INSERT INTO alumnos (matricula, contrasena) VALUES (?, ?)");
        $stmt->bind_param("ss", $matricula, $contrasena);
        $stmt->execute();
        echo "Registrado correctamente.";
    } else {
        $stmt = $conn->prepare("SELECT id, contrasena FROM alumnos WHERE matricula = ?");
        $stmt->bind_param("s", $matricula);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hash); $stmt->fetch();
            if (password_verify($_POST['contrasena'], $hash)) {
                $_SESSION['alumno_id'] = $id;
                header("Location: alumno_panel.php");
                exit;
            }
        }
        echo "Datos incorrectos.";
    }
}
?>
</body>
</html>
