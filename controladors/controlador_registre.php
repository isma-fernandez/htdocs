<?php

if(session_status() != 2)
{
    session_start();
}

include __DIR__ . "/../models/model_registre.php";
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

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


    $name_options = '/^[a-zA-Z\s]+$/';
    $postal_code_options = '/^\d{5}$/';

    debug_to_console("1");

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        $valid_data = false;
    } 
    if (!ctype_alnum($password)) 
    {
        $valid_data = false;
    } 
    if (strlen($address) > 30) 
    {
        $valid_data = false;
    } 
    if (strlen($poblacio) > 30) 
    {
        $valid_data = false;
    } 
    if(!filter_var($nom, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$name_options))))
    {
        $valid_data = false;
    }
    if(!preg_match($postal_code_options, $postalcode)) {
        $valid_data = false;
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
                    $_SESSION['email'] = $email;
                    $_SESSION['nom'] = $nom;
                    header("Location: index.php");
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