<?php 
session_start();

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Usuarios predefinidos
    $usuarios = [
        'admin' => [
            'username' => 'admin',
            'password' => '12345',
            'rol' => 'administrador'
        ],
        'cliente' => [
            'username' => 'cliente',
            'password' => '12345',
            'rol' => 'cliente'
        ]
    ];
    
    // Verificar las credenciales
    if ($username === $usuarios['admin']['username'] && $password === $usuarios['admin']['password']) {
        $_SESSION['user'] = 'admin';
        $_SESSION['rol'] = $usuarios['admin']['rol'];
        header("Location: ../views/gestion.php"); // Redirige a la página de gestión para administrador
        exit();
    } elseif ($username === $usuarios['cliente']['username'] && $password === $usuarios['cliente']['password']) {
        $_SESSION['user'] = 'cliente';
        $_SESSION['rol'] = $usuarios['cliente']['rol'];
        header("Location: ../views/cartelera.php"); // Redirige a la página de cartelera para cliente
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cine Kino</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body class="index">
    <header class="header-cine">
        <h1>Login</h1>
    </header>

    <div class="login-container">
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form id="loginForm" method="POST">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Ingresar</button>
        </form>
    </div>

    <footer>
        <p>Cine Kino © 2024. Todos los derechos reservados</p>
    </footer>

    <script src="../assets/js/login.js"></script>
</body>
</html>
