<?php

namespace App\Models;

use COM;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;
    use HasFactory;

    protected $guarded =['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, array $filters)
    {
        // if($filters['search'] ?? false){
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%');
        // } 

        // if($search = $filters['search'] ?? false) {
        //     function () use ($query, $search){
        //     return $query->where('title', 'like', '%' . $search . '%');
        //    };
        // }

        $query->when($filters['search'] ?? false, function ($query, $search){
            return $query->where('title', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category){
            return $query->whereHas('category', function ($query) use ($category){
                $query->where('slug', $category);
            } );
        });

        $query->when($filters['author'] ?? false, fn($query, $username) => 
            $query->whereHas('user', fn($query) => $query->where('username', $username)));
    }

    public function category()
    {
        return $this->belongsTo(Category::class); 
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
