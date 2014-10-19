<?php

class AvionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$aviones = Avion::all();
		$this->layout->titulo = 'Listado de aviones';
		$this->layout->nest(
			'content',
			'aviones.index',
			array(
				'aviones' => $aviones
			)
		);

		//return Response::Json($aviones);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->titulo = 'Crear Avión';
		$this->layout->nest(
			'content',
			'aviones.create',
			array()
		);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$placa = Input::get('placa');
		$color = Input::get('color');
		//return Response::Json(Input::all());
		$avion = new Avion();
		$avion->placa = $placa;
		$avion->color = $color;
		$avion->save();
		return Redirect::to('aviones');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->layout->titulo = 'Editar Avión';
		$avion = Avion::find($id);
		$this->layout->nest(
			'content',
			'aviones.edit',
			array(
				'avion' => $avion
			)
		);
		//return Response::Json($avion);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$placa = Input::get('placa');
		$color = Input::get('color');
		
		$avion = Avion::find($id);
		$avion->placa = $placa;
		$avion->color = $color;
		$avion->save();
		return Redirect::to('aviones');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$avion = Avion::find($id);
		$avion->delete();
		return Redirect::to('aviones');
	}


}
