{{-- Titulo dinámico por mensajes de inclusión entre vistas --}}
<h1>{{$modo}}</h1>

{{-- Si hay mensajes de error mostrarlos al usuario --}}
@if (count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
   
<li>Errores en los Datos Ingresados, Revise los Campos</li>

</ul>
</div>
@endif
    
    
    
    {{-- Si hay mensaje de éxito mostrarlo al usuario --}}
@if (Session::has('mensaje'))


{{-- Mostrar errores --}}
<div class="alert alert-success alert-dismissible" role="alert">
   
        {{Session::get('mensaje')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@endif


{{-- JQuery.js --}}
{{-- <script type="text/javascript" src="{{asset('js/jquery-3.6.0.min.js')}}"></script>   --}}

{{-- ESTILOS CSS --}}

{{-- Bootstrap --}}
<link rel="stylesheet" href="{{asset('css/app.css')}}">






{{-- Formulario --}}

<div class="form-group">
<label for="foto">Foto:</label>
@if (isset($empleado->foto))
<img src="{{asset('storage').'/'.$empleado->foto}}" alt="Sin Foto" width="100">
@endif

<input type="file" name="foto" id="foto" value="">
{{-- Mensaje de error mediante blade --}}
@error('foto')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>





{{-- DATOS GENERALES --}}

<div class="form-group">
<label for="nombre">Nombre:</label>    
<input class="form-control" type="text" name="nombre" id="nombre" value="{{isset($empleado->nombre)?$empleado->nombre:old('nombre')}}">
{{-- Mensaje de error mediante blade --}}
@error('nombre')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>



<div class="form-group">
<label for="A_paterno">Apellido Paterno:</label>
<input class="form-control" type="text" name="A_paterno" id="A_paterno" value="{{isset($empleado->A_paterno)?$empleado->A_paterno:old('A_paterno')}}">
{{-- Mensaje de error mediante blade --}}
@error('A_paterno')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="A_materno">Apellido Materno:</label>
<input class="form-control" type="text" name="A_materno" id="A_materno" value="{{isset($empleado->A_materno)?$empleado->A_materno:old('A_materno')}}">
{{-- Mensaje de error mediante blade --}}
@error('A_materno')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="sexo">Sexo:</label>
{{-- <input class="form-control" type="text" name="sexo" id="sexo" value="{{isset($empleado->sexo)?$empleado->sexo:old('sexo')}}"> --}} 
<select class="form-control"  name="sexo" id="sexo">
    
    
        
    

    <option value="Masculino" {{-- @if($sex=='Masculino') selected @endif --}}  @if (old('sexo') == 'Masculino') selected="selected" @endif>Masculino</option>
    <option value="Femenino"  {{-- @if($sex=='Femenino') selected @endif --}}  @if (old('sexo') == 'Femenino') selected="selected" @endif>Femenino</option>
   

</select>

{{-- Mensaje de error mediante blade --}}
@error('sexo')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="F_nacimiento">Fecha de Nacimiento:</label>
<input class="form-control" type="date" name="F_nacimiento" id="F_nacimiento" value="{{isset($empleado->F_nacimiento)?$empleado->F_nacimiento:old('F_nacimiento')}}" >
{{-- Mensaje de error mediante blade --}}
@error('F_nacimiento')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="L_nacimiento">Lugar de Nacimiento:</label>
<input class="form-control" type="text" name="L_nacimiento" id="L_nacimiento" value="{{isset($empleado->L_nacimiento)?$empleado->L_nacimiento:old('L_nacimiento')}}">
{{-- Mensaje de error mediante blade --}}
@error('L_nacimiento')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="edad">Edad:</label>
<input class="form-control" type="text" name="edad" id="edad" value="{{isset($empleado->edad)?$empleado->edad:old('edad')}}">
{{-- Mensaje de error mediante blade --}}
@error('edad')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>

{{-- DIRECCIÓN --}}

<div class="form-group">
    <label for="C_postal">Código Postal:</label>
    <input class="form-control" type="text" name="C_postal" id="C_postal" value="{{isset($empleado->C_postal)?$empleado->C_postal:old('C_postal')}}">
    {{-- Mensaje de error mediante blade --}}
    @error('C_postal')
    <br>
    <small style="color:#f70000">*{{$message}}</small>
    <br>
    <br>
    @enderror
    </div>


<div class="form-group">
    <label for="calle">Calle:</label>
    <input class="form-control" type="text" name="calle" id="calle" value="{{isset($empleado->calle)?$empleado->calle:old('calle')}}">
    {{-- Mensaje de error mediante blade --}}
    @error('calle')
    <br>
    <small style="color:#f70000">*{{$message}}</small>
    <br>
    <br>
    @enderror
    </div>


<div class="form-group">
<label for="N_exterior">Número Ext.:</label>
<input class="form-control" type="text" name="N_exterior" id="N_exterior" value="{{isset($empleado->N_exterior)?$empleado->N_exterior:old('N_exterior')}}">
{{-- Mensaje de error mediante blade --}}
@error('N_exterior')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="N_interior">Número Int.:</label>
<input class="form-control" type="text" name="N_interior" id="N_interior" value="{{isset($empleado->N_interior)?$empleado->N_interior:old('N_interior')}}">
{{-- Mensaje de error mediante blade --}}
@error('N_interior')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="colonia">Colonia:</label>
<select class="custom-select" name="colonia" id="colonia" data-old="{{old('colonia')}}">
   
    {{--
    <option value="1">uno</option>
    <option value="2">dos</option>
    <option value="3">tres</option>
    <option value="4">cuatro</option> --}}

    {{-- <option value="">Seleccione la Colonia</option> --}}
    {{-- @foreach ($colonias->get() as $index=>$colonia) --}}
   {{--  <option value="{{index}}" {{old('colonia')==$index?'selected':''}}>{{$colonia}}</option> --}}
    {{-- @endforeach --}}
    
</select>
{{-- <input class="form-control" type="text" name="colonia" id="colonia" value="{{isset($empleado->colonia)?$empleado->colonia:old('colonia')}}"> --}}
{{-- Mensaje de error mediante blade --}}
@error('colonia')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="municipio">Municipio:</label>
<input class="form-control" type="text" name="municipio" id="municipio" value="{{isset($empleado->municipio)?$empleado->municipio:old('municipio')}}">
{{-- Mensaje de error mediante blade --}}
@error('municipio')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="estado">Estado:</label>
<input class="form-control" type="text" name="estado" id="estado" value="{{isset($empleado->estado)?$empleado->estado:old('estado')}}">
{{-- Mensaje de error mediante blade --}}
@error('estado')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>

<div class="form-group">
<label for="E_calles">Entre Calles:</label>
<input class="form-control" type="text" name="E_calles" id="E_calles" value="{{isset($empleado->E_calles)?$empleado->E_calles:old('E_calles')}}">
{{-- Mensaje de error mediante blade --}}
@error('E_calles')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="referencias">Referencias:</label>
<input class="form-control" type="text" name="referencias" id="referencias" value="{{isset($empleado->referencias)?$empleado->referencias:old('referencias')}}">
{{-- Mensaje de error mediante blade --}}
@error('referencias')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="T_casa">Tel. de Casa:</label>
<input class="form-control" type="text" name="T_casa" id="T_casa" value="{{isset($empleado->T_casa)?$empleado->T_casa:old('T_casa')}}">
{{-- Mensaje de error mediante blade --}}
@error('T_casa')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="T_movil">Tel. Móvil:</label>
<input class="form-control" type="text" name="T_movil" id=T_movil value="{{isset($empleado->T_movil)?$empleado->T_movil:old('T_movil')}}">
{{-- Mensaje de error mediante blade --}}
@error('T_movil')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="rfc">RFC:</label>
<input class="form-control" type="text" name="rfc" id="rfc" value="{{isset($empleado->rfc)?$empleado->rfc:old('rfc')}}">
{{-- Mensaje de error mediante blade --}}
@error('rfc')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="curp">CURP:</label>
<input class="form-control" type="text" name="curp" id="curp" value="{{isset($empleado->curp)?$empleado->curp:old('curp')}}">
{{-- Mensaje de error mediante blade --}}
@error('curp')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="nss">NSS:</label>
<input class="form-control" type="text" name="nss" id="nss" value="{{isset($empleado->nss)?$empleado->nss:old('nss')}}">
{{-- Mensaje de error mediante blade --}}
@error('nss')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="T_sangre">Tipo de Sangre:</label>
<input class="form-control" type="text" name="T_sangre" id="T_sangre" value="{{isset($empleado->T_sangre)?$empleado->T_sangre:old('T_sangre')}}">
{{-- Mensaje de error mediante blade --}}
@error('T_sangre')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="enfermedades">Enfermedades:</label>
<input class="form-control" type="text" name="enfermedades" id="enfermedades" value="{{isset($empleado->enfermedades)?$empleado->enfermedades:old('enfermedades')}}">
{{-- Mensaje de error mediante blade --}}
@error('enfermedades')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="escolaridad">Escolaridad:</label>
<input class="form-control" type="text" name="escolaridad" id="escolaridad" value="{{isset($empleado->escolaridad)?$empleado->escolaridad:old('escolaridad')}}">
{{-- Mensaje de error mediante blade --}}
@error('escolaridad')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="N_familiar">Nombre de Familiar:</label> 
<input class="form-control" type="text" name="N_familiar" id="N_familiar" value="{{isset($empleado->N_familiar)?$empleado->N_familiar:old('N_familiar')}}">
{{-- Mensaje de error mediante blade --}}
@error('N_familiar')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="T_familiar">Tel. de Familiar:</label>
<input class="form-control" type="text" name="T_familiar" id="T_familiar" value="{{isset($empleado->T_familiar)?$empleado->T_familiar:old('T_familiar')}}">
{{-- Mensaje de error mediante blade --}}
@error('T_familiar')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="puesto">Puesto:</label>
<input class="form-control" type="text" name="puesto" id="puesto" value="{{isset($empleado->puesto)?$empleado->puesto:old('puesto')}}">
{{-- Mensaje de error mediante blade --}}
@error('puesto')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>

<div class="form-group">
<label for="E_civil">Estado Civil:</label>
<input class="form-control" type="text" name="E_civil" id="E_civil" value="{{isset($empleado->E_civil)?$empleado->E_civil:old('E_civil')}}">
{{-- Mensaje de error mediante blade --}}
@error('E_civil')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>


<div class="form-group">
<label for="status">Status:</label>
<input class="form-control" type="text" name="status" id="status" value="{{isset($empleado->status)?$empleado->status:old('status')}}">
{{-- Mensaje de error mediante blade --}}
@error('status')
<br>
<small style="color:#f70000">*{{$message}}</small>
<br>
<br>
@enderror
</div>




<button class="btn btn-secondary"" type="reset" name="limpiar" id="limpiar">Limpiar formulario</button>
{{-- <input type="submit" value="Enviar"> --}}
<button class="btn btn-success" type="submit">{{$modo}} Registro</button>
<a href="/empleado/create"><button class="btn btn-primary" type="button" name="buscar" id="buscar">Buscar</button></a>
<a href="{{url('/empleado/create')}}"><button class="btn btn-link" type="button">Regresar</button></a>
<br>




{{-- SCRIPTS --}}

{{-- Bootstrap --}}
<script src="{{asset('js/app.js')}}"></script>


{{-- Jquery,Ajax y Jquery para llenar el formulario de forma dinámica --}}
<script>

/*Ejecutar hasta que se cargue todo el documento--}}*/
$(document).ready(function () {

/* Función principal */
function loadcp(){

   var codigoP=$('#C_postal').val();
   
   /*Petición ajax con request a la ruta definida y la función getColonia del controlador*/
       $.ajax({
           url: "{{route('colonia.empleado')}}",
           method: 'GET',
           data: {buscar:codigoP},
       }).done(function(res){
           
           /*Pasar a un arreglo de tipo string desde el JSON*/
           var arreglo=JSON.parse(res);

           
           
           /*Variable para la opción elegida anteriormente, si está vacio apenas va a elegir por primera vez*/
           
           var old=$('#colonia').data('old')!=''?$('#colonia').data('old'):''; 
           
   
          /*  Limpiar Select colonia del formulario*/
           $('#colonia').empty(); 
           $('#colonia').append("<option value=''>Seleccione una Colonia</option>");
          
           $.each(arreglo,function (index, value) {
           
                   /*Llenar el Select y los campos estado y municipio*/
                       
                       $('#colonia').append("<option value='"+value.colonia+"'  "+(old==value.colonia ? 'selected':'')+"     >"+value.colonia+"</option>");
                       $('#municipio').val(value.municipio);
                       $('#estado').val(value.estado);
                       
                       
                      /*  var texto=$('#colonia').find('option:selected').text();
                       $('#colonia').val(texto); */ 
                       
                   })
   
       });
   
}


/* Cargar función al recargar página */
loadcp();

/* Función al escuchar cambios en el campo de Código Postal */
$('#C_postal').on('change',loadcp); 

});



 </script>

 {{-- Calcular edad a partir de fecha de nacimiento--}}
<script>
    $(document).ready(function () {
$('#F_nacimiento').on('change',function () {

    /* Prueba */
    fecha = $(this).val();
            var hoy = new Date();
            var cumpleanos = new Date(fecha);
            var edad = hoy.getFullYear() - cumpleanos.getFullYear();
            var m = hoy.getMonth() - cumpleanos.getMonth();

            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                edad--;
            }
            $('#edad').val(edad);
});

});

</script>


{{--Capturar valor ingresado en el campo Sexo--}}
{{--<script>

$(document).ready(function () {
$('#sexo').on('change',function () {

/*   Almacenar valor ingresado en el select Sexo */
    /* var valor=this.value; */
    /*Almacenar Texto selecionado del select*/
    /* var texto=$(this).find('option:selected').text();
    $('#sexo').val(texto); */

    /*  Limpiar Select colonia del formulario*/
                $('#sexo').empty(); 
    
</script> --}}






      
    
  