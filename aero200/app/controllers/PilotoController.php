<?php

class PilotoController extends \BaseController {


	public function index()
	{
		$pilotos = Piloto::all();
		$this->layout->titulo = 'Listado de Pilotos';
		$this->layout->nest(
			'content',
			'pilotos.index',
			array(
				'pilotos' => $pilotos
			)
		);

	}


	
	public function create()
	{
		$this->layout->titulo = 'Agregar Piloto';
		$this->layout->nest(
			'content',
			'pilotos.create',
			array()
		);
	}


	public function store()
	{
		$nombre = Input::get('nombre');
		$piloto = new Piloto();
		$piloto->nombre = $nombre;
		$piloto->save();
		return Redirect::to('pilotos');
	}


	public function edit($id)
	{
		$this->layout->titulo = 'Editar Piloto';
		$piloto = Piloto::find($id);
		$this->layout->nest(
			'content',
			'pilotos.edit',
			array(
				'piloto' => $piloto
			)
		);
	}

	public function update($id)
	{
		$nombre = Input::get('nombre');
		
		$piloto = Piloto::find($id);
		$piloto->nombre = $nombre;
		$piloto->save();
		return Redirect::to('pilotos');
	}


	public function destroy($id)
	{
		$piloto = Piloto::find($id);
		$piloto->delete();
		return Redirect::to('pilotos');
	}


}