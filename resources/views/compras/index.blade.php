@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body">
            <div>
              <h5>
                Filtrar compras
                {{ Form::open(['route' => 'compras.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                <div class="form-group p-1">
                  {{ Form::text('cedula_piloto', $cedula_piloto, ['class' => 'form-control', 'size' => '12', 'placeholder' => 'Cédula Piloto']) }}
                </div>
                <div class="form-group p-1">
                  {{ Form::text('horas_compradas', $horas_compradas, ['class' => 'form-control', 'size' => '12', 'placeholder' => 'Horas compradas']) }}
                </div>

                <div class="form-group p-1">
                  <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                      {{ Form::text('fecha_compra', $fecha_compra, ['class' => 'form-control datetimepicker-input', 'data-target' => '#datetimepicker4', 'size' => '17', 'placeholder' => 'Fecha compra']) }}
                      <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
                </div>

                <div class="form-group p-1">
                  {{ Form::text('monto', $monto, ['class' => 'form-control', 'size' => '9', 'placeholder' => 'Monto ($)']) }}
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
            Horas compradas
            @can('compras.create')
              <a href="{{ route('compras.create') }}"
                class="btn btn-sm btn-primary float-right">
                Crear
              </a>
            @endcan
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th width="10px">ID</th>
                  <th>Nombre piloto</th>
                  <th>Cédula piloto</th>
                  <th>Horas compradas</th>
                  <th>Fecha compra</th>
                  <th>Monto</th>
                  <th colspan="3">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @foreach($compras as $compra)
                  <tr>
                    <td>{{ $compra->id }}</td>
                      @if($compra->user->estudiante != null)
                        <td>{{ $compra->user->estudiante->nombre.' '.$compra->user->estudiante->apellido }}</td>
                        <td>{{ $compra->user->estudiante->cedula  }}</td>
                      @else
                        <td>{{ 'SinDato' }}</td>
                        <td>{{ 'SinDato'  }}</td>
                      @endif
                    <td>{{ $compra->horas_compradas }}</td>
                    <td>{{ $compra->fecha_compra }}</td>
                    <td>{{ $compra->monto }}</td>
                    <td width="10px">
                      @can('compras.show')
                        <a href="{{ route('compras.show', $compra->id) }}"
                          class="btn btn-sm btn-light">
                            Ver
                        </a>
                      @endcan
                    </td>
                    <td width="10px">
                      @can('compras.edit')
                        <a href="{{ route('compras.edit', $compra->id) }}"
                          class="btn btn-sm btn-light">
                            Editar
                        </a>
                      @endcan
                    </td>
                    <td width="10px">
                      @can('compras.destroy')
                        {!! Form::open(['route' => ['compras.destroy', $compra->id],
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
            {{ $compras->render() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
