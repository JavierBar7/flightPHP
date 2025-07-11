<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Jugadores</title>
    <link rel="stylesheet" href="/public/style.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <h1>Panel de Administración</h1>
            <nav class="nav">
                <a href="/jugadores" class="nav-link">Jugadores</a>
                <a href="/accesos" class="nav-link">Usuarios</a>
                <a href="/jugador-tallas" class="nav-link">Tallas</a>
            </nav>
        </div>
    </header>
    
    <main class="main-content container">
        <?= $content ?>
    </main>
</body>
</html>
