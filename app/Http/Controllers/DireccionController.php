<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sepome;

class DireccionController extends Controller
{
    //Funcion para autorrellenar el formulario con la recepción del valor del input Codigo Postal
    public function getColonias(Request $request){

$cp=$request->input('buscar');

/* Retornar los datos de la base de datos de codigos postales mediante el modelo Empleado y una consulta */

$datos=Sepome::where('cp', $cp)->get();
/* $datos=Sepome::select('select * from empleados')->get(); */

/* Arreglo con los datos de la consulta */
 $data=[]; 

foreach ($datos as $dato) {
    $data[]=[

     /* 'nombre'=>$dato->nombre */
     
     
     'colonia'=>$dato->asentamiento,
     'municipio'=>$dato->municipio,
     'estado'=>$dato->estado

    ];
       } return response(json_encode($data),200)->header('Content-type','text/plain');










        


    }
   }