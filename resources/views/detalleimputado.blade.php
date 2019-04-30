<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="css/app.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <title>Eje E: Datos del imputado</title>
      <style>
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

  <h1 class="text-center" style="padding: 15px;">Eje E: Datos del imputado</h1>
  <section class="container jumbotron shadow p-3 mb-5 bg-white rounded">
  <ul>
      @foreach($imputados as $imputado)
        @if ($imputado->idCaso == session("idCaso"))
          <li>
          <a href="/detalleimputado/{{$imputado->id}}">
                  {{$imputado->nombre_y_apellido}}
          </a>
          </li>
        @endif
      @endforeach
  </ul>

  <form class="ejeC" action="/detalleimputado" method="post">
  {{ csrf_field() }}
   <input type="hidden" name="idCaso" value="{{session("idCaso")}}">
  <input type="hidden" name="idImputado" value="{{session("idImputado")}}">
  <input type="hidden" name="userID_modify" value="{{$imputado->userID_modify}}">
<!E1 Nombre y apellido Imputado>

  <h3>Datos del Imputado:</h3>
  <div class="form-group"{{ $errors->has('nombre_y_apellido') ? 'has-error' : ''}}>
  <input type="text" class="form-control" name="nombre_y_apellido" id="imputado_nombre_y_apellido" value="{{$nombre_y_apellido}}"><br>
  <label for="bloqueo1" class="form-check-label">Se desconoce</label>
  <input type="checkbox" id="bloqueo1" name="nombre_y_apellido" value="Se desconoce" onchange="checkE1(this)">
  {!! $errors->first('nombre_y_apellido', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>
      <script>
                     function checkE1(checkbox)
                     {
                         if (checkbox.checked)
                             {
                                 $('#imputado_nombre_y_apellido').val('Se desconoce');
                                 document.getElementById('imputado_nombre_y_apellido').setAttribute("readonly", "readonly");
                             }else
                                 {
                                     $('#imputado_nombre_y_apellido').val('');
                                     document.getElementById('imputado_nombre_y_apellido').removeAttribute("readonly");
                                 }
                     }
                  </script>

<!E2 Tipo de documentación>

  <div class="form-group " id="tipodoc" {{ $errors->has('tipo_documento_id') ? 'has-error' : ''}}>
  <label for="">E 2. Tipo de documentación:</label>
  <select class="form-control" id="tipo_documento_id" name="tipo_documento_id" onChange="selectOnChangeE2(this)">
      <option value="" selected=disabled>Seleccionar...</option>
     @if($tipo_documento_id== 1)<option value="1" selected>D.N.I.</option>
       @else<option value="1" >D.N.I.</option>@endif

        @if($tipo_documento_id== 2)<option value="2" selected>Documento Extranjero</option>
      @else<option value="2">Documento Extranjero</option>@endif

         @if($tipo_documento_id== 3)<option value="3" selected>Libreta Cívica</option>
      @else<option value="3">Libreta Cívica</option>@endif

    @if($tipo_documento_id== 4)<option value="4" selected>Libreta de Enrolamiento</option>
      @else<option value="4" >Libreta de Enrolamiento</option>@endif

           @if($tipo_documento_id== 5)<option value="5" selected>Pasaporte</option>
      @else<option value="5">Pasaporte</option>@endif

           @if($tipo_documento_id== 6)<option value="6" selected>Residencia Precaria</option>
      @else<option value="6">Residencia Precaria</option> @endif

           @if($tipo_documento_id== 7)<option value="7" selected>Se Desconoce</option>
      @else<option value="7">Se Desconoce</option> @endif

           @if($tipo_documento_id== 8)<option value="8" selected>No posee</option>
      @else<option value="8">No posee</option>@endif

           @if($tipo_documento_id== 9)<option value="9" selected>Otro</option>
      @else<option value="9">Otro</option>@endif
  </select>
  {!! $errors->first('tipo_documento_id', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>

       @if($tipo_documento_id== 9)
    <div id="cualE2" {{ $errors->has('tipo_documento_otro') ? 'has-error' : ''}}>
  @else
    <div id="cualE2" style="display: none">
  @endif

  <label for="">Cual?</label>
  <div class="">
  <input name="tipo_documento_otro"  id="imputado_tipo_documento_otro" class="form-control" type="text" value="{{$tipo_documento_otro}}">
  {!! $errors->first('tipo_documento_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>
  </div>

                  <script>
                     function selectOnChangeE2(sel) {


                     	if (sel.value=="9"){
                     		divC = document.getElementById("cualE2");
                     		divC.style.display = "";
                     	}else{
                     		divC = document.getElementById("cualE2");
                     		$('#imputado_tipo_documento_otro').val('');
                     		divC.style.display="none";
                     	}
                     }

                  </script>

<!E3 Nro documento>


  <div class="form-group" id="nrodoc" {{ $errors->has('documento_nro') ? 'has-error' : ''}}>
  <label for="">E 3. Nro Documento:</label>
  <input type="text" class="form-control" name="documento_nro" placeholder="" id="documento_nro" value="{{$documento_nro}}">
@if($documento_nro==0) 


  

    <label class="form-check-label" for="documento_nro">Se desconoce</label>
 <input name="documento_nro" value="0" id="documento_nro0" type="checkbox" checked onchange="checkE3(this)">
    
    @else  <label class="form-check-label" for="documento_nro">Se desconoce</label>
    <input name="documento_nro" value="0" id="documento_nro0"  type="checkbox"  onchange="checkE3(this)">
    @endif



@if($documento_nro==1)   

    <label class="form-check-label" for="documento_nro">No Posee</label>
 <input name="documento_nro" value="1" id="documento_nro1" type="checkbox" checked onchange="checkE3BIS(this)">
    
    @else  <label class="form-check-label" for="documento_nro">No Posee</label>
    <input name="documento_nro" value="1" id="documento_nro1"  type="checkbox"  onchange="checkE3BIS(this)">
    @endif


  {!! $errors->first('documento_nro', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>
                 <script type="text/javascript">
       function checkE3(checkbox) {
          if (checkbox.checked)
                {
                    $('#documento_nro').val('Se desconoce');
                    document.getElementById('documento_nro0').setAttribute("readonly","readonly");
                    dvc= document.getElementById('documento_nro').disabled=true;
                    document.getElementById('documento_nro1').disabled=true;
                
           }
           else{
                    $('#documento_nro').val('');
                    
                    document.getElementById('documento_nro0').removeAttribute("readonly");
                    document.getElementById('documento_nro1').disabled=false;
                     dvc= document.getElementById('documento_nro').disabled=false;
                
                 
           }}
    </script>



     <script type="text/javascript">
       function checkE3BIS(checkbox) {
          if (checkbox.checked)
                {
                    $('#documento_nro').val('No posee');
                    document.getElementById('documento_nro1').setAttribute("readonly","readonly");
                     dvc= document.getElementById('documento_nro').disabled=true;
                   document.getElementById('documento_nro0').disabled=true;
                
           }
           else{
                    $('#documento_nro').val('');
                    
                    document.getElementById('documento_nro1').removeAttribute("readonly");
                    document.getElementById('documento_nro0').disabled=false;
                    dvc= document.getElementById('documento_nro').disabled=false;
                
                 
           }}
    </script>
              
<!E4 Vinculación con la victima>

  <div class="form-group" {{ $errors->has('vinculo_id') ? 'has-error' : ''}}>
  <label for="vinculo_id">E 4. Vinculación con la víctima:</label>
  <select  class="form-control vinculo" onChange="selectOnChangeE4(this)" name="vinculo_id">
      <option value="" selected=disabled>Seleccionar...</option>
      @if($vinculo_id== 1) <option value="1" selected>Familiar</option>
      @else <option value="1" >Familiar</option>@endif

      @if($vinculo_id== 2)  <option value="2" selected>Pareja</option>
      @else<option value="2" >Pareja</option>@endif

      @if($vinculo_id== 3)  <option value="3" selected>Amistad</option>
      @else<option value="3" >Amistad</option>@endif

      @if($vinculo_id== 4)  <option value="4" selected>Conocido</option>
      @else<option value="4" >Conocido</option>@endif

      @if($vinculo_id== 5)  <option value="5" selected>Se desconoce</option>
      @else<option value="5" >Se desconoce</option>@endif

       @if($vinculo_id== 6)  <option value="6" selected>Otro</option>
      @else<option value="6" >Otro</option>@endif
  </select>
  {!! $errors->first('vinculo_id', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>

   @if($vinculo_id== 6) 
    <div id="cualE4" {{ $errors->has('vinculo_otro') ? 'has-error' : ''}}>
  @else
    <div id="cualE4" style="display: none">
  @endif

  <label for="vinculo_otro">Cuál?</label>
  <input type="text" class="form-control vinculo_otro" name="vinculo_otro" id="vinculo_otro" value="{{$vinculo_otro}}">
  {!! $errors->first('vinculo_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>
  <br>

    <script>
                     function selectOnChangeE4(sel) {
                     							 if (sel.value=="6"){
                     									 divC = document.getElementById("cualE4");
                     									 divC.style.display = "";
                     							 }else{
                     									 divC = document.getElementById("cualE4");
                     									 $('#vinculo_otro').val('');
                     									 divC.style.display="none";
                     							 }}
                  </script>

<!E5 Existencia de antecedentes penales>

  <div class="form-group" {{ $errors->has('antecedentes_id') ? 'has-error' : ''}}>
  <label for="antecedentes_id">E 5. Existencia de antecedentes penales:</label>
  <select  class="form-control vinculo" name="antecedentes_id">
        <option value="" selected=disabled>Seleccionar...</option>
        @if($antecedentes_id== 1) <option value="1" selected>Sí</option>
        @else <option value="1" >Sí</option>@endif

       @if($antecedentes_id== 2) <option value="2" selected>No</option>
        @else <option value="2" >No</option>@endif

       @if($antecedentes_id== 3) <option value="3" selected>Se desconoce</option>
        @else <option value="3" >Se desconoce</option>@endif
  </select>
  {!! $errors->first('antecedentes_id', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>

<!E6 Defensoría>

  <div class="form-group" {{ $errors->has('defensoria_nro') ? 'has-error' : ''}}>
  <label for="">E 6. Defensoría N°: </label>
  <input type="text" class="form-control" name="defensoria_nro" id="defensoria_numero" value="{{$defensoria_nro}}">
  <label for="bloqueo6" class="form-check-label">Se desconoce</label>
  <input type="checkbox" id="bloqueo6" name="defensoria_nro" value="Se desconoce" onchange="checkE6(this)">
  {!! $errors->first('defensoria_nro', '<p class="help-block" style="color:red";>:message</p>') !!}
  </div>
          <script>
               function checkE6(checkbox)
               {
               		if (checkbox.checked)
               				{
               						$('#defensoria_numero').val('Se desconoce');
               						document.getElementById('defensoria_numero').setAttribute("readonly", "readonly");
               				}else
               						{
               								$('#defensoria_numero').val('');
               								document.getElementById('defensoria_numero').removeAttribute("readonly");
               						}
               }
            </script>

<!BOTONES>


  <div class="btn-1"> <button style="width:100%" type="submit" class="btn btn-primary col-xL" name="button" >Agregar/Enviar</button><br><br></div>

  </form>
  </section>
  


      <!-- este script lo que hace es agregar otro formulario de profesionales en el caso que intervenga mas de un profesional en el caso -->
      <script>
         var nueva_entrada = $('.padre').html();

         $("#anadir").click(function(){
             $(".padre").append(nueva_entrada);
         });

         $("#borra").click(function(){
         $('.hijo').last().remove();
         swal('Se borro un imputado');
         });
      </script>
      <script>
         var msg = '';
         var exist = '';
         if(exist){
           swal(msg);
         }
          </script>
      <script src="js/formularioA.js" type="text/javascript" charset="utf-8" async defer></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   </body>
</html>
