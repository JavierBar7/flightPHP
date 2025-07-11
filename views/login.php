<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="/public/auth-styles.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <h2 class="auth-title">Iniciar Sesión</h2>
            <form class="auth-form" action="/auth/login" method="POST">
                <div>
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" value="<?= $acceso['usuario'] ?? '' ?>" required>
                </div>
                
                <div>
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" id="contrasena" name="contrasena" required>
                </div>
                
                <button type="submit" class="auth-button">Ingresar</button>
            </form>
            <div class="auth-links">
                <a href="/registro" class="auth-link">¿No tienes cuenta? Regístrate aquí</a>
            </div>
        </div>
    </div>
</body>
</html>