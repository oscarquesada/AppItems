<?php
// src/routes/items-update.php

require_once __DIR__ . '/../validators/itemvalidator.php';
require_once __DIR__ . '/../models/Item.php';

use App\Models\Item;

$id = $_POST['id'] ?? null;

if ($id === null || !ctype_digit((string) $id)) {
    header('Location: /AppItems/items');
    exit;
}

$item = Item::find((int) $id);

if (!$item) {
    header('Location: /AppItems/items');
    exit;
}

$errors = validateItem($_POST);

if (!empty($errors)) {
    $old = [
        'id'    => $id,
        'name'  => $_POST['name'] ?? '',
        'qty'   => $_POST['qty'] ?? '',
        'price' => $_POST['price'] ?? ''
    ];

    require __DIR__ . '/../views/edit-item.php';
    exit;
}

$rawPrice = $_POST['price'] ?? '0';
$cleanPrice = str_replace(',', '.', $rawPrice);

$item->name = trim($_POST['name']);
$item->qty = (int) $_POST['qty'];
$item->price = (float) $cleanPrice;

$item->save();

header('Location: /AppItems/items?msg=updated');
exit;