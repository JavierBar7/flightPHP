<div class="main-content">
    <div class="flex justify-between items-center mb-6">
        <h2 class="section-title">Tallas de Jugadores</h2>
        <a href="/jugador-talla/nuevo" class="btn">
            <i class="fas fa-plus mr-2"></i>Agregar Nueva Talla
        </a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Jugador</th>
                    <th>Talla Zapatos</th>
                    <th>Talla Short</th>
                    <th>Talla Franelilla</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tallas as $t): ?>
                <tr>
                    <td><?= $t['id_jugador_talla'] ?></td>
                    <td><?= $t['nombre_apellido'] ?></td>
                    <td><?= $t['talla_zapato'] ?></td>
                    <td><?= $t['talla_short'] ?></td>
                    <td><?= $t['talla_franelilla'] ?></td>
                    <td class="action-buttons">
                        <a href="/jugador-talla/editar/<?= $t['id_jugador_talla'] ?>" class="btn btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="/jugador-talla/eliminar/<?= $t['id_jugador_talla'] ?>" 
                           class="btn btn-sm btn-danger" 
                           onclick="return confirm('¿Seguro que deseas eliminar esta talla?')">
                           <i class="fas fa-trash"></i> Eliminar
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>