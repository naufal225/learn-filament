<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'supplier_id',
        'transaction_date',
        'status',
        'total'
    ];

    public function supplier() {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function transactionItems() {
        return $this->hasMany(Transaction::class, 'transaction_id');
    }
}
