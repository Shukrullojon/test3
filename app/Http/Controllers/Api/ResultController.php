<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function info(Request $request)
    {
        $result = [];
        $ware_quantity = [];
        foreach ($request->all() as $req) {
            $helper = [
                'product_name' => $req['name'],
                'product_qty' => $req['quantity'],
            ];
            $materials = [];
            $product = Product::where('name', $req['name'])->first();
            if (empty($product)){
                $materials[] = [
                    'warehouse_id' => null,
                    'material_name' => null,
                    'qty' => null,
                    'price' => null,
                ];
                $helper['product_materials'] = $materials;
                $result[] = $helper;
                continue;
            }

            foreach ($product->pm as $p) {
                $quantity = $p->quantity * $req['quantity'];
                foreach ($p->warehouse as $w) {
                    $ware_qty = array_key_exists($w->id,$ware_quantity) ? $ware_quantity[$w->id] : 0;
                    if ($w->remainder - $ware_qty > $quantity) {
                        $ware_quantity[$w->id] = array_key_exists($w->id,$ware_quantity) ? $ware_quantity[$w->id] + $quantity : $quantity;
                        $materials[] = [
                            'warehouse_id' => $w->id,
                            'material_name' => $p->material->name,
                            'qty' => $quantity,
                            'price' => $w->price,
                        ];
                        $quantity = 0;
                    }else if($w->remainder - $ware_qty <= 0){
                        continue;
                    } else {
                        $quantity -= $w->remainder - $ware_qty;
                        $ware_quantity[$w->id] = array_key_exists($w->id,$ware_quantity) ? $ware_quantity[$w->id] + $w->remainder : $w->remainder;
                        $materials[] = [
                            'warehouse_id' => $w->id,
                            'material_name' => $p->material->name,
                            'qty' => $w->remainder - $ware_qty,
                            'price' => $w->price,
                        ];
                    }
                }
                if ($quantity > 0){
                    $materials[] = [
                        'warehouse_id' => null,
                        'material_name' => $p->material->name,
                        'qty' => $quantity,
                        'price' => null,
                    ];
                }
            }
            $helper['product_materials'] = $materials;
            $result[] = $helper;
        }
        return response()->json(['result' => $result], 200);
    }
}
