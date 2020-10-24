(function($, URL, Helpers){

	var form = $('form[name="formFav"]');

	var submitFav = function(){

		$('body').on('click', '#btnSubmitFav', function(){

			var id = $('input[name="idFilme"]').val();
            var nome = $('input[name="nome"]').val();
            var idUsuario = $('input[name="idUsuario"]').val();

			$.ajax({
				url: URL + '/submitFav',
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
							window.location.reload();
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
		submitFav();
	});
})($, URL, Helpers)