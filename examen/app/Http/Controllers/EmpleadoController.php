<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\Arr;



class EmpleadoController extends Controller
{   
    protected $empleados;
    public function __construct(Empleado $empleados)
    {
        $this->empleados = $empleados;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $empleados = Empleado::orderBy('id','Desc')->where('eliminado', 0)->paginate(8);
        return view('empleado.index',compact('empleados'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $estados=$this->wsObtenerEstado();
        // $monedas=$this->wsObtenerMoneda();
        // return view('Empleado.create',compact('estados','monedas'));
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        if($this->validate(
                            $request,['codigo'=>'required | unique:empleado',
                                     'nombre'=>'required ',
                                     'salarioDolares'=>'required|numeric|min:0|not_in:0',
                                     'salarioPesos'=>'required|numeric|min:0|not_in:0',
                                     'direccion'=>'required',
                                     'estado'=>'required',
                                     'ciudad'=>'required',
                                     'telefono'=>'required |regex:/[0-9]{10}/',
                                     'correo'=>'required |email'
                                     
                                    ]
                            )
        ){
            Empleado::create(
                ['codigo' => $request->get('codigo'),
                'nombre' => $request->get('nombre'),
                'salarioDolares' => $request->get('salarioDolares'),
                'salarioPesos' => $request->get('salarioPesos'),
                'direccion' => $request->get('direccion'),
                'estado' => $request->get('estado'),
                'ciudad' => $request->get('ciudad'),
                'telefono' => $request->get('telefono'),
                'correo' => $request->get('correo'),
                'activo' => $request->has('activo')? $request->get('activo'):0,
                'eliminado' => $request->has('eliminado')? $request->get('eliminado'):0]
            );
        return redirect()->route('empleado.index') -> with ('success','Registro creado correctamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $empleados = Empleado::find($id);
        return view('empleado.show',compact('empleados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $estados=$this->wsObtenerEstado();
        // $monedas=$this->wsObtenerMoneda();
        // $empleado = Empleado::find($id);
        // return view('empleado.edit',compact('empleado','estados','monedas'));

       
        // $empleados = Empleado::find($id);
        // return view('empleado.show',compact('empleados'));
        $empleados = Empleado::find($id);
        return view('empleado.edit',compact('empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $this->validate($request,[ 
                     'codigo'=>'required ',
                     'nombre'=>'required',
                     'salarioDolares'=>'required |numeric|min:0|not_in:0',
                     'salarioPesos'=>'required |numeric|min:0|not_in:0',
                     'direccion'=>'required',
                     'estado'=>'required',
                     'ciudad'=>'required',
                     'telefono'=>'required |regex:/[0-9]{10}/',
                     'correo'=>'required |email',
        ]);

        Empleado::find($id)->update([
            'codigo' => $request->get('codigo'),
        'nombre' => $request->get('nombre'),
        'salarioDolares' => $request->get('salarioDolares'),
        'salarioPesos' => $request->get('salarioPesos'),
        'direccion' => $request->get('direccion'),
        'estado' => $request->get('estado'),
        'ciudad' => $request->get('ciudad'),
        'telefono' => $request->get('telefono'),
        'correo' => $request->get('correo'),
        'activo' => $request->has('activo')? $request->get('activo'):0,
        'eliminado'  => $request->has('eliminado')? $request->get('eliminado'):0
        ]);
        return redirect()->route('empleado.index')->with('success','Registro actualizado correctamente');
       
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Empleado::where('id', $id)->update(array('eliminado' => 1));
        //Empleado::find($id)->delete();
        return redirect()->route('empleado.index')->with('success','Registro eliminado correctamente');
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activar($id)
    {
        //
        $valor = Empleado::select('activo')
                 ->where('id', $id)
                 ->first()
                 ->activo;

        if($valor ===0){
            Empleado::where('id', $id)->update(array('activo' => 1));
            return redirect()->route('empleado.index')->with('success','Empleado activado correctamente');
        }else{
            Empleado::where('id', $id)->update(array('activo' => 0));
            return redirect()->route('empleado.index')->with('success','Empleado desactivado correctamente');
        }       
        
    }

    public function moneda($moneda){

        $client = new HttpClient([
            'base_uri' => 'https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/'
        ]);
        $response = $client->request('GET', 'https://www.banxico.org.mx/SieAPIRest/service/v1/series/SP74665,SF61745,SF60634,SF43718,SF43773/datos//2022-01-01/2022-01-08', 
        [
            'headers' => 
            [       
                    'Content-Type' => "application/json",
                    'Bmx-Token' => "806bbe98461fb2b1390a2f2135136763d80fb04e5e17e6d5825ebba46fe76f7d",
            ],
            'timeout' => 20, 
            'connect_timeout' => 20, 
        ]);

        $respuesta = ((array)json_decode($response->getBody())->bmx->series[0]->datos[0]->dato);
        
        $valor=$respuesta[0];
        
        $precio = (float)$valor;
        $cambio=$moneda*$precio;
        return response()->json(['data' =>  $cambio, 'cambio'=>true]);
        

        
    }
}
