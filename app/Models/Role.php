<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name'
    ];

    //Relacion 1 a n
    public function users()
    {
        return $this->hasMany(User::class);
    }

    //Relacion n a n
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
