<section id="main-body">
    <section id="seccio-form">
        <div class="center-div">
        <h2>Comandes</h2>
        <div class="center-div">

    </div>
            <?php if (isset($resposta)): ?>
                <p><?php echo $resposta; ?></p>
            <?php endif; ?>
            </div>
    <div id="comandes-container">
        <?php 
        foreach($htmls as $totescomandes)
        {
            echo '<div class="comanda-container">';
            foreach($totescomandes as $comanda)
            {
                echo $comanda;
            }
            echo '</div>';
        }
        ?>
    </div>
    </section>
</section>
</section>
<section id="detall-producte">

</section>
<section id="llista-productes-container">