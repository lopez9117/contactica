  @extends('layout2')

  @section('content')
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crear indicador
      </h1>
    </section>

    <!-- Main content -->
    <section class="content"  id="dashboard">

      <div  >
        <form action="{{route('create.store')}}" method="POST" enctype="multipart/form-data">

          <div class="row">
            <div class="col-md-6">
              <label>Año: </label>
              <select class="form-control" id="año" name="año" id="selectaño">

                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2017">2019</option>
              </select>
            </div>

            <div class="col-md-6">
              <label>Mes:</label>
              <select class="form-control" id="mes" name="mes" id="selectmes">
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto </option>
                <option value="9">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>

              </select>
            </div>
          </div>
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <div style="margin-top: 50px" class="row">

            <div style="padding-top: 30px;" class="col-md-3">
             <div class="form-group">

               <select class="form-control" placeholder="Selecciona" id="nombre" name="nombre">
                 <option value="0">Seleccione</option>
                 @foreach($indicadoresfinales  as $indicadoresfinal)
                 <option value="{{$indicadoresfinal->id}}">{{$indicadoresfinal->nombre}}</option>
                 @endforeach
               </select>
             </div>
           </div>

           <div class="col-md-5">
            <div class="col-md-9">
              <input type="text" required=""  class="form-control"  name="nombre_del_numerador" id="nombre_del_numerador">

           
            </div>
            <div class="col-md-3">
              <input required="" class="form-control" type="number" name="numerador" placeholder="valor ">
            </div> <br>
            <hr style=" padding-top:1px; height: 1px;
            width: 93%;
            background-color: black;">

            <div class="col-md-9" style="margin-top: -10px;">
              <input type="text"  class="form-control" name="nombre_del_denominador" id="nombre_del_denominador">

               
            </div>
            <div class="col-md-3" style="margin-top: -10px;">
              <input required="" class="form-control" type="number" name="denominador" placeholder="valor">
            </div>
          </div>

          <div style="padding-top:34px;" class="col-md-1">
            <span> X 100  </span>  

          </div>

          <div style="padding-top:34px;" class="col-md-1">      
            <input class="form-control" type="number" id="meta" name="meta" placeholder="Meta">
            
            <input style="visibility: hidden;" class="form-control" type="number" name="area" id="area"  placeholder="area">

         </div>

         <div style="padding-top:34px;" class="col-md-2">

          <button style="margin-left: 30px;" type="submmit" class="btn btn-success" value="Dime propiedades" onclick="dimePropiedades()">Guardar</button>
        </div>


      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="comment">Comentario:</label>
          <textarea class="form-control" rows="3" id="comment" name="comentario"></textarea>
        </div>
      </div>

      <div class="col-md-6">

        <p><label for="avatar"></label></p>
        
        <input required=""  class="form-control" placeholder="Imagen" type="file" name="avatar" id="avatar"><br>

      </div>
    </form>
  </div>

</section>



</div>

@endsection()

@section('scripts')

<script>

 // $("#cliente").change(event => {
 //        $.get(`ajax-centrodecostos/${event.target.value}`, function(res, cliente){
 //          $("#centrodecostos").empty();
 //          res.forEach(element => {
 //            $("#centrodecostos").append(`<option value=${element.id}> ${element.name} </option>`);
 //          });
 //        });
 //      });



// $(document).on('change','#nombre', function(){
//      var nombre = $(this).val();   

//     $.ajax({

//         type: 'get',
//         url: 'ajax-nombreindicadores',
//         data: {'id': nombre},
//         dataType: 'json',
//         success: function(data){
//          console.log('info');
         
//             $('#nombre_del_numerador').val(data.numerador);
//             $('#nombre_del_denominador').val(data.denominador);
//              $('#meta').val(data.meta);

//         },
//         error:function (jqXHR, textStatus, errorThrown){
//           console.log(jqXHR, textStatus, errorThrown);
//              }
        

//     });


// });





// $("#nombre").change(event => {
//   $.get(`ajax-nombreindicadores/${event.target.value}`, function(res){
//        res.forEach(element => {
//              $("#nombre_del_numerador").append(`<option value=${element.numerador}> ${element.numerador} </option>`);
//              $("#nombre_del_denominador").append(`<option value=${element.denominador}> ${element.denominador} </option>`);
//              $("#meta").append(`<option value=${element.meta}> ${element.meta} </option>`);
//     });
//   });
// });



 $("#nombre").change(event => {
   $.get(`ajax-nombreindicadores/${event.target.value}`, function(res){
           $("#nombre_del_numerador").empty();
           $("#nombre_del_denominador").empty();
          res.forEach(element => {
            $("#nombre_del_numerador").val(element.numerador);
            $("#nombre_del_denominador").val(element.denominador);
            $("#meta").val(element.meta);
            $("#area").val(element.area);
          });
        });
 });
</script>

@endsection()