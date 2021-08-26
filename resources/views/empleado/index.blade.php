{{-- Mensaje al usuario --}}
@if (Session::has('mensaje'))
{{Session::get('mensaje')}}
    
@endif



{{-- Formulario para registrar empleados --}}

{{-- Mandar los datos mediante post a la ruta empleado para entrar a store--}}
<form action="{{url('/empleado')}}" method="post" enctype="multipart/form-data">

{{-- Llave de seguridad de laravel para identificar formulario--}}
@csrf



{{-- Incluir formulario con boton dinamico según la acción (crear o actualizar) --}}
@include('empleado/form', ['modo'=>'Crear']);



</form>

