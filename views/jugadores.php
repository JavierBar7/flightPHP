<div class="main-content">
    <?php if (isset($_SESSION['user']) && $_SESSION['user']['rol'] === 'admin'): ?>
        <div class="mb-4">
            <a href="/jugador/nuevo" class="btn">
                <i class="fas fa-plus mr-2"></i>Agregar nuevo jugador
            </a>
        </div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cédula</th>
                    <th>Nombre y Apellido</th>
                    <th>Dirección</th>
                    <th>Goles</th>
                    <th>Faltas</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jugadores as $j): ?>
                <tr>
                    <td><?= $j['id_jugador'] ?></td>
                    <td><?= $j['cedula'] ?></td>
                    <td><?= $j['nombre_apellido'] ?></td>
                    <td><?= $j['direccion'] ?></td>
                    <td class="text-center"><?= $j['goles_anotados'] ?></td>
                    <td class="text-center"><?= $j['faltas_cometidas'] ?></td>
                    <td class="action-buttons">
                        <a href="/jugador/editar/<?= $j['id_jugador'] ?>" class="btn btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="/jugador/eliminar/<?= $j['id_jugador'] ?>" 
                           class="btn btn-sm btn-danger" 
                           onclick="return confirm('¿Seguro que deseas eliminar este jugador?')">
                           <i class="fas fa-trash"></i> Eliminar
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>