<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
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
        'quality',
        'image',
        'release_year',
        'reproduction_number',
        'language',
        'video_link',
        'download_link',
        'user_id',
        'category_id',
    ];
    public function getAllMovies(){
        return Movie::all();
    }

    public function getMovie($id){
        return Movie::find($id);
    }

    // Relaciones
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
