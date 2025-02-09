<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinie extends Model
{
    use HasFactory;

    protected $fillable = ['ocena', 'komentarz', 'produkty_id', 'users_id'];

    public function produkt()
    {
        return $this->belongsTo(Produkty::class,'produkty_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }
    protected $table = 'opinie'; 
}
