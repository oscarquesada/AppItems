<?php
$title = 'Nuevo item';

$errors = $errors ?? [];
$old = $old ?? [
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
                    <h1 class="card-title mb-1">Crear nuevo item</h1>
                    <p class="text-muted mb-4">Completá los datos para registrar un nuevo item.</p>

                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            Revisá los campos marcados en rojo.
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="/AppItems/items">

                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input 
                                type="text" 
                                name="name" 
                                class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                                value="<?= htmlspecialchars((string) $old['name']) ?>"
                            >

                            <?php if (isset($errors['name'])): ?>
                                <div class="invalid-feedback">
                                    <?= htmlspecialchars($errors['name'][0]) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Cantidad</label>
                            <input 
                                type="number" 
                                name="qty" 
                                class="form-control <?= isset($errors['qty']) ? 'is-invalid' : '' ?>"
                                value="<?= htmlspecialchars((string) $old['qty']) ?>"
                            >

                            <?php if (isset($errors['qty'])): ?>
                                <div class="invalid-feedback">
                                    <?= htmlspecialchars($errors['qty'][0]) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Precio</label>
                            <input 
                                type="text" 
                                name="price" 
                                class="form-control <?= isset($errors['price']) ? 'is-invalid' : '' ?>"
                                value="<?= htmlspecialchars((string) $old['price']) ?>"
                            >

                            <?php if (isset($errors['price'])): ?>
                                <div class="invalid-feedback">
                                    <?= htmlspecialchars($errors['price'][0]) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">
                                Guardar
                            </button>

                            <a href="/AppItems/items" class="btn btn-secondary">
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