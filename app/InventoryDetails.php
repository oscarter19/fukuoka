<?php

namespace sysCoco;

use Illuminate\Database\Eloquent\Model;

class InventoryDetails extends Model
{	
	protected $table='inventory_details';
	protected $primaryKey= 'id_inv_details';
    public $timestamps='false';
	
	protected $fillable=[
	'id_inventory',
	'id_product',
	'quantity',
	'merma'
	];
	protected $guarded=[
	
	];
	//

