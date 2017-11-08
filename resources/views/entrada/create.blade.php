@extends ('layouts.principal')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3 class="center-block">Nuevo Ingreso</h3>
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
{!!Form::open(array('url'=>'entrada','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
{{Form::token()}}


<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="fecha">Fecha</label>
			<input type="date" name="date_entry" class="form-control" ></input>
		</div>
		
		<div class="form-group">
			<label for="">Usuario</label>
			<select class="form-control" name="id_user">
                @foreach($users as $us)
                <option value="{{$us->id}}">{{$us->name}}</option>
                @endforeach
			</select>			
			
		</div>
		<div class="form-group">
			
			<label for="cantidad">Cantidad</label>
			<input type="number" name="cantidad" class="form-control" placeholder="Cantidad..." ></input>
		</div>
		<div class="form-group">
			
			<label for="cantidad">Imagen</label>
			<input type="file" name="imagen" class="form-control" ></input>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group">
			<label for="">Finca</label>
			<select class="form-control"  name="farm">
				<option value="1">Finca 1</option>
				<option value="2">Finca 2</option>
				<option value="3">Finca 3</option>
				<option value="4">Finca 4</option>
				<option value="Otro">Otro</option>
			</select>
		</div>
		
		<div class="form-group">
			
			<label for="conductor">Proveedor</label>
			<select class="form-control" name="proveedor">
                @foreach($prove as $prove)
                <option value="{{$prove->nombre}}">{{$prove->nombre}}</option>
                @endforeach
			</select>
		</div>
		<div class="form-group">
			
			<label for="conductor">Conductor</label>
			<input type="text" name="conductor" class="form-control" placeholder="Nombre Conductor.." ></input>
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


{!!Form::close()!!}

@endsection