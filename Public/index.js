function validation() {
	swal("Success!");
   }

function confirmer() {
	return confirm("voulez-vous supprimé?");
}


//var validation = document.getElementById('envoyer');
  //  validation.addEventListener('click', valider);
function valider(){
	var firstName = document.getElementById("firstName").value;
	var lastName = document.getElementById("lastName").value;
	var email = document.getElementById("email").value;
	var error_message = document.getElementById("error_message");
	
	
	var text;
	if(lastName.length > 20){
	  text = "Enter un nom valide";
	  error_message.innerHTML = text;
	  return false;
	}

	if(firstName.length > 20){
		text = "Enter un prenom valide";
		error_message.innerHTML = text;
		return false;
	  }
	
	if(email.indexOf("@") == -1 || email.length < 6){
	  text = "Entrer un Mail Valide";
	  error_message.innerHTML = text;
	  return false;
	}
	
	alert("Successfully!");
	return true;
  }