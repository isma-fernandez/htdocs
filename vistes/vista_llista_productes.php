<?php if(session_status() != 2)
{
    session_start(); 
}?>


<section class="llista-productes-container"> <!-- Grid -->
    <div class="producte-container">
        <h3 class="titol-producte"></h3>
        <img class="imatge-producte" src="#" alt="">
        <p class="preu-producte"></p>
    </div>
</section>

<script>
    function detallProducte(IDproducte) {
        fetch("controller/controlador_productes.php?producte_id=" + IDproducte)
            .then(response => {
                return response.text();
            })
            .then(data => {
                document.getElementById("productesXCategoria").innerHTML = data;
            })
    }
</script>