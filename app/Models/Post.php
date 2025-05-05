<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory ;
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $fillable =[
        'title',
        'slug',
        'body' , 
        'is_published',
        'publish_date',
        'meta_description',
        'tags',
        'keywords',
    ];
}
