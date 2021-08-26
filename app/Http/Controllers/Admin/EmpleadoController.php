<?php

namespace App\Http\Controllers\Admin;

use App\Models\Empleado;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//Libreria para borrar archivos en la carpeta storage de la app
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{


//Funciones para mostrar las páginas (vistas)


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Retorno de la vista de Inicio para el registro de empleados
        return view('empleado.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Se guarda en la colección empleados los registros de la tabla empleado
        /* $datos['empleados']=Empleado::paginate(1); */
        $datos['empleados']=DB::select('select * from empleados', [1]);
        
        //Retorna la vista para buscar registros de empleados 
        return view('empleado.create', $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //Validación de datos ingresados
        $campos=[
        'foto'=>'required|max: 10000|mimes:jpeg,png,jpg',   
        'nombre'=>'required|string|max: 50',
        'A_paterno'=>'required|string|max:30',
        'A_materno'=>'required|string|max:30',
        'sexo'=>'required|string|max:10',
        'F_nacimiento'=>'required|date|date_format:Y-m-d',
        'L_nacimiento'=>'required|string|max: 50',
        'edad'=>'required|numeric|digits:2',
        'C_postal'=>'required|numeric|digits:5',
        'calle'=>'required|string|max: 40',
        'N_exterior'=>'required|max: 10',
        'N_interior'=>'max: 10',
        'colonia'=>'required|string|max:60', 
        'municipio'=>'required|string|max:40',
        'estado'=>'required|string|max:25',
        'E_calles'=>'required|string|max:100',
        'referencias'=>'required|string|max:100',
        'T_casa'=>'required|numeric|digits:10',
        'T_movil'=>'required|numeric|digits:10',
        'rfc'=>'required|string|min:13',
        'curp'=>'required|string|min:18',
        'nss'=>'required|numeric|digits:11',
        'T_sangre'=>'required|string|max:15',
        'enfermedades'=>'required|string|max:100',
        'escolaridad'=>'required|string|max:50',
        'N_familiar'=>'required|string|max:50',
        'T_familiar'=>'required|numeric|digits:10',
        'puesto'=>'required|string|max:25',
        'E_civil'=>'required|string|max:15',
        'status'=>'required|string|max:15'
        ];

       /* Mensajes de error  */
        $mensaje=[
        'foto.required'=>'La Foto es requerida',   
        'nombre.required'=>'El Nombre es requerido',
        'A_paterno.required'=>'El Apellido Paterno es requerido',
        'A_materno.required'=>'El Apellido Materno es requerido',
        'sexo.required'=>'El Sexo es requerido',
        'F_nacimiento.required'=>'La Fecha de Nacimiento es requerida',
        'L_nacimiento.required'=>'El Lugar de Nacimiento es requerido',
        'edad.required'=>'La Edad es requerida',
        'C_postal.required'=>'El Código Postal es requerido',
        'calle.required'=>'La Calle es requerida',
        'N_exterior.required'=>'El Número Exterior es requerido',
        'N_interior.required'=>'El Número Interior es requerido',
        'colonia.required'=>'La Colonia es requerida', 
        'municipio.required'=>'El Municipio es requerido',
        'estado.required'=>'El Estado es requerido',
        'E_calles.required'=>'Entre Calles es requerido',
        'referencias.required'=>'Las Referencias son requeridas',
        'T_casa.required'=>'El Teléfono de Casa es requerido',
        'T_movil.required'=>'El Teléfono Móvil es requerido',
        'rfc.required'=>'El RFC es requerido',
        'curp.required'=>'El CURP es requerido',
        'nss.required'=>'El Número de Seguridad Social es requerido',
        'T_sangre.required'=>'El Tipo de Sangre es requerido',
        'enfermedades.required'=>'La Respuesta es requerida aún en caso negativo',
        'escolaridad.required'=>'La Escolaridad es requerida',
        'N_familiar.required'=>'El Nombre del Contacto Familiar es requerido',
        'T_familiar.required'=>'El Teléfono del Contacto Familiar es requerido',
        'puesto.required'=>'El Puesto es requerido',
        'E_civil.required'=>'El Estado Civil es requerido',
        'status.required'=>'El Status es requerido (Activo/Baja/Prospecto)'
            
        ];

        /*Validar datos */
        $this->validate($request,$campos,$mensaje);



        //Solicitud para envió de datos desde la ruta /empleado
         $datosEmpleado=request()->except('_token');

         //Agregar nombre y su extension del archivo enviado
         if($request->hasFile('foto')){
            //tomamos el nombre del archivo y lo insertamos en la carpeta public/uploads que está dentro de la carpeta app del proyecto
        $datosEmpleado['foto']=$request->file('foto')->store('uploads','public');
        }
        
         //Insercción de datos mediante el modelo Empleado a la base de datos
         Empleado::insert($datosEmpleado);

         //redirigir al usuario al mismo formulario
         return redirect('/empleado/')->with('mensaje','Registro Guardado con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //Buscar registro por id
        $empleado=Empleado::findOrFail($id);
        //Se retorna la vista para editar el registro buscado con la colección(datos) 'empleado'
        return view('empleado.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
         //Validación de datos ingresados
         $campos=[
             
            'nombre'=>'required|string|max: 50',
            'A_paterno'=>'required|string|max:30',
            'A_materno'=>'required|string|max:30',
            'sexo'=>'required|string|max:10',
            'F_nacimiento'=>'required|date|date_format:Y-m-d',
            'L_nacimiento'=>'required|string|max: 50',
            'edad'=>'required|numeric|digits:2',
            'C_postal'=>'required|numeric|digits:5',
            'calle'=>'required|string|max: 40',
            'N_exterior'=>'required|max: 10',
            'N_interior'=>'max: 10',
            'colonia'=>'required|string|max:60',
            'municipio'=>'required|string|max:40',
            'estado'=>'required|string|max:25',
            'E_calles'=>'required|string|max:100',
            'referencias'=>'required|string|max:100',
            'T_casa'=>'required|numeric|digits:10',
            'T_movil'=>'required|numeric|digits:10',
            'rfc'=>'required|string|min:13',
            'curp'=>'required|string|min:18',
            'nss'=>'required|numeric|digits:11',
            'T_sangre'=>'required|string|max:15',
            'enfermedades'=>'required|string|max:100',
            'escolaridad'=>'required|string|max:50',
            'N_familiar'=>'required|string|max:50',
            'T_familiar'=>'required|numeric|digits:10',
            'puesto'=>'required|string|max:25',
            'E_civil'=>'required|string|max:15',
            'status'=>'required|string|max:15'
            ];
    
           /* Mensajes de error  */
            $mensaje=[
               
            'nombre.required'=>'El Nombre es requerido',
            'A_paterno.required'=>'El Apellido Paterno es requerido',
            'A_materno.required'=>'El Apellido Materno es requerido',
            'sexo.required'=>'El Sexo es requerido',
            'F_nacimiento.required'=>'La Fecha de Nacimiento es requerida',
            'L_nacimiento.required'=>'El Lugar de Nacimiento es requerido',
            'edad.required'=>'La Edad es requerida',
            'C_postal.required'=>'El Código Postal es requerido',
            'calle.required'=>'La Calle es requerida',
            'N_exterior.required'=>'El Número Exterior es requerido',
            'N_interior.required'=>'El Número Interior es requerido',
            'colonia.required'=>'La Colonia es requerida',
            'municipio.required'=>'El Municipio es requerido',
            'estado.required'=>'El Estado es requerido',
            'E_calles.required'=>'Entre Calles es requerido',
            'referencias.required'=>'Las Referencias son requeridas',
            'T_casa.required'=>'El Teléfono de Casa es requerido',
            'T_movil.required'=>'El Teléfono Móvil es requerido',
            'rfc.required'=>'El RFC es requerido',
            'curp.required'=>'El CURP es requerido',
            'nss.required'=>'El Número de Seguridad Social es requerido',
            'T_sangre.required'=>'El Tipo de Sangre es requerido',
            'enfermedades.required'=>'La Respuesta es requerida aún en caso negativo',
            'escolaridad.required'=>'La Escolaridad es requerida',
            'N_familiar.required'=>'El Nombre del Contacto Familiar es requerido',
            'T_familiar.required'=>'El Teléfono del Contacto Familiar es requerido',
            'puesto.required'=>'El Puesto es requerido',
            'E_civil.required'=>'El Estado Civil es requerido',
            'status.required'=>'El Status es requerido (Activo/Baja/Prospecto)'
                
            ];

            /*Solicitar foto en caso de no tenerla en el registro */
            if($request->hasFile('foto')){
                $campos=['foto'=>'required|max: 10000|mimes:jpeg,png,jpg'];
                $mensaje=['foto.required'=>'La Foto es requerida'];
            }
    
            /*Validar datos */
            $this->validate($request,$campos,$mensaje);





        //Se quita la clave del formulario y el método PATCH en la información recepcionada
        $datosEmpleado=request()->except(['_token', '_method']);

        //Agregar nombre y su extension del archivo enviado
        if($request->hasFile('foto')){
            //Buscar registro por id
        $empleado=Empleado::findOrFail($id);
        //borrar archivo anterior y actualizar nueva foto en la carpeta public/uploads
        Storage::delete('public/'.$empleado->foto);
            //tomamos el nombre del archivo y lo insertamos en la carpeta public/uploads que está dentro de la carpeta app del proyecto
        $datosEmpleado['foto']=$request->file('foto')->store('uploads','public');
        }

        //Actualización de datos en la base de datos 
        Empleado::where('id','=',$id)->update($datosEmpleado);

        //Buscar registro por id
        $empleado=Empleado::findOrFail($id);
        //Se retorna la vista para editar el registro buscado con todos su datos en el formulario
        /* return view('empleado.edit',compact('empleado')); */
        return redirect('/empleado/'.$empleado->id.'/edit')->with('mensaje','Registro Actualizado con Éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //Buscar registro de foto en storage por id
        $empleado=Empleado::findOrFail($id);

        if(Storage::delete('public/'.$empleado->foto)){

             //Recepción del metodo DELETE de la vista Mostrar
        Empleado::destroy($id);
       
        }

        return redirect('/empleado/create')->with('mensaje','Registro Borrado con Éxito');
       
    
    }



}
