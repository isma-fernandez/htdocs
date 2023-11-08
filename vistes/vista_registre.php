<section id="seccio-form">
    <div class="center-div">
    <h2>Registra't</h2>
    </div>

    <div class="common-form">
        <form action="/submit_registration" method="post">
            <label for="name">Nom:</label><br>
            <input type="text" id="name" name="name" pattern="[a-zA-Z\s]+" placeholder="Nom" required><br>
            <label for="email">Adreça de correu electrònic:</label><br>
            <input type="email" id="email" name="email" placeholder="email@email.com" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" pattern="[a-zA-Z0-9]+" required><br>
            <label for="address">Adreça:</label><br>
            <input type="text" id="address" name="address" maxlength="30" placeholder="Adreça" required><br>
            <label for="city">Població:</label><br>
            <input type="text" id="city" name="city" maxlength="30" placeholder="Població" required><br>
            <label for="postal_code">Codi Postal:</label><br>
            <input type="text" id="postal_code" name="postal_code" placeholder="12345" pattern="^\d{5}$" required><br>
            <div class="boto-form">
            <input type="submit" value="Registrar-se">
            </div>
        </form>
    </div>
    <div class="center-div">
        <a href="/index.php?accio=login" class="white-link">Ja tens compte? Clica per iniciar sessió</a>
    </div>  
</section>