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
  <br>
        <input type="text" required="" class="form-control" id="frecuencia" name="frecuencia" placeholder="frecuencia de Medicion">
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

      <button style="margin-top: 6px;"  type="submmit" class="btn btn-success" value="Dime propiedades" >Guardar</button>
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
    <th>Area</th>
    <th>Frecuencia</th>
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
  <th>{{$indicator->area}}</th>
  <th>{{$indicator->frecuencia}}</th>
  <th>
    <form style="display: inline;" method="POST" action=" {{route('score.destroy', $indicator->id)}}">
    {!!csrf_field()!!}
    {!!method_field('DELETE')!!}
    <button type="submit" class="btn btn-danger">Eliminar</button>


  </form>

    <a onclick="mostrareditar({{$indicator->id}})" class="btn btn-warning" >Editar</a>

</th>
</tr>
@endforeach
</tbody>
</table>

</section>


<section>
  <form>
    <div id="responsive-modal" class="modal fade" tabindex="-1" data-backdrop="static" >
      <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
          <h4 align="center">Actualizar Indicador</h4>
        </div>

        <div class="modal-body">

         
          <input type="hidden" name="id" id="id">

          <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
          
          
          <div class="form-group">
            <label>Nombre Indicador: </label>
          <input required="" class="form-control" placeholder="nombre del indicador" id="nombre_indicador" type="text" name="nombre">
          </div>

        <div class="form-group">
            <label>Numerador: </label>
        <input type="text" required="" class="form-control" placeholder=" Nombre numerador" id="numerador"   name="numerador">
      </div>

        <div class="form-group">
            <label>Denominador: </label>
        <input type="te xt" required="" class="form-control" name="denominador" id="denominador"  placeholder="Nombre denominador">
      </div>



        <div class="form-group">
            <label>Meta: </label>
        <input type="number" required="" class="form-control" name="meta" id="meta" placeholder="Meta">
      </div>
    
      

    <div class="form-group">
            <label>Frecuencia de Medicion: </label>
     <input type="text" required="" class="form-control" id="frecuencia2" name="frecuencia" placeholder="frecuencia de Medicion">
    </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      <button  type="submmit" class="btn btn-success" id="actualizar"  >Guardar</button>
     
    </div>
  </div>
</div>
</div>

</form>


</section>

</div>
             
@endsection()

@section('scripts')

<script>

      
      //    $("#cliente").change(event => {
      //   $.get(`ajax-centrodecostos/${event.target.value}`, function(res, cliente){
      //     $("#centrodecostos").empty();
      //     res.forEach(element => {
      //       $("#centrodecostos").append(`<option value=${element.id}> ${element.name} </option>`);
      //     });
      //   });
      // });

           function mostrareditar(id){      
    
          console.log(id);

           $.get(`editar/${id}`, function(res){

            $("#id").val(res.id);
            $("#nombre_indicador").val(res.nombre);
          
           
            $("#numerador").val(res.numerador);
            $("#denominador").val(res.denominador);
            $("#meta").val(res.meta);
            $("#frecuencia2").val(res.frecuencia);

         $('#responsive-modal').modal('show');
       });
     }


    

      $("#actualizar").click(function(){
           var dato = {
                  'id' : $("#id").val(),
                  'nombre' : $("#nombre_indicador").val(),
                  
                  'numerador': $("#numerador").val(),
                  'denominador': $("#denominador").val(),
                  'meta': $("#meta").val(),
                 
                  'frecuencia':  $("#frecuencia2").val(),
        };

        var token = $("#_token").val();

        $.ajax({

          url: 'score.update/',
          headers:{'X-CSRF-TOKEN':token},
          type: 'POST',
          dataType: 'json',
          data: dato,

           success: function(data) {
                console.log('Evento creado');      
                 },
              error: function(){
                console.log("Error al crear evento");
              }  

      });
    

        });

     
  
</script>


@endsection()



