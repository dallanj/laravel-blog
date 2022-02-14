<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // adding this line is good for security
    // prevents users from adding more in a query
    // such as changing their account status to admin 
    // or changing the id
    // MASS ASSIGNMENT VULNERBILITY

    // this will except anything other than id
    protected $guarded = ['id'];

    // this will not allow anything except title, excerpt, body
    protected $fillable = ['title', 'excerpt', 'body'];
}
