<?php
    include_once __DIR__ . '/../models/model_categories.php';

    $categorias = getCategories();
    foreach($categorias as &$fila)
    {
        $fila['nombre'] = htmlentities($fila['nombre'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $fila['id'] = htmlentities($fila['id'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
    echo json_encode($categorias);
    ?>