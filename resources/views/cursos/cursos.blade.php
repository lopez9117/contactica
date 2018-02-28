@extends('layout')

@section('contenido')
	<h1>Usuarios</h1>

	<table class="table" id="myTable">
		<thead>
				
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Periodo</th>
					<th>Profesor</th>
					<th>Estudiantes Asignados</th>
				</tr>
		</thead>
		<tbody>
			@foreach( $courses as $course)
				
				<tr>
					<th>{{$course->id}}</th>
					<th>{{$course->nombre}}</th>
					<th>{{$course->periodo}}</th>
					<th>{{$course->profesor}}</th>
					<th>
					{{--@foreach($user->roles as $role)
						{{ $role->display_name }}
				--}}	@endforeach
					</th>{{--
					<th></th>
				</tr>
			@endforeach	--}}		

		</tbody>


	</table>

@stop
