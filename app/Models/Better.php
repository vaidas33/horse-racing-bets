<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Better;
use App\Models\Horse;

class Better extends Model
{
    use HasFactory;

    public function betterHorse()
    {
        return $this->belongsTo('App\Models\Horse', 'horse_id', 'id');
    }
}