<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        // $categories = Category::all();
        return view('elements.categories.index')->with('categories', $categories);
        // Retornar vista inyectando todos las categorias

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('elements.categories.create');
        // Retornar la vista elements.categories.create
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->name);
        $category = new Category;

        $category->name = $request->name;
        $category->description = $request->description;
        // dd($category);
        if($category->save()){
            return redirect('categories')->with('message', 'La Categoria: '.$category->name.' fue creada con éxito!!');
            //Retornar la vista
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('elements.categories.show')->with('category',$category);
        // Retornar la vista
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('elements.categories.edit')->with('category',$category);
        //Retorna la vista con el formulario de edición del usuario 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;
        $category->description = $request->description;
        
        if($category->save()){
            return redirect('categories')->with('message', 'La Categoria: '.$category->name.' fue modificada con éxito!!');
            //Retornar la vista
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        
        if($category->delete()){
            // Retorne la vista index con el mensaje que pudo eliminar el elemento exitosamente
            return redirect('categories')->with('message', 'La Categoria: '.$category->name.' fue eliminada con éxito!!');
        }
    }
}
