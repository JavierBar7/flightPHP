<?php
$esEdicion = isset($acceso);
$action = $esEdicion ? "/acceso/actualizar/{$acceso['id']}" : "/acceso/guardar";
?>

<div class="form-container">
    <h2 class="section-title"><?= $esEdicion ? 'Editar Usuario' : 'Nuevo Usuario' ?></h2>
    
    <form action="<?= $action ?>" method="POST">
        <div class="form-group">
            <label class="form-label">Usuario:</label>
            <input type="text" 
                   class="form-control" 
                   name="usuario" 
                   value="<?= $acceso['usuario'] ?? '' ?>" 
                   required>
        </div>
        
        <div class="form-group">
            <label class="form-label">Contraseña:</label>
            <input type="password" 
                   class="form-control" 
                   name="contrasena" 
                   <?= $esEdicion ? '' : 'required' ?>>
            <?php if ($esEdicion): ?>
                <small class="form-help">Déjalo vacío si no deseas cambiarla.</small>
            <?php endif; ?>
        </div>
        
        <div class="form-group">
            <label class="form-label">Rol:</label>
            <select class="form-select" name="rol">
                <option value="usuario" <?= ($acceso['rol'] ?? '') === 'usuario' ? 'selected' : '' ?>>Usuario</option>
                <option value="admin" <?= ($acceso['rol'] ?? '') === 'admin' ? 'selected' : '' ?>>Administrador</option>
            </select>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn">
                <?= $esEdicion ? "Actualizar" : "Guardar" ?>
            </button>
            
            <a href="<?= $esEdicion ? '/accesos' : '/' ?>" class="btn btn-secondary mt-4">
                <?= $esEdicion ? "Volver a la lista" : "Cancelar" ?>
            </a>
        </div>
    </form>
</div>