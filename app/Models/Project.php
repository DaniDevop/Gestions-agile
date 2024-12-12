<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;


    public function groupe():BelongsTo{


        return $this->belongsTo(Groupe::class);
    }



    public function task():HasMany{


        return $this->hasMany(task::class);
    }
}
