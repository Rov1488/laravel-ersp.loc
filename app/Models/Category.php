<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $table = 'category';
    protected $fillable = ['name', 'slug', 'parent_id'];
    protected $casts = [
        'parent_id' => 'integer',
    ];
    protected $attributes = [
        'parent_id' => 0,
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getCategoryNameAttribute()
    {
        return $this->name;
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }



}
