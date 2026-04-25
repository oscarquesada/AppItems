<?php
// src/routes/home.php

require_once __DIR__ . '/../models/Item.php';

use App\Models\Item;

try {
    $items = Item::all();

    $totalItems = $items->count();

    $itemsActivos = $items->where('qty', '>', 0)->count();

    $stockTotal = $items->sum('qty');

    $valorTotal = $items->sum(function ($item) {
        return $item->qty * $item->price;
    });

    $ultimosItems = Item::orderBy('id', 'desc')
        ->limit(5)
        ->get();

    require __DIR__ . '/../views/home.php';
    exit;

} catch (\Throwable $e) {
    http_response_code(500);
    echo "Error al cargar el dashboard: " . htmlspecialchars($e->getMessage());
    exit;
}