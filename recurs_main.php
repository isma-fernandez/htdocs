<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Botiga de discos de vinil</title>
        <meta name="author" content="COMPLETAR" />
        <meta name="description" content="Botiga de discos de vinil" />
        <meta name="keywords" content="disc, vinil" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,800" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/../css/main.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="/../js/funcions.js"> </script>
    </head>

    <!-- SESSIO -->
    <?php
        if(isset($_SESSION['mail']))
        {
            $email = $_SESSION['mail'];
        }
    ?>

    <body>
        <?php include __DIR__ . '/controladors/controlador_menu.php'; ?>
        <h1 id="wip">WIP</h1>
    </body>
</html>