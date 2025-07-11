<h2 class="section-title">Lista de Accesos</h2>
<?php if (isset($_SESSION['user']) && $_SESSION['user']['rol'] === 'admin'): ?>
    <a href="/acceso/nuevo" class="btn mb-4">Agregar Nuevo Usuario</a>
<?php endif; ?>

<div class="table-responsive">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($accesos as $a): ?>
        <tr>
            <td><?= $a['id'] ?></td>
            <td><?= $a['usuario'] ?></td>
            <td><?= $a['rol'] ?></td>
            <td>
                <a href="/acceso/editar/<?= $a['id'] ?>" class="btn">Editar</a>
                <a href="/acceso/eliminar/<?= $a['id'] ?>" 
                   class="btn btn-danger" 
                   onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
                   Eliminar
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
