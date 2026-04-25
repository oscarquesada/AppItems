<?php

function validateItem(array $data): array {
    $errors = [];

    $name = isset($data['name']) ? trim($data['name']) : '';
    $qty = isset($data['qty']) ? trim($data['qty']) : '';
    $price = isset($data['price']) ? trim($data['price']) : '';

    $price = str_replace(',', '.', $price);

    // Nombre
    if ($name === '') {
        $errors['name'][] = 'El nombre es obligatorio.';
    } elseif (strlen($name) < 3) {
        $errors['name'][] = 'Debe tener al menos 3 caracteres.';
    } elseif (!preg_match('/[a-zA-ZáéíóúÁÉÍÓÚñÑ]/', $name)) {
        $errors['name'][] = 'Debe contener al menos una letra.';
    }

    // Cantidad
    if ($qty === '') {
        $errors['qty'][] = 'La cantidad es obligatoria.';
    } elseif (!ctype_digit($qty)) {
        $errors['qty'][] = 'Debe ser un número entero.';
    } elseif ((int)$qty <= 0) {
        $errors['qty'][] = 'Debe ser mayor a 0.';
    }

    // Precio
    if ($price === '') {
        $errors['price'][] = 'El precio es obligatorio.';
    } elseif (!is_numeric($price)) {
        $errors['price'][] = 'Debe ser un número válido.';
    } elseif ((float)$price < 0) {
        $errors['price'][] = 'No puede ser negativo.';
    }

    return $errors;
}