<?php
    include_once __DIR__ . '/../models/model_categories.php';

    $categorias = getCategories();
    echo json_encode($categorias);
    ?>