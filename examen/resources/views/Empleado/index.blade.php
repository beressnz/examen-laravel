@extends('layouts.layout')
@section('content')
    <div class="row">
        <section class="content">
            
            <div class="col-md-10 col-md-offset-1">
            {{ csrf_field() }}
            @if(Session('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left"><h3>Lista empleados</h3></div>
                        <div class="pull-right">
                            <div class="btn-group"> 
                                <a href="{{ route('empleado.create') }}" class="btn btn btn-primary" >Agregar empleado</a>
                            </div>
                        </div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Salario en dolares</th>
                                <th>Salario en pesos</th>
                                <th>Correo</th>
                                <th>Activo</th>
                                <th>Show</th>
                                <th>Editar</th>
                                <th>Activar/Desactivar</th>
                                <th>Eliminar</th>
                                </thead>
                                <tbody>
                                @if($empleados->count())
                                    @foreach($empleados as $empleado)
                                        <tr>
                                            <td>{{$empleado->codigo}}</td>
                                            <td>{{$empleado->nombre}}</td>
                                            <td>{{$empleado->salarioDolares}}</td>
                                            <td>{{$empleado->salarioPesos}}</td>
                                            <td>{{$empleado->correo}}</td>
                                            @if($empleado->activo ===1 )
                                                <td class="text-success text-center"> <b>Si</b></td>
                                            @else
                                                <td class="text-danger text-center"> <b>No</b></td>
                                            @endif
                                            <td class="text-center"><a class="btn btn-info btn-sm" href="{{action('EmpleadoController@show', $empleado->id)}}" >Ver</a></td>
                                                                                       
                                            <td class="text-center"><a class="btn btn-primary btn-sm" href="{{action('EmpleadoController@edit', $empleado->id)}}" >Editar</a></td>
                                            @if($empleado->activo ===1 )
                                            <td class="text-center">
                                                <form action="{{action('EmpleadoController@activar', $empleado->id)}}" method="get">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="ACTIVAR">

                                                    <button class="btn btn-danger btn-sm" type="submit">Desactivar</button>

                                                </form>
                                            </td>
                                            @else
                                            <td class="text-center">
                                                <form action="{{action('EmpleadoController@activar', $empleado->id)}}" method="get">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="ACTIVAR">

                                                    <button class="btn btn-success btn-sm" type="submit">Activar</span></button>

                                                </form>
                                            </td>
                                            @endif

                                            
                                            <td class="text-center">
                                                <form action="{{action('EmpleadoController@destroy', $empleado->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="DELETE">

                                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="12">No hay empleados activos  !!</td>
                                    </tr>
                                @endif
                                </tbody>

                            </table>
                        </div>
                    </div>
                    {{ $empleados->links() }}
                </div>
            </div>
        </section>

@endsection
