@extends('layouts.app')
@section('title', 'NovaTV - Crear Usuarios')

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <h1> <i class="fa fa-plus"></i> Agregar Usuario</h1>
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
                    <i class="fa fa-plus"></i> 
                    Adicionar Usuario
                </li>
            </ol>
        </nav>
        <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="fullname" class="">Nombre Completo</label>

                <div class="">
                    <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" required autocomplete="fullname" autofocus>

                    @error('fullname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="">Correo electrónico</label>

                <div class="">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="phone" class="">Télefono</label>

                <div class="">
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="text-center my-3">
                    <img src="{{ asset('images/no-photo.png') }}" class="img-thumbnail" id="preview" width="120px">
                </div>
                <label for="photo" class="form-label">Foto</label>
                <input class="form-control  @error('image') is-invalid @enderror" type="file" id="photo" name="photo" accept="image/*">
                @error('photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                   
            </div>
            
            <div class="mb-3">
                <label for="role_id" class="">Rol</label>
                <select class="form-select" aria-label="Seleccione un rol..." name="role_id" required>
                    <option selected>Seleccione...</option>
                    @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                    
                </select>
            </div>

            <div class="mb-3">
                <label for="password" class="">Contraseña</label>
                <div class="">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            
            <div class="d-grid gap-2 mb-3">
                <button type="submit" class="btn btn-primary btn-block text-uppercase"> Agregar <i class="fa fa-save mx-2"></i></button>
            </div>
            
        </form>
    </div>
</div> 
@endsection
