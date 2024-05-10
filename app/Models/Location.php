<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ["name", "description_en", "description_ar"];

    public function compounds(){
        return $this->hasMany(Compound::class);
    }
}
