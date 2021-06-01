@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Horas compradas</div>
                <div class="card-body">
                  <p><strong>Nombre(Login)</strong> {{ $user->name }}</p>
                  <p><strong>Correo(Login)</strong> {{ $user->email }}</p>
                  <p><strong>Id de la compra</strong> {{ $compra->id }}</p>
                  <p><strong>Horas compradas</strong> {{ $compra->horas_compradas }}</p>
                  <p><strong>Fecha de la compra</strong> {{ $compra->fecha_compra }}</p>
                  <p><strong>Monto ($)</strong> {{ $compra->monto }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
