<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
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

    public function getAllRoles(){
        return Role::all();
    }

    public function getRole($id){
        return Role::find($id);
    }

    // Relaciones
    public function users(){
        return $this->hasMany('App\User');
    }

}
