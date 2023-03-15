<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
    ];

    public function getAllCategories(){
        return Category::all();
    }

    public function getCategory($id){
        return Category::find($id);
    }

    // Relaciones
    public function movies(){
        return $this->hasMany('App\Movie');
    }

}
