@extends ('layouts.principal')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<h3>Listado de productos <a href="producto/create"><button>Nuevo</button></a></h3>
	@include('producto.search')
    </div>
	
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	
	
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead>
			<th>id</th>
			<th>nombre</th>
			<th>descripcion</th>
			<th>opciones</th>
			</thead>
			@foreach($products as $pro)
			<tr>
				<td>{{$pro->id_product}}</td>
				<td>{{$pro->name}}</td>
				<td>{{$pro->description}}</td>
				<td>
				<a href="{{URL::action('ProductoController@edit',$pro->id_product)}}"><button class="btn btn-info">Editar</button></a>
				<a href="" data-target="#modal-delete-{{$pro->id_product}}"data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
				</td>
				
			</tr>
			@include('producto.modal')
			@endforeach
		</table>
	
	
	</div>
	{{$products->render()}}
	
    </div>
	
</div>
@endsection