$(document).ready(function(){
	$('button[data-confirm]').click(function(ev){
		var button = $(this).attr('button');
		if(!$('#confirm-delete').length){
			$('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div style="background:#28315C" class="modal-header text-white"><button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Deseja confirmar a edição dos dados?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Confirmar</a></div></div></div></div>');
		}
		$('#dataComfirmOK').attr('button', button);
        $('#confirm-delete').modal({show: true});
		return false;
		
	});
});