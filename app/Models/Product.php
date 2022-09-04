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
}
