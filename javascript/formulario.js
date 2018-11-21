$(document).ready(function(){
	//variables globales
	var searchBoxes = $(".text");
	var inputPassword1 = $("#password1");
	var reqPassword1 = $("#req-password1");
	var inputPassword2 = $("#password2");
	var reqPassword2 = $("#req-password2");

	//funciones de validacion
	function validatePassword1(){
		//NO tiene minimo de 5 caracteres o mas de 12 caracteres
		if(inputPassword1.val().length < 5 || inputPassword1.val().length > 32){
            reqPassword1.addClass("error");
			inputPassword1.addClass("error");
            if(validatePassword2()){
                reqPassword2.removeClass("error");
                inputPassword2.removeClass("error");
            } else {
                reqPassword2.addClass("error");
                inputPassword2.addClass("error");
            }
			return false;
		}
		// SI longitud, NO VALIDO numeros y letras
		else if(!inputPassword1.val().match(/^[0-9a-zA-Z]+$/)){
			reqPassword1.addClass("error");
			inputPassword1.addClass("error");
            if(validatePassword2()){
                reqPassword2.removeClass("error");
                inputPassword2.removeClass("error");
            } else {
                reqPassword2.addClass("error");
                inputPassword2.addClass("error");
            }
			return false;
		}
		// SI rellenado
		else{
			reqPassword1.removeClass("error");
			inputPassword1.removeClass("error");
            if(validatePassword2()){
                reqPassword2.removeClass("error");
                inputPassword2.removeClass("error");
            } else {
                reqPassword2.addClass("error");
                inputPassword2.addClass("error");
            }
			return true;
		}
	}
	function validatePassword2(){
		//NO son iguales las password
		if(inputPassword1.val() != inputPassword2.val()){
			reqPassword2.addClass("error");
			inputPassword2.addClass("error");
			return false;
		}
		// SI son iguales
		else{
			reqPassword2.removeClass("error");
			inputPassword2.removeClass("error");
			return true;
		}
	}
	
	//controlamos la validacion en los distintos eventos
	// Perdida de foco
	inputPassword1.blur(validatePassword1);  
	inputPassword2.blur(validatePassword2);  
	
	// Pulsacion de tecla
	inputPassword1.keyup(validatePassword1);
	inputPassword2.keyup(validatePassword2);
	
	// Envio de formulario
	$("#form1").submit(function(){
		if(validatePassword1() & validatePassword2())
			return true;
		else
			return false;
	});
	
	//controlamos el foco / perdida de foco para los input text
	searchBoxes.focus(function(){
		$(this).addClass("active");
	});
	searchBoxes.blur(function(){
		$(this).removeClass("active");  
	});

});