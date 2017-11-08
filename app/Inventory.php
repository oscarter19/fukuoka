<?php

namespace sysCoco;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{	
	protected $table = 'inventories';
	protected $primaryKey = 'id_inventory';
	public $timestamps= 'false';
	
	protected $fillable=[
	'date',
	'user_name',
	'details'	
	];
	protected $guarded=[
	
	];
    //
}
