<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'availability',
        'user_id',
        'category_id',
        'photos',
    ];

    protected $casts = [
        'photos' => 'array',
        'availability' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
    *  Scope a query to filter listings by availability.
    *
    *   @param \Illuminate\Database\Eloquent\Builder $query
    *   @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeAvailable($query)
    {
        return $query->where('availability', true);
    }

    /**
     * Scope a query to filter listings by category.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $categoryId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    // In Listing model
    public function businessProfile()
    {
        return $this->belongsTo(BusinessProfile::class);
    }
}
