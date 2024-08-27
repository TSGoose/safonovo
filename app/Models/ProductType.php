<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class ProductType extends Model
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
        'code',
        'description',
        'parent_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'bool',
    ];

    /**
     * The products that belong to this product type
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * The product types that belong to this product type.
     */
    public function childrenProductTypes(): HasMany
    {
        return $this->hasMany(ProductType::class, 'parent_id');
    }

    /**
     * The product type that this product type belongs to.
     */
    public function parentProductType(): BelongsTo
    {
        return $this->belongsTo(ProductType::class, 'parent_id');
    }

    /**
     * Set the code attribute.
     *
     * @param  mixed  $value
     */
    public function setCodeAttribute($value): void
    {
        $this->attributes['code'] = Str::slug($value, '_');
    }

    /**
     * Get the product_count attribute - the number of products associated with this product type
     */
    public function getProductCountAttribute(): int
    {
        return $this->products()->count();
    }
}
