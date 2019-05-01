<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="/css/styles.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="css/app.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <title>Eje C: Grupo Conviviente</title>
      <style>
      .Auno{margin: auto;
    width: 50%;border-style: hidden;
      }
      .Ados{float: right;
    width: 50%;border-style: hidden;
      }
  
      </style>
   </head>
   <header>
     @include('navbar')
   </header>

   <body>


    
       <div class="Auno">

        <div class="card">
  
<div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="width: 70%;margin-top: 5%">

     <h4 class="text-center" style="padding: 15px;">Selecciona una Víctima</h4>

{{session("idCaso")}}<br>
{{session("idVictim")}}
        <h5 class="text-center" style="padding: 15px;">
          <ul>
            @foreach($victimas as $victima)

          @if($victima->idCaso==session("idCaso"))
                   <li>
          
             
     <div class="botones">
            <input type="radio" onclick="window.open('/victima/{{$victima->id}}/{{$victima->idCaso}}', 'width=800,height=600');"/>{{$victima->victima_nombre_y_apellido}}</div>
            
               
       
                     </li>


               @endif
                 @endforeach

               </ul>
             </h6>
           </div>
</h5></div>

  <div class="card">


<div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="width: 70%;margin-top: 5%;text-align: center">Víctima:
 @foreach($victimas as $victima)

          @if($victima->idCaso==session("idCaso")&&$victima->id==session("idVictim"))
            <br>
          
                  <strong style="margin-left:15%;color:red">{{$victima->victima_nombre_y_apellido}}</strong>

           @endif
           @endforeach

         <h4 class="text-center" style="padding:5%;margin-bottom:-5%">Eje A: Datos institucionales</h4><p style="margin-left:28%">Caso:</spam>{{$caso->nombre_referencia}}<br>
        

           
         </p><br>
           <input type ='button' style="width:317px;background-color:#ffffcc;margin-left:22%;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'EDITAR' onclick="window.open('/detalleCaso/{{$caso->id}}')"/></button>

        <h4 class="text-center" style="padding: 15px;">Personas Asistidas</h4>



    <a type="button" style="width:317px;background-color:grey;margin-left:22%;color:black;border: solid black 1px" class="btn btn-danger col-xs"  class="btn col-xl" href="/detalleagregarPersona" target="_self">Agregar</button></a><br><br>


      <ul>
        @foreach($personas as $persona)

      @if($persona->idCaso==session("idCaso")&&$persona->idVictim==session("idVictim"))
               <li>

              <strong style="margin-left:-15%">{{$persona->nombre_persona_asistida}}</strong>

<div class="botones" style="overflow:hidden;margin-left:15%">
        <div class="btn1" style="float:left">  <input type ='button' style="width:150px;background-color:#97c93f;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Editar' onclick="window.open('/detallePersona/{{$persona->id}}', 'width=800,height=600');"/></button></div>
        
        <div class="btn2" style="float:left">   <input type ='button' style="width:150px; margin-left:13%;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Eliminar' onclick="window.open('/detallePersona/deletePersona/{{$persona->id}}', 'width=800,height=600');"/></button></div>
        </div>
            </li>


      @endif
        @endforeach

      </ul>
    </h5>
  </div>
                    
<div class="card">

<div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="width: 70%;margin-top: 5%">

    <h3 class="text-center" style="padding: -30px;">Profesional interviniente</h3><br>

    <input type ='button' style="width:317px;background-color:grey;margin-left:24%;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Agregar' onclick="window.open('/detalleagregarProfesional')"/></button>
     <h6 class="text-center" style="padding: 15px;">
       <ul>
         @foreach($profesionales as $profesional)

       @if($profesional->idCaso==session("idCaso"))
                <li>

               <strong style="margin-left:-15%">{{$profesional->usuario->nombre_y_apellido}}</strong><br>

    <div class="botones" style="overflow:hidden;margin-left:15%">
         <div class="btn1" style="float:left">  <input type ='button' style="width:150px;background-color:#97c93f;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Editar' onclick="window.open('/detalleProfesional/{{$profesional->id}}', 'width=800,height=600');"/></button></div>
         <div class="btn2" style="float:left">   <input type ='button' style="width:150px; margin-left:13%;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Eliminar' onclick="window.open('/detalleProfesional/deleteProfesional/{{$profesional->id}}', 'width=800,height=600');"/></button></div>
         </div>
             </li>


       @endif
         @endforeach

       </ul>
     </h6>
   </div>
</div>


<div class="card">
  
<div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="width: 70%;margin-top: 5%">

     <h4 class="text-center" style="padding: 15px;">Eje B: La victima y su contexto</h4>
     <input type ='button' style="width:317px;background-color:grey;margin-left:22%;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Agregar' onclick="window.open('/agregarVictima')"/></button>
        <h5 class="text-center" style="padding: 15px;">
          <ul>
            @foreach($victimas as $victima)

          @if($victima->idCaso==session("idCaso"))
                   <li>

                  <strong style="margin-left:-15%">{{$victima->victima_nombre_y_apellido}}</strong>

     <div class="botones" style="overflow:hidden;margin-left:15%">
            <div class="btn1" style="float:left">  <input type ='button' style="width:150px;background-color:#97c93f;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Editar' onclick="window.open('/detalleVictima/{{$victima->id}}', 'width=800,height=600');"/></button></div>
            <div class="btn2" style="float:left">   <input type ='button' style="width:150px; margin-left:13%;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Eliminar' onclick="window.open('/detalleVictima/deleteVictima/{{$victima->id}}', 'width=800,height=600');"/></button></div>
            </div>
                     </li>


               @endif
                 @endforeach

               </ul>
             </h6>
           </div>
</h5></div>

      <div class="card">
       
<div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="width: 70%;margin-top: 5%">

     <h4 class="text-center" style="padding: 15px;">Eje C: Referentes Afectivos</h4>



  <input type ='button' style="width:317px;background-color:grey;margin-left:20%;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Agregar' onclick="window.open('/detalleagregarconviviente')"/></button>
        <h5 class="text-center" style="padding: 15px;">
          <ul>
            @foreach($convivientes as $conviviente)

          @if($conviviente->idCaso==session("idCaso")&&$conviviente->idVictim==session("idVictim"))
                   <li>

                  <strong style="margin-left:-20%">{{$conviviente->nombre_y_apellido}}</strong>

                  <div class="botones" style="overflow:hidden;margin-left:12%">
                            <div class="btn1" style="float:left">  <input type ='button' style="width:150px;background-color:#97c93f;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Editar' onclick="window.open('/detalleconviviente/{{$conviviente->id}}', 'width=800,height=600');"/></button></div>
                            <div class="btn2" style="float:left">   <input type ='button' style="width:150px; margin-left:13%;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Eliminar' onclick="window.open('/detalleconviviente/deleteconviviente/{{$conviviente->id}}', 'width=800,height=600');"/></button></div>
                            </div>
                                     </li>


                               @endif
                                 @endforeach

                               </ul>
                             </h6>
                           </div>
</div>
  

      <div class="card">

<div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="width: 70%;margin-top: 5%">

     <h4 class="text-center" style="padding: 15px;">Eje D: Datos del imputado</h4>
<input type ='button' style="width:317px;background-color:grey;margin-left:22%;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Agregar' onclick="window.open('/detalleagregarimputado')"/></button>
      <h5 class="text-center" style="padding: 15px;">
        <ul >
          @foreach($imputados as $imputado)

        @if($imputado->idCaso==session("idCaso")&&$imputado->idVictim==session("idVictim"))
                 <li >

                <strong style="margin-left:-15%">{{$imputado->nombre_y_apellido}}</strong>

<div class="botones" style="overflow:hidden;margin-left:14%">
          <div class="btn1" style="float:left">  <input type ='button' style="width:150px;background-color:#97c93f;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Editar' onclick="window.open('/detalleimputado/{{$imputado->id}}', 'width=800,height=600');"/></button></div>
<div class="btn2" style="float:left">
  <input type ='button' style="width:150px; margin-left:8%;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Eliminar' onclick="window.open('/detalleimputado/deleteimputado/{{$imputado->id}}', 'width=800,height=600');"/></button></div>
</div>
              </li>


        @endif
          @endforeach

        </ul>
      </h5>
    </div>
    <div class="card">
      
<div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="width: 70%;margin-top: 5%">

      <h4 class="text-center" style="padding: 15px;">Eje E: Atención del caso</h4>

      
  @if($instituciocount==0)
  <input type ='button' style="width:317px;background-color:grey;margin-left:21%;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Agregar' onclick="window.open('/agregarOrganismo', 'width=800,height=600');"/></button>@endif
  @if($instituciocount>0)
  @foreach($instituciones as $institucion)
    @if($institucion->idCaso==session("idCaso"))
 
   @endif          
@endforeach
   <input type ='button' style="width:317px;background-color:#ffffcc;margin-left:21%;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'EDITAR' onclick="window.open('/detalleOrganismo/{{$institucion->id}}', 'width=800,height=600');"/></button> 
 @endif 

      



             
      
 
  
                  
<br><br>
</div></div>
<div class="card">

<div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="width: 70%;margin-top: 5%">

<h4 class="text-center" style="padding: 15px;">Eje F: Documentación</h4>
<input type ='button' style="width:317px;background-color:grey;margin-left:23%;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Agregar' onclick="window.open('/detalleagregarDocumento')"/></button>
<h5 class="text-center" style="padding: 15px;">
  <ul >

  @foreach($documentos as $documento)
  @if($documento->IdCaso==session("idCaso"))

<li>
  <strong style="margin-left:-5%">{{$documento->nombre_documento}}</strong>
    <div class="botones" style="overflow:hidden;margin-left:15%">
            
    <div class="btn2" style="float:left">
      <input type ='button' style="width:315px; margin-left:1%;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Eliminar' onclick="window.open('/deleteDocumento/{{$documento->id}}', 'width=800,height=600');"/></button></div>
    </div>

              </li>

    @endif
          @endforeach
        </ul>
<br><br>

</h5>
</div>
</div>
</div>
</div>



   </body>
</html>
