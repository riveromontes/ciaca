<?php

namespace App\Http\Controllers;

use App\Instructor;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $nombre = $request->get('nombre');
      $apellido = $request->get('apellido');
      $cedula = $request->get('cedula');
      $pasaporte = $request->get('pasaporte');

      $instructors = Instructor::orderBy('id', 'DESC')
        ->nombre($nombre)
        ->apellido($apellido)
        ->cedula($cedula)
        ->pasaporte($pasaporte)
        ->paginate();

      return view('instructors.index', compact('instructors', ['nombre', 'apellido', 'cedula', 'pasaporte']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instructors.create');
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

       $array2 = explode(" ", $array['f_nacimiento']);
       $array['f_nacimiento'] = $array2[0];
       $objeto_DateTime = strtotime($array['f_nacimiento']);
       $array['f_nacimiento'] = date('Y-m-d', $objeto_DateTime);

       $array2 = explode(" ", $array['vence_licencia']);
       $array['vence_licencia'] = $array2[0];
       $objeto_DateTime = strtotime($array['vence_licencia']);
       $array['vence_licencia'] = date('Y-m-d', $objeto_DateTime);

       $array2 = explode(" ", $array['vence_certificado']);
       $array['vence_certificado'] = $array2[0];
       $objeto_DateTime = strtotime($array['vence_certificado']);
       $array['vence_certificado'] = date('Y-m-d', $objeto_DateTime);

       $request->merge($array);
       //dd($array);

       $instructor = Instructor::create($array);

       return redirect()->route('instructors.create', $instructor->id)
       ->with('info', 'Instructor guardado con éxito');
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
      $user = User::find($instructor->user_id);

      return view('instructors.show', compact('instructor', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
      $roles = Role::get();

      return view('instructors.edit', compact('instructor', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor $instructor)
    {
      //ojo solo se tomarán en cuenta los campos que esten en instructor.php fillable
        $instructor->update($request->all());



        return redirect()->route('instructors.edit', $instructor->id)
        ->with('info', 'Instructor actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
      $instructor->delete();

      return back()->with('info', 'Eliminado correctamente');
    }
}
