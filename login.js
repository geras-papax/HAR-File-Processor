//.. . document for recursive use of html due to is-active attribute swap
const switchers = [...document.querySelectorAll('.switcher')]
//swap attribute is-active between the two forms for the visual switching 
switchers.forEach(item => {
	item.addEventListener('click', function() {
		switchers.forEach(item => item.parentElement.classList.remove('is-active'))
		this.parentElement.classList.add('is-active')
	})
})

const password1 = document.querySelector("#signup-password");
const password2 = document.querySelector("#signup-password-confirm");
const btn = document.querySelector("#sign-up-btn");

//check if password and confirm password match
btn.onclick = function checkPassword() { 
	if(password1.value != password2.value){
		alert ("\nPassword did not match: Please try again...")
		return false;
	}	
} 
//show buttons reveals the text of the password fields
function showReg(){
	var pass = document.getElementById("signup-password")
	var passC = document.getElementById("signup-password-confirm")
	if (pass.type === "password"){
		pass.type = "text";
		passC.type = "text";
	} else {
		pass.type = "password";
		passC.type = "password";
	}
}

function showLog(){
	var pass = document.getElementById("login-password")
	if (pass.type === "password"){
		pass.type = "text";
	} else {
		pass.type = "password";
	}
}