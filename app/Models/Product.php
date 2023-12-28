<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property String $name
 * @property String $code
 * */
class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'code',
    ];

    public function pm(){
        return$this->hasMany(ProductMaterial::class,'product_id','id');
    }
}
