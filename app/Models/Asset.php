<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public function activities()
    {
        return $this->hasMany(AssetActivity::class);
    }
}
