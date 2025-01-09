<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IloscZamowienie extends Model
{
    use HasFactory;

    protected $fillable = ['ilosc', 'zamowienia_id', 'produkty_id'];

    public function zamowienie()
    {
        return $this->belongsTo(Zamowienia::class);
    }

    public function produkt()
    {
        return $this->belongsTo(Produkty::class);
    }

    protected $table = 'ilosc_zamowienie'; 
}
