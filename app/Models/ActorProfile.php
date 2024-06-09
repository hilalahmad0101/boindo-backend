<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActorProfile extends Model
{
    use HasFactory;
    
    protected $table='actor_profiles';

    protected $fillable = [
        "name", "profession", "image", "biograpy","in_search"
    ];
}
