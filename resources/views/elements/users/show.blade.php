@extends('layouts.app')
@section('title', 'NovaTV - Ver Usuarios')

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <h1> <i class="fa fa-search"></i> Ver Usuario</h1>
        <hr>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('home') }}">
                        <i class="fa fa-clipboard-list"></i>  
                        Escritorio
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('users.index') }}">
                        <i class="fas fa-list-alt"></i> 
                        Módulo Usuarios
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa fa-search"></i> 
                    Ver Usuario
                </li>
            </ol>
        </nav>
        <form>
            
            <div class="mb-3">
                <label for="fullname" class="">Nombre Completo</label>

                <div class="">
                    <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ $user->fullname }}" disabled autocomplete="fullname" autofocus>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="">Correo electrónico</label>

                <div class="">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" disabled autocomplete="email" autofocus>
                </div>
            </div>
            <div class="mb-3">
                <label for="phone" class="">Télefono</label>

                <div class="">
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" disabled autocomplete="phone" autofocus>
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="text-center my-3">
                    <img src="{{ asset($user->photo) }}" class="img-thumbnail" id="preview" width="200px">
                </div>
                   
            </div>
            
            <div class="mb-3">
              <div class="mb-3">
                <label for="role" class="">Rol</label>

                <div class="">
                    <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ $user->role->name }}" disabled autocomplete="phone" autofocus>
                </div>
              </div>
            </div>
            
            
            <div class="d-grid gap-2 mb-3">
              
                <a href="{{route('users.index')}}" class="btn btn-primary btn-block text-uppercase">Volver <i class="fa fa-left"></i></a>
              
            </div>
            
        </form>
    </div>
</div> 
@endsection
