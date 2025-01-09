<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dostawca extends Model
{
    use HasFactory;

    protected $fillable = ['nazwa', 'nr_telefonu'];

    public function produkty()
    {
        return $this->hasMany(Produkty::class);
    }
    protected $table = 'dostawca'; 
}
