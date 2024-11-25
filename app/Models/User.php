<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $image
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 * @property $trusted
 *
 * @property CommunityLinkUser[] $communityLinkUsers
 * @property CommunityLink[] $communityLinks
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;

    use HasFactory, Notifiable, HasApiTokens;

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'image',];

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
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Si estás usando hashed passwords
    ];

    /**
     * Relación HasMany con CommunityLink
     */
    public function myLinks()
    {
        return $this->hasMany(CommunityLink::class);
    }

    /**
     * Método para comprobar si el usuario está marcado como "trusted"
     */
    public function isTrusted()
    {
        return $this->trusted;
    }

    /**
     * Relación BelongsToMany con CommunityLink
     */
    public function votes()
    {
        return $this->belongsToMany(CommunityLink::class, 'community_link_users');
    }

    /**
     * Verifica si el usuario ha votado por un CommunityLink específico
     */
    public function votedFor(CommunityLink $link)
    {
        return $this->votes->contains($link);
    }

    /**
     * Relación HasMany con CommunityLinkUser (relación intermedia)
     */
    public function communityLinkUsers()
    {
        return $this->hasMany(\App\Models\CommunityLinkUser::class, 'user_id', 'id');
    }
}
