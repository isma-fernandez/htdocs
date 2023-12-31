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
    document.getElementById("dropdown-menu").classList.toggle("show");
}



$(document).ready(function(){

    $('.dropbtn').click(function(){
      $('.dropdown-content').toggle();
    });
  });