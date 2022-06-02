<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;

class mandardatosController extends Controller
{
  /*   private $title;
    private $message;
    private $fields;
    private $KEY;
    private $Icono;

    public function __construct($title, $message, $key, $icono) {
        $this->title = $title;
        $this->message = $message;
        $this->KEY = $key;
        $this->Icono = $icono;
    } */
    public function NuevoUsuarios(Request $request) {
        try {
            $error = "";
            //$hora_actual=Carbon::parse(Carbon::now())->timezone('America/Bogota')->format('H:i:s');
            //validar usuario si existe
            $validarusuario=User::where('id',$request->cedulaUsuario)->get();
            if (count($validarusuario)>=1) {
                throw new Exception("El usuario ya se registro en el sistema!!");
            } else {
                $Nuveousuario= new User();
                $Nuveousuario->id=$request->cedulaUsuario;
                $Nuveousuario->name=$request->nombreUsuario;
                $Nuveousuario->surnames=$request->apellidoUsuario;
                $Nuveousuario->email=$request->emailUsuario;
                $Nuveousuario->phone=$request->telefonoUsuario;
                $Nuveousuario->city=$request->selectedCities;
                $Nuveousuario->country=$request->selectedCountry;
                $Nuveousuario->save();
                throw new Exception("Guardo Registro Corectamente!");
            } 
        } catch (\Throwable $e) {
            $error = $e->getMessage();
        }

        return response(array('message' => $error), 200);
    }
    public function VerUsuarios(Request $request) {
        $usuarios=User::all();
        return $usuarios;
    }

   

}

