<?php
$title = 'Dashboard';

ob_start();
?>

<style>
    .stat-card {
        border: 0;
        border-radius: 14px;
        box-shadow: 0 3px 12px rgba(0,0,0,.08);
        min-height: 115px;
    }

    .icon-box {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
    }

    .quick-card {
        border: 0;
        border-radius: 14px;
        box-shadow: 0 3px 12px rgba(0,0,0,.07);
        transition: .2s;
    }

    .quick-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(0,0,0,.12);
    }

    .bg-soft-blue { background: #eaf3ff; color: #0d6efd; }
    .bg-soft-green { background: #e9f8ef; color: #198754; }
    .bg-soft-orange { background: #fff3df; color: #f59f00; }
    .bg-soft-purple { background: #f3e9ff; color: #8e44ff; }

    .card-soft-blue { background: #f4f9ff; border: 1px solid #d9ecff; }
    .card-soft-green { background: #f2fbf6; border: 1px solid #d8f3e3; }
    .card-soft-purple { background: #faf5ff; border: 1px solid #eadcff; }
</style>

<h1 class="mb-1 fw-bold">Dashboard</h1>
<p class="text-muted mb-4">Resumen general de tu aplicación</p>

<div class="row g-4 mb-4">

    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box bg-soft-blue">📦</div>
                    <div>
                        <h4 class="mb-0 fw-bold"><?= htmlspecialchars((string) $totalItems) ?></h4>
                        <small class="text-muted">Items totales</small>
                    </div>
                </div>
                <a href="/prog3-clase5/items" class="small text-decoration-none d-block mt-3">Ver todos</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box bg-soft-green">➕</div>
                    <div>
                        <h4 class="mb-0 fw-bold"><?= htmlspecialchars((string) $itemsActivos) ?></h4>
                        <small class="text-muted">Items activos</small>
                    </div>
                </div>
                <a href="/prog3-clase5/items" class="small text-decoration-none d-block mt-3">Ver todos</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box bg-soft-orange">💰</div>
                    <div>
                        <h4 class="mb-0 fw-bold">$<?= number_format((float) $valorTotal, 2, ',', '.') ?></h4>
                        <small class="text-muted">Valor total</small>
                    </div>
                </div>
                <a href="/prog3-clase5/items" class="small text-decoration-none d-block mt-3">Ver detalles</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card stat-card">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box bg-soft-purple">📊</div>
                    <div>
                        <h4 class="mb-0 fw-bold"><?= htmlspecialchars((string) $stockTotal) ?></h4>
                        <small class="text-muted">Stock total</small>
                    </div>
                </div>
                <a href="/prog3-clase5/items" class="small text-decoration-none d-block mt-3">Ver todos</a>
            </div>
        </div>
    </div>

</div>

<h5 class="mb-3 fw-bold">Accesos rápidos</h5>

<div class="row g-3 mb-4">

    <div class="col-md-4">
        <a href="/AppItems/items" class="text-decoration-none text-dark">
            <div class="card quick-card card-soft-blue">
                <div class="card-body d-flex align-items-center justify-content-between py-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-box bg-soft-blue">📋</div>
                        <div>
                            <strong>Ver Items</strong>
                            <p class="text-muted mb-0 small">Ir a la lista completa</p>
                        </div>
                    </div>
                    <span class="text-primary fs-4">›</span>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="/AppItems/items/new" class="text-decoration-none text-dark">
            <div class="card quick-card card-soft-green">
                <div class="card-body d-flex align-items-center justify-content-between py-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-box bg-soft-green">➕</div>
                        <div>
                            <strong>Nuevo Item</strong>
                            <p class="text-muted mb-0 small">Crear un nuevo registro</p>
                        </div>
                    </div>
                    <span class="text-success fs-4">›</span>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="/AppItems/health" class="text-decoration-none text-dark">
            <div class="card quick-card card-soft-purple">
                <div class="card-body d-flex align-items-center justify-content-between py-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-box bg-soft-purple">💜</div>
                        <div>
                            <strong>Healthcheck</strong>
                            <p class="text-muted mb-0 small">Ver estado del sistema</p>
                        </div>
                    </div>
                    <span class="fs-4">›</span>
                </div>
            </div>
        </a>
    </div>

</div>

<div class="row g-4">

    <div class="col-md-8">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white fw-bold">
                Actividad reciente
            </div>

            <div class="card-body p-0">
                <table class="table table-sm align-middle mb-0 table-custom">
                    <thead>
                        <tr>
                            <th class="ps-3">ID</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($ultimosItems as $item): ?>
                            <tr>
                                <td class="ps-3"><?= htmlspecialchars((string) $item->id) ?></td>
                                <td><?= htmlspecialchars((string) $item->name) ?></td>
                                <td><?= htmlspecialchars((string) $item->qty) ?></td>
                                <td>$<?= number_format((float) $item->price, 2, ',', '.') ?></td>
                                <td>$<?= number_format((float) ($item->qty * $item->price), 2, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>

                        <?php if ($ultimosItems->count() === 0): ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">
                                    No hay actividad reciente.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0 rounded-3 card-soft-blue h-100">
            <div class="card-body">
                <h6 class="fw-bold">Información</h6>
                <p class="text-muted mb-0 small">
                    Aplicación desarrollada con PHP, MySQL, Eloquent ORM y Bootstrap.
                </p>
            </div>
        </div>
    </div>

</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';