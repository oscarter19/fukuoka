

{!! Form::open(array('url'=>'entrada','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
<div class="form-group">
	<div class="imput-group">
	<input type="text" class="form-control" name="searchText" placeholder="Buscar...." value="{{$searchText}}"></input>
	<span class="input-group-btn"> 
		<button type="submit" class="btn btn-primary">
		Buscar	
		</button></span>
	</div>
</div>
	{{Form::close()}}