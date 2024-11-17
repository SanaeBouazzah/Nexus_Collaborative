<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
  use HasFactory;
  protected $table = 'videos';
  protected $fillable = [
    'user_id',
    'order',
    'course_id',
    'title',
    'description',
    'notes',
    'announcements',
    'file_path',
    'duration',
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function course()
  {
    return $this->belongsTo(Course::class);
  }
}
