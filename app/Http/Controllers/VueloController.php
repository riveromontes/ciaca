<?php

namespace App\Http\Controllers;

use App\Vuelo;
use App\User;
use App\Estudiante;
use App\Instructor;
use App\Compra;
use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;

class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      $cedula_estudiante = $request->get('cedula_estudiante');
      $cedula_instructor = $request->get('cedula_instructor');
      $vuelo_desde = $request->get('vuelo_desde');
      $vuelo_hasta = $request->get('vuelo_hasta');
      $avion = $request->get('avion');
 

		  
      $vuelos = Vuelo::orderBy('fecha_vuelo', 'ASC')
      ->cedula_estudiante($cedula_estudiante)
      ->cedula_instructor($cedula_instructor)
      ->vuelo_desde($vuelo_desde)
      ->vuelo_hasta($vuelo_hasta)
      ->avion($avion)
      ->paginate();


      $vuelosAll = Vuelo::all();
      // $compras = Compra::find(4);
      $compras = Compra::all();

      return view('vuelos.index', compact('vuelos', 'vuelosAll', 'compras', ['cedula_estudiante',
      'cedula_instructor', 'vuelo_desde', 'vuelo_hasta', 'avion']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
        $estudiantes = Estudiante::get();
        $instructors = Instructor::get();

        return view('vuelos.create', compact('estudiantes', 'instructors'));
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $array = $request->all();
      $array2 = explode(" ", $array['fecha_vuelo']);
      $array['fecha_vuelo'] = $array2[0];

      $objeto_DateTime = strtotime($array['fecha_vuelo']);
      $array['fecha_vuelo'] = date('Y-m-d', $objeto_DateTime);

      $request->merge($array);
      //dd($array);

      $vuelo = Vuelo::create($array);

      return redirect()->route('vuelos.create', $vuelo->id)
      ->with('info', 'Vuelo guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function show(Vuelo $vuelo)
    {
      $estudiante = Estudiante::find($vuelo->id_estudiante);
      $instructor = Instructor::find($vuelo->id_instructor);

      return view('vuelos.show', compact('vuelo', 'estudiante', 'instructor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
     public function edit(Vuelo $vuelo)
     {
       $roles = Role::get();

       $estudiantes = Estudiante::get();
       $instructors = Instructor::get();

       return view('vuelos.edit', compact('vuelo', 'estudiantes', 'instructors'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vuelo $vuelo)
    {
      //ojo solo se tomarán en cuenta los campos que esten en vuelo.php fillable
        $vuelo->update($request->all());

        return redirect()->route('vuelos.edit', $vuelo->id)
        ->with('info', 'Vuelo actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vuelo $vuelo)
    {
      $vuelo->delete();

      return back()->with('info', 'Eliminado correctamente');
    }
}
