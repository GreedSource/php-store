function Update() {
    Swal({
        title: '¿Estás seguro?',
        text: "Esta acción no se puede revertir!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Actualizar!'
    }).then((result) => {
        if (result.value) {
            $('#submit').click();
        }
    })
}


/*function Update()
{
	BootstrapDialog.show({
		title: '¿Estás seguro que deseas realizar está acción',
        buttons: [{
            label: 'Actualizar',
            action: function () {
                $('#submit').click();
            }
        }, {
            label: 'Cancelar',
            action: function (dialogItself) {
                dialogItself.close();
            }
        }]
	});
	/*$("#submit").submit(function (e){
		e.preventDefault();
        BootstrapDialog.confirm("¿Está seguro de realizar está acción?", function(response){
			if(response){
				$("#submit").off("submit").submit();
			}
        });
	});*/
//}