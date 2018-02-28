  @extends('layout2')

  @section('content')
  <script type="text/javascript">


      $('select#mes').on('change',function(){
         var valor = $(this).val();
          alert(valor);

      });

      $('select#año').on('change',function(){
          var valor = $(this).val();
      alert(valor);

      });


    </script>

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
            <select class="form-control" id="año" name="año">
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
            </select>
            </div>

<div class="col-md-6">
            <label>Mes:</label>
            <select class="form-control" id="mes" name="mes">
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

                <input required="" class="form-control" placeholder="nombre del indicador" type="text" name="nombre">
              </div>

              <div class="col-md-5">
                <div class="col-md-6">
                  <input type="text" required="" class="form-control" placeholder="nombre del numerador" name="nombre_del_numerador">
                </div>
                <div class="col-md-6">
                  <input required="" class="form-control" type="number" name="numerador" placeholder="valor del numerador">
                </div> <br>
                <hr style=" padding-top:1px; height: 1px;
                width: 93%;
                background-color: black;">

                <div class="col-md-6" style="margin-top: -10px;">
                  <input type="text" required="" class="form-control" name="nombre_del_denominador" placeholder="nombre del denominador">
                </div>
                <div class="col-md-6" style="margin-top: -10px;">
                  <input required="" class="form-control" type="number" name="denominador" placeholder="valor de denominador">
                </div>
              </div>


              <div style="padding-top:34px;" class="col-md-4">
                <span> X 100</span>
                <button style="margin-left: 30px;" type="submmit" class="btn btn-success" value="Dime propiedades" onclick="dimePropiedades()">Guardar</button>

              </div>

            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="comment">Commentario:</label>
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
    @stop()