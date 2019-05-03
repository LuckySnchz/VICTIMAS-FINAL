
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
        <div class="panel"style="background-color:rgb(137, 210, 14);text-align: center;margin-bottom: 0.1%">
                <a class="navbar-brand"  href="/paneldecontrol/{{session("idCaso")}}">
                    <h3 style="color:white">Panel de Control</h3>
                </a>
                </div>

   </header>
   <body>

    <h1 class="text-center" style="padding: 15px;">Eje A: Datos institucionales</h1>
    <h2 class="text-center" style="padding: -30px;">Profesional interviniente</h2><br>

    <section class="container jumbotron shadow p-3 mb-5 bg-white rounded">
<!Listado profesionales>

    <div class="form-group">
    <ul>
      @foreach($profesionales as $profesional)
        @if($profesional->idCaso==session("idCaso"))
        <li>
         
            {{$profesional->usuario->nombre_y_apellido}}
       
        </li>
        @endif
      @endforeach
    </ul>
    </div>


      <form class="" action="/detalleProfesional" method="post">
      {{csrf_field()}}
     
      <input type="hidden" name="idCaso" value="{{session("idCaso")}}">
  <input type="hidden" name="idProfesional" value="{{session("idProfesional")}}">
  <input type="hidden" name="userID_modify" value="{{$profesional->userID_modify}}">

<!A15 Profesional interviniente>

    <div class="form-group"{{ $errors->has('nombre_profesional_interviniente') ? 'has-error' : ''}}>
    <label>A 15. 1 Profesional Interviniente:</label>
    <select class="form-control" name="nombre_profesional_interviniente">
      <option value="" selected=disabled>Seleccionar...</option>
        @foreach ($usuarios as $usuario)
          @if ($usuario->id == $nombre_profesional_interviniente)
            <option selected value="{{ $usuario->id }}">
              {{$usuario->nombre_y_apellido}}</option>
          @else
            <option value="{{ $usuario->id }}">
              {{$usuario->nombre_y_apellido}}</option>
          @endif
        @endforeach
    </select>
    {!! $errors->first('nombre_profesional_interviniente', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>

<!A15.2 Interviene desde>

    <div class="form-group"{{ $errors->has('desde_profesional_interviniente') ? 'has-error' : ''}}>
    <label for="">A 15.3 Interviene desde:</label>
    <input type="date" class="form-control" name="desde_profesional_interviniente" id="datos_profesional_interviene_desde" value="{{$desde_profesional_interviniente}}">
    {!! $errors->first('desde_profesional_interviniente', '<p class="help-block" style="color:red";>:message</p>') !!}
    </div>

<!A15.3 Actualmente interviniente>

        <div class="form-group"{{ $errors->has('actual_profesional_interviniente') ? 'has-error' : ''}}>
    <label for="profesionalactualmente_id">A 15.4 Actualmente Interviene:</label>
  <select name="actual_profesional_interviniente" class="form-control vinculo" onChange="selectOnChangeC5(this)">
        <option value="" selected=disabled>Seleccionar...</option>
        @if($actual_profesional_interviniente== 1)<option value="1" selected>Si</option>
        @else<option value="1">Si</option>@endif
        @if($actual_profesional_interviniente== 2)<option value="2" selected>No</option>@else <option value="2">No</option>@endif
    </select>
    {!! $errors->first('actual_profesional_interviniente', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>

  @if($actual_profesional_interviniente== 2)
    <div id="si" {{ $errors->has('hasta_profesional_interviniente') ? 'has-error' : ''}}>
  @else
    <div id="si" style="display: none">
  @endif
 <label for="hasta_profesional_interviniente">A 15.5 Interviene hasta:</label>
    <input type="date" class="form-control" name="hasta_profesional_interviniente" id="hasta_profesional_interviniente" value="{{$hasta_profesional_interviniente}}">  
  {!! $errors->first('hasta_profesional_interviniente', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>

   <script>
          function selectOnChangeC5(sel) {
                   if (sel.value=="1"){divC = document.getElementById("si");
                       $('#hasta_profesional_interviniente').val('');
                       divC.style.display="none";
                    
                   }else{
                          divC = document.getElementById("si");
                       divC.style.display = "";
                   }}
        </script>

 


<!BOTONES>

  <div class="botones" >
  <div class="btn-1" > <button class="btn btn-primary col-xl" name="button" style="width:108%" >Agregar</button><br><br></div>
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
     

   </body>
</html>
