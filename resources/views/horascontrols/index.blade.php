@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body">
            <div>
              <h5>
                Filtrar
                {{ Form::open(['route' => 'estudiantes.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
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
            Cartelera

          </div>
          <div class="card-body">
            <table class="table table-striped table-hover table-responsive">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Cédula</th>
                  <th>Horas disponibles</th>
                  <th colspan="1">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @foreach($estudiantes as $estudiante)
                  <tr>
                    <td>{{ $estudiante->id }}</td>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->apellido }}</td>
                    <td>{{ $estudiante->cedula }}</td>

                    <?php $total_compras = 0 ?>
                    @foreach($compras as $compra)
                      @if($compra->user_id == $estudiante->user_id)
                      <?php $total_compras = $total_compras + $compra->horas_compradas ?>
                      @endif
                    @endforeach

                    <?php $total_vuelos = 0 ?>
                    @foreach($vuelos as $vuelo)
                      @if($vuelo->id_estudiante == $estudiante->id)
                      <?php $total_vuelos = $total_vuelos + $vuelo->horas_voladas ?>
                      @endif
                    @endforeach

                    <?php $total = $total_compras - $total_vuelos ?>

                    <td>{{ $total }}</td>

                    <td width="10px">
                      @can('estudiantes.show')
                        <a href="{{ route('estudiantes.show', $estudiante->id) }}"
                          class="btn btn-sm btn-light">
                            Ver más info.
                        </a>
                      @endcan
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{ $estudiantes->render() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
