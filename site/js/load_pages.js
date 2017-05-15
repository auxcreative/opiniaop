/**
 * @author Elesbao Pinto
 */
function recoverPassword() {

	var botao = $(this);
	var div = $(this).closest('div.box');

	//Login --> Recuperação de senha
	if (botao.attr('class') === 'btn-recover') {
		div.slideToggle('slow', function() {
			//callback
			$('.recover').slideToggle('slow');
		});

	}
	
	//Recuperacao de senha --> Login
	if (botao.attr('id') === 'btn-login') {
		div.slideToggle('slow', function() {
			//callback
			$('.login').slideToggle('slow');
		});

	}
	
	//Login --> Cadastro
	if (botao.attr('id') === 'btn-addition') {		
		div.slideToggle('slow', function() {
			//callback
			$('.addition').slideToggle('slow');
		});

	}
	
	//Cadastro --> login
	if (botao.attr('id') === 'btn-voltar') {		
		div.slideToggle('slow', function() {
			//callback
			$('.login').slideToggle('slow');
		});

	}

};

function initCode() {

	$('.btn-recover, #btn-login, #btn-voltar, #btn-addition').on('click', (recoverPassword));

}

$(initCode);

