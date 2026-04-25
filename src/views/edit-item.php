<?php
$title = 'Editar item';

$errors = $errors ?? [];
$old = $old ?? [
    'id' => '',
    'name' => '',
    'qty' => '',
    'price' => ''
];

ob_start();
?>

<div class="py-4">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h1 class="card-title mb-1">Editar item</h1>
                    <p class="text-muted mb-4">Modificá los datos del item seleccionado.</p>

                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <strong>Hay errores en el formulario:</strong>

                            <ul class="mb-0 mt-2">
                                <?php foreach ($errors as $error): ?>
                                    <li><?= htmlspecialchars($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="/AppItems/items/update">
                        <input type="hidden" name="id" value="<?= htmlspecialchars((string) $old['id']) ?>">

                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input 
                                type="text" 
                                name="name" 
                                class="form-control"
                                value="<?= htmlspecialchars((string) $old['name']) ?>"
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Cantidad</label>
                            <input 
                                type="number" 
                                name="qty" 
                                class="form-control"
                                value="<?= htmlspecialchars((string) $old['qty']) ?>"
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Precio</label>
                            <input 
                                type="text" 
                                name="price" 
                                class="form-control"
                                value="<?= htmlspecialchars((string) $old['price']) ?>"
                            >
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                Actualizar
                            </button>

                            <a href="/prog3-clase5/items" class="btn btn-secondary">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';