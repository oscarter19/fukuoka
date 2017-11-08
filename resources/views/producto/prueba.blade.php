@extends ('layouts.principal')
@section ('contenido')
<div class="row">
	
	<h3 align="center">Stock de Productos en almacen</h3>
	<br>
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-8">
		<div class="info-box">
		@foreach($products as $pro)
		@if (strcmp($pro->name,"coco 40/50")==0)
			<span class="info-box-icon bg-aqua">
				
				<p>{{$pro->stock}}</p>
				
			</span>
			<div class="info-box-content"></div>
			<span class="info-box-text">{{$pro->name}}</span>
			@endif
			@endforeach
		</div>
	</div>
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-8">
		<div class="info-box">
		@foreach($products as $pro)
		@if (strcmp($pro->name,"coco 60")==0)
			<span class="info-box-icon bg-green">
				<p>{{$pro->stock}}</p>
			</span>
			<div class="info-box-content"></div>
			<span class="info-box-text">{{$pro->name}}</span>	
			@endif
			@endforeach
		</div>
	</div>
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-8">
		<div class="info-box">
			@foreach($products as $pro)
			@if (strcmp($pro->name,"Puntilla")==0)
			<span class="info-box-icon bg-yellow">
				
				<p>{{$pro->stock}}</p>				
			</span>
			<div class="info-box-content"></div>
			<span class="info-box-text">{{$pro->name}}</span>
			@endif
			@endforeach
		</div>
	</div>
</div>
<div class="row" >
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-8">
		<div class="info-box">
			
			<span class="info-box-icon bg-red">
				
				<p>2</p>				
			</span>
			<div class="info-box-content"></div>
			<span class="info-box-text">merma</span>
			
		</div>
	</div>
	
</div>
@endsection