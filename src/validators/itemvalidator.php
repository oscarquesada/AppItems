<?php
// src/validators/itemvalidator.php

function validateItem(array $data): array {
    $errors = [];

    $name = isset($data['name']) ? trim($data['name']) : '';
    $qty = isset($data['qty']) ? trim($data['qty']) : '';
    $price = isset($data['price']) ? trim($data['price']) : '';

    $price = str_replace(',', '.', $price);

    // Nombre
    if ($name === '') {
        $errors[] = 'El campo Nombre es obligatorio.';
    } elseif (strlen($name) < 3) {
        $errors[] = 'El campo Nombre debe tener al menos 3 caracteres.';
    } elseif (strlen($name) > 100) {
        $errors[] = 'El campo Nombre no puede superar 100 caracteres.';
    }

    // Cantidad
    if ($qty === '') {
        $errors[] = 'El campo Cantidad es obligatorio.';
    } elseif (!ctype_digit($qty)) {
        $errors[] = 'El campo Cantidad debe ser un número entero.';
    } elseif ((int)$qty <= 0) {
        $errors[] = 'El campo Cantidad debe ser mayor que 0.';
    }

    // Precio
    if ($price === '') {
        $errors[] = 'El campo Precio es obligatorio.';
    } elseif (!is_numeric($price)) {
        $errors[] = 'El campo Precio debe ser un número válido.';
    } elseif ((float)$price < 0) {
        $errors[] = 'El campo Precio no puede ser negativo.';
    }

    return $errors;
}