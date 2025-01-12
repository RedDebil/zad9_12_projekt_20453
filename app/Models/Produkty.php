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
        return $this->belongsTo(Kategoria::class,'kategoria_id');
    }

    public function dostawca()
    {
        return $this->belongsTo(Dostawca::class,'dostawca_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Zamowienia::class, 'ilosc_zamowienie', 'produkty_id', 'zamowienia_id')
                    ->withPivot('ilosc');
    }

    public function opinie()
    {
        return $this->hasMany(Opinie::class);
    }
    protected $table = 'produkty'; 
}
