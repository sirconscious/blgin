<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
    protected $fillable = ['slug', 'description'];

    public function article()
    {
        return $this->belongsToMany(Article::class);
    }
}
