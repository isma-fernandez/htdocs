<?php
session_start();

$a = $_GET['a'] ?? NULL;

if($a === 'add')
{
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Obtiene los parámetros GET
        $producto = $_GET['producto'] ?? '';
        $cantidad = $_GET['cantidad'] ?? 0;
    
        // Inicia la cesta si no existe
        if (!isset($_SESSION['cesta'])) {
            $_SESSION['cesta'] = [];
        }
    
        // Añade o actualiza el producto en la cesta
        $_SESSION['cesta'][$producto] = $cantidad;
        echo '<h1>' . $producto . '</h1><br><p>' . $cantidad . '</p>';
    }
}

elseif ($a === 'retrieve')
{
    if(!isset($_SESSION['cesta']))
    {
        echo '0';
    }else 
    {
        echo count($_SESSION['cesta']);
    }
}
elseif($a === 'netejar')
{
    if(isset($_SESSION['cesta']))
    {
        unset($_SESSION['cesta']);
    }
}elseif($a === 'eliminar')
{
    $producto = $_GET['producte'] ?? '';
    if($producto != '')
    {
        unset($_SESSION['cesta'][$producto]);
    }
}elseif($a === 'modify')
{
    $producto = $_GET['producte'] ?? '';
    $cantidad = $_GET['cantidad'] ?? 0;
    $price = $_GET['preu'] ?? 0;
    if($producto != '')
    {
        $initial_price = $price / $_SESSION['cesta'][$producto];
        $_SESSION['cesta'][$producto] = $cantidad;
        $result = ($initial_price*$cantidad);
        echo $result;
    }
}
/*
'<div class="producte-container" onClick=detallProducte(this)>
<h3 class="titol-producte">' . $fila['titulo'] . '</h3>
<img class="imatge-producte" src="/img/'. $fila['img'] . '" alt="">
<p class="preu-producte">' . $fila['precio'] . '€</p>
</div>'
*/

?>