$(document).ready(function() {
    $.ajax({
        url: 'controladors/controlador_categories.php',
        type: 'GET',
        dataType: 'json',
        success: function(categorias) {
            var dropdown = $('.dropdown-content');
            dropdown.empty();

            $.each(categorias, function(i, categoria) {
                dropdown.append($('<a href="#"></a>').text(categoria.nombre));
            });
        },
        error: function(error) {
            console.log('Error: ', error);
        }
    });
});

