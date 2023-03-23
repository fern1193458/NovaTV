@extends('layouts.app')
@section('title', 'NovaTV - Ver Categoría')

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <h1> <i class="fa fa-plus"></i> Ver Categoría</h1>
        <hr>
        <nav aria-label="breadcrumb" class="alert-secondary">
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
                <i class="fa fa-search"></i> 
                Ver Categoría
            </li>
          </ol>
        </nav>
        <form >
            @csrf
            <div class="mb-3">
                <label for="name" class="">Nombre </label>

                <div class="">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $category->name }}"  autocomplete="name" disabled>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea name="description" class="form-control " cols="30" rows="4" disabled>{{ $category->description }}</textarea>
              </div>
          </form>
          <div class="d-grid gap-2">
            <a href="{{route('categories.index')}}" class="btn btn-primary text-uppercase"><i class="fa fa-left-long mx-2"></i> Volver </a>
          </div>
          
    </div>
  </div> 
@endsection
