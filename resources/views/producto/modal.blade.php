<div class="modal fade modal-slide-in-rigth" aria-hidden="true" role="dialog"
tabindex="-1" id="modal-delete-{{$pro->id_product}}">
	
	{{Form::Open(array('action'=>array('ProductoController@destroy',$pro->id_product),'method'=>'DELETE'))}}
	<div class="modal-dialog"> 
	<div class="modal-content">
		<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" arial-label="Close" ><span aria-hidden="true">x</span></button>
				<h4 class="modal-tittle">Eliminar Producto</h4>
		</div>
		<div class="modal-body"> 
			<p>Confirme si desea eliminar producto</p>
		</div>
		<div class="modal-footer"> 
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		<button type="submit" class="btn btn-primary">Confirmar</button>
		
		</div>
		
	</div>
	</div>
	{{Form::close()}}
<div>
	
	