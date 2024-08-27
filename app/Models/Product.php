<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'is_active',
        'short_description',
        'full_description',
        'price',
        'slug',
        'attributes',
        'product_type_id',
        'images',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'attributes' => 'array',
        'images' => 'array',
        'price' => 'float',
    ];

    /**
     * Get the product type that this product belongs to
     */
    public function productType(): BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }

    /**
     * Set the slug attribute - a slugified version of the given value
     *
     * @param  string  $value
     */
    public function setSlugAttribute($value): void
    {
        $this->attributes['slug'] = Str::slug($value, '_');
    }

    /**
     * The orders that belong to this product
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
