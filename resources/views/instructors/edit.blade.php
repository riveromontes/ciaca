@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Instructor</div>

                <div class="card-body">
                  {!! Form::model($instructor, ['route' => ['instructors.update', $instructor->id],
                  'method' => 'PUT']) !!}

                    @include('instructors.partials.form')

                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
