<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_id
 * @property int $material_id
 * @property float $quantity
 * */
class ProductMaterial extends Model
{
    use HasFactory;

    protected $table = 'product_materials';

    protected $fillable = [
        'product_id',
        'material_id',
        'quantity',
    ];
}
