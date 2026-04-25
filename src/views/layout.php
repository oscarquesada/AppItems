<?php
$title = $title ?? 'Práctica ORM';
$content = $content ?? '';
$scripts = $scripts ?? '';
?>

<!DOCTYPE html>
<html lang="es" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --color-navbar: #1E293B;
            --color-bg: #F8FAFC;
            --color-card: #FFFFFF;
            --color-primary: #3B82F6;
            --color-success: #22C55E;
            --color-text: #0F172A;
            --color-muted: #64748B;
            --color-border: #E2E8F0;
            --color-table-hover: #F1F5F9;
        }

        [data-theme="dark"] {
            --color-navbar: #020617;
            --color-bg: #0F172A;
            --color-card: #1E293B;
            --color-primary: #60A5FA;
            --color-success: #22C55E;
            --color-text: #E5E7EB;
            --color-muted: #94A3B8;
            --color-border: #334155;
            --color-table-hover: #263449;
        }

        body {
            background-color: var(--color-bg);
            color: var(--color-text);
            transition: background-color .2s ease, color .2s ease;
        }

        .navbar-custom {
            background-color: var(--color-navbar);
            box-shadow: 0 2px 8px rgba(0,0,0,.18);
        }

        .navbar-brand {
            font-weight: 700;
        }

        .nav-link {
            color: #CBD5E1 !important;
        }

        .nav-link:hover {
            color: #FFFFFF !important;
        }

        .card {
            background-color: var(--color-card);
            color: var(--color-text);
            border: 1px solid var(--color-border);
            border-radius: 14px;
        }

        .card-header {
            background-color: var(--color-card) !important;
            color: var(--color-text);
            border-bottom: 1px solid var(--color-border);
        }

        .text-muted {
            color: var(--color-muted) !important;
        }

        .btn-primary {
            background-color: var(--color-primary);
            border-color: var(--color-primary);
        }

        .btn-primary:hover {
            background-color: #2563EB;
            border-color: #2563EB;
        }

        .btn-success {
            background-color: var(--color-success);
            border-color: var(--color-success);
        }

        .btn-success:hover {
            background-color: #16A34A;
            border-color: #16A34A;
        }

        .table {
            color: var(--color-text);
        }

        .table-custom {
            --bs-table-bg: var(--color-card);
            --bs-table-color: var(--color-text);
            --bs-table-border-color: var(--color-border);
            --bs-table-hover-bg: var(--color-table-hover);
            --bs-table-hover-color: var(--color-text);
        }

        .table-custom thead th {
            background-color: var(--color-navbar) !important;
            color: #FFFFFF !important;
            border-color: var(--color-border) !important;
        }

        .table-custom tbody td {
            background-color: var(--color-card) !important;
            color: var(--color-text) !important;
            border-color: var(--color-border) !important;
        }

        .table-light {
            --bs-table-bg: var(--color-table-hover);
            --bs-table-color: var(--color-text);
        }

        .form-control {
            background-color: var(--color-card);
            color: var(--color-text);
            border-color: var(--color-border);
        }

        .form-control::placeholder {
            color: var(--color-muted);
        }

        .form-control:focus {
            background-color: var(--color-card);
            color: var(--color-text);
            border-color: var(--color-primary);
            box-shadow: 0 0 0 .2rem rgba(59, 130, 246, .25);
        }

        .theme-toggle {
            border: 1px solid #CBD5E1;
            color: white;
            background: transparent;
            border-radius: 20px;
            padding: 6px 12px;
            font-size: 14px;
        }

        .theme-toggle:hover {
            background: rgba(255,255,255,.12);
        }

        .bg-soft-blue { background: #eaf3ff; color: #0d6efd; }
        .bg-soft-green { background: #e9f8ef; color: #198754; }
        .bg-soft-orange { background: #fff3df; color: #f59f00; }
        .bg-soft-purple { background: #f3e9ff; color: #8e44ff; }

        .card-soft-blue { background: #f4f9ff; border: 1px solid #d9ecff; }
        .card-soft-green { background: #f2fbf6; border: 1px solid #d8f3e3; }
        .card-soft-purple { background: #faf5ff; border: 1px solid #eadcff; }

        [data-theme="dark"] .card-soft-blue,
        [data-theme="dark"] .card-soft-green,
        [data-theme="dark"] .card-soft-purple {
            background-color: var(--color-card) !important;
            border-color: var(--color-border) !important;
        }

        [data-theme="dark"] .bg-soft-blue,
        [data-theme="dark"] .bg-soft-green,
        [data-theme="dark"] .bg-soft-orange,
        [data-theme="dark"] .bg-soft-purple {
            background-color: #334155 !important;
            color: #E5E7EB !important;
        }

        [data-theme="dark"] a.text-dark {
            color: #E5E7EB !important;
        }

        [data-theme="dark"] .modal-content {
            background-color: var(--color-card);
            color: var(--color-text);
            border-color: var(--color-border);
        }

        [data-theme="dark"] .modal-header,
        [data-theme="dark"] .modal-footer {
            border-color: var(--color-border);
        }
    </style>
</head>


<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-4">
    <div class="container">
        <a class="navbar-brand text-white" href="/AppItems/">App Items</a>

        <div class="navbar-nav me-auto">
            <a class="nav-link" href="/AppItems/">Inicio</a>
            <a class="nav-link" href="/AppItems/items">Items</a>
            <a class="nav-link" href="/AppItems/items/new">Nuevo item</a>
            <a class="nav-link" href="/AppItems/health">Health</a>
        </div>

        <button id="themeToggle" class="theme-toggle" type="button">
            🌙 Modo oscuro
        </button>
    </div>
</nav>

<main class="container">
    <?= $content ?>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const html = document.documentElement;
    const button = document.getElementById('themeToggle');

    const savedTheme = localStorage.getItem('theme') || 'light';
    html.setAttribute('data-theme', savedTheme);

    function updateButtonText() {
        button.textContent = html.getAttribute('data-theme') === 'dark'
            ? '☀️ Modo claro'
            : '🌙 Modo oscuro';
    }

    updateButtonText();

    button.addEventListener('click', function () {
        const currentTheme = html.getAttribute('data-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

        html.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        updateButtonText();
    });
</script>

<?= $scripts ?>

<footer class="text-center mt-5 mb-3">
    <small class="text-muted">
        © <?= date('Y') ?> · 
        <a href="https://github.com/oscarquesada" target="_blank" style="text-decoration: none;">
            Oscar Quesada
        </a>
    </small>
</footer>

</body>
</html>