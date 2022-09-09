<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Gateway()
    {
        return $this->belongsTo(Gateway::class);
    }

    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
}
