<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
      //opposite of fillable, fill everything apart from id
    //protected $fillable = ['title', 'excerpt', 'body']; - you can mass assign data on this fields
    protected $guarded = []; 
    protected $with = ['category', 'user'];

    public function scopeFilter($query, array $filters){ //Post::newQuery()->filter()
    //   if(isset($filter['search'])){
    //     $query->where('title', 'like', '%' . request('search') . '%')
    //     ->orWhere('body', 'like', '%' . request('search') . '%');
    // }

    $query->when($filters['search'] ?? false, fn($query, $search) =>
    $query->where(fn($query) =>
        $query
            ->where('title', 'like', "%{$search}%")
            ->orWhere('body', 'like', "%{$search}%")
    )
);

$query->when($filters['category'] ?? false, fn($query, $category) =>
    $query->where(fn($query) =>
        $query->whereHas('category', fn($query) =>
            $query->where('slug', $category)
        )
    )
);

$query->when($filters['user'] ?? false, fn($query, $user) =>
    $query->where(fn($query) =>
        $query->whereHas('user', fn($query) =>
            $query->where('username', $user)
        )
    )
);        
    }

    

    

    

    public function category(){
        return $this->belongsTo(Category::class); //$post->category
    }
  // public function author() {
  //   return $this->belongsTo(User::class, 'user_id');
  // }

  public function user() {
    return $this->belongsTo(User::class);
  }
}
