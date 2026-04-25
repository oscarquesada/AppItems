<?php
// src/routes/items-edit.php

require_once __DIR__ . '/../models/Item.php';

use App\Models\Item;

$id = $_GET['id'] ?? null;

if ($id === null || !ctype_digit((string) $id)) {
    header('Location: /AppItems/items');
    exit;
}

$item = Item::find((int) $id);

if (!$item) {
    header('Location: /AppItems/items');
    exit;
}

$errors = [];

$old = [
    'id'    => $item->id,
    'name'  => $item->name,
    'qty'   => $item->qty,
    'price' => $item->price
];

require __DIR__ . '/../views/edit-item.php';
exit;