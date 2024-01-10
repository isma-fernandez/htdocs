<section id="main-body">
    <section id="seccio-form">
        <div class="center-div">
        <h2>Modifcar el compte</h2>
            <?php if (isset($resposta)): ?>
                <p><?php echo $resposta; ?></p>
            <?php endif; ?>
            <img id="foto-usuari" src="
                    <?php if ($usuari['img'] == null) {
                    echo "../img/users/default.png";
                } else {
                    echo $usuari['img'];
                } ?>" height="180" width="180px">
        <div class="common-form">
            <form action="/index.php?accio=usuari" method="post" enctype="multipart/form-data">
                <label for="email">Adreça de correu electrònic:</label><br>
                <input type="email" value="<?php echo $usuari['mail'] ?>" id="email" name="email" placeholder="email@email.com" required><br>
                <label for="password">Contrasenya:</label><br>
                <input type="password" id="password" name="password" pattern="[a-zA-Z0-9]+" required><br>
                <label for="name">Nom:</label><br>
                <input value="<?php echo $usuari['nom_cognoms'] ?>" type="text" id="nom" name="nom" pattern="[a-zA-Z\s]+" placeholder="Nom" required><br>
                <label for="address">Adreça:</label><br>
                <input value="<?php echo $usuari['adreça'] ?>" type="text" id="address" name="address" maxlength="30" placeholder="Adreça" required><br>
                <label for="city">Població:</label><br>
                <input value="<?php echo $usuari['poblacio'] ?>" type="text" id="city" name="city" maxlength="30" placeholder="Població" required><br>
                <label for="postal_code">Codi Postal:</label><br>
                <input value="<?php echo $usuari['codi_postal'] ?>" type="text" id="postalcode" name="postalcode" placeholder="12345" pattern="^\d{5}$" required><br>     
                <label for="profile_image">Foto de Perfil</label> <br>
                <input type="file" name="profile_image">
                <br/>
                <div class="boto-form">
                <input type="submit" value="Modificar">
                </div>
            </form>
        </div>
    </section>
</section>
<section id="detall-producte">

</section>
<section id="llista-productes-container"> <!-- Grid -->

</section>