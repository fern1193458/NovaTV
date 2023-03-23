@extends('layouts.app')
@section('title', 'NovaTV - Lista de Categorias')

@section('content')
  <div class="row">
    <div class="col-md-10 offset-md-1">
        <h1> <i class="fa fa-dice-d20"></i> Lista de Categorias</h1>
        <hr>
        <a href="{{route('categories.create')}}" class="btn btn-primary my-3"> 
            <i class="fa fa-plus pr-2"></i>
             Agregar Categoría
        </a>
        <br>
        @if (count($categories)>0)
        <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                {{-- <th scope="col">Descripción</th> --}}
                <th scope="col">Fecha de creación</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th>{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        {{-- <td>{{$category->description}}</td> --}}
                        <td>{{$category->created_at}}</td>
                        <td>
                            <a href="{{route('categories.show',$category->id)}}" class="btn btn-sm btn-light"> <i class="fa fa-search"></i></a>
                            <a href="{{route('categories.edit',$category->id)}}" class="btn btn-sm btn-light"> <i class="fa fa-pen"></i></a>
                            <form action="{{route('categories.destroy',$category)}}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="button" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash mx-2"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
              
            </tbody>
          </table>
        @else
            <div class="alert alert-warning my-4" role="alert">
                Aún no hay categorias registradas
            </div> 
        @endif
    </div>
  </div>
@endsection