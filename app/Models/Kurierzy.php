<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurierzy extends Model
{
    use HasFactory;

    protected $fillable = ['nazwa'];

    public function zamowienia()
    {
        return $this->hasMany(Zamowienia::class);
    }

    protected $table = 'kurierzy'; 
}
