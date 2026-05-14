<?php
    require_once "../config/conexion.php";

    if (isset($_GET["aprobar"])) {

    $id = $_GET["aprobar"];

    $sql = "UPDATE usuarios
            SET estado='aprobado'
            WHERE id_usuario=?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    header("Location: usuarios.php");
    exit();
    }

    $sql = "SELECT * FROM usuarios
        ORDER BY id_usuario DESC";

    $stmt = $pdo->query($sql);

    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Panel Admin</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Segoe UI;
}

body{
    background:#020617;
    color:white;
    padding:40px;
}

h1{
    margin-bottom:30px;
    font-size:40px;
}

table{
    width:100%;
    border-collapse:collapse;
    background:#111827;
    border-radius:20px;
    overflow:hidden;
}

th{
    background:#1e293b;
    padding:18px;
    text-align:left;
}

td{
    padding:18px;
    border-bottom:1px solid rgba(255,255,255,.05);
}

tr:hover{
    background:#0f172a;
}

.badge{
    padding:8px 14px;
    border-radius:12px;
    font-size:14px;
    font-weight:bold;
}

.pendiente{
    background:#f59e0b;
    color:black;
}

.aprobado{
    background:#22c55e;
    color:white;
}

.btn{
    padding:10px 16px;
    border:none;
    border-radius:12px;
    background:#2563eb;
    color:white;
    text-decoration:none;
    font-weight:bold;
}

</style>

</head>
<body>

<h1>Usuarios registrados</h1>

<table>

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Correo</th>
<th>Estado</th>
<th>Acción</th>
</tr>

<?php foreach ($usuarios as $u): ?>

<tr>

<td><?php echo $u["id_usuario"] ?></td>

<td><?php echo $u["nombre"] ?></td>

<td><?php echo $u["correo"] ?></td>

<td>

<span class="badge <?php echo $u["estado"] ?>">
    <?php echo $u["estado"] ?>
</span>

</td>

<td>

<?php if ($u["estado"] == "pendiente"): ?>

<a class="btn"
href="?aprobar=<?php echo $u["id_usuario"] ?>">
Aprobar
</a>

<?php else: ?>

✅

<?php endif; ?>

</td>

</tr>

<?php endforeach; ?>

</table>

</body>
</html>