<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{

  protected $table = 'vuelos';

  protected $fillable = [
    'id_estudiante','id_instructor','horas_voladas','fecha_vuelo','modalidad',
    'horas_helice','horas_aceite','horas_fuselaje','horas_bujias','avion',
  ];
  
  public function student()
  {
    return $this->BelongsTo('App\Estudiante', 'id_estudiante', 'id');
  }
  public function instrucctor()
  {
    return $this->BelongsTo('App\Instructor', 'id_instructor', 'id');
  }

  public function scopeid($query, $id)
  {
    if($id)
      return $query->where('id', '=', $id);
  }
	
  public function scopecedula_estudiante($query, $cedula_estudiante)
  {
    if($cedula_estudiante)
      return $query->join('estudiantes', 'vuelos.id_estudiante', '=', 'estudiantes.id')
      ->select('vuelos.*', 'estudiantes.cedula', 'estudiantes.id as estudianteId')
      ->where('estudiantes.cedula', '=', $cedula_estudiante);
      

      
  }

  public function scopecedula_instructor($query, $cedula_instructor)
  {
    if($cedula_instructor)
      return $query->join('instructors', 'vuelos.id_instructor', '=', 'instructors.id')
      ->select('vuelos.*', 'instructors.cedula', 'instructors.id as instructorId')
      ->where('instructors.cedula', '=', $cedula_instructor);
  }

  public function scopeid_estudiante($query, $id_estudiante)
  {
    if($id_estudiante)
      return $query->where('id_estudiante', '=', $id_estudiante);
  }

  public function scopeid_instructor($query, $id_instructor)
  {
    if($id_instructor)
      return $query->where('id_instructor', '=', $id_instructor);
  }

  public function scopevuelo_desde($query, $vuelo_desde)
  {
    if($vuelo_desde)
      return $query->where('fecha_vuelo', '=', $vuelo_desde);
  }

  public function scopevuelo_hasta($query, $vuelo_hasta)
  {
    if($vuelo_hasta)
      return $query->where('fecha_vuelo', '=', $vuelo_hasta);
  }

  public function scopefecha_vuelo($query, $fecha_vuelo)
  {
    if($fecha_vuelo){

      $fecha_formateada = explode(" ", $fecha_vuelo);
      $fecha_vuelo = $fecha_formateada[0];

      $objeto_DateTime = strtotime($fecha_vuelo);
      $fecha_vuelo = date('Y-m-d', $objeto_DateTime);

      //dd($fecha_compra);

      return $query->where('fecha_vuelo', '=', $fecha_vuelo);
    }
  }

  public function scopemodalidad($query, $modalidad)
  {
    if($modalidad)
      return $query->where('modalidad', '=', $modalidad);
  }

  public function scopeavion($query, $avion)
  {
    if($avion)
      return $query->where('avion', '=', $avion);
  }


  public function estudiante()
  {
    return $this->BelongsTo(Estudiante::class, 'id_estudiante', 'id');
  }
  public function instructor()
  {
    return $this->BelongsTo(Instructor::class, 'id_instructor', 'id');
  }
}
