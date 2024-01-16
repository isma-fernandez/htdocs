<?php

include_once __DIR__ . '/../models/model_comandes.php';
include_once __DIR__ . '/../models/model_usuari.php';

$usuari = getUserInfo($_SESSION['email']);
$comandes = getComandes($usuari['id']);

$htmls = [];


foreach($comandes as $comanda)
{
    $html_comanda = [];
    $date = date_create($comanda[0]);
    $html = '<p class="data-comanda">' . date_format($date,"Y/m/d - H:i") . '</p>';
    array_push($html_comanda, $html);
    $precio_total = 0;
    for($i = 0; $i < count($comanda[1]); $i += 1)
    {
        $html = '
        <div class="producte-comanda-container">
            <img class="imatge-comanda" width=200 src="../img/'. $comanda[1][$i]['img'] . '" alt="no va">
            <div class="info-comanda">
                <h3 class="titol-comanda">Titol: ' . $comanda[1][$i]['titulo'] . '</h3> 
                <p class="preu-comanda">Preu: ' . $comanda[1][$i]['precio']*$comanda[2][$i] . ' €</p>
                <p name="quantity" class="quantity-comanda">' . $comanda[2][$i] . '</p>
            </div>
        </div>';
        $precio_total += $comanda[1][$i]['precio']*$comanda[2][$i];
        array_push($html_comanda, $html);
    }
    $html = '<p class="preu-comanda"> Preu total: ' . $precio_total . ' €</p>';
    array_push($html_comanda, $html);
    array_push($htmls, $html_comanda);
}


include __DIR__ . '/../vistes/vista_comandes.php';

?>