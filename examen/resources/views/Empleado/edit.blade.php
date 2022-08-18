@extends('layouts.layout')
@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                        
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-info">
                        {{Session::get('success')}}
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Editar empleado</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">
                            <form method="POST" action="{{ route('empleado.update',$empleados->id) }}"  role="form">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="PUT">

                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                           <input type="number" name="codigo" id="codigo" class="form-control input-sm" placeholder="Codigo" value="{{old('codigo',$empleados->codigo)}}" readonly>
                                                    
                                        </div>
                                        
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="estado" id="estado" class="form-control input-sm" placeholder="Telefono" value="{{old('estado',$empleados->estado)}}">
                                            @if ($errors->has('estado'))
                                                <span class="alert-danger">
                                                    <strong>{{ $errors->first('estado') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del empleado" value="{{old('nombre',$empleados->nombre)}}">
                                            @if ($errors->has('nombre'))
                                                <span class="alert-danger">
                                                    <strong>{{ $errors->first('nombre') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="ciudad" id="ciudad" class="form-control input-sm" placeholder="Ciudad" value="{{old('ciudad',$empleados->ciudad)}}">
                                            @if ($errors->has('ciudad'))
                                                <span class="alert-danger">
                                                    <strong>{{ $errors->first('ciudad') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-xs-8 col-sm-8 col-md-8">
                                                    <input type="text" name="salarioDolares" id="salarioDolares" class="form-control input-sm" placeholder="salario en dDolares" value="{{old('salarioDolares',$empleados->salarioDolares)}}">
                                                    @if ($errors->has('salarioDolares'))
                                                        <span class="alert-danger">
                                                            <strong>{{ $errors->first('salarioDolares') }}</strong>
                                                        </span>
                                                    @endif

                                                    <span class="alert-danger" id="dolarInvalido">
                                                        <strong> </strong>
                                                    </span>
                                                </div>
                                                
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                    <button class=" btn btn-success btn  btn-block" id="validarMoneda" type="button" >Validar</button >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="telefono" id="telefono" class="form-control input-sm" placeholder="telefono" value="{{old('telefono',$empleados->telefono)}}"> 
                                            @if ($errors->has('telefono'))
                                                <span class="alert-danger">
                                                    <strong>{{ $errors->first('telefono') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="salarioPesos" id="salarioPesos" class="form-control input-sm" placeholder="salario en pesos" value="{{old('salarioPesos',$empleados->salarioPesos)}}" readonly>
                                            @if ($errors->has('salarioPesos'))
                                                <span class="alert-danger">
                                                    <strong>{{ $errors->first('salarioPesos') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="correo" id="correo" class="form-control input-sm" placeholder="Correo" value="{{old('correo',$empleados->correo)}}">
                                            @if ($errors->has('correo'))
                                                <span class="alert-danger">
                                                    <strong>{{ $errors->first('correo') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <input type="mail" name="direccion" id="direccion" class="form-control input-sm" placeholder="Direccion" value="{{old('direccion',$empleados->direccion)}}" >
                                        @if ($errors->has('direccion'))
                                            <span class="alert-danger">
                                                <strong>{{ $errors->first('direccion') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                       
                                        <div class="form-check">
                                            <input type="checkbox" name="activo" id="activo" class="form-check-input" value="1" value="{{old('direccion',$empleados->activo)}}"
                                                    {{$empleados->activo == 1 ? 'checked' : ''}}>
                                            <label class="form-check-label" for="exampleCheck1">Activo</label>
                                        </div>
                                            
                                    </div>
                                       
                                </div>
                                <br>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <input type="submit"  value="Actualizar" class="btn btn-success btn-block">
                                        <a href="{{ route('empleado.index') }}" class="btn btn-info btn-block" >Atrás</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <script type="text/javascript">

            $(document).on('click','#validarMoneda', function(){      
                var moneda = $('#salarioDolares').val();
                $.ajax({
                type: "GET",
                url:"{{ url('/moneda/empleado') }}"+'/'+moneda,
                
                success : function (response)
                {   
                    
                    if(response.cambio===true){
                        
                    $("#salarioPesos").val(response.data); 
                   
                    }
                    
                    
                }
                });  
            });

   
        </script>
@endsection