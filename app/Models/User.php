<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'image',
        'bio'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function galerie()
    {
        return $this->hasMany(Gallery::class);
    }


    public function getAvatarAttribute($value)
    {
       if ($value) {
          return asset('storage/' . $value);
      } else {
          return asset('storage/images/profile.png');
      }
    }

    public function getBackgroundImageAttribute($value)
     {
        return $value ?: 'backgroundimage.jpg';
     }

     protected $attributes = [
      'bio' => 'No bio yet',
  ];

}
