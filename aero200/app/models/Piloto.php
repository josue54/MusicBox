<?php

class Piloto extends Eloquent
{
	protected $table = 'piloto';
	protected $fillable = array('nombre');
	protected $guarded  = array('id');
	public    $timestamps = false;
}