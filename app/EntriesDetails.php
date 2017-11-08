<?php

namespace sysCoco;

use Illuminate\Database\Eloquent\Model;

class EntriesDetails extends Model
{
    protected $table= 'entries_details';
	protected $primaryKey= 'id_entries_details';
	public $timestamps= false;
	
	protected $fillable=[
	'id_entry',
	'id_product',
	'quantity',
	'price'
	];
	protected $guarded=[
	
	];
}
