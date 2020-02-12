<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
