<?php
include 'database.php';
require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPConnection;

// Create the Books model 
class Archivo extends Illuminate\Database\Eloquent\Model {

	protected $table      = 'cancion_partes';
    protected $fillable   = array('id_original','ruta');
    protected $guarded    = array('id');
    public    $timestamps = false;

    
}

$connection = new AMQPConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();
$channel->queue_declare('hello', false, false, false, false);
echo ' [*] Waiting for messages. To exit press CTRL+C', "\n";
$callback = function($msg) {
  echo " [x] Received ", $msg->body, "\n";
  $fila = json_decode($msg->body,true);
  foreach ($fila as $key => $value){
    if($key == "id")
        $id = $value;
    if($key == "nombre")
        $nombre = $value;
    if($key == "ruta")
        $ruta = $value;

      if($key == "partes")
        $partes = $value;

      if($key == "duracion")
        $duracion = $value;
  }


echo($nombre);

  	//$nombreArchivo = basename($origen); 
  	//$nombreSinExtension = end(array_reverse(explode(".", $nombreArchivo)));
  	//$nuevoDestino = "/home/liliala/ArchivosMusicBox/Convertidos/$nombreSinExtension.$destino";
    //exec("./ffmpeg -y -i $origen $nuevoDestino");
    //Archivo::edit($id,"$nuevoDestino");
};

$channel->basic_consume('hello', '', false, true, false, false, $callback);

while(count($channel->callbacks)) {
    $channel->wait();
}

$channel->close();
$connection->close();