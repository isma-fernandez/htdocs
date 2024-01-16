<section id="main-body">
    <section id="seccio-form">
        <div class="center-div">
        <h2>Carrito</h2>
        <div class="center-div">
        <?php if(count($carrito) != 0)
        {
            echo'<button type="button" id="myButton" class="btn" onClick="netejarCarrito()">Netejar carrito</button>';
        }
        else
        {
            echo '<h3>No tens cap producte afegit al carrito</h3>';
        }
        ?>
    </div>
            <?php if (isset($resposta)): ?>
                <p><?php echo $resposta; ?></p>
            <?php endif; ?>
            </div>
            <div id="elements-carrito-container">
        <?php 
        foreach($carrito as $elemento)
        {
            echo $elemento;
        }
        ?>
        <?php if(count($carrito) != 0)
        {
            echo'<div id="total-carrito">
            <p>Total: </p>';
        }
        ?>
       
    </div>
        </div>
        <?php if(count($carrito) != 0)
        {
            echo'<div class="center-div">
            <button type="button" id="myButton" class="btn" onClick="realitzarCompra()">Realitzar compra</button>
        </div>';
        }
        ?>
    

        
    </section>
</section>
<section id="detall-producte">

</section>
<section id="llista-productes-container"> <!-- Grid -->

</section>

<script>
$(document).ready(function() {
    var items_carrito = Array.from(document.getElementsByClassName("producte-carrito-container"));
    console.log(items_carrito);
    var total = 0;
    items_carrito.forEach(function(element){
        var price = element.querySelector("p");
        total += parseFloat(price.innerHTML);
    });
    document.getElementById("total-carrito").innerHTML = "Total: " + total.toFixed(2) + " €";
});
</script>