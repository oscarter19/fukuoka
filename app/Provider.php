<?php

namespace sysCoco;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table= 'providers';
	protected $primaryKey= 'id_provider';
	public $timestamps= false;
	
	protected $fillable=[
		'nombre',
		'apellido',
		'telf1',
		'telf2',
		'cedula',
		'direcion',
		'correo',
		'cuenta_banco',	
	];
	protected $guarded=[
	
	];
}
