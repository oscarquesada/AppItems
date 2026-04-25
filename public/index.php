<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/config/database.php';

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$path = parse_url($requestUri, PHP_URL_PATH);

$path = preg_replace('#^/AppItems(/public)?#', '', $path);
$path = '/' . ltrim((string)$path, '/');

if ($path === '//') {
    $path = '/';
}

// GET / → Dashboard dinámico
if ($method === 'GET' && $path === '/') {
    require __DIR__ . '/../src/routes/home.php';
    exit;
}

// GET /health → JSON healthcheck
if ($method === 'GET' && $path === '/health') {
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(200);

    echo json_encode([
        'status'      => 'ok',
        'timestamp'   => date('Y-m-d H:i:s'),
        'php_version' => phpversion(),
        'server'      => $_SERVER['SERVER_SOFTWARE'] ?? 'Apache'
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

    exit;
}

// GET /items/new → Formulario crear item
if ($method === 'GET' && $path === '/items/new') {
    $errors = [];
    $old = [
        'name' => '',
        'qty' => '',
        'price' => ''
    ];

    require __DIR__ . '/../src/views/create-item.php';
    exit;
}

// GET /items/edit → Formulario editar item
if ($method === 'GET' && $path === '/items/edit') {
    require __DIR__ . '/../src/routes/items-edit.php';
    exit;
}

// POST /items/update → Actualizar item
if ($method === 'POST' && $path === '/items/update') {
    require __DIR__ . '/../src/routes/items-update.php';
    exit;
}

// GET /items y POST /items
if ($path === '/items') {
    require __DIR__ . '/../src/routes/items.php';
    exit;
}

// POST /items/delete
if ($method === 'POST' && $path === '/items/delete') {
    require __DIR__ . '/../src/routes/items-delete.php';
    exit;
}

// GET /users/new
if ($method === 'GET' && $path === '/users/new') {
    readfile(__DIR__ . '/users.html');
    exit;
}

// POST /users
if ($method === 'POST' && $path === '/users') {
    require __DIR__ . '/../src/routes/users.php';
    exit;
}

// 404
header('Content-Type: application/json; charset=utf-8');
http_response_code(404);

echo json_encode([
    'error' => 'Not Found',
    'path'  => $path
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);