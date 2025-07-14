
//definir funció per traslladar les dades de la persona a modificar al formulari ocult
function modificarPersones(button) {

	const tr = button.closest('tr');
	
	//situar-nos en l'etiqueta tr que correspongui a la fila on es troba el botó
	const nif = tr.querySelector('.nif').value;
	const nom = tr.querySelector('.nom').value;
	const direccio = tr.querySelector('.direccio').value;
	
	//traslladar les dades al formulari ocult
	document.querySelector('[name=nifModi]').value = nif;
	document.querySelector('[name=nomModi]').value = nom;
	document.querySelector('[name=direccioModi]').value = direccio;

	//submit del formulari
	document.querySelector('#formulariModi').submit();
}