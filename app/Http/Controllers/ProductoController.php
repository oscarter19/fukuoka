<?php

namespace sysCoco\Http\Controllers;


use Illuminate\Http\Request;

use sysCoco\Product;
use Illuminate\Support\Facades\Redirect;
use sysCoco\Http\Requests\ProductoFormRequest;
use DB;

class ProductoController extends Controller
{
    //
	public function __construct(){
		$this->middleware('auth');
		
		}
	static function index(Request $request){
		
		if($request){
			$query=	trim($request->get('searchText'));	
			$productos=DB::table('products')->where('name','LIKE','%'.$query.'%')
			->orderBy('id_product','asc')
			->paginate(7);
			
			return view('producto.index',["products"=>$productos,"searchText"=>$query]);
			}
		
		
		
		}
	static function create(){
		return view('producto.create');
		
		}
	static function destroy($id){
	//dd("id del producto".$id);
		$producto=Product::findOrFail($id);
		//dd("nombre del producto ".$producto->name."descripcion del producto ".$producto->description);

		
		//$producto->delete();
		Product::destroy($producto->id_product);
		return Redirect::to('producto');
		}
	static function update(ProductoFormRequest $request,$id){
		
		$producto=Product::findOrFail($id);
		$producto->name=$request->get('nombre');
		$producto->description=$request->get('descripcion');
		$producto->update();
		return Redirect::to('producto');
		}
	static function store(ProductoFormRequest $request){
		
		$producto=new Product;
		$producto->name=$request->get('nombre');
		$producto->description=$request->get('descripcion');
		$producto->save();
		return Redirect::to('producto');
		}	
	static function show($id){
			
			return view('producto.show',["producto"=>Product::findOrFail($id)]);
		
		}
		
	static function edit($id){
		
		return view('producto.edit',["producto"=>Product::findOrFail($id)]);
		}	
	static function prueba(){
		$producto=Product::all();
		return view('producto.prueba',["products"=>$producto]);
		
		}
		
		
		
}
