$(document).ready(function(){
    $('#carrito').DataTable();
} );

$('#carrito').dataTable( {
    "lengthChange": false,    
    "searching": false,
    "language": {
        "paginate":{
            "previous":"Anterior",
            "next":"Siguiente",
        },
        "emptyTable": "No hay productos en el carrito",
    }
} );