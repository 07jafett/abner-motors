<?php
    session_start();

    if (! isset($_SESSION["usuario"])) {

    header("Location: ../auth/login.php");
    exit();

    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard</title>

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
    min-height:100vh;
}

.sidebar{
    position:fixed;
    width:260px;
    height:100vh;
    background:#0f172a;
    padding:30px;
    border-right:1px solid rgba(255,255,255,.05);
}

.logo{
    font-size:30px;
    font-weight:800;
    margin-bottom:40px;
}

.menu a{
    display:block;
    padding:15px;
    margin-bottom:12px;
    border-radius:14px;
    background:#111827;
    color:white;
    text-decoration:none;
    transition:.3s;
}

.menu a:hover{
    background:#2563eb;
    transform:translateX(5px);
}

.main{
    margin-left:260px;
    padding:40px;
}

.top{
    background:#111827;
    padding:30px;
    border-radius:25px;
    margin-bottom:30px;
}

.top h1{
    font-size:40px;
    margin-bottom:10px;
}

.top p{
    color:#94a3b8;
}

.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
}

.card{
    background:#111827;
    padding:30px;
    border-radius:22px;
    transition:.3s;
}

.card:hover{
    transform:translateY(-6px);
}

.card h2{
    font-size:40px;
    margin-bottom:10px;
}

.card p{
    color:#94a3b8;
}

</style>

</head>
<body>

<div class="sidebar">

<div class="logo">
🏎️ ABNER
</div>

<div class="menu">

<a href="#">📊 Dashboard</a>

<a href="usuarios.php">👥 Usuarios</a>

<a href="#">🚘 Vehículos</a>

<a href="#">💰 Ventas</a>

<a href="#">⚙️ Configuración</a>

</div>

</div>

<div class="main">

<div class="top">

<h1>
Bienvenido,
<?php echo $_SESSION["usuario"] ?>
</h1>

<p>
Panel privado de administración
</p>

</div>

<div class="cards">

<div class="card">
<h2>24</h2>
<p>Vehículos</p>
</div>

<div class="card">
<h2>15</h2>
<p>Clientes</p>
</div>

<div class="card">
<h2>8</h2>
<p>Ventas</p>
</div>

<div class="card">
<h2>5</h2>
<p>Usuarios</p>
</div>

</div>

</div>

</body>
</html>