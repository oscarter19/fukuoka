@extends ('layouts.principal')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3>Editar producto : {{$producto->name}}</h3>
	@if(count($errors)>0)
	<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)
	<li>{{$error}}</li>
	@endforeach
	</ul>
	
	</div>
	@endif
	{!!Form::model($producto,['method'=>'PATCH','route'=>['producto.update',$producto->id_product]])!!}
		{{Form::token()}}
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" class="form-control" value="{{$producto->name}}" placeholder="Nombre..."></input>
		</div>
		<div class="form-group">
			<label for="nombre">Descripcion</label>
			<input type="text" name="descripcion" class="form-control" value ="{{$producto->description}}" placeholder="Descripcion..."></input>
		</div>
		<div>
			<button class="btn btn-primary" type="submit">Guardar</button>
			<button class="btn btn-danger" type="reset">Cancelar</button>
		</div>
		
		
		
		
	{!!Form::close()!!}
	</div>
	
</div>
@endsection