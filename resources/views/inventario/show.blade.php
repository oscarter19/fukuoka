@extends ('layouts.principal')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="">Fecha</label>
				<p>{{$entrada->date_entry}}</p>
		</div>
		<div class="form-group">
			<label for="">Usuario</label>
			<p>{{$entrada->name}}</p>	
			
		</div>
		<div class="form-group">
			
			<label for="conductor">Conductor</label>
			<p>{{$entrada->conductor}}</p>	
		</div>
		
	</div>
	<div class="col-sm-6">
		<div class="form-group">
			<label for="">Finca</label>
			<p>{{$entrada->farm}}</p>	
		</div>
		
		<div class="form-group">
			
			<label for="proveedor">Proveedor</label>
			<p>{{$entrada->delivery_by}}</p>	
		</div>

</div>
</div>
<div class="row">
	<div class="panel panel-primary">
		<div class="panel-body">		
		
			<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<table id="detalle" class="table table-striped table-hover table-bordered table-condensed">
					<thead style="background-color:#A9D0F5">
						
						<th>Producto</th>
						<th>Cantidad</th>
						<th>Precio</th>
					</thead>
					
					
					
					
					<tfoot>
						
						<th>TOTAL</th>
						<th><h4 id="total">{{$entrada->total}}</h4></th>
						<th></th>
						
					</tfoot>
					<tbody>
						@foreach($detalles as $det)
						<tr>
						<td>{{$det->producto}}</td>
						<td>{{$det->quantity}}</td>
						<td>{{$det->price}}</td>
						</tr>						
						@endforeach						
					</tbody>
				</table>
				
			</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="form-group">
					
					<!--<a href="{{URL::action('EntDetailsController@create',$entrada->id_entries)}}"class="btn btn-success" role="button">Editar</a>-->
				</div>			
				
			</div>
		</div>
		
	</div>
	
</div>
@endsection
