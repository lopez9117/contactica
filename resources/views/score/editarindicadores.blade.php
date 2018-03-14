  @extends('layout2')

  @section('content')  

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
 Editar Indicadores
     </h1>
   </section>



   <section class="content"  id="dashboard">


     <form action="{{route('crearindicadores.store')}}" method="POST" enctype="multipart/form-data">

      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

      <div  class="row">

        <div  class="col-md-6">
          <input required="" class="form-control" placeholder="nombre del indicador" value="{{$indicadores->nombre}}" type="text" name="nombre">
        </div>

        <div class="col-md-6">

          <div class="form-group">

           <select class="form-control" placeholder="Selecciona" id="usuario" name="usuario">
            <option value="">Seleccione</option>
            @foreach($usuarios as $usuario)
            <option value="{{$usuario->id}}">{{$usuario->nombres.' '.$usuario->apellidos}}</option>
            @endforeach
          </select>
        </div>

      </div>

    </div>

    <div class="row">

      <div class="col-md-6">
        <input type="text" required="" class="form-control" placeholder=" Nombre numerador"  value="{{$indicadores->numerador}}"  name="numerador">
      </div>

      <div class="col-md-6">
        <input type="text" required="" class="form-control" name="denominador" value="{{$indicadores->denominador}}" placeholder="Nombre denominador">
      </div>

    </div>

    <div class="row">
      <br>
      <div class="col-md-6">
        <input type="number" required="" class="form-control" value="{{$indicadores->meta}}" name="meta" placeholder="Meta">
      </div>


      

      <div class="col-md-6">

        <div class="form-group">

         <select class="form-control" placeholder="Selecciona" id="proceso" name="proceso">
          <option value="">Seleccione</option>
          @foreach($procesos as $proceso)
          <option value="{{$proceso->id}}">{{$proceso->nombre}}</option>
          @endforeach
        </select>
      </div>
      <button  type="submmit" class="btn btn-success" value="Dime propiedades" >Guardar</button>
    </div>

  </div>

</form>
   
      </section>   
    </div>
    @stop()