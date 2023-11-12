<?php if(session_status() != 2)
{
    session_start(); 
}?>


<h1 id="wip">WIP</h1>

<h1 id="h1-productes">Productes</h1>

<section id="llista-productes-container"> <!-- Grid -->

</section>

<script>
    function showProductes() {
        $("#wip").hide();
        $("#h1-productes").show();
        fetch("controladors/controlador_productes.php")
            .then(response => {
                return response.json();
            })
            .then(data => {
                data.forEach(html => {
                        document.getElementById("llista-productes-container").innerHTML += html;   
                })
                
            })
    }
 /* TODO IMPLEMENTAR */
    function showProductesCategoria(IDCategoria) {
        $("#wip").hide();
        $("#h1-productes").show();
        fetch("controladors/controlador_productes.php")
            .then(response => {
                return response.json();
            })
            .then(data => {
                data.forEach(html => {
                        document.getElementById("llista-productes-container").innerHTML += html;   
                })
                
            })
    }
</script>