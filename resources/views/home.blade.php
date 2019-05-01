@extends('layouts.app')

@section('content')
<div class="container jumbotron shadow p-3 mb-5 bg-white rounded">
  @if (session('status'))
  <div class="alert alert-success" role="alert">
      {{ session('status') }}
  </div>
  @endif

<h2 style="text-align: center">Bienvenido/a {{Auth::user()->getName()}}</h2>
<br>
<h4 style="text-align: center"> Agregar Casos, Incidencias o Derivaciones</h4>
<br>


 @if(Auth::user()->hasRole('admin'))
   <div class="list-group">
     <a href="agregarCaso" target="_blank" class="list-group-item list-group-item-action flex-column align-items-start active">
       <div class="d-flex w-100 justify-content-between">
         <h5 class="mb-2 h5">CASOS</h5>
         </div>
       <p class="mb-2">Agregar casos nuevos a la base de datos</p>
       </a>

     <a href="agregardemanda" target="_blank" class="list-group-item list-group-item-action flex-column align-items-start">
       <div class="d-flex w-100 justify-content-between">
         <h5 class="mb-2 h5">INCIDENCIAS</h5>
       </div>
       <p class="mb-2"></p>
     </a>

     <a href="agregarderivacion" target="_blank" class="list-group-item list-group-item-action flex-column align-items-start">
       <div class="d-flex w-100 justify-content-between">
         <h5 class="mb-2 h5">DERIVACION</h5>
       </div>
       <p class="mb-2"></p>
     </a>
   </div>


 @else
   <div class="list-group">
     <a href="agregarCaso" target="_blank" class="list-group-item list-group-item-action flex-column align-items-start active">
       <div class="d-flex w-100 justify-content-between">
         <h5 class="mb-2 h5">CASOS</h5>
         </div>
       <p class="mb-2">Agregar casos nuevos a la base de datos</p>
       </a>

     <a href="agregardemanda" target="_blank" class="list-group-item list-group-item-action flex-column align-items-start">
       <div class="d-flex w-100 justify-content-between">
         <h5 class="mb-2 h5">INCIDENCIAS</h5>
       </div>
       <p class="mb-2">Agregar incidencias a la base de datos</p>
       <p class="mb-2"></p>
     </a>

     <a href="agregarderivacion" target="_blank" class="list-group-item list-group-item-action flex-column align-items-start">
       <div class="d-flex w-100 justify-content-between">
         <h5 class="mb-2 h5">DERIVACION</h5>
       </div>
       <p class="mb-2">Agregar derivaciones de casos a la base de datos</p>
       <p class="mb-2"></p>
     </a>
   </div>

@endif


</div>


<section class="container jumbotron shadow p-3 mb-5 bg-white rounded">
<div class="form-group" >



<form action="/search" method="GET">
 {{csrf_field()}}
 <h4 style="text-align: center"> Buscar</h4>
<div class="buscar" style="margin-left: 38%">
  <input type="radio" name="buscar" value="1"> Casos
  <input type="radio" name="buscar" value="2"> Incidencias
  <input type="radio" name="buscar" value="3"> Derivaciones
</div>
 <input type="text" name="search" style="margin-left: 25%;width: 45%">
 <button type="submit" class="btn" style="color:white;background-color:rgb(137, 210, 14)">BUSCAR</button><br><br>
 <h5  style="text-align: center" >Buscar por Nombre de Referencia, por Nombre de la víctima o por modalidad de ingreso</h5>
</form><br>
</div>


<div class="form-group" id="buscador">
<section class="my-5">
<ul style="list-style: none">
 @foreach ($casos as $caso)
   <li>
    @if($user->hasRole('user'))
     <p class="mr-4 mb-0"> <strong><span style="text-decoration: underline"> Caso: </span><strong>{{$caso->nombre_referencia}}</strong></p>
    <ul class="list-unstyled list-inline mb-0">
      <li class="list-inline-item"><a href='/informe/{{$caso->id}}' class="mr-3"><i class="fas fa-user mr-1"></i>Informe</a></li>
    </ul>
    </div>
    <div class="row media mt-2 px-1">
      <div class="col-6">
          <p>Victima: {{$caso->nombre_y_apellido_de_la_victima}}</p>
          <p>Cavaj: @foreach ($cavajs as $cavaj)
          @if ($cavaj->id == $caso->cavaj){{$cavaj->nombre}}
          @endif
                    @endforeach</p>
      </div>
      <div class="col-6">
          <p>Fecha de ingreso: {{date("d/m/y",strtotime($caso->fecha_ingreso))}}</p>
          <p>Estado: @if($caso->estado == 1) Activo @else Pasivo @endif</p>
      </div>
  </li>
  @else
      <div class="card-header border-0 font-weight-bold d-flex justify-content-between">
      <p class="mr-4 mb-0"> <strong><span style="text-decoration: underline"> Caso: </span><strong>{{$caso->nombre_referencia}}</strong></p>
    <ul class="list-unstyled list-inline mb-0">
      <li class="list-inline-item"><a href='/paneldecontrol/{{$caso->id}}' class="mr-3"><i class="fas fa-envelope mr-1"></i>Editar</a></li>
      <li class="list-inline-item"><a href='/informe/{{$caso->id}}' class="mr-3"><i class="fas fa-user mr-1"></i>Informe</a></li>
      <li class="list-inline-item"><a href='/agregarIntervencion/{{$caso->id}}' class="mr-3"><i class="fas fa-rss mr-1"></i>Agregar intervención</a></li>
    </ul>
    </div>
    <div class="row media mt-2 px-1">
      <div class="col-6">
          <p>Victima: {{$caso->nombre_y_apellido_de_la_victima}}</p>
          <p>Cavaj: @foreach ($cavajs as $cavaj)
          @if ($cavaj->id == $caso->cavaj){{$cavaj->nombre}} @endif
                    @endforeach</p>
        </div>
        <div class="col-6">
        <p>Fecha de ingreso: {{date("d/m/y",strtotime($caso->fecha_ingreso))}}</p>
        <p>Estado: @if($caso->estado == 1) Activo
        @else Pasivo
        @endif</p>
      </div>
    </div>
  @endif
  @endforeach



  @foreach ($demandas as $demanda)
    <li>
     @if($user->hasRole('user'))
       <div class="card-header border-0 font-weight-bold d-flex justify-content-between">
    <p class="mr-4 mb-0"> <strong><span style="text-decoration: underline"> Incidencia: </span><strong>{{$demanda->nombre_y_apellido_de_la_victima}}</strong></p>
     </li>
   @else
       <div class="card-header border-0 font-weight-bold d-flex justify-content-between">
          <p class="mr-4 mb-0"> <strong><span style="text-decoration: underline"> Incidencia: </span><strong>{{$demanda->nombre_y_apellido_de_la_victima}}</strong></p>
     <ul class="list-unstyled list-inline mb-0">
       <li class="list-inline-item"><a href='/informedemanda/{{$demanda->id}}' class="mr-3"><i class="fas fa-user mr-1"></i>Informe</a></li>
       <li class="list-inline-item"><a href="javascript:AlertDemandaaCaso();" class="mr-3"><i class="fas fa-user mr-1"></i>Pasar a Caso</a></li>
       <script type="text/javascript">
       function AlertDemandaaCaso() {
       var answer = confirm ("¿Esta seguro que desea eliminar la incidencia y crear el caso?")
       if (answer)
       window.location="/demandaCaso/{{$demanda->id}}";
       }
       </script>
       <li class="list-inline-item"><a href="javascript:AlertDemanda();" class="mr-3"><i class="fas fa-rss mr-1"></i>Eliminar</a></li>
       <script type="text/javascript">
       function AlertDemanda() {
       var answer = confirm ("¿Está seguro que desea eliminar la incidencia seleccionada?")
       if (answer)
       window.location="/informedemanda/deletedemanda/{{$demanda->id}}";
       }
       </script>

       </ul>
       </div>
       <div class="row media mt-2 px-1">
         <div class="col-6">
           <p>Delito: @foreach ($delitos as $delito)
             @if ($delito->id == $demanda->delito)
               {{$delito->nombre}}
             @endif
           @endforeach</p>
           </div>
           <div class="col-6">
           <p>Fecha de ingreso: {{date("d/m/y",strtotime($demanda->fecha_ingreso))}}</p>
           </div>

     </div>
   @endif
   @endforeach


   @foreach ($derivaciones as $derivacion)
     <li>
      @if($user->hasRole('user'))
        <div class="card-header border-0 font-weight-bold d-flex justify-content-between">
      <p class="mr-4 mb-0"> <strong><span style="text-decoration: underline"> Derivación: </span>{{$derivacion->nombre_y_apellido}}</strong></p>
      <li class="list-inline-item"><a href='/informederivacion/{{$derivacion->id}}' class="mr-3"><i class="fas fa-user mr-1"></i>Informe</a></li>
      </li>
    @else
        <div class="card-header border-0 font-weight-bold d-flex justify-content-between">
          <p class="mr-4 mb-0"><strong><span style="text-decoration: underline"> Derivación: </span>{{$derivacion->nombre_y_apellido}}</strong></p>
      <ul class="list-unstyled list-inline mb-0">
        <li class="list-inline-item"><a href='/informederivacion/{{$derivacion->id}}' class="mr-3"><i class="fas fa-user mr-1"></i>Informe</a></li>
        <li class="list-inline-item"><a href='/agregarseguimiento/{{$derivacion->id}}' class="mr-3"><i class="fas fa-rss mr-1"></i>Agregar seguimiento</a></li>
        <li class="list-inline-item"><a href="javascript:AlertIt();" class="mr-3"><i class="fas fa-rss mr-1"></i>Eliminar</a></li>
        <script type="text/javascript">
        function AlertIt() {
        var answer = confirm ("¿Está seguro que desea eliminar la derivación seleccionada?")
        if (answer)
        window.location="/informederivacion/deletederivacion/{{$derivacion->id}}";
        }
        </script>
      </ul>
      </div>
      <div class="row media mt-2 px-1">
          <div class="col-6">
          <p>Tipo de demanda: @foreach ($tipo_demandas as $demanda)
            @if ($demanda->id == $derivacion->tipo_demanda)
              {{$demanda->nombre}}
            @endif
          @endforeach</p>
          <p>Organismo al que se deriva: @foreach ($oderivados as $derivado)
            @if ($derivado->id == $derivacion->derivacion)
              {{$derivado->nombre}}
            @endif
          @endforeach</p>
          </div>
          <div class="col-6">
          <p>Fecha de ingreso: {{date("d/m/y",strtotime($derivacion->fecha_ingreso))}}</p>
          <p>Estado: @if ($derivacion->estado_derivacion==1) Resuelta
          @elseif ($derivacion->estado_derivacion==2) En proceso
          @else Imposibilidad de contacto</p>
            @endif
          </div>

    @endif
    @endforeach




</section>

</section>

</div>

@endsection
</div>
