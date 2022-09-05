<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
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
        'title',
        'meta_title',
        'parent_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public static function getCategories()
    {
        return static::all();
    }

    public static function getFirstCategories()
    {
        return static::query()->whereNull('parent_id')->with('children')->get();
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'categorrable');
    }
}
