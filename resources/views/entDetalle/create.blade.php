@extends ('layouts.principal')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3 class="center-block">Nuevo Detalle Ingreso</h3>
		@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
			
		</div>
		@endif
	</div>
</div>
{!!Form::open(array('url'=>'entDetalle','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}


<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="">Fecha</label>
			<p>{{$entrada->date_entry}}</p>
			<input type="hidden" name="id_entrada" value="{{$entrada->id_entries}}">
			</div>
		<div class="form-group">
			<label for="">Usuario</label>
			<p>{{$entrada->name}}</p>			
			
		</div>
	
		<div class="form-group">
			
			<label for="cantidad">Cantidad</label>
			<p>{{$entrada->cantidad}}</p>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group">
			<label for="">Finca</label>
			<p>{{$entrada->farm}}</p>
		</div>
		
		<div class="form-group">
			
			<label for="delivery_by">Proveedor</label>
			<p>{{$entrada->delivery_by}}</p>
		</div>
			<div class="form-group">
			<label for="conductor">Conductor</label>
			<p>{{$entrada->conductor}}</p>			
			
		</div>
		
	</div>
</div>
<div class="row">
	<div class="panel panel-primary">
		<div class="panel-body">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					
					<label>Producto</label>
					<select class="form-control selectpicker" name="pid_product" id="pid_product" data-live-search="true">
						@foreach($products as $det)
						<option value="{{$det->id_product}}">{{$det->name}}</option>
						@endforeach
					</select>			
					
				</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="form-group">
					<label for="cantidad">Cantidad</label>
					<input type="number" name="pcantidad" class="form-control" id="pcantidad" placeholder="cantidad"></input>
					
				</div>			
				
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="form-group">
					<label for="precio">Precio</label>
					<input type="number" name="pprice" class="form-control" id="pprice" placeholder="Precio"></input>
					
				</div>			
				
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="form-group">
					
					<button type="button" class="btn btn-primary" id="bt_add">Agregar</button>
				</div>			
				
			</div>
			<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<table id="detalle" class="table table-striped table-hover table-bordered table-condensed">
					<thead style="background-color:#A9D0F5">
						<th>Opciones</th>
						<th>Producto</th>
						<th>Cantidad</th>
						<th>Precio</th>
					</thead>
					
					
					
					<tfoot>
						<th>Total</th>
						<th></th>
						<th><h4 id="total">0.00</h4></th>
						<th></th>
						
					</tfoot>
				</table>
				
			</div>
		</div>
		
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
		<div class="form-group">
			<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
			<button class="btn btn-primary" type="submit">Guardar</button>
			<button class="btn btn-danger" type="reset">Cancelar</button>
		</div>
	</div>	
</div>

{!!Form::close()!!}
@push('scripts')
<script>
	$(document).ready(function(){
		$("#bt_add").click(function(){
			agregar();
		});
	});
	cont=0;
	total=0;
	subtotal=[];
	$("#guardar").hide();
	
	function agregar(){
	id_product=$("#pid_product").val();
	producto=$("#pid_product option:selected").text();
	cantidad=$("#pcantidad").val();	
	precio=$("#pprice").val();
	if(id_product!=" " && cantidad!=" " && cantidad >0){
		
			subtotal[cont]=parseInt(cantidad);
			total=parseInt(total)+parseInt(subtotal[cont]);
			
			var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="id_product[]" value="'+id_product+'" ></input>'+producto+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'" ></input></td><td><input type="number" name="precio[]" value="'+precio+'" ></input></td></tr>';
			cont++;
			limpiar();
			$("#total").html(total);
			evaluar();
			$('#detalle').append(fila);
	}else{
	
	alert("Error al inresar detalle revise el formularo y llene correctamente los campos");
	}
		
	}
	function limpiar(){
		$("#pid_product").val(" ");
		$("#pcantidad").val(" ");
		$("#pprice").val(" ");
		
		
	}
	function evaluar(){
		if(parseInt(total)>0){
			$("#guardar").show();	
			}else{
			$("#guardar").hide();
		}
		
	}
	function eliminar(index){
		total=total-subtotal[index];
		$("#total").html(total);
		$("#fila"+index).remove();
		evaluar();
		
		}
	
</script>
@endpush
@endsection