<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'price', 'qty'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Return cart total of provided user
     *
     * @param int $userID
     * @return float
     */
    public static function getCartTotal(int $userID): float
    {
        $total = 0.00;
        $result = Cart::selectRaw('sum(price * qty) as total')->where('user_id', $userID)->first();
        $total = $result['total'];
        return $total;
    }

    public static function emptyCart($userID){
        DB::table('carts')->where('user_id', $userID)->delete();
    }

    public static function getCartWeight(int $userID) : float{
        $cartItems = Cart::where("user_id", $userID)->get();
        $weight = 0.00;
        foreach($cartItems as $pro){
            $weight += $pro->product->weight;
        }
        return $weight;
    }
}
