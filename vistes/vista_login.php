<section id="main-body">
    <section id="seccio-form">
        <div class="center-div">
            <h2>Iniciar sessió</h2>
            <?php if (isset($resposta)): ?>
                <p><?php echo $resposta; ?></p>
            <?php endif; ?>
        </div>
        

        <div class="common-form">
            <form action="/index.php?accio=login" method="post">
                <label for="email">Adreça de correu electrònic:</label><br>
                <input type="email" id="email" name="email" placeholder="email@email.com" required><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" pattern="[a-zA-Z0-9]+" required><br>
                <div class="boto-form">
                <input type="submit" value="Iniciar sessió">
                </div>
            </form>
        </div>
        <div class="center-div">
            <a href="/index.php?accio=registre" class="white-link">No tens compte encara? Clica per registrar-te</a>
        </div>
    </section>
    
</section>
<section id="detall-producte">

</section>
<section id="llista-productes-container"> <!-- Grid -->

</section>

