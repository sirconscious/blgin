<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['name', 'description'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }


}
