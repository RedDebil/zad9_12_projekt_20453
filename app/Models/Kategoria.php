<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    use HasFactory;

    protected $fillable = ['kategoria'];

    public function produkty()
    {
        return $this->hasMany(Produkty::class);
    }
    protected $table = 'kategoria'; 
}
