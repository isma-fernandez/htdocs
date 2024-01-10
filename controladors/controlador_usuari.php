<?php
if(session_status() != 2)
{
    session_start();
}



include __DIR__ . "/../models/model_usuari.php";

$img = null;
$usuari = getUserInfo($_SESSION['email']);

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

    if (($_FILES['profile_image']["name"] != "") && !empty($_FILES['profile_image']) && ($_FILES['profile_image']["type"] == "image/jpeg")){        
        $filesAbsolutePath = 'C:/Apache24/htdocs/img/users/';

        $img = $usuari['id'] . ".jpg";
        $_SESSION['user_img'] = "/img/users/" . $img;
        $path = $filesAbsolutePath . $img;

        $img = "../img/users/" . $img;   
        if (!move_uploaded_file($_FILES['profile_image']['tmp_name'], $path)) {
            $resposta = "Ha habido un error subiendo la imagen.";
        }else{
            $resposta = "Imagen modificada correctamente.";
        }
    } else 
    {
        $resposta = "Formato incorrecto de la imagen. Solo se acepta formato .jpg";
    }

    if(!$valid_data)
    {
        $resposta = "Les dades introduides no són vàlides.";
    }
    else
    {
        if(password_verify($password, $usuari['contrasenya']))
        {
            
            $resultat = modificaUsuari($usuari['id'], $nom, $email, $address, $poblacio, $postalcode, $img);
            if($resultat)
            {
                $_SESSION['email'] = $email;
                $_SESSION['nom'] = $nom;
                $resposta = "S'han modificat les dades del compte correctament!";
            }
            else 
            {
                $resposta = "Hi ha hagut un error al modificar les teves dades";
            }
            
        }
        else 
        {
            $resposta = "Contrasenya incorrecta, introdueix la contrasenya correcta per poder modificar les dades.";
        }

    }

}

$usuari = getUserInfo($_SESSION['email']);

include __DIR__ . "/../vistes/vista_usuari.php";


?>