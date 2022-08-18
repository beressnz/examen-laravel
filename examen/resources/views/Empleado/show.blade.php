@extends('layouts.layout')
@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Datos de empleado  <b> {{$empleados->nombre}}</b> </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Codigo</label>
                                    <input class="form-control" type="text" placeholder="{{$empleados->codigo}}" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Estado</label>
                                        <input class="form-control" type="text" placeholder="{{$empleados->estado}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Salario en dolares</label>
                                        <input class="form-control" type="text" placeholder="{{$empleados->salarioDolares}}" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Estado</label>
                                        <input class="form-control" type="text" placeholder="{{$empleados->estado}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Salario en pesos</label>
                                        <input class="form-control" type="text" placeholder="{{$empleados->salarioPesos}}" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Telefono</label>
                                        <input class="form-control" type="text" placeholder="{{$empleados->telefono}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Direccion</label>
                                        <input class="form-control" type="text" placeholder="{{$empleados->direccion}}" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Correo</label>
                                        <input class="form-control" type="text" placeholder="{{$empleados->correo}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Salario en dolares</label>
                                        <input class="form-control" type="text" placeholder="{{$dolaresMeses}}" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Salario en pesos</label>
                                        <input class="form-control" type="text" placeholder="{{$pesosMeses}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Activo</label>
                                        @if($empleados->activo ===1 )
                                                
                                                <input class="form-control" type="text" placeholder="Si" readonly>
                                            @else
                                               
                                                <input class="form-control" type="text" placeholder="No" readonly>
                                            @endif
                                        
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <a href="{{ route('empleado.index') }}" class="btn btn-info btn-block" >Atrás</a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
@endsection