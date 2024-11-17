<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class Course extends Model
{
    use HasFactory, Commentable;
    protected $table = 'courses';
    protected $fillable = [
      'title',
      'subtext',
      'description',
      'price',
      'hours',
      'user_id',
      'image'
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
   
}
