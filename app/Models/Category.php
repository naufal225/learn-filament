<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'created_by',
        'updated_by'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    protected static function booted()
    {
        static::creating(fn($m) => $m->created_by == auth()->user()->id);
        static::updating(fn($m) => $m->updated_by == auth()->user()->id);
    }
}
