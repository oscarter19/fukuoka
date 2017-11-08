<?php

namespace sysCoco\Http\Controllers;


	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Redirect;
	use Illuminate\Http\Requests\Input;
	use sysCoco\Http\Requests\EntryFormRequest;
	use sysCoco\Entries;
	use sysCoco\Product;
	use sysCoco\User;
	use sysCoco\EntriesDetails;
	use DB;
	use Response;
	use Illuminate\Support\Collection;
	use Carbon\Carbon;

class EntDetailsController extends Controller
{
    public function __construct(){
			$this->middleware('auth');
			
		}
		static function index(Request $request){
			
			if($request){
				$query=	trim($request->get('searchText'));
				$ingreso=DB::table('entries as i')
				->join('users as u','i.id_user','=','u.id')
				->join('entries_details as ed','i.id_entries','=','ed.id_entry')
				->select('i.id_entries','i.date_entry','i.farm','i.delivery_by','u.name',DB::raw('sum(ed.quantity)as total'))
				->where('i.farm','LIKE','%'.$query.'%')
				->orderBy('i.id_entries','desc')
				->groupBy('i.id_entries','i.date_entry','i.farm','i.delivery_by','u.name')
				->paginate(7);			
			}
			return view('entDetalle.index',["entries"=>$ingreso,"searchText"=>$query]);
			/*
				$users=User::all();
				return view('entrada.create',compact('users'));
			*/
		}
		static function create(){
			
			
			$users=User::all();
			$productos=DB::table('products')
			->select('id_product','name')
			->get();
			return view('entDetalle.create',["users"=>$users,"products"=>$productos]);
			
			
		}
		static function destroy($id){
			
			$ingreso=Entries::findOrFail($id);
			
			return Redirect::to('entrada');
		}
		/*
			static function update(EntryFormRequest $request,$id){
			
			$producto=Product::findOrFail($id);
			$producto->name=$request->get('nombre');
			$producto->description=$request->get('descripcion');
			$producto->update();
			return Redirect::to('producto');
		}*/
		static function store(EntryFormRequest $request){
				$elementos = $request->get('detalle');
				$idproduct = $request->get('id_product');
				$cantidad = $request->get('cantidad');
				$precio = $request->get('precio');
				$detalle= $request->get('id_entrada');
				
				
				$cont =0;
				
				while($cont < count($idproduct)){
					$detalle = new EntriesDetails();
					$detalle->id_entry= $request->get('id_entrada');
					$detalle->id_product = $idproduct[$cont];
					$detalle->quantity = $cantidad[$cont];
					$detalle->price = $precio[$cont];
					$detalle->save();
					$cont = $cont+1;
				}
		
		return Redirect::to('entrada');	
		}
		
		static function show($id){
			$ingreso=DB::table('entries as i')
			->join('users as u','i.id_user','=','u.id')
			->join('entries_details as ed','i.id_entries','=','ed.id_entry')
			->select('i.id_entries','i.date_entry','i.farm','i.delivery_by','u.name',DB::raw('sum(ed.quantity)as total'))
			->where('i.id_entries','=',$id)
			->groupBy('i.id_entries','i.date_entry','i.farm','i.delivery_by','u.name')
			->first();
			
			$detalles = DB::table('entries_details as ed')
			->join('products as p','p.id_product','=','ed.id_product')
			->select('p.name as producto','ed.quantity','ed.price')
			->where('ed.id_entry','=',$id)->get();
			return view('entDetalle.show',["entrada"=>$ingreso,"detalles"=>$detalles]);
			
		}
		
	
		
		
		
		
}
