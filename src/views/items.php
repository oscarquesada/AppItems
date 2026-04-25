<?php
$title = 'Items';

$msg = $msg ?? '';

ob_start();
?>

<div class="py-4">

<?php if ($msg === 'created'): ?>
    <div class="alert alert-success alert-dismissible fade show mb-4">
        Item creado correctamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php elseif ($msg === 'updated'): ?>
    <div class="alert alert-primary alert-dismissible fade show mb-4">
        Item actualizado correctamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php elseif ($msg === 'deleted'): ?>
    <div class="alert alert-warning alert-dismissible fade show mb-4">
        Item eliminado correctamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="mb-1">Lista de Items</h1>
        <p class="text-muted mb-0">CRUD visual usando Eloquent.</p>
    </div>

    <a href="/AppItems/items/new" class="btn btn-primary">
        + Nuevo item
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-4">

        <div class="mb-4">
            <input 
                type="text" 
                id="buscadorItems" 
                class="form-control" 
                placeholder="Buscar por nombre, cantidad o precio..."
            >
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 table-custom">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>

                <tbody id="tablaItems">
                    <?php foreach ($items as $item): ?>
                        <tr>
                            <td><?= $item->id ?></td>
                            <td><?= htmlspecialchars($item->name) ?></td>
                            <td><?= $item->qty ?></td>
                            <td>$<?= number_format($item->price, 2, ',', '.') ?></td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a 
                                        href="/AppItems/items/edit?id=<?= $item->id ?>" 
                                        class="btn btn-warning btn-sm"
                                    >
                                        Editar
                                    </a>

                                    <button 
                                        type="button" 
                                        class="btn btn-danger btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEliminar"
                                        data-id="<?= $item->id ?>"
                                        data-name="<?= htmlspecialchars($item->name) ?>"
                                    >
                                        Eliminar
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <?php if (count($items) === 0): ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                No hay items cargados.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

</div>

<!-- Modal -->
<div class="modal fade" id="modalEliminar" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="/AppItems/items/delete" class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title">Confirmar eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="id" id="itemIdEliminar">

                <p class="mb-0">
                    ¿Seguro que querés eliminar 
                    <strong id="itemNombreEliminar"></strong>?
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Cancelar
                </button>

                <button type="submit" class="btn btn-danger">
                    Eliminar
                </button>
            </div>

        </form>
    </div>
</div>

<?php
$content = ob_get_clean();

ob_start();
?>

<script>
    const modalEliminar = document.getElementById('modalEliminar');

    modalEliminar.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        document.getElementById('itemIdEliminar').value = button.getAttribute('data-id');
        document.getElementById('itemNombreEliminar').textContent = button.getAttribute('data-name');
    });

    const buscador = document.getElementById('buscadorItems');
    const filas = document.querySelectorAll('#tablaItems tr');

    buscador.addEventListener('keyup', function () {
        const texto = buscador.value.toLowerCase();

        filas.forEach(function (fila) {
            fila.style.display = fila.textContent.toLowerCase().includes(texto) ? '' : 'none';
        });
    });
</script>

<?php
$scripts = ob_get_clean();

require __DIR__ . '/layout.php';