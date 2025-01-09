<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adres extends Model
{
    use HasFactory;

    protected $fillable = ['miejscowosc', 'nazwa_ulicy', 'nr_ulicy', 'nr_mieszkania', 'typ_adresu'];

    public function zamowienia()
    {
        return $this->hasMany(Zamowienia::class);
    }
    protected $table = 'adres'; 
}
