<?php
include_once __DIR__ . '/model_bd_connection.php';

function login($email, $password)
{
    $connection = getConnection();

    if(!$connection)
    {
        die("Error en la connexió amb la bd.");
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = 'SELECT * FROM client WHERE mail = $1';
    $params = [$email];
    $result = pg_query_params($connection, $sql, $params);

    if($result)
    {
        $data = pg_fetch_assoc($result);
        if($data && password_verify($password, $data['contrasenya']))
        {
            return $data;
        }
        else
        {
            //TODO: CHANGE
            return false;
            die("Correu o contrasenya incorrecta.");
        }
    }
    else
    {
        return false;
    }

    
}
?>