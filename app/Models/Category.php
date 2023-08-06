<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // --> membuat metod untuk menghubungan category dgn article
    public function article() 
    {
        // --> hasMany 1 category bisa dimiliki banyak article
        return $this->hasMany(Article::class);
    }
}
