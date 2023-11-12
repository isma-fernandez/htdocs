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
  if(!isset($_SESSION['email'])) {
  echo('<div><a class="boto-nav" href="/index.php?accio=registre">Registra\'t</a><a class="boto-nav" href="/index.php?accio=login">Iniciar Sessió</a></div>');
  } else
  {
    echo('<div class="navbar-center"><p>Benvingut ' .$_SESSION['nom'] . '</p>
    <button class="dropbtnmenu" onclick="dropMenu()">Dropdown
    </button>
    <div class="dropdown-content-menu" id="dropdown-menu">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
    </div>');
  } ?>
</div>
<hr>
<script>
function categoriaSeleccionada(IDcategoria) {
  $(".fotosInici").hide('slow');
   fetch("controller/c_productes_categories.php?categoria=" + IDcategoria)
    .then(response => {
      return response.text();
    })
    .then(data => {
      document.getElementById("productesXCategoria").innerHTML = data;
    });
    }
</script>