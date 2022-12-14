<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'user_IP',
        'password',
        'registered_at',
        'last_login'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $timestamps = false;

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

//Comments that are posted on each user's page.
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

//Comments written by the user
    public function createdComments()
    {
        return $this->hasMany(Comment::class)->withPivot('created_at');
    }

    public static function getUserImage()
    {
        if (Auth::user()) {
            $user = Auth::user();
            if ($user->files->first() != '' && $user->files->first() != null) {
                $path = $user->files->first()->path;
                $name = $user->files->first()->name;
                $user_pic = Storage::url($path . '/' . $name);
            } else {
                $user_pic = asset('dashboardStyle/dist/img/body-bg.jpg');
            }
            return $user_pic;
        }
    }
}
