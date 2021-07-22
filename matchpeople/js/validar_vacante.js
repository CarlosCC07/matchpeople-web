function validacion(){
	var vacante = document.getElementById("vacante").value;
	var estado = document.getElementById("Buscar_Vacante").value;
	var ciudad = document.getElementById("ciudad").value;
	
	if(vacante == ""){
		alert("El Titulo es requeridad");
		return false; }
		
	if(ciudad == ""){
		alert("La Ciudad es requeridad");
		return false; }
		
	if(Buscar_Vacante == ""){
		alert("No existe Citerio");
		return false; }
}
	