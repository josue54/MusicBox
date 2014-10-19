<?php

class VueloController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$aviones = Avion::all();
		$pilotos = Piloto::all();
		$vuelos  = Vuelo::VuelosDisponibles();

		$this->layout->titulo = 'Listado de Vuelos';
		$this->layout->nest(
			'content',
			'vuelos.index',
			array(
				'aviones' => $aviones,
				'pilotos' => $pilotos,
				'vuelos' => $vuelos
			)
		);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$descripcion = Input::get('descripcion');
		$piloto 	 = Input::get('piloto');
		$avion       = Input::get('avion');

		$vuelo = new Vuelo();
		$vuelo->piloto_id = $piloto;
		$vuelo->avion_id = $avion;
		$vuelo->descripcion = $descripcion;
		$vuelo->save();
		return Redirect::to('vuelos');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$vuelo = Vuelo::find($id);
		$aviones = Avion::all();
		$pilotos = Piloto::all();

		$this->layout->titulo = 'Listado de Vuelos';
		$this->layout->nest(
			'content',
			'vuelos.edit',
			array(
				'aviones' => $aviones,
				'pilotos' => $pilotos,
				'vuelo' => $vuelo
			)
		);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$vuelo = Vuelo::find($id);
		$descripcion = Input::get('descripcion');
		$piloto 	 = Input::get('piloto');
		$avion       = Input::get('avion');
		$vuelo->piloto_id = $piloto;
		$vuelo->avion_id = $avion;
		$vuelo->descripcion = $descripcion;
		$vuelo->save();
		return Redirect::to('vuelos');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$vuelo = Vuelo::find($id);
		$vuelo->delete();
		return Redirect::to('vuelos');
	}


}
