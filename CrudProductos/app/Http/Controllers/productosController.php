<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;//Paa
use App\Models\Categoria;

class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //Se agrego una variable
        // $productos=producto::all(); este se remplaza por el siguiente
        // $productos=producto::paginate(5);
        $productos = producto::with('categoria:id,nombre')->paginate(5);
        return view('productos.index',['productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorias = Categoria::all();
        return view('productos.create',['categorias'=> $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validaciones
        $request->validate([
            'nombre'=>'required|min:5|max:30',
            'descripcion'=>'required|min:5|max:100',
            'precio'=>['required|numeric|regex:/^\d+(\.\d{1,2})?$/'],
            'categoria' => 'required|exists:categorias,id'
        ]);
        $productos=producto::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'precio'=>$request->precio,
            'categoria_id' => $request->categoria,
        ]);

        session()->flash('status','Se guardo el producto' . $request->nombre);
        return to_route('indexProductos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $productos = producto::find($id);
        return view('productos.edit',['producto'=> $productos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //dd($request);//Para mostar todos los datos que estan llegando
        $request->validate([
            'nombre'=>'required|min:5|max:30',
            'descripcion'=>'required|min:5|max:100',
            'precio'=>'required|numeric|regex:/^\d+(\.\d{1,2})?$/'
        ]);
        $productos = producto::find($id);
        if ($productos) {
            $productos->nombre = $request->input('nombre');
            $productos->descripcion = $request->input('descripcion');
            $productos->precio = $request->input('precio');

            $productos->save();
        }
        session()->flash('status','Se actualizo el producto' . $request->nombre);
        return to_route('indexProductos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $productos = producto::find($id);
        if ($productos) {
            $productos->delete();
        }
        session()->flash('status','Se elimino el producto' . $productos->nombre);
        return to_route('indexProductos');
    }
}
