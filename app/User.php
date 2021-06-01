<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Query Scope
    //para el filtro de búsqueda
    public function scopename($query, $name)
    {
      if($name)
        return $query->where('name', 'LIKE', "%$name%");

    }

    //Para la relación de usuario con EstudiantesTableSeeder
    public function estudiante()
    {
      return $this->hasOne(Estudiante::class);
    }

    //Para la relación de usuario con InstructorsTableSeeder
    public function instructor()
    {
      return $this->hasOne(Instructor::class);
    }

    //Para la relación de usuario con ComprasTableSeeder
    //un usuario tiene muchas compras y en usuario está el id
    public function compras()
    {
      return $this->hasMany(Compra::class,'user_id');
    }
}
