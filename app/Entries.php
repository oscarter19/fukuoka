<?php

namespace sysCoco;

use Illuminate\Database\Eloquent\Model;

class Entries extends Model
{
    protected $table= 'entries';
	protected $primaryKey= 'id_entries';
	public $timestamps= false;
	
	protected $fillable=[
	'date_entry',
	'user',
	'farm',
	'delivery_by',
	'cantidad',
	'rnc',
	'imagen'
	];
	protected $guarded=[
	
	];
}
