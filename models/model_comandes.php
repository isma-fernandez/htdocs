<?php

include_once __DIR__ . '/../models/model_bd_connection.php';
include __DIR__ . '/../models/model_productes.php';

function getComandes($id_client)
{

    $connection = getConnection();

    if(!$connection)
    {
        die("Error en la connexió amb la bd.");
    }

    $comandes = [];
    $sql = 'SELECT * FROM venda WHERE id_client = $1';

    $params = [$id_client];
    $query_result = pg_query_params($connection, $sql, $params);
    $rows = pg_fetch_all($query_result);
    for($i = 0; $i < count($rows); $i += 1)
    {
        $quantities = [];
        $productes = [];
        $comanda = [];
        array_push($comanda, $rows[$i]['data_compra']);
        $sql = 'SELECT * FROM venda_producte WHERE id_venda = $1';
        $params = [$rows[$i]['id']];
        $query_result = pg_query_params($connection, $sql, $params);
        $tiquet = pg_fetch_all($query_result);
        for($j = 0; $j < count($tiquet); $j += 1)
        {
            $sql = 'SELECT * FROM producte WHERE id = $1';
            $params = [$tiquet[$j]['id_producte']];
            $query_result = pg_query_params($connection, $sql, $params);
            $producte = pg_fetch_all($query_result);
            array_push($quantities, $tiquet[$j]['quantitat']);
            array_push($productes, $producte[0]);
        }
        array_push($comanda, $productes);
        array_push($comanda, $quantities);
        array_push($comandes, $comanda);
    } 
    return $comandes;
}

?>