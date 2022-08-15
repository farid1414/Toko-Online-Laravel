<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shops extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','photo','status','provinces_id','categories_id','users_id'];
}