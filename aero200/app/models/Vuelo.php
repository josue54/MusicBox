<?php

class Vuelo extends Eloquent
{
	protected $table = 'vuelo';
	protected $fillable = array('piloto_id', 'avion_id', 'descripcion');
	protected $guarded  = array('id');
	public    $timestamps = false;

	public static function VuelosDisponibles()
	{
		$sql = 'select v.id, v.descripcion, p.nombre, a.placa
from 
vuelo v 
inner join piloto p on (v.piloto_id = p.id)
inner join avion a on (v.avion_id = a.id)';
		return DB::select($sql);
	}
}