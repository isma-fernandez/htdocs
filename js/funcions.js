$(document).ready(function() {
    $.ajax({
        url: 'controladors/controlador_categories.php',
        type: 'GET',
        dataType: 'json',
        success: function(categorias) {
            var dropdown = $('.dropdown-content');
            dropdown.empty();
            $.each(categorias, function(i, categoria) {
              var link = $('<a href="#"></a>').text(categoria.nombre);
              console.log(categoria.nombre);
                link.on('click', function(e) {
                    e.preventDefault();
                    showProductesCategoria((i+1));
                });
                dropdown.append(link);
            });
        },
        error: function(error) {
            console.log('Error: ', error);
        }
    });
});

function dropMenu() {
    document.getElementById("dropdown-menu-acc").classList.toggle("show");
}





$(document).ready(function(){

    $('.dropbtn').click(function(){
      $('.dropdown-content').toggle();
    });
  });

  function showProductes() {
    console.log("called!");
    $("#main-body").hide();
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
    $("#main-body").hide();
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
    $("#main-body").hide();
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


async function actualizarCesta(producto, cantidad) {
    const url = `../controladors/controlador_carrito.php?a=add&producto=${encodeURIComponent(producto)}&cantidad=${encodeURIComponent(cantidad)}`;
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(html => { // Por ejemplo, para reemplazar todo el contenido del body con el HTML obtenido.
            updateContadorCarrito();
            document.getElementById('contenido-cesta').innerHTML = html;
        })
        .catch(error => {
            console.error('Error al actualizar la cesta:', error);
        });
}

async function updateContadorCarrito()
{
    const url = '../controladors/controlador_carrito.php?a=retrieve';
    fetch(url)
        .then(response => {
            if(!response.ok){
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(html => {
            document.getElementById('contador-carrito').innerHTML = html;
        }).catch(error => {
            console.error('Error al actualizar la cantidad de elementos de la cesta:', error);
        });
}

async function netejarCarrito()
{
    
    const url = '../controladors/controlador_carrito.php?a=netejar';
    fetch(url)
        .then(response => {
            if(!response.ok){
                throw new Error('Network response was not ok');
            }
        });
        document.getElementById("elements-carrito-container").innerHTML = "";
    updateContadorCarrito();
    updateTotal();
}

async function modificarElementCarrito(event)
{
    var parentElement = event.target.parentNode;
    var quantity = event.target.value;
    var temp_id = parentElement.id;
    var container = document.getElementById("producte-carrito-container-" + temp_id);
    var titol = parentElement.querySelector('h3').innerHTML;
    var price = parentElement.querySelector("p");
    const url = `../controladors/controlador_carrito.php?a=modify&producte=${encodeURIComponent(titol)}&cantidad=${encodeURIComponent(quantity)}&preu=${encodeURIComponent(price.innerHTML)}`;
    fetch(url)
        .then(response => {
            if(!response.ok){
                throw new Error('Network response was not ok');
            }
            return response.text();
        }).then(html => {
            price.innerHTML = html;
            updateTotal();
        });
}

async function esborrarElementCarrito(event)
{
    var parentElement = event.target.parentNode;
    var temp_id = parentElement.id;
    var container = document.getElementById("producte-carrito-container-" + temp_id);
    var titol = parentElement.querySelector('h3').innerHTML;
    const url = `../controladors/controlador_carrito.php?a=eliminar&producte=${encodeURIComponent(titol)}`;
    fetch(url)
        .then(response => {
            if(!response.ok){
                throw new Error('Network response was not ok');
            }
        });
    container.remove();
    updateContadorCarrito();
    updateTotal();
}

function updateTotal()
{
    var items_carrito = Array.from(document.getElementsByClassName("producte-carrito-container"));
    var total = 0;
    items_carrito.forEach(function(element){
        var price = element.querySelector("p");
        total += parseFloat(price.innerHTML);
    });
    document.getElementById("total-carrito").innerHTML = "Total: " + total.toFixed(2) + " €";

}