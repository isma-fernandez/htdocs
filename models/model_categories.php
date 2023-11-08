<?php
// modelo.php
function getCategories($connection) {
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