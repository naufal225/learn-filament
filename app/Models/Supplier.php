<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'email',
        'created_by',
        'updated_by'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'supplier_id');
    }

    public function transactions() {
        return $this->hasMany(Transaction::class, 'supplier_id');
    }

    protected static function booted()
    {
        static::creating(fn($m) => $m->created_by == auth()->user()->id);
        static::updating(fn($m) => $m->updated_by == auth()->user()->id);
    }
}
