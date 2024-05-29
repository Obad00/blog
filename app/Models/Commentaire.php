<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $fillable = ['contenu'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
