<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = ["size", "price", "description_en", "description_ar", "status", "bedrooms", "location_link", "category_id", "compound_id", "agent_id", "location_id"];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function image(){
        return $this->hasMany(Image::class);
    }

    public function compound(){
        return $this->belongsTo(Compound::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function agent(){
        return $this->belongsTo(Agent::class);
    }
}
