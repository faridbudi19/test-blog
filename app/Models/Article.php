<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class Article extends Model
{
    use HasFactory, Sluggable;
    
    // --> (fillable) yg boleh diisi
    // protected $fillable = ['title', 'excerpt', 'body']; 

    // --> ($guarded) yg tidak boleh diisi
    protected $guarded = ['id']; 

    // ($with) setiap pemanggilan article 'category','author' akan tetap terbawa
    protected $with = ['category', 'author'];

    // --> metod untuk terhubung dengan tb category (relasi)
    public function category()
    {
        // --> belongsTo membuat agar 1 article hanya dimiliki 1 category
        return $this->belongsTo(Category::class);
    }

    // --> metod untuk terhubung dengan tb user (relasi) 
    // public function user()
    // {
    //     // --> belongsTo membuat agar 1 article hanya dimiliki 1 user
    //     return $this->belongsTo(User::class);
    // }

    // alt dari user
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Query untuk pencarian (search menggunakan scope cara 1)
    // public function scopeFilter($query)
    // {
    //     if(request('search')) {
    //         return $query->where('title', 'like', '%' . request('search') . '%')
    //                         ->orWhere('body', 'like', '%' . request('search') . '%');
    //     }
    // }

    // alt lain pencarian (cara 2)
    public function scopeFilter($query, array $filters)
    {
        // if(isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //                     ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                            ->orWhere('body', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            }); 
        });
        
        $query->when($filters['author'] ?? false, function($query, $author) {
            return $query->whereHas('author', function($query) use ($author) {
                $query->where('username', $author);
            }); 
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
