<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    // protected $table ='transactions';
    protected $fillable = ['users_id', 'insurance_price', 'shipping_price', 'transaction_status', 'total_price', 'code'];
}