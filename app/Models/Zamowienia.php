<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zamowienia extends Model
{
    use HasFactory;

    protected $fillable = ['cena_totalna', 'status', 'users_id', 'adres_id', 'kurierzy_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }

    public function adres()
    {
        return $this->belongsTo(Adres::class);
    }

    public function kurier()
    {
        return $this->belongsTo(Kurierzy::class,'kurierzy_id');
    }

    public function products()
    {
        return $this->belongsToMany(Produkty::class, 'ilosc_zamowienie', 'zamowienia_id', 'produkty_id')
                    ->withPivot('ilosc');
    }
    protected $table = 'zamowienia'; 
}
