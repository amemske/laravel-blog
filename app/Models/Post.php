<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id']; //opposite of fillable, fill everything apart from id
    //protected $fillable = ['title', 'excerpt', 'body']; - you can mass assign data on this fields
}
