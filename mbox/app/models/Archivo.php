<?php

class Archivo extends Eloquent {

    protected $table      = 'cancion';
    protected $fillable   = array('nombre','ruta','partes','duracion');
    protected $guarded    = array('id');
    public    $timestamps = false;

    public static function store($nombre,$ruta,$partes,$duracion)
    {
        $archivo = Archivo::create(
            array(
                'nombre'   => $nombre,
                'ruta'  => $ruta,
                'partes'  => $partes,
                'duracion'  => $duracion

            )
        );
        return $archivo;
    }

    public static function show($id)
    {
        $archivos = Archivo::findOrFail($id);
        return $archivos;
    }

}