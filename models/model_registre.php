<?php
include_once __DIR__ . '/model_bd_connection.php';

function registrarUsuari($nom, $email, $password, $direccio, $poblacio, $postalcode)
{
    debug_to_console("true 2 baby");
    $connection = getConnection();

    if(!$connection)
    {
        die("Error en la connexió amb la bd.");
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    if(password_verify($password, $hash))
    {
        $sql = 'INSERT INTO client (nom_cognoms, mail, contrasenya, adreça, poblacio, codi_postal) VALUES ($1, $2, $3, $4, $5, $6)'; 
        $params = [$nom, $email, $hash, $direccio, $poblacio, $postalcode];
        $result = pg_query_params($connection, $sql, $params);
        return $result; ///true
    }
    else
    {
        die("Error en l'encriptació de la contrasenya.");
    }
}

function emailExistent($email)
{
    $connection = getConnection();

    if(!$connection)
    {
        die("Error en la connexió amb la bd.");
    }
    $sql = 'SELECT * FROM client WHERE mail = $1';
    
    $params = [$email];
    $result = pg_query_params($connection, $sql, $params);

    $rows = pg_fetch_all($result);

    return (!empty($rows));
}
?>
