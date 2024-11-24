<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;


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

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'image',];


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'image', 'trusted'];


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
        return $this->hasMany(\App\Models\CommunityLinkUser::class, 'id', 'user_id');
    }


    /**
     * Relación BelongsToMany con CommunityLink
     */
    public function votes()

    {
        return $this->hasMany(\App\Models\CommunityLink::class, 'id', 'user_id');
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
