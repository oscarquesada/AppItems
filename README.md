# 🧩 AppItems

Aplicación web CRUD para gestión de items desarrollada en **PHP sin framework**, utilizando **Eloquent ORM** para la persistencia de datos y **Bootstrap** para la interfaz de usuario.

Incluye un **dashboard dinámico**, validaciones del lado del servidor y soporte para **modo claro/oscuro**.

---

## 🚀 Características

- 📦 CRUD completo de items (Crear, Leer, Actualizar, Eliminar)
- 📊 Dashboard con métricas en tiempo real
- 🔍 Búsqueda dinámica en tabla
- 🎨 Interfaz moderna con Bootstrap
- 🌙 Modo oscuro / claro (persistente)
- ✅ Validaciones de formulario en backend
- ⚡ Arquitectura sin framework (router manual + vistas)
- 🗂 Uso de Eloquent ORM (Active Record)

---

## 🛠️ Tecnologías utilizadas

- PHP 8+
- MySQL
- Eloquent ORM (Illuminate Database)
- Bootstrap 5
- JavaScript (Vanilla)
- Composer

---

## 📁 Estructura del proyecto

## 📁 Estructura del proyecto

```txt
AppItems/
│
├── public/
│   ├── index.php          # Router principal / front controller
│   └── .htaccess          # Configuración de Apache
│
├── src/
│   ├── config/
│   │   └── database.php   # Conexión a MySQL con Eloquent
│   │
│   ├── models/
│   │   └── Item.php       # Modelo Item
│   │
│   ├── routes/
│   │   ├── home.php
│   │   ├── items.php
│   │   ├── items-edit.php
│   │   ├── items-update.php
│   │   ├── items-delete.php
│   │
│   ├── validators/
│   │   └── itemvalidator.php
│   │
│   └── views/
│       ├── layout.php
│       ├── home.php
│       ├── items.php
│       ├── create-item.php
│       └── edit-item.php
│
├── vendor/
├── composer.json
├── composer.lock
└── README.md

## 🌙 Modo oscuro

La aplicación incluye un sistema de cambio de tema:

- Persistente con `localStorage`
- Afecta toda la UI
- Adaptación completa de tablas, cards y formularios

---

## 💡 Mejoras futuras

- Paginación
- API REST completa
- Autenticación de usuarios
- Filtros avanzados
- Gráficos (Chart.js)
- Deploy online