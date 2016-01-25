
function saveIdModal(id)
{
	document.getElementById('id_emp_hide').value=id;
}
function saveIdModalSucursal(id)
{
	document.getElementById('id_suc_hide').value=id;
}

function saveIdModalPerfil(id)
{
	document.getElementById('id_per_hide').value=id;
}

function iniciar()
{
	document.getElementById("form_new_empleado").addEventListener("input",controlar, false);
}


function controlar(e)
{
	var elemento=e.target;
	if(elemento.validity.valid)
	{
		elemento.classList.remove('css_error_input');
		elemento.classList.add('css_ok_input');
	}
	else
	{
		elemento.classList.remove('css_ok_input');
		elemento.classList.add('css_error_input');
	}
}

window.addEventListener("load", iniciar, false);


		
		//VALIDACION DEL DUI, GION AUTOMATICO
		function onLoad() {
			new InputMask().Initialize(document.querySelectorAll("#txt_dui"),
			{
				mask: InputMaskDefaultMask.Dui, 				
			});

			new InputMask().Initialize(document.querySelectorAll("#txt_nit"),
			{
				mask: InputMaskDefaultMask.Nit, 				
			});

			new InputMask().Initialize(document.querySelectorAll("#txt_cel"),
			{
				mask: InputMaskDefaultMask.Cel, 				
			});

			new InputMask().Initialize(document.querySelectorAll("#txt_tel"),
			{
				mask: InputMaskDefaultMask.Cel, 				
			});
			
			new InputMask().Initialize(document.querySelectorAll("#txt_cel_responsable"),
			{
				mask: InputMaskDefaultMask.Cel, 				
			});

			new InputMask().Initialize(document.querySelectorAll("#txt_tel_responsable"),
			{
				mask: InputMaskDefaultMask.Cel, 				
			});
		}