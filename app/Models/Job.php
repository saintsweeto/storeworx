<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
