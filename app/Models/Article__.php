<?php

namespace App\Models;

class Article
{
    private static $article_posts = 
    // --> data dummy
    [
        [
            "title" => "Judul Article 1",
            "slug" => "judul-article-1",
            "author" => "Fergusso",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis consequatur sequi, itaque, 
            ipsam eligendi quaerat quasi ipsa rem doloribus veniam esse sint perspiciatis quis error voluptatibus illum provident 
            voluptatum rerum a, magnam maxime tempora?"
        ],
    
        [
            "title" => "Judul Article 2",
            "slug" => "judul-article-2",
            "author" => "Fernandez",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus tempore assumenda velit fuga, odio sed quaerat 
            eligendi quia consequuntur iste dignissimos et vel ex mollitia voluptatem voluptates labore aperiam adipisci! Sapiente voluptate 
            eos adipisci distinctio exercitationem provident mollitia doloribus."
        ]
    ];

    public static function all()
    {
        // return self::$article_posts; --> Cara 1 (sebelum dibuat collection)

        return collect(self::$article_posts); # --> Cara 2 (dibuat collection)
    }
    
    public static function find($slug)
    {
        // $article = self::$article_posts; --> Cara 1 
        // $post = [];
        // foreach($article as $p) {
        //     if($p["slug"] === $slug) {
        //         $post = $p;
        //     }
        // }

        // return $post;
        
        $posts = static::all(); // --> Cara 2 (dibuat collection)
        return $posts -> firstWhere('slug', $slug); // --> Cara 2 dibuat collection (FirstWhere = mencari berdasarkan data dummy slug)
    }
}
