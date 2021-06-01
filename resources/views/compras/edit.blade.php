@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Horas compradas</div>

                <div class="card-body">
                  {!! Form::model($compra, ['route' => ['compras.update', $compra->id],
                  'method' => 'PUT']) !!}

                    @include('compras.partials.form')

                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
