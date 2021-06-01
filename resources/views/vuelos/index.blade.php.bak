@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body">
            <div>
              <h5>
                Filtrar vuelos
                {{ Form::open(['route' => 'vuelos.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                <div class="form-group p-1">
                  {{ Form::text('id_estudiante', $id_estudiante, ['class' => 'form-control', 'size' => '12', 'placeholder' => 'Id Estudiante']) }}
                </div>
                <div class="form-group p-1">
                  {{ Form::text('id_instructor', $id_instructor, ['class' => 'form-control', 'size' => '12', 'placeholder' => 'Id Instructor']) }}
                </div>
                <div class="form-group p-1">
                  <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                      {{ Form::text('fecha_vuelo', $fecha_vuelo, ['class' => 'form-control datetimepicker-input', 'data-target' => '#datetimepicker4', 'size' => '17', 'placeholder' => 'Fecha del vuelo']) }}
                      <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
                </div>
                <div class="form-group p-1">
                  {{ Form::text('avion', $avion, ['class' => 'form-control', 'size' => '8', 'placeholder' => 'Avión']) }}
                </div>
                <div class="form-group p-1">
                  <button type="submit" class="btn btn-default">
                    <span class="fa fa-search"></span>
                  </button>
                </div>
                {{ Form::close() }}
              </h5>
            </div>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-header">
            Vuelos CIACA
            @can('vuelos.create')
              <a href="{{ route('vuelos.create') }}"
                class="btn btn-sm btn-primary float-right">
                Crear
              </a>
            @endcan
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover table-responsive">
              <thead>
                <tr>
                  <th width="10px">ID</th>
                  <th>Id estudiante</th>
                  <th>Id Instructor</th>
                  <th>Fecha Vuelo</th>
                  <th>Avión</th>
                  <th colspan="3">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @foreach($vuelos as $vuelo)
                  <tr>
                    <td>{{ $vuelo->id }}</td>
                    <td>{{ $vuelo->id_estudiante }}</td>
                    <td>{{ $vuelo->id_instructor }}</td>
                    <td>{{ $vuelo->fecha_vuelo }}</td>
                    <td>{{ $vuelo->avion }}</td>
                    <td width="10px">
                      @can('vuelos.show')
                        <a href="{{ route('vuelos.show', $vuelo->id) }}"
                          class="btn btn-sm btn-light">
                            Ver
                        </a>
                      @endcan
                    </td>
                    <td width="10px">
                      @can('vuelos.edit')
                        <a href="{{ route('vuelos.edit', $vuelo->id) }}"
                          class="btn btn-sm btn-light">
                            Editar
                        </a>
                      @endcan
                    </td>
                    <td width="10px">
                      @can('vuelos.destroy')
                        {!! Form::open(['route' => ['vuelos.destroy', $vuelo->id],
                        'method' => 'DELETE']) !!}
                          <button class="btn btn-sm btn-danger">
                            Eliminar
                          </button>
                        {!! Form::close() !!}
                      @endcan
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{ $vuelos->render() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
