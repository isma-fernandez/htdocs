<?php
include_once __DIR__ . '/model_bd_connection.php';

function getUserInfo($email)
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

    return $rows[0];
}

function modificaUsuari($id, $nom, $email, $address, $poblacio, $postalcode, $img)
{
    $connection = getConnection();

    if(!$connection)
    {
        die("Error en la connexió amb la bd.");
    }

    $sql = 'UPDATE client SET nom_cognoms = $1, mail = $2, adreça = $3, poblacio = $4, codi_postal = $5 WHERE id = $6';

    $params = [$nom, $email, $address, $poblacio, $postalcode, $id];

    $result = pg_query_params($connection, $sql, $params);

    if(!$result)
    {
        return $result;
    }


    if($img != null)
    {
        $sql = 'UPDATE client SET img=$1 WHERE id=$2';
        $params = [$img, $id];
        $result = pg_query_params($connection, $sql, $params) or die("Cannot execute query:");
    }

    return $result;
}
?>