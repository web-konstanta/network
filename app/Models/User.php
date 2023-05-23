<?php

namespace App\Models;

use App\Notifications\SendVerifyWithQueueNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    const USER_ROLE = 0;
    const ADMIN_ROLE = 1;
    const MODERATOR_ROLE = 2;

    const ROLES = [
        self::USER_ROLE      => 'user',
        self::ADMIN_ROLE     => 'admin',
        self::MODERATOR_ROLE => 'moderator'
    ];

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
        'link',
        'role'
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

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
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

    public function getRoleName(int $role): string
    {
        return self::ROLES[$role];
    }

    public function getLink(string|null $link): string
    {
        $user = self::where('id', Auth::user()->id)->first();
        return !$link ? 'add link in bio...' : $user['link'];
    }

    public static function getUserLink(string|null $link, int $id): string
    {
        $user = self::where('id', $id)->first();
        return !$link ? 'add link in bio...' : $user['link'];
    }
}
