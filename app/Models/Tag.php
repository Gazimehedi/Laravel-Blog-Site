<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = ['crated_at','updated_at'];

    public function post(){
        return $this->belongsToMany(Post::class);
    }
}
