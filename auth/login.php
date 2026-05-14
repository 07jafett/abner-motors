<?php
    session_start();
    require_once "../config/conexion.php";

    $mensaje = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo   = $_POST["correo"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuarios
            WHERE correo=?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$correo]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {

        if ($usuario["estado"] != "aprobado") {

            $mensaje = "Tu cuenta todavía no ha sido aprobada";

        } else {

            if (password_verify($password, $usuario["password"])) {

                $_SESSION["usuario"] = $usuario["nombre"];
                $_SESSION["rol"]     = $usuario["rol"];

                header("Location: ../admin/dashboard.php");
                exit();

            } else {

                $mensaje = "Contraseña incorrecta";

            }

        }

    } else {

        $mensaje = "Correo no encontrado";

    }

    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Iniciar sesión</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Segoe UI;
}

body{
    min-height:100vh;
    background:
    linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.8)),
    url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?q=80&w=2083&auto=format&fit=crop');
    background-size:cover;
    background-position:center;
    display:flex;
    justify-content:center;
    align-items:center;
}

.card{
    width:420px;
    padding:40px;
    border-radius:28px;
    background:rgba(15,23,42,.88);
    backdrop-filter:blur(12px);
    border:1px solid rgba(255,255,255,.08);
    box-shadow:0 20px 50px rgba(0,0,0,.5);
}

h1{
    color:white;
    margin-bottom:10px;
    text-align:center;
    font-size:35px;
}

p{
    text-align:center;
    color:#94a3b8;
    margin-bottom:30px;
}

input{
    width:100%;
    padding:15px;
    margin-bottom:18px;
    border:none;
    border-radius:15px;
    background:#1e293b;
    color:white;
    font-size:15px;
    outline:none;
}

button{
    width:100%;
    padding:15px;
    border:none;
    border-radius:15px;
    background:linear-gradient(135deg,#2563eb,#1d4ed8);
    color:white;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
    transition:.3s;
}

button:hover{
    transform:translateY(-3px);
}

.msg{
    margin-top:20px;
    text-align:center;
    color:#22c55e;
    font-weight:bold;
}

.back{
    display:block;
    text-align:center;
    margin-top:20px;
    color:#cbd5e1;
    text-decoration:none;
}

</style>

</head>
<body>

<div class="card">

<h1>Iniciar sesión</h1>

<p>Accede al sistema privado ABNER MOTORS</p>

<form method="POST">

<input type="email" name="correo"
placeholder="Correo electrónico" required>

<input type="password" name="password"
placeholder="Contraseña" required>

<button type="submit">
Entrar al sistema
</button>

</form>

<?php if ($mensaje != ""): ?>

<div class="msg">
<?php echo $mensaje ?>
</div>

<?php endif; ?>

<a class="back" href="../index.php">
← Volver
</a>

</div>

</body>
</html>