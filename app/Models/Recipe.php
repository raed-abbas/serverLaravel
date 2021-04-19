<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    /**
     * obtenir l'utilisateur qui a ecrit la recipe
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
