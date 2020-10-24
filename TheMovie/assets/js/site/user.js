(function($, URL, Helpers){

	var form = $('form[name="formUser"]');

	var submitUser = function(){

		$('body').on('click', '#btnSubmitUser', function(){

			var name = $('input[name="nome"]').val();
			var senha = $('input[name="senha"]').val();

			if(name == ''){
				swal({
					title:'Erro!',
					text: 'Preencha seu nome!',
					type: 'error'
				});
				return false;
			}
			if(senha == ''){
				swal({
					title:'Erro!',
					text: 'Preencha seu email!',
					type: 'error'
				});
				return false;
			}

			$.ajax({
				url: URL + '/submitUser',
				type: 'POST',
				dataType: 'JSON',
				data: form.serialize(),
				complete: function(response){
					if(response.responseJSON.result){
						swal({
							title: 'Enviado!',
							text: 'Aguarde o nosso retorno',
							type: 'success'
						}).then(function(){
							window.location.href = URL + "/Login";
							return true;
						});
					} else {
						swal({
							title: 'Erro!',
							text: 'Ocorreu um erro',
							type: 'error'
						});
						return false;
					}
				}
			});	
		});

	}

	$( document ).ready(function(){
		submitUser();
	});
})($, URL, Helpers)