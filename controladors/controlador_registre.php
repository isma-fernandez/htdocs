<?php

if(session_status != 2)
{
    session_start();
}

include __DIR__ . "/../models/model_registre.php";

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

// controlador_registro.php  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoge los datos del formulario
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $poblacio = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    
    $valid_data = true;

    

    //fix nom i postal
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        debug_to_console("email baby");
        $valid_data = false;
    } elseif (!ctype_alnum($password)) 
    {
        debug_to_console("password baby");
        $valid_data = false;
    } elseif (strlen($adreca) > 30) 
    {
        debug_to_console("adreca baby");
        $valid_data = false;
    } elseif (strlen($poblacio) > 30) 
    {
        debug_to_console("poblacio baby");
        $valid_data = false;
    } 

    if($valid_data)
    {
        debug_to_console("true baby");
    }
    

    if(!$valid_data)
    {
        $resposta = "Les dades introduides no són vàlides.";
    }
    else
    {
        if(!emailExistent($email))
        {
            $resultat = registrarUsuari($nom, $email, $password, $address, $poblacio, $postalcode);
        
            if ($resultat) {
                    $resposta = "S'ha creat el compte correctament!";
                } else {
                    // Si hubo un error, muestra un mensaje de error
                    $resposta = 'Hi ha hagut un error al registrar el teu compte.';
                }
        }
        else
        {
            $resposta = "El correu ja existeix.";
        }
    }
        
}
include __DIR__ . "/../vistes/vista_registre.php";

    
?>