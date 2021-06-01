<div class="form-group">
  {{ Form::label('user_id', 'Usuario del sistema (piloto)') }}
  <select id="user_id" name="user_id" class="form-control">
    <option value="null">Usuario que comprará las horas</option>
    @foreach($estudiantes as $estudiante)
       <option value="{{$estudiante->user_id}}">{{$estudiante->nombre.' '.$estudiante->apellido.'-'.$estudiante->cedula}}</option>
    @endforeach
  </select>
</div>
<div class="form-group">
  {{ Form::label('horas_compradas', 'Horas compradas') }}
  {{ Form::text('horas_compradas', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
  {{ Form::label('fecha_compra', 'Fecha de la compra de horas') }}
    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
      {{ Form::text('fecha_compra', null, ['class' => 'form-control datetimepicker-input', 'placeholder' => 'Fecha compra']) }}
      <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
      </div>
    </div>
</div>

<div class="form-group">
  {{ Form::label('monto', 'Monto ($)') }}
  {{ Form::text('monto', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
  {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>
