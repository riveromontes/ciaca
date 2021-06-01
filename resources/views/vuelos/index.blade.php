@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card mb-3">
        <div class="card-body">
          <div class="col-sm-12">
            <h5>
              Filtrar vuelos
            </h5>
            {{ Form::model(Request::all(), ['route' => 'vuelos.index', 'method' => 'GET', 'class' => 'row']) }}
            <!-- <input type="hidden" name="id" /> -->
            <div class="form-group col-sm-2">
              <label>Cédula Estudiante</label>
              {{ Form::text('cedula_estudiante', $cedula_estudiante, ['class' => 'form-control', 'size' => '12']) }}
            </div>
            <div class="form-group col-sm-2">
              <label>Cédula Instructor</label>
              {{ Form::text('cedula_instructor', $cedula_instructor, ['class' => 'form-control', 'size' => '12']) }}
            </div>
            <div class="form-group col-sm-3">
              <label>Vuelo Desde</label>
              {{ Form::date('vuelo_desde', $vuelo_desde, ['class' => 'form-control datepicker', 'pattern' => '[0-9]{4}/[0-9]{2}/[0-9]{2}']) }}
            
            </div>
            <div class="form-group  col-sm-3">
              <label>Vuelo Hasta</label>
              {{ Form::date('vuelo_hasta', $vuelo_hasta, ['class' => 'form-control datepicker', 'pattern' => '[0-9]{4}/[0-9]{2}/[0-9]{2}']) }}

            </div>
            <div class="form-group pl-0 pr-0 col-sm-1">
              <label>Avión</label>
              {{ Form::text('avion', $avion, ['class' => 'form-control', 'size' => '8', 'placeholder' => 'Avión']) }}
            </div>
            <div class="form-group  col-sm-1">
              <label class="d-block">&nbsp;</label>
              <button type="submit" class="btn btn-default">
                <span class="fa fa-search"></span>
              </button>
            </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
      <div class="card mb-3">
        <div class="card-header">
          Vuelos CIACA
          @can('vuelos.create')
          <a href="{{ route('vuelos.create') }}" class="btn btn-sm btn-primary float-right">
            Crear
          </a>
          @endcan
        </div>
        <div class="card-body">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Estudiante</th>
                <th>Instructor</th>
                <th>Fecha Vuelo</th>
                <th>Avión</th>
                <th>Horas Vuelo</th>
                <th style="width:20%">Opciones</th>
              </tr>
            </thead>
            <tbody>
            @php $total = 0 @endphp


              @foreach($vuelos as $vuelo)
              <tr>
                <td>{{$vuelo->estudiante->cedula}} - {{ $vuelo->student->nombre }} {{ $vuelo->student->apellido }}</td>
                <td>{{$vuelo->instructor->cedula}} - {{ $vuelo->instrucctor->nombre }} {{ $vuelo->instrucctor->apellido }}</td>
                <td>{{ $vuelo->fecha_vuelo }}</td>
                <td>{{ $vuelo->avion }}</td>
                <td>{{ $vuelo->horas_voladas }}</td>
                @php $total += $vuelo->horas_voladas; @endphp
                <td>
                  @can('vuelos.show')
                  <a href="{{ route('vuelos.show', $vuelo->id) }}" class="btn btn-sm btn-light">
                    Ver
                  </a>
                  @endcan
                  @can('vuelos.edit')
                  <a href="{{ route('vuelos.edit', $vuelo->id) }}" class="btn btn-sm btn-light">
                    Editar
                  </a>
                  @endcan
                  @can('vuelos.destroy')
                  {!! Form::open(['route' => ['vuelos.destroy', $vuelo->id],
                  'method' => 'DELETE', 'class'=>'d-inline']) !!}
                  <button class="btn btn-sm btn-danger">
                    Eliminar
                  </button>
                  {!! Form::close() !!}
                  @endcan
                </td>
              </tr>
              @endforeach

            </tbody>
            <tfoot>
              <tr>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                

                @php $total = $total; @endphp
               
                @php $totaldeTotales = totalTotal($vuelosAll, $cedula_estudiante, $cedula_instructor, $vuelo_desde, $vuelo_hasta, $avion); @endphp
                
                @php $totaldeCompras = totalCompras($compras, $cedula_estudiante); @endphp


                <th>Total de Página: {{$total}}</th>
                <th>(H/compradas): {{$totaldeCompras}}</th>
                <th>(H/voladas): {{$totaldeTotales}}</th>
                @if(is_numeric($totaldeCompras))
                  <th>Saldo: {{ $totaldeCompras - $totaldeTotales}}</th>
                @else
                  <th>&nbsp;</th>
                @endif
                <th>&nbsp;</th>
              </tr>
            </tfoot>
          </table>
          {{ $vuelos->appends($_GET)->render() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
  var dateToday = new Date();
  $(".datepicker").datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    startDate: dateToday
  });
  
</script>
@endsection