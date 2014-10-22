<?php
require_once( '/home/josue/Desktop/MusicBox/mbox/vendor/autoload.php');

use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;

class ArchivoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    if(isset($estado)){

	    }

	    else{
	    	$estado="esperando Datos del usuario";
	    }

		$this->layout->titulo = 'MusicBox';
		$this->layout->estado = $estado;
	$this->layout->nest(
			'content',
			'archivo.index');
}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$id_user;
		$file   = Input::file('file');
 		$partes   = Input::get('partes');
 		$tiempo   = Input::get('tiempo');

 		$subidos = "/home/josue/Desktop/MusicBox/mbox/public";

 		$nombre = $file->getClientOriginalName();
 		$informacion = pathinfo($nombre);
		$extension  = $informacion['extension'];
       
        
		if( ($partes != "")&&($tiempo == "") ||($partes == "")&&($tiempo != "") )
		{
			$subido = $file->move($subidos, $nombre);
			if($subido) {
				
				 $ruta=$subidos."/".$nombre;
				$insercion = Archivo::store($nombre,$ruta,$partes,$tiempo);
				$this->enviarColas(json_encode($insercion),$insercion->id);
				$id_user=$insercion->id;
				echo($id_user);
				
			}
			else {
				return Response::json("error");
			}
		}
		else {

			return Response::json("imposible dividir entre ambas");
		}
		$estado="Partiendo espere";
		 return Redirect::action('ArchivoController@index');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
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
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
	}

    private function enviarColas($insercion,$id)
	{
		$connection = new AMQPConnection('localhost', 5672, 'guest', 'guest');
		$channel = $connection->channel();
		$channel->queue_declare($id, false, false, false, false);
		$msg = new AMQPMessage($insercion);
		$channel->basic_publish($msg, '', 'hello');
		$channel->close();
		$connection->close();

	}


}
