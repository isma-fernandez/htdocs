<?php
include_once __DIR__ . '/../models/model_productes.php';

$a = $_GET['a'] ?? NULL;
$id = $_GET['id'] ?? NULL;

if ($a === 'productes')
{
    $productes = getProductes();
    $html = array();
    foreach($productes as $fila)
    {
        $html_element = '<div class="producte-container" onClick=detallProducte(this)>
        <h3 class="titol-producte">' . $fila['titulo'] . '</h3>
        <img class="imatge-producte" src="/img/'. $fila['img'] . '" alt="">
        <p class="preu-producte">' . $fila['precio'] . '€</p>
        </div>';
        array_push($html, $html_element);
    }
}
elseif ($a === "categoriaid")
{
    $productes = getProductesByCategory($id);
    $html = array();
    foreach($productes as $fila)
    {
        $html_element = '<div class="producte-container" onClick=detallProducte(this)>
        <h3 class="titol-producte">' . $fila['titulo'] . '</h3>
        <img class="imatge-producte" src="/img/'. $fila['img'] . '" alt="">
        <p class="preu-producte">' . $fila['precio'] . '€</p>
        </div>';
        array_push($html, $html_element);
    }
}
elseif ($a === "productedetall")
{
    $productes = getProducteByNom($id);
    $html = array();
    foreach($productes as $fila)
    {
        $html_element = '<div class="producte-container">
        <h3 class="titol-producte">' . $fila['titulo'] . '</h3>
        <img class="imatge-producte" src="/img/'. $fila['img'] . '" alt="">
        <p class="preu-producte">' . $fila['precio'] . '€</p>
        </div>';
        array_push($html, $html_element);
    }
}

echo json_encode($html);

?>