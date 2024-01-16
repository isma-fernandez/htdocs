<?php
if(session_status() != 2)
{
    session_start(); 
}

include_once __DIR__ . '/../models/model_productes.php';

$html = '';
$quantity = 0;
$total = 0;
$default_productes = "Encara no has afegit cap producte.";
if(isset($_SESSION['email']))
{
    if(!isset($_SESSION['cesta']))
    {
        $html = '';
    }
    else
    {
        error_log("Error message\n", 3, "C:/Apache24/logs/test.log");
        $imgs = [];
        $imgs_html = '';
        $quantity = count($_SESSION['cesta']);
        foreach ($_SESSION['cesta'] as $prod => $cant) {
            $product = getProducteByNom($prod);   
            array_push($imgs, $product[0]['img']);
            $total +=  $product[0]['precio']*$cant;
        }
        if(count($imgs) > 7){
            $start_index = count($imgs) - 7;
            $end_index = count($imgs) - 1;
            $imgs = array_slice($imgs, $start_index, $end_index);
        }
        foreach($imgs as $img)
        {
            $imgs_html = $imgs_html . '<img class="imgs-items-footer" src="img/' . $img . '" alt="producte"/>';
        }
        
    
        $html = '
        <div id="carrito-footer-container">
        <p id="carrito-footer-titol">Resum de la compra</p>
        <p id="carrito-footer-quantitat">Quantitat de productes: ' . $quantity . ' </p>
        <p id="carrito-footer-total">Preu total: ' . $total . ' </p>
        <p id="carrito-footer-productes-titol">Últims productes afegits: </p>
        <div id="carrito-footer-productes-container">
            ' . $imgs_html . '
        </div>
        </div>';
    }
    
    echo $html;
}

?>