<?php if(session_status() != 2)
{
    session_start(); 
}?>


<h1 id="wip">Vinnyl<br>Work in progress...</h1>

<h1 id="h1-productes">Productes</h1>

<section id="detall-producte">

</section>

<section id="llista-productes-container"> <!-- Grid -->

</section>

<script>
    function showProductes() {
        $("#wip").hide();
        $("#h1-productes").show();
        $("#llista-productes-container").empty();
        $("#detall-producte").empty();
        fetch("controladors/controlador_productes.php?a=productes")
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
        console.log(IDCategoria);
        $("#wip").hide();
        $("#h1-productes").show();
        $("#llista-productes-container").empty();
        $("#detall-producte").empty();
        fetch("controladors/controlador_productes.php?a=categoriaid&id=" + IDCategoria)
            .then(response => {
                return response.json();
            })
            .then(data => {
                data.forEach(html => {
                    document.getElementById("llista-productes-container").innerHTML += html;   
                })
                
            })
    }

    function detallProducte(param)
    {
        var Nom = param.children[0].innerText;
        $("#wip").hide();
        $("#h1-productes").hide();
        $("#llista-productes-container").empty();
        fetch("controladors/controlador_productes.php?a=productedetall&id=" + Nom)
            .then(response => {
                return response.json();
            })
            .then(data => {
                data.forEach(html => {
                    document.getElementById("detall-producte").innerHTML += html;   
                })
                
            })
    }
</script>