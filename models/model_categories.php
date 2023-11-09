<?php
include_once __DIR__ . '/model_bd_connection.php';
function getCategories() {
    $connection = getConnection();

    if(!$connection)
    {
        die("Error en la conexión con la bd.");
    }
    // Conexión a la base de datos
    $query_result = pg_query($connection, 'SELECT * FROM categoria');


    $categorias = array();
    while ($fila = pg_fetch_assoc($query_result)) {
        $categorias[] = $fila;
    }
    
    pg_close($connection);

    return $categorias;
}
?>