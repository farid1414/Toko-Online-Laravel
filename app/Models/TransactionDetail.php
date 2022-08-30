<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;
    protected $table ='transaction_details';
    protected $fillable =['transactions_id', 'products_id', 'price', 'resi', 'shipping_status', 'code', 'quantity'];
}
