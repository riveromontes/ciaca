@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
              <div class="card-body">
                <div>
                  <h5>
                    Filtrar usuarios
                    {{ Form::open(['route' => 'users.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                    <div class="form-group">
                      {{ Form::text('name', $name, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
                    </div>
                    <div class="form-group">
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
                  Usuarios
              </div>
              <div class="card-body">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th width="10px">ID</th>
                      <th>Nombres</th>
                      <th colspan="3">&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td width="10px">
                        @can('users.show')
                          <a href="{{ route('users.show', $user->id) }}"
                            class="btn btn-sm btn-light">
                              Ver
                          </a>
                        @endcan
                      </td>
                      <td width="10px">
                        @can('users.edit')
                          <a href="{{ route('users.edit', $user->id) }}"
                            class="btn btn-sm btn-light">
                              Editar
                            </a>
                        @endcan
                      </td>
                      <td width="10px">
                        @can('users.destroy')
                          {!! Form::open(['route' => ['users.destroy', $user->id],
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
                {{ $users->render() }}
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
