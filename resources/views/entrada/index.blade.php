@extends ('layouts.principal')
@section ('contenido')

@if(Session::has('flash_message'))
	
 <h3>{{Session::get('flash_message')}}</h3>
 
@endif
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<h3>Listado de Entradas<a href="entrada/create"><button>Nuevo</button></a></h3>
	@include('entrada.search')
	
</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	
	
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead>
			<th>fecha</th>
			<th>finca</th>
			<th>entregado por</th>
			<th>Recibido por</th>
			<td>Total</td>
			<td>Opciones</td>
			</thead>
			@foreach($entries as $ent)
			<tr>
				<td>{{$ent->date_entry}}</td>
				<td>{{$ent->farm}}</td>
				<td>{{$ent->delivery_by}}</td>
				<td>{{$ent->name}}</td>
				<td>{{$ent->cantidad}}</td>
				<td>
				<a href="{{URL::action('EntriesController@show',$ent->id_entries)}}"><button class="btn btn-primary">Ver Detalle</button></a>
				<a href="{{URL::action('EntriesController@edit',$ent->id_entries)}}"><button class="btn btn-success">Cargar Detalle</button></a>
				<!--<a href="" data-target="#modal-delete-{{$ent->id_entries}}"data-toggle="modal"><button class="btn btn-success">Cargar Detalle</button></a>-->
				</td>
				
			</tr>
			@include('entrada.modal')
			@endforeach
		</table>
	
	
	</div>
	{{$entries->render()}}
	
    </div>
	
</div>

@endsection