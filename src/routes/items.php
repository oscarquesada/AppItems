<?php
// src/routes/items.php

require_once __DIR__ . '/../validators/itemvalidator.php';
require_once __DIR__ . '/../models/Item.php';

use App\Models\Item;

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

// GET /items → mostrar tabla
if ($method === 'GET') {
    try {
        $items = Item::all();
        $msg = $_GET['msg'] ?? '';

        require __DIR__ . '/../views/items.php';
        exit;

    } catch (\Throwable $e) {
        http_response_code(500);
        echo "Error al traer los items: " . htmlspecialchars($e->getMessage());
        exit;
    }
}

// POST /items → guardar item
if ($method === 'POST') {
    $errors = validateItem($_POST);

    if (!empty($errors)) {
        $old = [
            'name'  => $_POST['name'] ?? '',
            'qty'   => $_POST['qty'] ?? '',
            'price' => $_POST['price'] ?? ''
        ];

        require __DIR__ . '/../views/create-item.php';
        exit;
    }

    try {
        $rawPrice = $_POST['price'] ?? '0';
        $cleanPrice = str_replace(',', '.', $rawPrice);

        Item::create([
            'name'  => trim($_POST['name']),
            'qty'   => (int) $_POST['qty'],
            'price' => (float) $cleanPrice
        ]);

        header('Location: /prog3-clase5/items?msg=created');
        exit;

    } catch (\Throwable $e) {
        http_response_code(500);
        echo "Error al guardar el item: " . htmlspecialchars($e->getMessage());
        exit;
    }
}

http_response_code(405);
echo "Método no permitido";