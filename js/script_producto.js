$(document).ready(function(){
	$("form").submit(function(e){
		e.preventDefault();
		var formulario = $(this);
		
		BootstrapDialog.confirm("¿Desea guardar la información?", function(response){
			if(response)
			{
				SendData(formulario);
			}
		});
	});
});

function SendData(formulario)
{
	/*formulario.serialize()*/
	var fd = new FormData(document.getElementById("form-esp"));
	$.ajax({
		data: fd,
		url: "service/ClientCtrl.php",
		type: "POST",
		processData: false,
       	contentType: false,
		success: function(response){
			if(response == "SUCCESS")
			{
				window.location.href = "frmproducto.php";
			}
			else
			{
				BootstrapDialog.confirm("Hubo un error al guardar la información. Por favor, intente más tarde", function(response){
					window.location.href = "productoslist.php"
				});
			}
		}
	});
}

function Update(codigo)
{
    window.location.href = "guardar.php?action=actualizar&clave="+codigo;
    /*BootstrapDialog.confirm("¿Desea actualizar el registro?", function(response){
        if(response)
        {
            window.location.href = "frmproductodetalle.php?clave="+codigo;
        }
    });*/
}

function Desactivar(codigo)
{
	BootstrapDialog.confirm("¿Desea desactivar el registro?", function(response){
		if(response)
		{
			$.ajax({
				data: { code: codigo, action: "HIDE" },
				url: "frmproducto.php",
				type: "POST",
				success: function(resp){
					if(resp == "SUCCESS")
					{
						window.location.href = "frmproducto.php";
					}
					else
					{
						BootstrapDialog.confirm("Hubo un error al guardar la información. Por favor, intente más tarde", function(response){
							window.location.href = "productoslist.php"
						});
					}
				}
			});
		}
	});
}

function Cancelar()
{
	BootstrapDialog.confirm("¿Desea cancelar la operación?", function(response){
		if(response)
		{
			window.location.href = "productoslist.php"
		}
	});
}