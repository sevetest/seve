{{-- Mensaje al usuario --}}
@if (Session::has('mensaje'))
{{Session::get('mensaje')}}
    
@endif
    

{{-- Bootstrap --}}
<link rel="stylesheet" href="{{asset('css/app.css')}}">

{{-- Tabla para mostrar el registro a buscar --}}
<p><h1 style="color:#070707">Busqueda de Registros</h1></p>
<a href="{{url('/empleado/')}}"><button type="button" class="btn btn-success">Nuevo Registro</button></a>
<br>
<br>
<table class="table table-dark table-hover" >
    <thead>
        <tr>
            {{-- 32 encabezados --}}
          <th scope="col">#</th>
          <th scope="col">Foto</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido Paterno</th>
          <th scope="col">Apellido Materno</th>
          <th scope="col">Sexo</th>
          <th scope="col">Fecha de Nacimiento</th>
           <th scope="col">Lugar de Nacimiento</th>
           <th scope="col">Edad</th>
           <th scope="col">Código Postal</th>
           <th scope="col">Calle</th>
           <th scope="col">No. Exterior</th>
           <th scope="col">No. Interior</th>
           <th scope="col">Colonia</th>
           <th scope="col">Municipio</th>
           <th scope="col">Estado</th>
           <th scope="col">Entre Calles</th>
           <th scope="col">Referencias</th>
           <th scope="col">Tel. de Casa</th>
           <th scope="col">Tel. Móvil</th>
           <th scope="col">RFC</th>
           <th scope="col">CURP</th>
           <th scope="col">NSS</th>
           <th scope="col">Tipo de sangre</th>
           <th scope="col">Enfermedades</th>
           <th scope="col">Escolaridad</th>
           <th scope="col">Nombre de Familiar</th>
           <th scope="col">Tel. de Familiar</th>
           <th scope="col">Puesto</th>
           <th scope="col">Estado Civil</th>
           <th scope="col">Status</th>
           <th scope="col">Registrado el</th>
           <th scope="col">Actualizado el</th>

        </tr>
    </thead>

    <tbody>

        {{-- Solicitar datos de la colecciòn empleados creados en el modelo Empleado y guardarlos en la variable empleado --}}

        @foreach ($empleados as $empleado)
            

        <tr>
            {{-- Datos de la tabla empleados --}}
          <th scope="row">{{$empleado->id}}</th>
          <td><img src="{{asset('storage').'/'.$empleado->foto}}" alt="Sin foto" width="100" height="100"></td>
          <td>{{$empleado->nombre}}</td>
          <td>{{$empleado->A_paterno}}</td>
          <td>{{$empleado->A_materno}}</td>
          <td>{{$empleado->sexo}}</td>
          <td>{{$empleado->F_nacimiento}}</td>
          <td>{{$empleado->L_nacimiento}}</td>
          <td>{{$empleado->edad}}</td>
          <td>{{$empleado->C_postal}}</td>
          <td>{{$empleado->calle}}</td>
          <td>{{$empleado->N_exterior}}</td>
          <td>{{$empleado->N_interior}}</td>
          <td>{{$empleado->colonia}}</td>
          <td>{{$empleado->municipio}}</td>
          <td>{{$empleado->estado}}</td>
          <td>{{$empleado->E_calles}}</td>
          <td>{{$empleado->referencias}}</td>
          <td>{{$empleado->T_casa}}</td>
          <td>{{$empleado->T_movil}}</td>
          <td>{{$empleado->rfc}}</td>
          <td>{{$empleado->curp}}</td>
          <td>{{$empleado->nss}}</td>
          <td>{{$empleado->T_sangre}}</td>
          <td>{{$empleado->enfermedades}}</td>
          <td>{{$empleado->escolaridad}}</td>
          <td>{{$empleado->N_familiar}}</td>
          <td>{{$empleado->T_familiar}}</td>
          <td>{{$empleado->puesto}}</td>
          <td>{{$empleado->E_civil}}</td>
          <td>{{$empleado->status}}</td>
          <td>{{$empleado->created_at}}</td>
          <td>{{$empleado->updated_at}}</td>
          
          {{-- Botones para eliminar o Editar registro buscado --}}
          {{-- Mandar el id concatenado a la ruta empleado/edit para entrar a EDIT --}}
          <td><a href="{{url('/empleado/'.$empleado->id.'/edit')}}"><button type="button" class="btn btn-warning">Editar</button></a>
            <br>
            <br>
            {{-- Mandar el id concatenado a la ruta empleado para entrar a DELETE --}}
            <form action="{{url('/empleado/'.$empleado->id)}}" method="post" class="d-inline">
             {{-- Llave de seguridad de laravel para identificar formulario--}}
            @csrf
            {{-- Método delete que requiere destroy del controlador --}}
            {{method_field('DELETE')}}

                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea borrar registro?')" >Borrar</button>

            </form>


          </td>
          
        </tr>
        @endforeach

    </tbody>
</table>
{{-- Bootstrap --}}
<script src="{{asset('js/app.js')}}"></script>