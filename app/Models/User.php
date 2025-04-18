<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    public function isAdmin(): bool
    {   
        return $this->role === 'admin';
    }

    public function isUser(): bool
    {
        return $this->role === 'user';
    }
    
    public function isGuest(): bool
    {
        return $this->role === 'guest';
    }
    public function isSuperAdmin(): bool
    {
        return $this->role === 'superadmin';
    }
    public function isModerator(): bool
    {
        return $this->role === 'moderator';
    }
    public function isAuthor(): bool
    {
        return $this->role === 'author';
    }
    public function isSubscriber(): bool
    {
        return $this->role === 'subscriber';
    }
    public function isEditor(): bool
    {
        return $this->role === 'editor';
    }

}
