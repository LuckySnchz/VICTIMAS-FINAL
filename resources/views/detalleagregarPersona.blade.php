
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="css/app.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <title>Eje A: Datos institucionales</title>
      <style>
         .Auno,.Ados{float: left;
         width: 40%
         }
         .AunoDos{overflow: hidden;margin-left: 1%}
      </style>
   </head>
   <header>
     @include('navbar')

   </header>
   <body>

    <h1 class="text-center" style="padding: 15px;">Eje A: Datos institucionales</h1>

    <div class="divpersona" id="divpersona">  <h2 class="text-center" style="padding: -20px;">Persona Asistida</h2></div>

    <section class="container jumbotron shadow p-3 mb-5 bg-white rounded" >

<!Listado Personas asistidas>

        <ul>
        @foreach($personas as $persona)
          @if($persona->idCaso==session("idCaso"))
            <li>
              <a href="detallePersona/{{$persona->id}}">
              {{$persona->nombre_persona_asistida}}</a>
            </li>
          @endif
        @endforeach
        </ul>
        <br>


    <form class="" action="/detalleagregarPersona" method="post">
      {{csrf_field()}}
    <input type="hidden" name="idCaso" value="{{session("idCaso")}}">

<!-A14I Persona Asistida>

      <div class="form-group" {{ $errors->has('nombre_persona_asistida') ? 'has-error' : ''}}>
      <label for="nombre_persona_asistida">A 14I. Nombre y apellido de la persona asistida: </label>
      <input type="text" class="form-control" name="nombre_persona_asistida" id="Nombre_apellido_persona_asistida" value="{{old("nombre_persona_asistida")}}">
      {!! $errors->first('nombre_persona_asistida', '<p class="help-block" style="color:red";>:message</p>') !!}
      </div>

<!-A14II Tipo de vínculo>

      <div class="form-group" {{ $errors->has('vinculo_persona_asistida') ? 'has-error' : ''}}>
      <label for="vinculo_persona_asistida">A 14II. Tipo de vínculo con la víctima: </label>
      <select class="form-control" name="vinculo_persona_asistida" id="vinculo_victima" onChange="selectOnChangeA14II(this)">
            <option value="" selected=disabled>Seleccionar...</option>
              @if(old("vinculo_persona_asistida")==1)
              <option value="1" selected >Familiar</option>
              @else <option value="1">Familiar</option>@endif

              @if(old("vinculo_persona_asistida")==2)
              <option value="2" selected >Lazo afectivo</option>
              @else  <option value="2" >Lazo afectivo</option>@endif

              @if(old("vinculo_persona_asistida")==3)
              <option value="3" selected >Organismo o institución</option>
              @else  <option value="3">Organismo o institución</option>@endif

              @if(old("vinculo_persona_asistida")==4)
              <option value="4" selected >Otro</option>
              @else<option value="4" >Otro</option>@endif
              </select>
      {!! $errors->first('vinculo_persona_asistida', '<p class="help-block" style="color:red";>:message</p>') !!}
      </div>

      @if(old("vinculo_persona_asistida") == 4)
        <div id="vinculo_victima_cual" {{ $errors->has('otro_vinculo_persona_asistida_cual') ? 'has-error' : ''}}>
        @else
          <div id="vinculo_victima_cual" style="display: none;">
      @endif
      <br><label for="">Cuál?</label>
      <div class="">
      <input class="form-control" name="otro_vinculo_persona_asistida_cual" id="vinculo_victima_cual_otro" type="text" value="{{old("otro_vinculo_persona_asistida_cual")}}"><br>
      {!! $errors->first('otro_vinculo_persona_asistida_cual', '<p class="help-block" style="color:red";>:message</p>') !!}
      </div>
      </div>
      </div>

<!-A14III telefono>

      <div class="form-group"{{ $errors->has('telefono_persona_asistida') ? 'has-error' : ''}}>
      <label for="telefono_persona_asistida">A 14III. Teléfono de contacto: </label>
      <input type="text" class="form-control" name="telefono_persona_asistida" id="telefono_contacto" value="{{old("telefono_persona_asistida")}}">
      {!! $errors->first('telefono_persona_asistida', '<p class="help-block" style="color:red";>:message</p>') !!}
      </div>

<!-A14IV Domicilio>

      <div class="form-group"{{ $errors->has('domicilio_persona_asistida') ? 'has-error' : ''}}>
      <label for="domicilio_persona_asistida">A 14 IV. Domicilio del contacto: </label>
      <input type="text" class="form-control" name="domicilio_persona_asistida" id="domicilio_contacto"value="{{old("domicilio_persona_asistida")}}">
      {!! $errors->first('domicilio_persona_asistida', '<p class="help-block" style="color:red";>:message</p>') !!}
      </div>

<!-A14V Localidad de residencia>

      <div class="form-group"{{ $errors->has('localidad_persona_asistida') ? 'has-error' : ''}}>
      <label for="localidad_persona_asistida">A 14 V. Localidad de residencia: </label>
      <input type="text" class="form-control" name="localidad_persona_asistida" id="localidad_residencia" value="{{old("localidad_persona_asistida")}}">
      {!! $errors->first('localidad_persona_asistida', '<p class="help-block" style="color:red";>:message</p>') !!}
      </div>

<!BOTONES>

      <div class="botones">
      <div class="btn-1"> <button type="submit" class="btn btn-primary col-xl" name="button"  >Agregar/Enviar</button><br><br></div>
      </div>
      </form>

     
      </section>

      <script>

         function selectOnChange1(sel) {
             if (sel.value=="2"){
                 divC = document.getElementById("no");
                 divC.style.display = "";
             }else{
                 divC = document.getElementById("no");
                 $('#datos_profesional_interviene_hasta').val('');
                 divC.style.display="none";
             }
         }
      </script>
      <script>
         function muestroCualA2() {
             var checkBox = document.getElementById("checkeado");
             var text = document.getElementById("cualA2");
             if (checkBox.checked == true){
                 text.style.display = "block";
             } else {
               $('#tipos_delitos_otro_cual').val('');
                text.style.display = "none";
             }
         }
      </script>
      <script>
         function selectOnChangeA5bis(sel) {
         if (sel.value=="14"){
         divC = document.getElementById("cualA5");
         divC.style.display = "";}
         else{
         divC = document.getElementById("cualA5");
         $('#derivacion_otro_organismo_cual').val('');

         divC.style.display = "none";}
         }
      </script>
      <script>
         function selectOnChangeA5(sel) {
           if (sel.value=="1"||sel.value=="2"){
                divC = document.getElementById("derivacion_otro_organismo_id");
                $('#otro_organismo').val(' ');
                divC.style.display = "none";}


           if (sel.value=="3"){
                divC = document.getElementById("derivacion_otro_organismo_id");
                divC.style.display = "";

         }}
      </script>
      <script>
         function selectOnChangeA12(sel) {

                                 if (sel.value=="2"){
                divC = document.getElementById("pase_pasivo");
                divC.style.display = "";

         }
         else{
               divC = document.getElementById("pase_pasivo");
               $('#motivo_pase_pasivo').val(' ');
               divC.style.display = "none";
               divC = document.getElementById("cualA12");
               $('#motivo_pase_pasivo_cual').val('');
             divC.style.display = "none";}}
      </script>
      <script>
         function selectOnChangeA12bis(sel) {
           if (sel.value=="4"){
             divC = document.getElementById("cualA12");
             divC.style.display = "";}
             else{
                divC = document.getElementById("cualA12");
                $('#motivo_pase_pasivo_cual').val('');

                divC.style.display = "none";}
         }
      </script>
      <script>
         function selectOnChangeA14(sel) {
           if (sel.value=="2"){
             divC = document.getElementById("personas_asistidas");
             divC.style.display = "";}
             else{
                divC = document.getElementById("personas_asistidas");
                $('#Nombre_apellido_persona_asistida').val('');
                $('#vinculo_victima').val('');
                $('#vinculo_victima_cual_otro').val('');
                $('#telefono_contacto').val('');
                $('#domicilio_contacto').val('');
                $('#localidad_residencia').val('');
                divC.style.display = "none";}
         }
      </script>
      <script>
         function selectOnChangeA14II(sel) {
           if (sel.value=="4"){
             divC = document.getElementById("vinculo_victima_cual");
             divC.style.display = "";}
             else{
                divC = document.getElementById("vinculo_victima_cual");
                $('#vinculo_victima_cual_otro').val('');

                divC.style.display = "none";}
         }
      </script>
      <script>
         function selectOnChangeA15(sel) {
           if (sel.value=="2"){
             divC = document.getElementById("no");
             divC.style.display = "";}
             else{
                divC = document.getElementById("no");
                $('#no').val('');

                divC.style.display = "none";}
         }
      </script>

      </body>
</html>
