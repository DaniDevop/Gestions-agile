<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Groupe extends Model
{
    use HasFactory;



    public function project():HasMany{


        return $this->hasMany(Project::class);
    }

    public function UserGroupe():HasMany{


        return $this->hasMany(UserGroupe::class);
    }
}
