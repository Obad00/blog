<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $fillable = ['contenu', 'article_id'];


    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
