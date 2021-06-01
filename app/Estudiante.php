<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{

  protected $table = 'estudiantes';

  protected $fillable = [
    'user_id','nombre','apellido','cedula','pasaporte','f_nacimiento','peso','estatura',
    'sexo','grupo_sangre','direccion','estado','municipio','ciudad',
    'codigo_postal','tlf_local','tlf_movil','correo','nombre_emerg',
    'tlf1_emerg','tlf2_emerg','tlf3_emerg','tipo_licencia','vence_certificado',
    'vence_licencia','horas_externas','evaluacion_medica','hab_instrumental',
    'hab_monomotor','hab_multimotor','horas_pic','horas_sic',
  ];

  public function scopenombre($query, $nombre)
  {
    if($nombre)
      return $query->where('nombre', 'LIKE', "%$nombre%");
  }
  public function scopeapellido($query, $apellido)
  {
    if($apellido)
      return $query->where('apellido', 'LIKE', "%$apellido%");
  }
  public function scopecedula($query, $cedula)
  {
    if($cedula)
      return $query->where('cedula', 'LIKE', "%$cedula%");
  }
  public function scopepasaporte($query, $pasaporte)
  {
    if($pasaporte)
      return $query->where('pasaporte', 'LIKE', "%$pasaporte%");
  }

  //Relacion inversa de uno a uno, un usuario tiene un estudiante
  //y en estudiante está el campo user_id
  public function user()
  {
    return $this->belongsTo(User::class, 'user_id', 'id');
  }


  public function vuelos()
  {
    return $this->hasMany(Vuelo::class, 'id_estudiante');
  }


}
