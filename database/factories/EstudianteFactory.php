<?php

use Faker\Generator as Faker;

$factory->define(App\Estudiante::class, function (Faker $faker) {

    $aux = [];
    $usuarios = App\User::get(['id']);

    foreach($usuarios as $k => $v)
    {
      $aux[] = $v->id;
    }
    return [
          'user_id' => $faker->unique()->randomElement($aux),
          'nombre' => $faker->firstName,
          'apellido' => $faker->lastName,
          'cedula' => $faker->unique()->numerify('V########'),
          'pasaporte' => $faker->unique()->numerify('##########'),
          'f_nacimiento' => $faker->date($format = 'Y-m-d', $max = 'now'),
          'peso' => $faker->numberBetween(40,120),
          'estatura' => 1+(1/$faker->randomDigitNotNull),
          'sexo' => $faker->randomElement($array = array ('M','F')),
          'grupo_sangre' => $faker->randomElement($array = array ('A+','A-','B+','B-','AB+','AB-','O+','O-')),
          'direccion' => $faker->sentence($nbWords = 5, $variableNbWords = true),
          'estado' => $faker->state,
          'municipio' => $faker->word,
          'ciudad' => $faker->city,
          'codigo_postal' => $faker->postcode,
          'tlf_local' => $faker->numerify('##########'),
          'tlf_movil' => $faker->numerify('##########'),
          'correo' => $faker->unique()->safeEmail,
          'nombre_emerg' => $faker->firstName,
          'tlf1_emerg' => $faker->numerify('##########'),
          'tlf2_emerg' => $faker->numerify('##########'),
          'tlf3_emerg' => $faker->numerify('##########'),
          'tipo_licencia' => $faker->randomElement($array = array ('alumno','privado','comercial')),
          'vence_certificado' => $faker->date($format = 'Y-m-d', $max = 'now'),
          'vence_licencia' => $faker->date($format = 'Y-m-d', $max = 'now'),
          'horas_externas' => $faker->numberBetween(1,999)+(1/$faker->randomDigitNotNull),
          'evaluacion_medica' => $faker->randomElement($array = array ('S','N')),
          'hab_instrumental' => $faker->randomElement($array = array ('S','N')),
          'hab_monomotor' => $faker->randomElement($array = array ('S','N')),
          'hab_multimotor' => $faker->randomElement($array = array ('S','N')),
          'horas_pic' => $faker->numberBetween(1,99)+(1/$faker->randomDigitNotNull),
          'horas_sic' => $faker->numberBetween(1,99)+(1/$faker->randomDigitNotNull),
    ];
});
