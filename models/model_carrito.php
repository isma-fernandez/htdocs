<?php
    include_once __DIR__ . '/../models/model_bd_connection.php';
    function realitzaCompra($id_client, $id_productes, $quantities)
    {

        $connection = getConnection();

        if(!$connection)
        {
            die("Error en la connexió amb la bd.");
        }
        $sql_venda = "INSERT INTO venda (id_client, data_compra) 
        VALUES ($1, current_timestamp)";
        $params = [$id_client];
        $result = pg_query_params($connection, $sql_venda, $params);
        
        $sql_venda_id = "SELECT * FROM venda WHERE id_client = $1 ORDER BY data_compra DESC LIMIT 1";
        $params = [$id_client];
        error_log($id_client, 0);
        $result = pg_query_params($connection, $sql_venda_id, $params);
        $rows = pg_fetch_all($result);
        $id_venda = $rows[0]['id'];
        
        for($i=0; $i < count($id_productes); $i += 1)
        {
            $sql_venda_producte = "INSERT INTO venda_producte (id_venda, id_producte, quantitat)
            VALUES ($1, $2, $3)";
            $prod = $id_productes[$i];
            $quant = $quantities[$i];
            $params = [$id_venda, $prod, $quant];
            $result = pg_query_params($connection, $sql_venda_producte, $params);
            if(!$result)
            {
                $resposta = "ERROR!";
                die("ERROR PUJANT ELS PRODUCTES: ");
            }
        }
        $resposta = "1";
        return $resposta;
    }
?>