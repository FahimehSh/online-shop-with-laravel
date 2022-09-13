<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = [
        'brand_id',
        'supplier_id',
        'discount_id',
        'title',
        'meta_title',
        'introduction',
        'sku',
        'price',
        'quantity',
        'is_available',
        'published_at',
        'ended_at'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorrable');
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function cart_items()
    {
        return $this->hasMany(Cart_item::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public static function getHeaderProducts()
    {
        return static::query()->where('is_available',1)->inRandomOrder()->take(3)->get();
    }

    public function presentPrice()
    {
        return number_format($this->price);
    }
}
