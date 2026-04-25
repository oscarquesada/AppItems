<?php
// src/routes/items-delete.php

require_once __DIR__ . '/../models/Item.php';

use App\Models\Item;

$id = $_POST['id'] ?? null;

if ($id !== null && ctype_digit((string) $id)) {
    Item::destroy((int) $id);
}

header('Location: /AppItems/items?msg=deleted');
exit;