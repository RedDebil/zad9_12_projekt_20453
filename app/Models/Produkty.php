<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produkty extends Model
{
    use HasFactory;

    protected $fillable = ['nazwa', 'opis', 'cena', 'kategoria_id', 'dostawca_id'];

    public function kategoria()
    {
        return $this->belongsTo(Kategoria::class);
    }

    public function dostawca()
    {
        return $this->belongsTo(Dostawca::class);
    }

    public function iloscZamowienia()
    {
        return $this->hasMany(IloscZamowienie::class);
    }

    public function opinie()
    {
        return $this->hasMany(Opinie::class);
    }
    protected $table = 'produkty'; 
}
