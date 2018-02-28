  @extends('layout2')

  @section('content')  
  

      <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Crear Usuario
        </h1>
      </section>

      <!-- Main content -->
      <section class="content"  id="dashboard">

        <div >
          <form action="{{route('guardarusuario')}}" method="POST" enctype="multipart/form-data">
  
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

      <div class="col-md-6">

        <input required="" class="form-control" placeholder="nombre" type="text" name="name"><br>

        <input required="" class="form-control" placeholder="apellidos" type="text" name="apellidos"><br>

        
        <input class="form-control" placeholder="ciudad" type="text" name="ciudad"><br>

        <input required="" class="form-control" placeholder="email" type="email" name="email">
      </div>

      <div class="col-md-6">
        <input required="" class="form-control" placeholder="Password" type="Password" name="password"><br>

        <input required="" class="form-control" placeholder="Ocupacion" type="text" name="ocupacion"> <br>

        <input class="form-control" placeholder="institucion" type="text" name="institucion"><br>

        <input  class="form-control" placeholder="Imagen" type="file" name="avatar" id="avatar"><br>

      </div>


      <div class="col-md-6">

       <input type="hidden" class="form-control" placeholder="pais" type="integer" name="pais" value="0"><br>
        
      </div> <br>

        <div class="col-md-12">
        <button style="margin-left: 30px;" type="submmit" class="btn btn-success">Guardar</button>
        </div>
  

        
        </form>
      </div>
      </section>   
    </div>
    @stop()