function validaFormulario() {
	var text="";
	var error=false;

	if($("#nombre").val() == "") {
		//validar nombre informado
		text=(nom_error + "\n");
		error=true;
	}

	if($("#email").val() == "") {
		//validar email informado
		text=(text + email_error + "\n");
		error=true;
	} else {
		//validar email correcto
		if (!/^\w+([\.-]\w+)*@\w+([\.-]\w+)*$/.test($("#email").val())) {
			text=(text + email_incorrecte_error + "\n");
			error=true;
		}
	}

	if($("#mensaje").val() == "") {
		text=(text + missatge_error + "\n");
		error=true;
	} 

	if (!document.getElementById('privacidad').checked) {
		text=(text + privacitat_error);
		error=true;
	};

	if (error==true) {
		text=(revisio_error + text + "\n\n");
	}

	if (error==true) {
		alert(text);
	} else {
		$('#form').submit();
	}
}