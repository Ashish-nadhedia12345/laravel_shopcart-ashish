<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingRate extends Model
{
    use HasFactory;
    protected $fillable = ['100g', '300g', '600g','900g','above_1000g'];

    public static function getShippingRates(float $weight): float {
        $price = 0.00;
        $row = ShippingRate::first();
        if($weight <= 100){
            $price = $row->g100;
        }elseif($weight > 100 && $weight <= 300){
            $price = $row->g300;
        }elseif ($weight > 300 && $weight <= 600){
            $price = $row->g600;
        }elseif ($weight > 600 && $weight <= 900){
            $price = $row->g900;
        }elseif ($weight > 900){
            $price = $row->above_1000g;
        }
        return $price;
    }
}

