<?php

namespace App\Controllers;

use App\Models\Contactos;

class ContactosController extends Controller
{

    //este metodo es para accedeer a todos ls registros de la tabla contactos a traves del modelo
    public function index()
    {
        $datosContactos = Contactos::all();
        response()->json($datosContactos);
    }

    public function consultar($id)
    {
        $datosContactos = Contactos::find($id);
        response()->json($datosContactos);
    }

    public function agregar()
    {
        $contacto = new Contactos;
        $contacto->nombre = app()->request()->get('nombre');
        $contacto->primerapellido = app()->request()->get('primerapellido');
        $contacto->segundoapellido = app()->request()->get('segundoapellido');
        $contacto->correo = app()->request()->get('correo');
        $contacto->save();
        response()->json(["message" => "Registo agregado con exito"]);
    }

    public function eliminar($id)
    {
         Contactos::destroy($id);

        response()->json(["message" => "El registro se elimino con exito"]);
    }

    
    public function actualizar($id)
    {
       $nombre=app()->request()->get('nombre');
       $primerapellido=app()->request()->get('primerapellido');
       $segundoapellido=app()->request()->get('segundoapellido');
       $correo=app()->request()->get('correo');

       $contacto= Contactos::findOrFail($id);


       $contacto->nombre=($nombre!="")?$nombre:$contacto->nombre;
       $contacto->primerapellido=($primerapellido!="")?$primerapellido:$contacto->primerapellido;
       $contacto->segundoapellido=($segundoapellido!="")?$segundoapellido:$contacto->segundoapellido;
       $contacto->correo=($correo!="")? $correo:$contacto->correo;

       
       $contacto->update();

        response()->json(["message" => "El registro se actualizo con exito"]);
    }
}
