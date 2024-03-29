<?php
include_once __DIR__ . '/../models/model_productes.php';

$a = $_GET['a'] ?? NULL;
$id = $_GET['id'] ?? NULL;


switch($a)
{
    case 'productes':
        $productes = getProductes();
        $html = array();
        foreach($productes as $fila)
        {
            $html_element = '
            <div class="producte-container" onClick=detallProducte(this)>
                <h3 class="titol-producte">' . $fila['titulo'] . '</h3>
                <img class="imatge-producte" src="/img/'. $fila['img'] . '" alt="">
                <p class="preu-producte">' . $fila['precio'] . '€</p>
            </div>';
            array_push($html, $html_element);
        }
        break;
    case 'categoriaid':
        $productes = getProductesByCategory($id);
        $html = array();
        foreach($productes as $fila)
        {
            $html_element = '
            <div class="producte-container" onClick=detallProducte(this)>
                <h3 class="titol-producte">' . $fila['titulo'] . '</h3>
                <img class="imatge-producte" src="/img/'. $fila['img'] . '" alt="">
                <p class="preu-producte">' . $fila['precio'] . '€</p>
            </div>';
            array_push($html, $html_element);
        }
        break;
    case 'productedetall':
        $productes = getProducteByNom($id);
        $html = array();
        foreach($productes as $fila)
        {
            $html_element = '
            <div class="producte-detall-container">
                <h3 class="titol-producte" id="titol-prod">' . $fila['titulo'] . '</h3>
                <img class="imatge-producte" src="/img/'. $fila['img'] . '" alt="">
                    <div class="producte-descripcio">
                    <p class="descripcio">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum odio assumenda facilis praesentium incidunt. Nam labore laboriosam, ut sit voluptas, vitae deleniti atque expedita placeat aut mollitia veniam repudiandae excepturi.
                     Provident dolores alias accusantium aperiam repudiandae dolor quis voluptatibus. Autem veritatis ullam suscipit sit voluptatum aspernatur vero beatae possimus sequi eligendi, vel totam consequuntur excepturi ratione veniam harum dignissimos illo.</p>
                </div>
                <p class="preu-producte">' . $fila['precio'] . '€</p>
                <button class="boto-afegir-carrito" onclick="actualizarCesta(document.getElementById(\'titol-prod\').innerHTML, document.getElementById(\'quantity\').value)">Afegir al cabàs</button>
                <select name="quantity" id="quantity">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <div id="contenido-cesta"></div>
            </div>';
            array_push($html, $html_element);
        }
        break;
}


echo json_encode($html);

?>