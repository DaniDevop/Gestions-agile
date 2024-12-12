<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class task extends Model
{
    use HasFactory;


    public function user():BelongsTo{

        return $this->belongsTo(User::class);
    }

    public function projet():BelongsTo{

        return $this->belongsTo(Project::class);
    }
}
