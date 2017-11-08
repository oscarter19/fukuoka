<?php
	
	namespace sysCoco\Http\Controllers;
	
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Redirect;
	use Illuminate\Support\Facades\Input;
	

	use sysCoco\Http\Requests\EntryFormRequest;
	use sysCoco\Entries;
	use sysCoco\Product;
	use sysCoco\User;
	use sysCoco\EntriesDetails;
	use DB;
	use Response;
	use Illuminate\Support\Collection;
	use Illuminate\Support\Facades\Session;
	use Carbon\Carbon;
	
	class EntriesController extends Controller
	{
		public function __construct(){
			$this->middleware('auth');
			
		}
		static function index(Request $request){
			
			if($request){
				$query=	trim($request->get('searchText'));
				$ingreso=DB::table('entries as i')
				->join('users as u','i.id_user','=','u.id')
				
				->select('i.id_entries','i.date_entry','i.farm','i.delivery_by','u.name','i.cantidad','i.conductor','i.imagen')
				->where('i.farm','LIKE','%'.$query.'%')
				->orderBy('i.id_entries','desc')
				->groupBy('i.id_entries','i.date_entry','i.farm','i.delivery_by','u.name','i.cantidad','i.conductor','i.imagen')
				->paginate(7);			
			}
			return view('entrada.index',["entries"=>$ingreso,"searchText"=>$query]);
			/*
				$users=User::all();
				return view('entrada.create',compact('users'));
			*/
		}
		static function create(){
			$users=User::all();
			$proveedor= DB::table('providers')
			->select('id_provider','nombre')
			->get();
			$productos=DB::table('products')
			->select('id_product','name')
			->get();
			return view('entrada.create',["users"=>$users,"products"=>$productos,"prove"=>$proveedor]);
			
			
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
			
		
				
				$entrada=new Entries();
				//$entrada->date_entry = $request->get('date_entry');
				$mydate = Carbon::now('America/Santo_Domingo');
				$entrada->date_entry = $mydate->toDateTimeString();
				$entrada->id_user = $request->get('id_user');
				$entrada->farm = $request->get('farm');
				$entrada->cantidad = $request->get('cantidad');
				$entrada->delivery_by = $request->get('proveedor');
				$entrada->conductor = $request->get('conductor');
				if(Input::hasFile('imagen')){
					$file=Input::file('imagen');
					$file->move(public_path().'/imagenes/foto/',$file->getClientOriginalName());
					$entrada->imagen=$file->getClientOriginalName();
					
					}
				
				$entrada->save();
			
				
			return Redirect::to('entrada');	
			
			
			
		}	
		static function show($id){
		
			$ingreso=DB::table('entries as i')
			->join('users as u','i.id_user','=','u.id')
			->join('entries_details as ed','i.id_entries','=','ed.id_entry')
			->select('i.id_entries','i.date_entry','i.farm','i.delivery_by','u.name','conductor',DB::raw('sum(ed.quantity)as total'))
			->where('i.id_entries','=',$id)
			->groupBy('i.id_entries','i.date_entry','i.farm','i.delivery_by','u.name','conductor')
			->first();
			
			$detalles = DB::table('entries_details as ed')
			->join('products as p','p.id_product','=','ed.id_product')
			->select('p.name as producto','ed.quantity','ed.price')
			->where('ed.id_entry','=',$id)->get();
			
			if(empty($ingreso)){
			Session::flash('flash_message', 'Aun no ha Cargado los detalles de esta entrada');
			
			return Redirect::to('entrada');
			}else{
				return view('entrada.show',["entrada"=>$ingreso,"detalles"=>$detalles]);
				}
			
			
		}
		static function edit($id){
			$ingreso=DB::table('entries as i')
			->join('users as u','i.id_user','=','u.id')
			
			->select('i.id_entries','i.date_entry','i.farm','i.delivery_by','cantidad','conductor','u.name')
			->where('i.id_entries','=',$id)
			->groupBy('i.id_entries','i.date_entry','i.farm','i.delivery_by','cantidad','conductor','u.name')
			->first();
			
			
			$productos=DB::table('products')
			->select('id_product','name')
			->get();
		
			return view('entDetalle.create',["entrada"=>$ingreso,"products"=>$productos]);
			
			
			
			
			}
		
	
		
		
		
		
		
	}
