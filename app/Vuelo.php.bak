<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
  protected $fillable = [
    'id_estudiante','id_instructor','horas_voladas','fecha_vuelo','modalidad',
    'horas_helice','horas_aceite','horas_fuselaje','horas_bujias','avion',
  ];

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
    return $this->hasOne(Estudiante::class);
  }
  public function instructor()
  {
    return $this->hasOne(Instructor::class);
  }
}
