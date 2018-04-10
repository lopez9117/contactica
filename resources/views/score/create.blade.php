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
   <!-- Small boxes (Stat box) -->
   <div class="container">



    <ul class="nav nav-tabs" >
     <li id="enero" role="presentation"  ><a href="/cargarenero">Enero</a></li>
     <li id="Febrero" role="presentation" ><a href="/cargarfebreo">Febrero</a></li>
     <li id="Marzo" role="presentation" ><a href="/cargarmarzo">Marzo</a></li>
     <li id="Abril" role="presentation" ><a href="/cargarabril">Abril</a></li>
     <li id="Mayo" role="presentation" ><a href="/cargarmayo">Mayo</a></li>
     <li id="Junio" role="presentation" ><a href="/cargarjunio">Junio</a></li>
     <li id="Julio" role="presentation" ><a href="/cargarjulio">Julio</a></li>
     <li id="Agosto" role="presentation"  ><a href="/cargaragosto">Agosto</a></li>
     <li id="Septiembre" role="presentation" ><a href="/cargarseptiembre">Septiembre</a></li>
     <li id="Octubre" role="presentation"><a href="/cargaroctubre">Octubre</a></li>
     <li id="Noviembre" role="presentation"><a href="/cargarnoviembre">Noviembre</a></li>
     <li id="Diciembre" role="presentation"><a href="/cargardiciembre">Diciembre</a></li>
   </ul>
 </div>

 

 <!--datatables--><br><br>


 <table style="border:  #00FFFF  2px solid;"  class="table table-bordered" id="myTable">
  <thead>
   <tr >
    <th>ID</th>
    <th>Nombre</th>
    <th>Numerador</th>
    <th>Denominador</th>
    <th>Resultado</th>
    <th>Meta</th>
    <th>Comentario</th>
    <th>Fuente de datos</th>
    <th>Acciones</th>


  </tr>
</thead>
<tbody>
 <tr>

  @foreach ($indicadores as $indicador)
  <th>{{$indicador->id}}</th>
  <th>{{$indicador->nombre}}</th>
  <th>{{$indicador->numerador}}</th>
  <th>{{$indicador->denominador}}</th>
  <th>{{$indicador->resultado}}%</th>
  <th>{{$indicador->meta}}</th>
  <th>{{$indicador->comentario}}</th>
  <th> <a href="{{$indicador->ruta}}" ><i class="fa fa-file-word-o fa-3x"> </i></a> </th>
  <th>
   <form style="display: inline;" method="POST" action="{{route('create.destroy',$indicador->id)}}">
    {!!csrf_field()!!}
    {!!method_field('DELETE')!!}
    <button type="submit" class="btn btn-danger">Eliminar</button>
  </form>
</th>
</tr>
@endforeach
</tbody>
</table>

<div id="contenedor" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</section>
</div>

<script src="js/highcharts.js"></script>
<!-- 
<script type="text/javascript">

  Highcharts.chart('contenedor', {
    chart: {
      type: 'line'
    },
    title: {
      text: 'Indicadores'
    },
    subtitle: {
      text: ''
    },
    xAxis: {
      categories: [ 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre']
    },
    yAxis: {
      title: {
        text: 'Cumplimiento %'
      }
    },
    plotOptions: {
      line: {
        dataLabels: {


         enabled: true
       },
       enableMouseTracking: false
     }
   },
   series: [{
    name: 'Disponibilidad de la Informacion',
    data: [18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 76.8]
  }, {
    name: 'Cierre de brecha Tecnologica',
    data: [11.9, 15.2, 17.0, 16.6, 14.2, 10.3,78.5]
  },{
    name: 'Solicitudes Tecnicas',
    data: [81.4, 72.5, 95.2, 86.5, 93.3, 73.3,98.9]
  }]

});
</script> -->
@stop()
