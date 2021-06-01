<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{

  protected $table = 'compras';

  protected $fillable = [
    'user_id', 'cedula_piloto','horas_compradas','fecha_compra','monto',
  ];

  //public function scopeuser_id($query, $user_id)
  //{
    //if($user_id)
      //return $query->where('user_id', '=', $user_id);
  //}

  public function scopecedula_piloto($query, $cedula_piloto)
  {

    if($cedula_piloto)
      return $query->join('estudiantes', 'compras.user_id', '=', 'estudiantes.user_id')
      ->where('estudiantes.cedula', '=', $cedula_piloto);
  }

  public function scopehoras_compradas($query, $horas_compradas)
  {
    if($horas_compradas)
      return $query->where('horas_compradas', '=', $horas_compradas);
  }
  public function scopefecha_compra($query, $fecha_compra)
  {
    if($fecha_compra)
    {
      $fecha_formateada = explode(" ", $fecha_compra);
      $fecha_compra = $fecha_formateada[0];

      $objeto_DateTime = strtotime($fecha_compra);
      $fecha_compra = date('Y-m-d', $objeto_DateTime);

      //dd($fecha_compra);
      return $query->where('fecha_compra', '=', $fecha_compra);
    }
  }
  public function scopemonto($query, $monto)
  {
    if($monto)
      return $query->where('monto', '=', $monto);
  }



  //Esta es la relación inversa un usuario tiene muchas compras 
  //accesando desde compras y en compras está el user_id
  public function user()
  {
    return $this->belongsTo(User::class);
  }


}
