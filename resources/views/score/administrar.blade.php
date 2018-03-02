  @extends('layout2')

  @section('content')  
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  			Administrar Indicadores
  		</h1>
  	</section>

      <div class="container">
        
              <div class="row">
                    
                    <div class="col-md-6">
                      <a href="/crearindicadores"><button class="btn btn-success btn-lg">Crear Indicador</button></a>
                    </div> 
                    <div class="col-md-6">
                      <a href="/informeindicadores"><button class="btn btn-success btn-lg">Informe indicadores</button></a>
                    </div> 
               </div>
      </div>

  	  </div>
  @stop()