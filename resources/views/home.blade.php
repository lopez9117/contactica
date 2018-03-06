  @extends('layout2')

  @section('content')  

  <style type="text/css">
      #dashboard{
        text-align: center;
        margin-left: -20px;
      }    

      .col-sm-4{
        margin-bottom:10px;

      }

  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
    </section>
    
    <!-- Main content -->
    <section class="content"  id="dashboard">
      <!-- Small boxes (Stat box) -->   
      <div class="container">  
        <div class="row">
          <div class="col-sm-4">
            <a href="/mapageneral"><img src="dist/img/bars-chart (1).png"/><h4>SCORE CARD</h4></a>
          </div>
          <div class="col-sm-4">
            <a href="#"><img src="dist/img/car.png"/>
<h4>SOLICITUD DE TRANSPORTE</h4></a>

          </div>
          <div class="col-sm-4">

            <a href="#"><img src="dist/img/flats.png"/><h4>EDIFICIOS</h4></a>
          </div>
          <div class="col-sm-4" >
              <a href="#"><img src="dist/img/scholarship.png"/><h4>GESTION DEL CONOCIMIENTO</h4></a>
          </div>


          <div class="col-sm-4">

            <a href="#"><img src="dist/img/maintenance.png"/><h4>MANTENIMIENTO</h4></a>
          </div>
          <div class="col-sm-4">

            <a href="#"><img src="dist/img/innovation.png"/><h4>PROCESO I+D+I</h4></a>
          </div>
          <div class="col-sm-4">
            <a href="#"><img src="dist/img/transaction.png"/><h4>SOLICITUDES DE COMPRAS</h4></a>
          </div>
          <div class="col-sm-4">
            <a href="https://nodewave.com/Account/Login"><img src="dist/img/engineer.png"/><h4>GESTION DE INTERVENTORIA</h4></a>
          </div>

          
          <div class="col-sm-4">
           <a href="#"><img src="dist/img/clipboard.png"/><h4>GESTION DE ACTIVOS</h4></a>
          </div>
          <div class="col-sm-4">

            <a href="/calendar"><img src="dist/img/icalendar.png"/><h4>HOJA DE TIEMPOS</h4></a>
          </div>
          <div class="col-sm-4">

            <a href="#"><img src="dist/img/care.png"/><h4>RESERVA DE SALAS</h4></a>
          </div>
          <div class="col-sm-4">

            <a href="#"><img src="dist/img/interview.png"/><h4>GESTION DE PROVEEDORES</h4></a>
          </div>

        </div>
      </div>
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  @stop()
