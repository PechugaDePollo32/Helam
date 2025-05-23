<?php include('conexion.php'); session_start(); if (!isset($_SESSION['alumno_id'])) { header("Location: alumno_login.php"); exit; } ?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Actividades Alumno</title></head>
<body>
    <h2>Registrar Actividad</h2>
    <form method="post">
        Actividades realizadas:<br>
        <textarea name="descripcion" maxlength="3000" required></textarea><br>
        Horas trabajadas: <input type="number" name="horas" required><br>
        <button type="submit">Enviar</button>
    </form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $desc = $_POST['descripcion'];
    $horas = intval($_POST['horas']);
    $stmt = $conn->prepare("INSERT INTO actividades (alumno_id, descripcion, horas) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $_SESSION['alumno_id'], $desc, $horas);
    $stmt->execute();
    echo "Actividad registrada.";
}
?>
</body>
</html>
