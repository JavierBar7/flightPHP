<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="/public/auth-styles.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <h2 class="auth-title">Registro de Usuario</h2>
            <form class="auth-form" action="/auth/registro" method="POST">
                <div>
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" value="<?= $acceso['usuario'] ?? '' ?>" required>
                </div>
                
                <div>
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" id="contrasena" name="contrasena" required>
                </div>
                
                <div>
                    <label for="rol">Rol:</label>
                    <select id="rol" name="rol">
                        <option value="usuario" <?= ($acceso['rol'] ?? '') === 'usuario' ? 'selected' : '' ?>>Usuario</option>
                        <option value="admin" <?= ($acceso['rol'] ?? '') === 'admin' ? 'selected' : '' ?>>Administrador</option>
                    </select>
                </div>
                
                <button type="submit" class="auth-button">Registrar</button>
            </form>
            <div class="auth-links">
                <a href="/" class="auth-link">¿Ya tienes cuenta? Inicia sesión</a>
            </div>
        </div>
    </div>
</body>
</html>