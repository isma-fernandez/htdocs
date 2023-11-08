<?php
    include_once __DIR__ . '/../models/model_bd_connection.php';
    include_once __DIR__ . '/../models/model_categories.php';
    $connection = getConnection();
    if(!$connection)
    {
        die("Error en la conexión con la bd.");
    }
    $categorias = getCategories($connection);
    echo json_encode($categorias);

    ?>