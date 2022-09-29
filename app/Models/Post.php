<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
      //opposite of fillable, fill everything apart from id
    //protected $fillable = ['title', 'excerpt', 'body']; - you can mass assign data on this fields
    protected $guarded = ['id']; 

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
