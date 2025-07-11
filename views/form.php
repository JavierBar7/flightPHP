<?php
$esEdicion = isset($jugador);
$action = $esEdicion ? "/jugador/actualizar/{$jugador['id_jugador']}" : "/jugador/guardar";
?>

<div class="form-container">
    <h2 class="section-title"><?= $esEdicion ? 'Editar Jugador' : 'Nuevo Jugador' ?></h2>
    
    <form action="<?= $action ?>" method="POST">
        <div class="form-group">
            <label class="form-label">Cédula:</label>
            <input type="text" 
                   class="form-control" 
                   name="cedula" 
                   value="<?= $jugador['cedula'] ?? '' ?>" 
                   required
                   pattern="[0-9]+"
                   title="Solo números permitidos">
        </div>

        <div class="form-group">
            <label class="form-label">Nombre y Apellido:</label>
            <input type="text" 
                   class="form-control" 
                   name="nombre_apellido" 
                   value="<?= $jugador['nombre_apellido'] ?? '' ?>" 
                   required>
        </div>

        <div class="form-group">
            <label class="form-label">Dirección:</label>
            <input type="text" 
                   class="form-control" 
                   name="direccion" 
                   value="<?= $jugador['direccion'] ?? '' ?>">
        </div>

        <div class="form-row">
            <div class="form-group half-width">
                <label class="form-label">Goles Anotados:</label>
                <input type="number" 
                       class="form-control" 
                       name="goles_anotados" 
                       min="0"
                       value="<?= $jugador['goles_anotados'] ?? 0 ?>">
            </div>

            <div class="form-group half-width">
                <label class="form-label">Faltas Cometidas:</label>
                <input type="number" 
                       class="form-control" 
                       name="faltas_cometidas" 
                       min="0"
                       value="<?= $jugador['faltas_cometidas'] ?? 0 ?>">
            </div>
        </div>

        <div class="form-group flex gap-4">
            <button type="submit" class="btn">
                <?= $esEdicion ? "Actualizar" : "Guardar" ?>
            </button>
            
            <a href="/jugadores" class="btn btn-secondary">
                <?= $esEdicion ? "Volver a la lista" : "Cancelar" ?>
            </a>
        </div>
    </form>
</div>