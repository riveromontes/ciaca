@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Instructor</div>
                <div class="card-body">
                  <p><strong>Nombre(Login)</strong> {{ $user->name }}</p>
                  <p><strong>Correo(Login)</strong> {{ $user->email }}</p>
                  <p><strong>Id</strong> {{ $estudiante->id }}</p>
                  <p><strong>Nombre</strong> {{ $estudiante->nombre }}</p>
                  <p><strong>Apellido</strong> {{ $estudiante->apellido }}</p>
                  <p><strong>Cédula</strong> {{ $estudiante->cedula }}</p>
                  <p><strong>Pasaporte</strong> {{ $estudiante->pasaporte }}</p>
                  <p><strong>F. Nacimiento</strong> {{ date("d-F-Y", strtotime($estudiante->f_nacimiento)) }}</p>
                  <p><strong>Peso</strong> {{ $estudiante->peso.'kg.' }}</p>
                  <p><strong>Estatura</strong> {{ $estudiante->estatura.'mtr' }}</p>
                  <p><strong>Sexo</strong> {{ $estudiante->sexo }}</p>
                  <p><strong>Grupo sanguineo</strong> {{ $estudiante->grupo_sangre }}</p>
                  <p><strong>Dirección</strong> {{ $estudiante->direccion }}</p>
                  <p><strong>Ciudad</strong> {{ $estudiante->ciudad }}</p>
                  <p><strong>Código Postal</strong> {{ $estudiante->codigo_postal }}</p>
                  <p><strong>Teléfono Local</strong> {{ $estudiante->tlf_local }}</p>
                  <p><strong>Teléfono celular</strong> {{ $estudiante->tlf_movil }}</p>
                  <p><strong>Correo electónico</strong> {{ $estudiante->correo }}</p>
                  <p><strong>Contacto emergencia</strong> {{ $estudiante->nombre_emerg }}</p>
                  <p><strong>Tlf-1 emergencia</strong> {{ $estudiante->tlf1_emerg }}</p>
                  <p><strong>Tlf-2 emergencia</strong> {{ $estudiante->tlf2_emerg }}</p>
                  <p><strong>Tlf-3 emergencia</strong> {{ $estudiante->tlf3_emerg }}</p>
                  <p><strong>Tipo licencia</strong> {{ $estudiante->tipo_licencia }}</p>
                  <p><strong>F. vencimiento licencia</strong> {{ date("d-F-Y", strtotime($estudiante->vence_licencia)) }}</p>
                  <p><strong>F. vencimiento certificado</strong> {{ date("d-F-Y", strtotime($estudiante->vence_certificado)) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
