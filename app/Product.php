<?php

namespace sysCoco;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{	
	protected $table= 'products';
	protected $primaryKey= 'id_product';
	public $timestamps= false;
	
	protected $fillable=[
	'name',
	'description',
	'stock'
	];
	protected $guarded=[
	
	];
	
    //
}
