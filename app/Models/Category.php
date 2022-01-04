<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    /*create relationship with posts
    one category has many posts
    one to many relationship
    */

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
