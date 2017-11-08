@extends ('layouts.principal')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3>Editar Proveedor : {{$proveedor->nombre}}</h3>
	@if(count($errors)>0)
	<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)
	<li>{{$error}}</li>
	@endforeach
	</ul>
	
	</div>
	@endif
	{!!Form::model($proveedor,['method'=>'PATCH','route'=>['proveedor.update',$proveedor->id_provider]])!!}
		{{Form::token()}}
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" class="form-control" value="{{$proveedor->nombre}}" placeholder="Nombre..."></input>
		</div>
		<div class="form-group">
			<label for="apellido">Apellido</label>
			<input type="text" name="apellido" class="form-control" value ="{{$proveedor->apellido}}" placeholder="Apellido..."></input>
		</div>
		<div>
			<button class="btn btn-primary" type="submit">Guardar</button>
			<button class="btn btn-danger" type="reset">Cancelar</button>
		</div>
		
		
		
		
	{!!Form::close()!!}
	</div>
	
</div>
@endsection