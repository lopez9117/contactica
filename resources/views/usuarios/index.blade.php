@extends('layout2');

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

       
        <a href="/crearusuario"><button class="btn btn-success">Crear Usuario</button></a>
        <!--datatables--><br><br>
        <table style="border:   #00FFFF  2px solid;"  class="table table-bordered" id="myTable">
          <thead>
            <tr >
              <th>ID</th>
              <th>Nombre</th>
              <th>Email</th>
              <th>Ocupacion</th>
              <th>Foto</th>
              <th>Acciones</th>

            </tr>
          </thead>
          <tbody>
            <tr>

              @foreach ($usuarios as $usuario)
              <th>{{$usuario->id}}</th>
              <th>{{$usuario->name}}</th>
              <th>{{$usuario->email}}</th>
              <th>{{$usuario->ocupación}}</th>

              <th > <img src="{{$usuario->ruta}}" alt="" style="width: 50px; height: 50px;"> </th>

              <th>
                <form style="display: inline;" method="POST" action="{{route('usuarios.destroy',$usuario->id)}}">
                  {!!csrf_field()!!}
                  {!!method_field('DELETE')!!}
                  <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
              </th>
            </tr>
            @endforeach
          </tbody>
        </table>
      
      </section>
    </div>
   @stop()
