@extends ('layouts.principal')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<h3>Listado de proveedores <a href="proveedor/create"><button>Nuevo</button></a></h3>
	@include('proveedor.search')
    </div>
	
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	
	
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead>
			<th>id</th>
			<th>nombre</th>
			<th>apellido</th>
			<th>cedula</th>
			<th>opciones</th>
			</thead>
			@foreach($providers as $pro)
			<tr>
				<td>{{$pro->id_provider}}</td>
				<td>{{$pro->nombre}}</td>
				<td>{{$pro->apellido}}</td>
				<td>{{$pro->cedula}}</td>
				<td>
				<a href="{{URL::action('ProviderController@edit',$pro->id_provider)}}"><button class="btn btn-info">Editar</button></a>
				<a href="" data-target="#modal-delete-{{$pro->id_provider}}"data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
				</td>
				
			</tr>
			@include('proveedor.modal')
			@endforeach
		</table>
	
	
	</div>
	{{$providers->render()}}
	
    </div>
	
</div>
@endsection