<?php
$esEdicion = isset($talla);
$action = $esEdicion ? "/jugador-talla/actualizar/{$talla['id_jugador_talla']}" : "/jugador-talla/guardar";
?>

<div class="form-container">
    <h2 class="section-title"><?= $esEdicion ? 'Editar Talla' : 'Nueva Talla' ?></h2>
    
    <form action="<?= $action ?>" method="POST">
        <div class="form-group">
            <label class="form-label">Jugador:</label>
            <select class="form-select" name="id_jugador" required>
                <option value="">Seleccione</option>
                <?php foreach ($jugadores as $j): ?>
                    <option value="<?= $j['id_jugador'] ?>" 
                        <?= isset($talla['id_jugador']) && $talla['id_jugador'] == $j['id_jugador'] ? 'selected' : '' ?>>
                        <?= $j['nombre_apellido'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Talla zapato:</label>
            <input type="text" 
                   class="form-control" 
                   name="talla_zapato" 
                   value="<?= $talla['talla_zapato'] ?? '' ?>" 
                   required>
        </div>

        <div class="form-group">
            <label class="form-label">Talla short:</label>
            <input type="text" 
                   class="form-control" 
                   name="talla_short" 
                   value="<?= $talla['talla_short'] ?? '' ?>" 
                   required>
        </div>

        <div class="form-group">
            <label class="form-label">Talla franelilla:</label>
            <input type="text" 
                   class="form-control" 
                   name="talla_franelilla" 
                   value="<?= $talla['talla_franelilla'] ?? '' ?>" 
                   required>
        </div>

        <div class="form-group flex gap-4">
            <button type="submit" class="btn">
                <?= $esEdicion ? "Actualizar" : "Guardar" ?>
            </button>
            
            <a href="<?= $esEdicion ? '/jugador-tallas' : '/jugadores' ?>" class="btn btn-secondary">
                <?= $esEdicion ? "Volver a la lista" : "Cancelar" ?>
            </a>
        </div>
    </form>
</div>