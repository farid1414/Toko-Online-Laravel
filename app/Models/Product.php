<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','slug','price','stock' ,'condition','description','categories_id','shops_id'];

    public function galleries()
    {
        return $this->hasMany(ProductGallerie::class, 'products_id','id');
    }

    public function shops()
    {
        return $this->hasOne(Shops::class, 'shops_id', 'id');
    }

    public function categori()
    {
        return $this->belongsTo(Categori::class, 'categories_id', 'id');
    }
}