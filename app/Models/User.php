<?php

namespace App\Models;

use App\Notifications\SendVerifyWithQueueNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'region',
        'avatar',
        'password',
        'hobby_id',
        'link'
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

    public function sendEmailVerificationNotification()
    {
        $this->notify(new SendVerifyWithQueueNotification());
    }

    public function hobby(): BelongsTo
    {
        return $this->belongsTo(Hobby::class, 'hobby_id', 'id');
    }

    public function customers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'subscribers', 'customer_id', 'user_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'subscribers', 'user_id', 'customer_id');
    }

    public static function getLink($link): string
    {
        $user = self::where('id', Auth::user()->id)->first();
        return !$link ? 'add link in bio...' : $user['link'];
    }

    public static function getUserLink($link, $id): string
    {
        $user = self::where('id', $id)->first();
        return !$link ? 'add link in bio...' : $user['link'];
    }
}
