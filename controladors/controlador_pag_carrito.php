<?php
session_start();

include_once __DIR__ . '/../models/model_productes.php';

if(!isset($_SESSION['cesta']))
{
    $carrito = [];
}else
{
    $carrito = [];
    foreach ($_SESSION['cesta'] as $prod => $cant) {
        $select_options = [];
        for($i=1;$i < 6; $i=$i+1)
        {
            if($i == $cant)
            {
                array_push($select_options, '<option value="' . $i . '" selected>' . $i . '</option>');
            } 
            else 
            {
                array_push($select_options, '<option value="' . $i . '">' . $i . '</option>');
            }
        }
        $product = getProducteByNom($prod);
        $html = '<div class="producte-carrito-container" id="producte-carrito-container-'.$product[0]['id'].'">
        <img class="imatge-carrito" width=200 src="../img/'. $product[0]['img'] . '" alt="no va">
        <div id="'.$product[0]['id'].'" class="info-carrito">
        <h3 class="titol-carrito">' . $prod . '</h3> 
        <p class="preu-carrito" id="preu-carrito-' . $product[0]['id'] . '">' . $product[0]['precio']*$cant . '</p>
       <select name="quantity" id="quantity-' . $product[0]['id'] . '" class="quantity-carrito" onchange="modificarElementCarrito(event)" value="'. $cant .'">
        '. $select_options[0] . $select_options[1] . $select_options[2] . $select_options[3] . $select_options[4] . '
        </select>
        <button type="button" id="myButton" class="btn" onClick="esborrarElementCarrito(event)">Eliminar</button>
        </div>
         </div>';
        array_push($carrito, $html);
    }
}

/*
'<div class="producte-container" onClick=detallProducte(this)>
<h3 class="titol-producte">' . $fila['titulo'] . '</h3>
<img class="imatge-producte" src="/img/'. $fila['img'] . '" alt="">
<p class="preu-producte">' . $fila['precio'] . '€</p>
</div>'
*/

include __DIR__ . '/../vistes/vista_carrito.php';

?>