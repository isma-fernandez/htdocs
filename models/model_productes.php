<?php
include_once __DIR__ . '/model_bd_connection.php';
function getProductes() {
    $connection = getConnection();

    if(!$connection)
    {
        die("Error en la conexión con la bd.");
    }
    // Conexión a la base de datos
    $query_result = pg_query($connection, 'SELECT * FROM producte');


    $productes = array();
    while ($fila = pg_fetch_assoc($query_result)) {
        $productes[] = $fila;
    }
    
    pg_close($connection);

    return $productes;
}

function getProductesByCategory($id_categoria)
{
    $connection = getConnection();

    if(!$connection)
    {
        die("Error en la conexión con la bd.");
    }
    // Conexión a la base de datos
    $sql = 'SELECT * FROM producte WHERE id_categoria = $1';
    $params = [$id_categoria];
    $query_result = pg_query_params($connection, $sql, $params);


    $productes = array();
    while ($fila = pg_fetch_assoc($query_result)) {
        $productes[] = $fila;
    }
    
    pg_close($connection);

    return $productes;
}

function getProducteByNom($nom)
{
    $connection = getConnection();

    if(!$connection)
    {
        die("Error en la conexión con la bd.");
    }
    // Conexión a la base de datos
    $sql = 'SELECT * FROM producte WHERE titulo = $1';
    $params = [$nom];
    $query_result = pg_query_params($connection, $sql, $params);
    

    $productes = array();
    while ($fila = pg_fetch_assoc($query_result)) {
        $productes[] = $fila;
    }
    
    pg_close($connection);

    return $productes;
}
?>