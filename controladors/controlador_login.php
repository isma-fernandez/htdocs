<?php
if(session_status() != 2)
{
    session_start();
}

include __DIR__ . "/../models/model_login.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoge los datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = login($email, $password);

    if($result != false)
    {
        $resposta = "S'ha creat el compte correctament!";
        $_SESSION['email'] = $result['mail'];
        $_SESSION['nom'] = $result['nom_cognoms'];
        header("Location: index.php");
    } else {
        // Si hubo un error, muestra un mensaje de error
        $resposta = 'Correu o contrasenya incorrecta.';
    }

}

include __DIR__ . "/../vistes/vista_login.php";
?>
