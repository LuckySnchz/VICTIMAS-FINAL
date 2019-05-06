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
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <title>App Víctimas</title>
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
   
   </header>

   <body>

<a name="Ancla" id="INICIO"></a>
    
       <div class="Auno">

        <div class="card">

 <div class="container">                 
  <ul class="nav nav-tabs">
         <li class="nav-item"> <strong><a class="nav-link " style="color:black;font-size:1.1em" href="#INICIO">Seleccionar Víctima</a> </li></strong>

            <li class="nav-item"><strong> <a class="nav-link "  style="color:#4CAF50;font-size:1.1em" href="#A">Institución/Personas Asistidas</a> </li></strong>

              <li class="nav-item"><strong> <a class="nav-link "  style="color:#4CAF50;font-size:1.1em" href="#AA">Profesionales Intervinientes</a> </li></strong>

  <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#B">Víctima y su contexto</a> </li></strong>      
       
         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em"  href="#C">Referentes Afectivos</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#D">Imputado</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#E">Atención del Caso</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link "style="color:#4CAF50;font-size:1.1em"  href="#FIN">Documentación</a> </li></strong>

          <li class="nav-item"><strong> <a class="nav-link "style="color:#4CAF50;font-size:1.1em"  href="/home">Ir a HOME</a> </li></strong>
      </ul>
</div> <br>
<div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="width: 70%;margin-top: 5%">

     <h4 class="text-center" style="padding: 15px;">Selecciona una Víctima</h4>
<p style="text-align: center"><strong><span style="text-decoration: underline"> Caso: 
      </spam></strong><br><strong><span style="text-align: center;color:red"<br>{{$casoNombre}}</spam></strong> 
         
         </p>
<p style="text-align: center"><strong><span style="text-decoration: underline"> Víctima Seleccionada: </span><strong>
 @foreach($victimas as $victima)

          @if($victima->idCaso==session("idCaso")&&$victima->id==session("idVictim"))
            <br>
          
                  <strong style="text-align: center;color:red">{{$victima->victima_nombre_y_apellido}}</strong>

           @endif
           @endforeach</p>


        <h5 class="text-center" style="padding: 15px;">
          <ul>
            @foreach($victimas as $victima)

          @if($victima->idCaso==session("idCaso"))
                   <li>
          


       <a type="button" style="width:128%;background-color:grey;margin-left:-20%;color:black;border: solid black 1px" class="btn btn-danger col-xs"   class="btn col-xl" href="/victima/{{$victima->id}}/{{$victima->idCaso}}" target="_self">{{$victima->victima_nombre_y_apellido}}</button></a><br><br>     
               
       
                     </li>


               @endif
                 @endforeach

               </ul>
             </h6>
           </div>
</h5></div>


<a name="Ancla" id="A"></a>
  <div class="card" style="margin-top: 1000%">
<div class="container">                 



 <ul class="nav nav-tabs">
         <li class="nav-item"> <strong><a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#INICIO">Seleccionar Víctima</a> </li></strong>

            <li class="nav-item"><strong> <a class="nav-link "  style="color:black;font-size:1.1em" href="#A">Institución/Personas Asistidas</a> </li></strong>

              <li class="nav-item"><strong> <a class="nav-link "  style="color:#4CAF50;font-size:1.1em" href="#AA">Profesionales Intervinientes</a> </li></strong>

  <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#B">Víctima y su contexto</a> </li></strong>      
       
         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em"  href="#C">Referentes Afectivos</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#D">Imputado</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#E">Atención del Caso</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link "style="color:#4CAF50;font-size:1.1em"  href="#FIN">Documentación</a> </li></strong>

          <li class="nav-item"><strong> <a class="nav-link "style="color:#4CAF50;font-size:1.1em"  href="/home">Ir a HOME</a> </li></strong>
      </ul>
</div> <br>

<div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="width: 70%;margin-top: 5%;text-align: center"><strong><span style="text-decoration: underline"> Víctima: </span><strong>
 @foreach($victimas as $victima)

          @if($victima->idCaso==session("idCaso")&&$victima->id==session("idVictim"))
            <br>
          
                  <strong style="text-align: center;color:red">{{$victima->victima_nombre_y_apellido}}</strong>

           @endif
           @endforeach
        
        <strong><h4 class="text-center" style="padding:1%;margin-bottom:-5%;color:white;background-color: rgb(137, 210, 14);width: 106%;margin-left: -3%">Eje A: Datos institucionales</h4></strong><br>
        <p style="text-align: center"><strong><span style="text-decoration: underline"> Caso: 
      </spam></strong><br><strong><span style="text-align: center;color:red"<br>{{$casoNombre}}</spam></strong><br>  
         
         </p><br>

 <a type="button" style="width:104.5%;background-color:#ffffcc;margin-left:-2.5%;color:black;border: solid black 1px" class="btn btn-danger col-xs"  class="btn col-xl" href="/detalleCaso/{{session("idCaso")}}" target="_self">Editar</button></a><br><br>




        

        <h4 class="text-center" style="padding: 15px;">Personas Asistidas</h4>

    <a type="button" style="width:104.5%;background-color:grey;margin-left:-2.5%;color:black;border: solid black 1px" class="btn btn-danger col-xs"  class="btn col-xl" href="/detalleagregarPersona" target="_self">Agregar</button></a><br><br>


       <ul style="list-style:none">
  @foreach($personas_nuevas as $persona_nueva)
@if($persona_nueva->idVictim==session("idVictim"))

 <li>
          @foreach($personas as $persona)
          @if($persona->id==$persona_nueva->idPersona)
                 <strong style="margin-left: -15%"> {{$persona->nombre_persona_asistida}}</strong>




 <a type="button" style="width:116%;background-color:#ffffcc;margin-left:-14%;color:black;border: solid black 1px" class="btn btn-danger col-xs"  class="btn col-xl" href="/detallePersona/{{$persona->id}}" target="_self">Editar</button></a><br><br>


    
  <a type="button" style="width:117%;margin-left:-14%;color:black;border: solid black 1px" class="btn btn-danger col-xs"  class="btn col-xl" href="/eliminarpersona/{{$persona->id}}" target="_self">Eliminar</button></a><br><br>          

    

   <!-- <li class="list-inline-item "><a href="javascript:AlertDemanda();"type="button" style="width:130%;margin-left:-14%;color:black;border: solid black 1px" class="btn btn-danger col-l"  class="btn col-xl">Eliminar</a></li>
       <script type="text/javascript">
       function AlertDemanda() {
       var answer = confirm ("¿Está seguro que desea eliminar a esta PERSONA asistida?")
       if (answer)
       window.location="/eliminarpersona/{{$persona->id}}";
       }
       </script>  -->           






                  
                  @endif
                  @endforeach

          </li>
                @endif

            @endforeach
</ul></h6>
  </div></div>

  <a name="Ancla" id="AA"></a>                  
  <div class="card" style="margin-top: 1000%">
<div class="container">                 
 <ul class="nav nav-tabs">
         <li class="nav-item"> <strong><a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#INICIO">Seleccionar Víctima</a> </li></strong>

            <li class="nav-item"><strong> <a class="nav-link "  style="color:#4CAF50;font-size:1.1em" href="#A">Institución/Personas Asistidas</a> </li></strong>

              <li class="nav-item"><strong> <a class="nav-link "  style="color:black;font-size:1.1em" href="#AA">Profesionales Intervinientes</a> </li></strong>

  <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#B">Víctima y su contexto</a> </li></strong>      
       
         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em"  href="#C">Referentes Afectivos</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#D">Imputado</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#E">Atención del Caso</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link "style="color:#4CAF50;font-size:1.1em"  href="#FIN">Documentación</a> </li></strong>

          <li class="nav-item"><strong> <a class="nav-link "style="color:#4CAF50;font-size:1.1em"  href="/home">Ir a HOME</a> </li></strong>
      </ul>
</div> <br>


<div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="width: 70%;margin-top: 5%;text-align: center"><strong><span style="text-decoration: underline"> Víctima: </span><strong>
 @foreach($victimas as $victima)

          @if($victima->idCaso==session("idCaso")&&$victima->id==session("idVictim"))
            <br>
          
                  <strong style="text-align: center;color:red">{{$victima->victima_nombre_y_apellido}}</strong>

           @endif
           @endforeach

 
    <h3 class="text-center" style="padding: -30px;">Profesional interviniente</h3><br>


    <p style="text-align: center"><strong><span style="text-decoration: underline"> Caso: 
      </spam></strong><br><strong><span style="text-align: center;color:red"<br>{{$casoNombre}}</spam></strong><br>  
         
         </p><br>



  <a type="button" style="width:105%;background-color:grey;margin-left:-2.5%;color:black;border: solid black 1px" class="btn btn-danger col-xs"  class="btn col-xl" href="/detalleagregarProfesional" target="_self">Agregar</button></a><br><br>

       <ul>
         @foreach($profesionales as $profesional)

       @if($profesional->idCaso==session("idCaso"))
                <li >

               <strong style="text-align: center">{{$profesional->usuario->nombre_y_apellido}}</strong><br>
 <a type="button" style="width:117%;background-color:#ffffcc;margin-left:-14%;color:black;border: solid black 1px" class="btn btn-danger col-xs"  class="btn col-xl" href="/detalleProfesional/{{$profesional->id}}" target="_self">Editar</button></a><br><br>


  <a type="button" style="width:117%;margin-left:-14%;color:black;border: solid black 1px" class="btn btn-danger col-xs"  class="btn col-xl" href="/detalleProfesional/deleteProfesional/{{$profesional->id}}" target="_self">Eliminar</button></a><br><br>


             </li>


       @endif
         @endforeach

       </ul>
     </h6>
   </div>
</div>


  <a name="Ancla" id="B"></a> 
 <div class="card" style="margin-top: 1000%">
<div class="container">                 
<ul class="nav nav-tabs">
         <li class="nav-item"> <strong><a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#INICIO">Seleccionar Víctima</a> </li></strong>
            <li class="nav-item"><strong> <a class="nav-link "  style="color:#4CAF50;font-size:1.1em" href="#A">Institución/Personas Asistidas</a> </li></strong>

              <li class="nav-item"><strong> <a class="nav-link "  style="color:#4CAF50;font-size:1.1em" href="#AA">Profesionales Intervinientes</a> </li></strong>

  <li class="nav-item"><strong> <a class="nav-link " style="color:black;font-size:1.1em" href="#B">Víctima y su contexto</a> </li></strong>      
       
         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em"  href="#C">Referentes Afectivos</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#D">Imputado</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#E">Atención del Caso</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link "style="color:#4CAF50;font-size:1.1em"  href="#FIN">Documentación</a> </li></strong>

          <li class="nav-item"><strong> <a class="nav-link "style="color:#4CAF50;font-size:1.1em"  href="/home">Ir a HOME</a> </li></strong>
      </ul>
</div> <br>
<div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="width: 70%;margin-top: 5%;text-align: center"><strong><span style="text-decoration: underline"> Víctima: </span><strong>
 @foreach($victimas as $victima)

          @if($victima->idCaso==session("idCaso")&&$victima->id==session("idVictim"))
            <br>
          
                  <strong style="text-align: center;color:red">{{$victima->victima_nombre_y_apellido}}</strong>

           @endif
           @endforeach

        <strong><h4 class="text-center" style="width: 105%;padding:1%;margin-bottom:-5%;color:white;background-color: rgb(137, 210, 14);width: 106%;margin-left: -3%">Eje B: La victima y su contexto</h4></strong><br>
        <p style="text-align: center"><strong><span style="text-decoration: underline"> Caso: 
      </spam></strong><br><strong><span style="text-align: center;color:red"<br>{{$casoNombre}}</spam></strong><br>  
         
         </p><br>



   
       <a type="button" style="width:105%;background-color:grey;margin-left:-3%;color:black;border: solid black 1px" class="btn btn-danger col-xs"  class="btn col-xl" href="/detalleagregarVictima" target="_self">Agregar</button></a><br><br>
        <h5 class="text-center" style="padding: 15px;">
          <ul>
            @foreach($victimas as $victima)

          @if($victima->idCaso==session("idCaso"))
                   <li>

                  <strong style="margin-left:-15%">{{$victima->victima_nombre_y_apellido}}</strong>

 <a type="button" style="width:128%;background-color:#ffffcc;margin-left:-20%;color:black;border: solid black 1px" class="btn btn-danger col-xs"  class="btn col-xl" href="/detalleVictima/{{$victima->id}}" target="_self">Editar</button></a><br><br>


  <a type="button" style="width:128%;margin-left:-20%;color:black;border: solid black 1px" class="btn btn-danger col-xs"  class="btn col-xl" href="/eliminarvictima/{{$victima->id}}" target="_self">Eliminar</button></a><br><br>


   
                     </li>


               @endif
                 @endforeach

               </ul>
             </h6>
           </div>
</h5></div>

  <a name="Ancla" id="C"></a> 
<div class="card" style="margin-top: 1000%">
  <div class="container">                 
 <ul class="nav nav-tabs">
         <li class="nav-item"> <strong><a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#INICIO">Seleccionar Víctima</a> </li></strong>
            <li class="nav-item"><strong> <a class="nav-link "  style="color:#4CAF50;font-size:1.1em" href="#A">Institución/Personas Asistidas</a> </li></strong>

              <li class="nav-item"><strong> <a class="nav-link "  style="color:#4CAF50;font-size:1.1em" href="#AA">Profesionales Intervinientes</a> </li></strong>

  <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#B">Víctima y su contexto</a> </li></strong>      
       
         <li class="nav-item"><strong> <a class="nav-link " style="color:black;font-size:1.1em"  href="#C">Referentes Afectivos</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#D">Imputado</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#E">Atención del Caso</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link "style="color:#4CAF50;font-size:1.1em"  href="#FIN">Documentación</a> </li></strong>

          <li class="nav-item"><strong> <a class="nav-link "style="color:#4CAF50;font-size:1.1em"  href="/home">Ir a HOME</a> </li></strong>
      </ul>
</div> <br>
<div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="width: 70%;margin-top: 5%;text-align: center"><strong><span style="text-decoration: underline"> Víctima: </span><strong>
 @foreach($victimas as $victima)

          @if($victima->idCaso==session("idCaso")&&$victima->id==session("idVictim"))
            <br>
          
                  <strong style="text-align: center;color:red">{{$victima->victima_nombre_y_apellido}}</strong>

           @endif
           @endforeach

        <strong><h4 class="text-center" style="padding:1%;margin-bottom:-5%;color:white;background-color: rgb(137, 210, 14);width: 106%;margin-left: -3%">Eje C: Referentes Afectivos</h4></strong><br>
        <p style="text-align: center"><strong><span style="text-decoration: underline"> Caso: 
      </spam></strong><br><strong><span style="text-align: center;color:red"<br>{{$casoNombre}}</spam></strong><br>  
         
         </p><br>

  <a type="button" style="width:105%;background-color:grey;margin-left:-3%;color:black;border: solid black 1px" class="btn btn-danger col-xs"  class="btn col-xl" href="/detalleagregarconviviente" target="_self">Agregar</button></a><br><br>
        <h5 class="text-center" style="padding: 15px;">

  <ul style="list-style:none">
  @foreach($convivientes_nuevos as $conviviente_nuevo)
@if($conviviente_nuevo->idVictim==session("idVictim"))

 <li>
          @foreach($convivientes as $conviviente)
          @if($conviviente->id==$conviviente_nuevo->idConviviente)
                  {{$conviviente->nombre_y_apellido}}


     
  <a type="button" style="width:128%;background-color:#ffffcc;margin-left:-20%;color:black;border: solid black 1px" class="btn btn-danger col-xs"  class="btn col-xl" href="/detalleconviviente/{{$conviviente->id}}" target="_self">Editar</button></a><br><br>


  <a type="button" style="width:128%;margin-left:-20%;color:black;border: solid black 1px" class="btn btn-danger col-xs"  class="btn col-xl" href="/eliminarconviviente/{{$conviviente->id}}" target="_self">Eliminar</button></a><br><br>
                 

                  
                  @endif
                  @endforeach

          </li>
                @endif

            @endforeach
</ul>







 
         <!-- <ul>
            @foreach($convivientes as $conviviente)

          @if($conviviente->idCaso==session("idCaso")&&$conviviente->idVictim==session("idVictim"))
                   <li>

                  <strong style="margin-left:-20%">{{$conviviente->nombre_y_apellido}}</strong>

                  <div class="botones" style="overflow:hidden;margin-left:12%">
                            <div class="btn1" style="float:left">  <input type ='button' style="width:150px;background-color:#97c93f;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Editar' onclick="window.open('/detalleconviviente/{{$conviviente->id}}', 'width=800,height=600');"/></button></div>
                            <div class="btn2" style="float:left"> 

<a type="button" style="width:150px; margin-left:13%;color:black;border: solid black 1px" class="btn btn-danger col-xs" href="/detalleconviviente/deleteconviviente/{{$conviviente->id}}" target="_self">Eliminar</button></a><br><br>
</div>
                            </div>
                                     </li>


                               @endif
                                 @endforeach

                               </ul>-->
                             </h6>
                           </div>
</div>

  <a name="Ancla" id="D"></a> 

<div class="card" style="margin-top: 1000%">
  <div class="container">                 
<ul class="nav nav-tabs">
         <li class="nav-item"> <strong><a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#INICIO">Seleccionar Víctima</a> </li></strong>
            <li class="nav-item"><strong> <a class="nav-link "  style="color:#4CAF50;font-size:1.1em" href="#A">Institución/Personas Asistidas</a> </li></strong>

              <li class="nav-item"><strong> <a class="nav-link "  style="color:#4CAF50;font-size:1.1em" href="#AA">Profesionales Intervinientes</a> </li></strong>

  <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#B">Víctima y su contexto</a> </li></strong>      
       
         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em"  href="#C">Referentes Afectivos</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link " style="color:black;font-size:1.1em" href="#D">Imputado</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#E">Atención del Caso</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link "style="color:#4CAF50;font-size:1.1em"  href="#FIN">Documentación</a> </li></strong>

          <li class="nav-item"><strong> <a class="nav-link "style="color:#4CAF50;font-size:1.1em"  href="/home">Ir a HOME</a> </li></strong>
      </ul>
</div> <br>
<div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="width: 70%;margin-top: 5%;text-align: center"><strong><span style="text-decoration: underline"> Víctima: </span><strong>
 @foreach($victimas as $victima)

          @if($victima->idCaso==session("idCaso")&&$victima->id==session("idVictim"))
            <br>
          
                  <strong style="text-align: center;color:red">{{$victima->victima_nombre_y_apellido}}</strong>

           @endif
           @endforeach

        <strong><h4 class="text-center" style="padding:1%;margin-bottom:-5%;color:white;background-color: rgb(137, 210, 14);width: 106%;margin-left: -3%">Eje D: Datos del imputado</h4></strong><br>
        <p style="text-align: center"><strong><span style="text-decoration: underline"> Caso: 
      </spam></strong><br><strong><span style="text-align: center;color:red"<br>{{$casoNombre}}</spam></strong><br>  
         
         </p><br>


  <a type="button" style="width:105%;background-color:grey;margin-left:-3%;color:black;border: solid black 1px" class="btn btn-danger col-xs"  class="btn col-xl" href="/detalleagregarimputado" target="_self">Agregar</button></a><br><br>
        <h5 class="text-center" style="padding: 15px;">

   <!-- <ul >
          @foreach($imputados as $imputado)

        @if($imputado->idCaso==session("idCaso")&&$imputado->idVictim==session("idVictim"))
                 <li >

                <strong style="margin-left:-15%">{{$imputado->nombre_y_apellido}}</strong>

<div class="botones" style="overflow:hidden;margin-left:14%">
          <div class="btn1" style="float:left">  <input type ='button' style="width:150px;background-color:#97c93f;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Editar' onclick="window.open('/detalleimputado/{{$imputado->id}}', 'width=800,height=600');"/></button></div>
<div class="btn2" style="float:left">

<a type="button" style="width:150px; margin-left:13%;color:black;border: solid black 1px" class="btn btn-danger col-xs" href="/detalleimputado/deleteimputado/{{$imputado->id}}" target="_self">Eliminar</button></a><br><br>
</div>
</div>
              </li>


        @endif
          @endforeach

        </ul>-->


<ul style="list-style:none">
  @foreach($imputados_nuevos as $imputado_nuevo)
@if($imputado_nuevo->idVictim==session("idVictim"))

 <li>
          @foreach($imputados as $imputado)
          @if($imputado->id==$imputado_nuevo->idImputado)
                  {{$imputado->nombre_y_apellido}}


<a type="button" style="width:128%;background-color:#ffffcc;margin-left:-20%;color:black;border: solid black 1px" class="btn btn-danger col-xs"  class="btn col-xl" href="/detalleimputado/{{$imputado->id}}" target="_self">Editar</button></a><br><br>


  <a type="button" style="width:128%;margin-left:-20%;color:black;border: solid black 1px" class="btn btn-danger col-xs"  class="btn col-xl" href="/eliminarimputado/{{$imputado->id}}" target="_self">Eliminar</button></a><br><br>



                  @endif
                  @endforeach
                 

          </li>
                @endif

            @endforeach
</ul>




      </h5>
    </div>

  <a name="Ancla" id="E"></a> 
  <div class="card" style="margin-top: 1000%">
    <div class="container">                 
<ul class="nav nav-tabs">
         <li class="nav-item"> <strong><a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#INICIO">Seleccionar Víctima</a> </li></strong>
            <li class="nav-item"><strong> <a class="nav-link "  style="color:#4CAF50;font-size:1.1em" href="#A">Institución/Personas Asistidas</a> </li></strong>

              <li class="nav-item"><strong> <a class="nav-link "  style="color:#4CAF50;font-size:1.1em" href="#AA">Profesionales Intervinientes</a> </li></strong>

  <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#B">Víctima y su contexto</a> </li></strong>      
       
         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em"  href="#C">Referentes Afectivos</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#D">Imputado</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link " style="color:black;font-size:1.1em" href="#E">Atención del Caso</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link "style="color:#4CAF50;font-size:1.1em"  href="#FIN">Documentación</a> </li></strong>

          <li class="nav-item"><strong> <a class="nav-link "style="color:#4CAF50;font-size:1.1em"  href="/home">Ir a HOME</a> </li></strong>
      </ul>
</div> <br>

    	<div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="width: 70%;margin-top: 5%;text-align: center"><strong><span style="text-decoration: underline"> Víctima: </span><strong>
 @foreach($victimas as $victima)

          @if($victima->idCaso==session("idCaso")&&$victima->id==session("idVictim"))
            <br>
          
                  <strong style="text-align: center;color:red">{{$victima->victima_nombre_y_apellido}}</strong>

           @endif
           @endforeach

        <strong><h4 class="text-center" style="padding:1%;margin-bottom:-5%;color:white;background-color: rgb(137, 210, 14);width: 106%;margin-left: -3%">Eje E: Atención del caso</h4></strong><br>
        <p style="text-align: center"><strong><span style="text-decoration: underline"> Caso: 
      </spam></strong><br><strong><span style="text-align: center;color:red"<br>{{$casoNombre}}</spam></strong><br>  
         
         </p><br>
      

      
  @if($instituciocount==0)
  <input type ='button' style="width:105%;background-color:grey;margin-left:-3%;color:black;border: solid black 1px" class="btn btn-danger col-xs" name="button" value = 'Agregar' onclick="window.open('/agregarOrganismo', 'width=800,height=600');"/></button>@endif
  @if($instituciocount>0)
  @foreach($instituciones as $institucion)
    @if($institucion->idCaso==session("idCaso"))
 
   @endif          
@endforeach

 <a type="button" style="width:105%;background-color:#ffffcc;margin-left:-2.5%;color:black;border: solid black 1px" class="btn btn-danger col-xs"  class="btn col-xl" href='/detalleOrganismo/{{$institucion->id}}' target="_self">Editar</button></a><br><br>

  
 @endif 

      


</div></div>
             
      
 
  
                  
<br><br>

 
  <a name="Ancla" id="FIN"></a>

    <div class="card" style="margin-top: 1000%" >
  <div class="container" >    

<ul class="nav nav-tabs">
         <li class="nav-item"> <strong><a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#INICIO">Seleccionar Víctima</a> </li></strong>
            <li class="nav-item"><strong> <a class="nav-link "  style="color:#4CAF50;font-size:1.1em" href="#A">Institución/Personas Asistidas</a> </li></strong>

              <li class="nav-item"><strong> <a class="nav-link "  style="color:#4CAF50;font-size:1.1em" href="#AA">Profesionales Intervinientes</a> </li></strong>

  <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#B">Víctima y su contexto</a> </li></strong>      
       
         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em"  href="#C">Referentes Afectivos</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#D">Imputado</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#E">Atención del Caso</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link "style="color:black;font-size:1.1em"  href="#FIN">Documentación</a> </li></strong>

          <li class="nav-item"><strong> <a class="nav-link "style="color:#4CAF50;font-size:1.1em"  href="/home">Ir a HOME</a> </li></strong>
      </ul>
</div> <br>
 <div class="container jumbotron shadow p-3 mb-5 bg-white rounded" style="width: 70%;margin-top: 5%;text-align: center"><strong><span style="text-decoration: underline"> Víctima: </span><strong>
 @foreach($victimas as $victima)

          @if($victima->idCaso==session("idCaso")&&$victima->id==session("idVictim"))
            <br>
          
                  <strong style="text-align: center;color:red">{{$victima->victima_nombre_y_apellido}}</strong>

           @endif
           @endforeach

        <strong><h4 class="text-center" style="padding:1%;margin-bottom:-5%;color:white;background-color: rgb(137, 210, 14)">Eje F: Documentación</h4></strong><br>
        <p style="text-align: center"><strong><span style="text-decoration: underline"> Caso: 
      </spam></strong><br><strong><span style="text-align: center;color:red"<br>{{$casoNombre}}</spam></strong><br>  
         
         </p><br>




  <a type="button" style="width:105%;background-color:grey;margin-left:-2.5%;color:black;border: solid black 1px" class="btn btn-danger col-xs"  class="btn col-xl" href="/detalleagregarDocumento" target="_self">Agregar</button></a><br><br>


<h5 class="text-center" style="padding: 15px;">
  <ul >

  @foreach($documentos as $documento)
  @if($documento->IdCaso==session("idCaso"))

<li>
  <strong style="margin-left:-5%">{{$documento->nombre_documento}}</strong>

            
    
       <a type="button" style="width:128%;margin-left:-20%;color:black;border: solid black 1px" class="btn btn-danger col-xs"  class="btn col-xl" href='/eliminardocumento/{{$documento->id}}' target="_self">Eliminar</button></a><br><br>



     


              </li>

    @endif
          @endforeach
        </ul>
<br><br>

</h5>

</div>
<div class="container">                 
<ul class="nav nav-tabs">
         <li class="nav-item"> <strong><a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#INICIO">Seleccionar Víctima</a> </li></strong>
            <li class="nav-item"><strong> <a class="nav-link "  style="color:#4CAF50;font-size:1.1em" href="#A">Institución/Personas Asistidas</a> </li></strong>

              <li class="nav-item"><strong> <a class="nav-link "  style="color:#4CAF50;font-size:1.1em" href="#AA">Profesionales</a> </li></strong>

  <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#B">Víctima</a> </li></strong>      
       
         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em"  href="#C">Referentes Afectivos</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#D">Imputado</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link " style="color:#4CAF50;font-size:1.1em" href="#E">Caso</a> </li></strong>

         <li class="nav-item"><strong> <a class="nav-link "style="color:#4CAF50;font-size:1.1em"  href="#FIN">Documentación</a> </li></strong>

          <li class="nav-item"><strong> <a class="nav-link "style="color:black;font-size:1.1em"  href="/home">Ir a HOME</a> </li></strong>
      </ul>
</div>
</div>

</div>
</div>



   </body>
</html>
