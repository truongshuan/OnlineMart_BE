<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends Model
{
    use HasFactory;

    public const DISABLED = "0";
    public const ENABLED  = "1";
    protected $table = 'shops';

    protected $fillable = [
        'name',
        'avatar',
        'email',
        'phone',
        'address',
        'description',
        'rating',
        'status',
        'user_id',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {

        return $this->belongsTo(Product::class);
    }

    /**
     * @return HasMany
     */
    public function category(): HasMany
    {

        return $this->hasMany(Product::class);
    }

    /**
     * @return HasMany
     */
    public function coupon(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function cartItem(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }
}
