{{-- Se envía el id y se conforma la ruta para entrar a UPDATE  --}}
<form action="{{url('/empleado/'.$empleado->id)}}" method="post" enctype="multipart/form-data">
{{-- Clave que identifica a el formulario para el envío de datos --}}
@csrf
{{-- Método para realizar la actualización  --}}
{{method_field('PATCH')}}
    {{-- Se llama al documento Form con los datos de busqueda --}}
    @include('empleado/form', ['modo'=>'Actualizar']);

</form>

