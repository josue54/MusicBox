<?php

class Avion extends Eloquent
{
	protected $table = 'avion';
	protected $fillable = array('placa', 'color');
	protected $guarded  = array('id');
	public    $timestamps = false;
}