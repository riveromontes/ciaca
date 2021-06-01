@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body">
            <div>
              <h5>
                Filtrar Instructor
                {{ Form::open(['route' => 'instructors.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                <div class="form-group p-1">
                  {{ Form::text('nombre', $nombre, ['class' => 'form-control', 'size' => '12', 'placeholder' => 'Nombre']) }}
                </div>
                <div class="form-group p-1">
                  {{ Form::text('apellido', $apellido, ['class' => 'form-control', 'size' => '12', 'placeholder' => 'Apellido']) }}
                </div>
                <div class="form-group p-1">
                  {{ Form::text('cedula', $cedula, ['class' => 'form-control', 'size' => '8', 'placeholder' => 'Cédula']) }}
                </div>
                <div class="form-group p-1">
                  {{ Form::text('pasaporte', $pasaporte, ['class' => 'form-control', 'size' => '9', 'placeholder' => 'Pasaporte']) }}
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
            Instructores
            @can('instructors.create')
              <a href="{{ route('instructors.create') }}"
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
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Cédula</th>
                  <th>Pasaporte</th>
                  <th colspan="3">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @foreach($instructors as $instructor)
                  <tr>
                    <td>{{ $instructor->id }}</td>
                    <td>{{ $instructor->nombre }}</td>
                    <td>{{ $instructor->apellido }}</td>
                    <td>{{ $instructor->cedula }}</td>
                    <td>{{ $instructor->pasaporte }}</td>
                    <td width="10px">
                      @can('instructors.show')
                        <a href="{{ route('instructors.show', $instructor->id) }}"
                          class="btn btn-sm btn-light">
                            Ver
                        </a>
                      @endcan
                    </td>
                    <td width="10px">
                      @can('instructors.edit')
                        <a href="{{ route('instructors.edit', $instructor->id) }}"
                          class="btn btn-sm btn-light">
                            Editar
                        </a>
                      @endcan
                    </td>
                    <td width="10px">
                      @can('instructors.destroy')
                        {!! Form::open(['route' => ['instructors.destroy', $instructor->id],
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
            {{ $instructors->render() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
