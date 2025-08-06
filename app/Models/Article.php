<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model
{ 
    use SoftDeletes;
    protected $fillable = ['title', 'content', 'user_id' , 'level_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function slugs()
    {
        return $this->belongsToMany(Slug::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
} 
