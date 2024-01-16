<?php 
if(session_status() != 2)
{
  session_start();
}
?>
<div class="navbar">
  <div>
    <a href="/index.php?accio=main"><img src="../img/logo.jpg" alt="Logo" style="width:84px;height:84px;"></a>
  </div>
  <div class="navbar-center">
    <a href="#" class="boto-nav" onclick="showProductes()">Productes</a>
    <div class="dropdown">
      <button class="dropbtn">Categories 
      </button>
        <div class="dropdown-content">
        </div>
    </div>
</div>
<?php 
  if(!isset($_SESSION['cesta']))
  {
    $carrito_counter = 0;
  }
  else {
    $carrito_counter = count($_SESSION['cesta']);
  }
  if(!isset($_SESSION['email'])) 
  {
  echo('
  <div class="navbar-center">
    <a class="boto-nav" href="/index.php?accio=registre">Registra\'t</a>
    <a class="boto-nav" href="/index.php?accio=login">Iniciar Sessió</a>
  </div>');
  } else
  {
    echo('<div class="navbar-center"><p>Benvingut ' .$_SESSION['nom'] . '</p>
    <div class="dropdown-menu">
  <button onclick="dropMenu()" class="dropbtn-menu">Menú </button>
  
  <div id="dropdown-menu-acc" class="dropdown-content-menu">
    <a href="index.php?accio=usuari">Compte</a>
    <a href="index.php?accio=comandes">Compres</a>
    <a href="index.php?accio=logout">Sortir</a>
  </div>
  
</div>
  <div>
    <a href="/index.php?accio=cart"><img id="carrito" src="../img/carrito.png" alt="carrito" width="50px"/></a>
    <span id="contador-carrito">'. $carrito_counter . '</span>
  </div>
</div>');
  } 
  ?>
</div>
<hr>
