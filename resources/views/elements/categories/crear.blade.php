@extends('layouts.app')

@section('title', 'Crear Categoría')
@section('title', 'NovaTV - Crear Categoría')

@section('content')
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h1>
				<i class="fa fa-plus"></i> 
				Adicionar Categoría
			</h1>
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
                    <a href="{{ route('categories.index') }}">
                        <i class="fas fa-list-alt"></i> 
                         Módulo Categorías
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa fa-plus"></i> 
                    Adicionar Categoría
                </li>
              </ol>
            </nav>

			<form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nombre" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="4" placeholder="Descripción">{{ old('description') }}</textarea>
<div class="row">
    <div class="col-md-10 offset-md-1">
        <h1> <i class="fa fa-plus"></i> Agregar Categoría</h1>
        <hr>
        <form method="POST" action="{{route('categories.store')}}">
            @csrf
            <div class="mb-3">
                <label for="name" class="">Nombre </label>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                <div class="">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                    Adicionar
                                    <i class="fa fa-save"></i> 
                                </button>
                        </div>
                    </form>
		</div>
	</div>
@endsection
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="4">{{ old('description') }}</textarea>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase">Agregar <i class="fa fa-save"></i></button>
              </div>

          </form>
    </div>
  </div> 
@endsection