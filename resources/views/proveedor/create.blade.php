@extends ('layouts.principal')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3>Nuevo proveedor</h3>
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
	{!!Form::open(array('url'=>'proveedor','method'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}
		<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" class="form-control" placeholder="Nombre..."></input>
		</div>
		<div class="form-group">
			<label for="nombre">Apellido</label>
			<input type="text" name="apellido" class="form-control" placeholder="Apellido..."></input>
		</div>
			<div class="form-group">
			<label for="nombre">Cedula</label>
			<input type="text" name="cedula" class="form-control" placeholder="Cedula..."></input>
		</div>
		<div class="form-group">
			<label for="nombre">Correo</label>
			<input type="text" name="correo" class="form-control" placeholder="Correo..."></input>
		</div>
		
		
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Telefono 1</label>
			<input type="text" name="telf1" class="form-control" placeholder="Telefono 1..."></input>
		</div>
		<div class="form-group">
			<label for="nombre">Telefono 2</label>
			<input type="text" name="telf2" class="form-control" placeholder="Telefono 2..."></input>
		</div>
		<div class="form-group">
			<label for="direccion">Direccion</label>
			<input type="text" name="direccion" class="form-control" placeholder="Direccion..."></input>
		</div>
		<div class="form-group">
			<label for="cuenta_banco">Cuenta Bancaria</label>
			<input type="text" name="cuenta_banco" class="form-control" placeholder="Numero ctta..."></input>
		</div>
		
		
		
		</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<button class="btn btn-danger" type="reset">Cancelar</button>
		</div>
		</div>
		
		
		
	{!!Form::close()!!}
	

@endsection