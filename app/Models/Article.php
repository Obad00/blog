<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'nom',
        'description', 
        'auteur', 
        'image',
        'categorie',
        'a_la_une',
        'statut', 
        'date_de_creation',
    ];
}
