<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }

    public function scopeSearchByName($query, string $name)
    {
        return $query->where('name', 'LIKE', "%{$name}%");
    }
}
