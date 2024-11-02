<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityLinkUser extends Model
{

    use HasFactory;
    protected $fillable = ['user_id', 'community_link_id'];

    public function toggle()
    {
        // Si el registro ya existe, lo elimina (elimina el voto)
        if ($this->exists) {
            $this->delete();
        } else {
            // Si no existe, lo guarda (añade el voto)
            $this->save();
        }
    }

}
