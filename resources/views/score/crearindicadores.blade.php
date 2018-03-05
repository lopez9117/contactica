  @extends('layout2')

  @section('content')  
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
       crear Indicadores
     </h1>
   </section>



   <section class="content"  id="dashboard">


     <form action="{{route('crearindicadores.store')}}" method="POST" enctype="multipart/form-data">

      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

      <div  class="row">

        <div  class="col-md-6">
          <input required="" class="form-control" placeholder="nombre del indicador" type="text" name="nombre">
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
        <input type="text" required="" class="form-control" placeholder=" Nombre numerador" name="numerador">
      </div>

      <div class="col-md-6">
        <input type="text" required="" class="form-control" name="denominador" placeholder="Nombre denominador">
      </div>

    </div>

    <div class="row">
  <br>
    <div class="col-md-6">
      <input type="number" required="" class="form-control" name="meta" placeholder="Meta">
    </div>

    <div class="col-md-6">
      <button  type="submmit" class="btn btn-success" value="Dime propiedades" >Guardar</button>
    </div>

  </div>







</form>



<div align="center">
  <h1>Indicadores</h1>
</div>

<table style="border:  #00FFFF  2px solid;"  class="table table-bordered" id="myTable">
  <thead>
   <tr >
    <th>ID</th>
    <th>Nombre</th>
    <th>Numerador</th>
    <th>denominador</th>
    <th>meta </th>
    <th>Usuario</th>
    <th>Acciones</th>
  </tr>
</thead>
<tbody>
 <tr>

  @foreach ($indicators as $indicator)
  <th>{{$indicator->id}}</th>
  <th>{{$indicator->nombre}}</th>
  <th>{{$indicator->numerador}}</th>
  <th>{{$indicator->denominador}}</th>
  <th>{{$indicator->meta}} %</th>
  <th>{{$indicator->user_id}}</th>
  <th>
   <form style="display: inline;" method="POST" action="">
    {!!csrf_field()!!}
    {!!method_field('DELETE')!!}
    <button type="submit" class="btn btn-danger">Eliminar</button>
  </form>

  <form style="display: inline;" method="POST" action="">
    {!!csrf_field()!!}
    {!!method_field('DELETE')!!}
    <button type="submit" class="btn btn-warning">Editar</button>
  </form>
</th>
</tr>
@endforeach
</tbody>
</table>

</section>



</div>
@stop()