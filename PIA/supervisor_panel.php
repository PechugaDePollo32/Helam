<?php include('conexion.php'); session_start(); if (!isset($_SESSION['supervisor'])) { header("Location: supervisor_login.php"); exit; } ?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Panel Supervisor</title></head>
<body>
    <h2>Registro de Actividades</h2>
    <table border="1">
        <tr><th>ID Alumno</th><th>Descripción</th><th>Horas</th></tr>
        <?php
        $res = $conn->query("SELECT alumno_id, descripcion, horas FROM actividades");
        while ($row = $res->fetch_assoc()) {
            echo "<tr><td>{$row['alumno_id']}</td><td>{$row['descripcion']}</td><td>{$row['horas']}</td></tr>";
        }
        ?>
    </table>
</body>
</html>
