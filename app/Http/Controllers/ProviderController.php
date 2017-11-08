<?php

namespace sysCoco\Http\Controllers;

use Illuminate\Http\Request;

use sysCoco\Provider;
use Illuminate\Support\Facades\Redirect;
use sysCoco\Http\Requests\ProviderFormRequest;
use DB;

class ProviderController extends Controller
{
    //
	public function __construct(){
		$this->middleware('auth');
		
		}
	static function index(Request $request){
		if($request){
			$query=	trim($request->get('searchText'));	
			$proveedores=DB::table('providers')->where('nombre','LIKE','%'.$query.'%')
			->orderBy('id_provider','asc')
			->paginate(7);
			
			return view('proveedor.index',["providers"=>$proveedores,"searchText"=>$query]);
			}
		
		}	
	static function show(){
		
				return view('provide.show',["proveedor"=>Provider::findOrFail($id)]);

		}
	
	static function create(){
		return view('proveedor.create');
		
		}
	static function destroy($id){
		
		$proveedor= Provider::findOrFail($id);
		Provider::destroy($proveedor->id_provider);
		return Redirect::to('proveedor');
		
		}
	static function update(ProviderFormRequest $request,$id){
		
		$proveedor=Provider::findOrFail($id);
		$proveedor->nombre=$request->get('nombre');
		$proveedor->apellido=$request->get('apellido');
		$proveedor->update();
		return Redirect::to('proveedor');
		
		}
	static function store(ProviderFormRequest $request){
		$proveedor=new Provider;
		$proveedor->nombre=$request->get('nombre');
		$proveedor->apellido=$request->get('apellido');
		$proveedor->cedula= $request->get('cedula');
		$proveedor->direccion= $request->get('direccion');
		$proveedor->telf1=$request->get('telf1');
		$proveedor->telf2=$request->get('telf2');
		$proveedor->correo= $request->get('correo');
		$proveedor->cuenta_banco= $request->get('cuenta_banco');
		
		$proveedor->save();
		return Redirect::to('proveedor');
		
		}	
	
		
	static function edit($id){
		
		return view('proveedor.edit',["proveedor"=>Provider::findOrFail($id)]);
		}
}
