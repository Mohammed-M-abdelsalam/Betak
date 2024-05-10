<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compound extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ["name", "img", "location_id"];

    public function property(){
        return $this->hasMany(Property::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }
}
