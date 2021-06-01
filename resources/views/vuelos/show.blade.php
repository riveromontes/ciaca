@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vuelos CIACA</div>
                <div class="card-body">
                  <p><strong>Nombre del Estudiante</strong> {{ $estudiante->nombre.' '.$estudiante->apellido }}</p>
                  <p><strong>Nombre del Instructor</strong> {{ $instructor->nombre.' '.$instructor->apellido }}</p>
                  <p><strong>Id del vuelo</strong> {{ $vuelo->id }}</p>
                  <p><strong>Fecha del vuelo</strong> {{ $vuelo->fecha_vuelo }}</p>
                  <p><strong>Modalidad</strong> {{ $vuelo->modalidad }}</p>
                  <p><strong>Horas voladas</strong> {{ $vuelo->horas_voladas }}</p>
                  <p><strong>Avión</strong> {{ $vuelo->avion }}</p>
                  <p><strong>Horas de helice</strong> {{ $vuelo->horas_helice }}</p>
                  <p><strong>Horas de aceite</strong> {{ $vuelo->horas_aceite }}</p>
                  <p><strong>Horas de fuselaje</strong> {{ $vuelo->horas_fuselaje }}</p>
                  <p><strong>Horas de bujías</strong> {{ $vuelo->horas_bujias }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
