<?php

# CHANGE NULL FOR #
$accio = $_GET['accio'] ?? NULL;
session_start();
switch ($accio) {
    case 'registre':
        include __DIR__ . '/recurs_registre.php';
        break;
    case 'login':
        include __DIR__ . '/recurs_login.php';
        break;
    case 'logout':
        unset($_SESSION['email']);
        unset($_SESSION['nom']);
        include __DIR__ . '/recurs_main.php';
        break;
    case 'user':
        include __DIR__ . '/recurs_client.php';
        break;
    case 'productes':
        include __DIR__ . '/controladors/controlador_productes.php';
        break;
    case 'cart':
        include __DIR__ . '/recurs_carrito.php';
        break;
    case 'pedidos':
        include __DIR__ . '/recurs_comandes.php';
        break;
    default:
        include __DIR__ . '/recurs_main.php';
}

?>