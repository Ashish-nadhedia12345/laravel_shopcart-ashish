<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'address_id', 'amount', 'payment_status', 'order_status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class, "order_id", "id");
    }

    /**
     * Create/update order
     *
     * @param int $shipAddressID
     * @param int $userID
     * @return integer
     */
    public static function createOrder(int $shipAddressID, int $userID): int
    {
        /**
         * 1. Check if unpaid order exists
         * 2. if order id exists - update order detail table with cart items + update order table
         * 3. if order not exists - Create new order id + add cart items in order_detail table
         * 4. return order id
         */
        $orderID = 0;
        $weight =  Cart::getCartWeight(auth()->user()->id);
        $shippintAmt = ShippingRate::getShippingRates($weight);


        $orderIDExists = Order::where('user_id', $userID)->where('payment_status', 'unpaid')->first();
        if ($orderIDExists) {
            $orderID = $orderIDExists->id;
            // update cart items in order details table based on orderID +  update order table total
            // return order id
            OrderDetail::where('order_id', $orderID)->delete();
            $carts = Cart::where('user_id', $userID)->get();
            foreach ($carts as $row) {
                $product = $row->product;
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $orderID;
                $orderDetail->product_id = $row->product_id;
                $orderDetail->title = $product->title;
                $orderDetail->qty = $row->qty;
                $orderDetail->price = $row->price;
                $orderDetail->save();
            }
            $order= Order::find($orderID);
            $order->amount = (Cart::getCartTotal($userID) + $shippintAmt);
            $order->save();
        } else {
            $order = new Order();
            $address = Address::find($shipAddressID);
            $order->user_id = $userID;
            $order->address_id = $address->id;
            $order->amount = (Cart::getCartTotal($userID) + $shippintAmt);
            $order->payment_status = 'unpaid';
            $order->order_status = 'in progress';
            $order->save();
            $orderID = $order->id;

            // save order detail from cart table
            $carts = Cart::where('user_id', $userID)->get();
            foreach ($carts as $row) {
                $product = $row->product;
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $orderID;
                $orderDetail->title = $product->title;
                $orderDetail->qty = $row->qty;
                $orderDetail->product_id = $row->product_id;
                $orderDetail->price = $row->price;
                $orderDetail->save();
            }

        }
        return $orderID;
    }

    /**
     * Apply coupon and return bool
     *
     * @param Order $order
     * @param string $code
     * @return boolean
     */
    public static function applyCoupon(Order $order, string $code) : bool{
        if($code != ''){
            // find coupon
            $coupon = Coupon::where('code', $code)->first();
            // if coupon found and is valid date is grater than todays date
            if($coupon && $coupon->valid_upto > date('Y-m-d')){
                // apply coupon
                $order->coupon_title = $coupon->title;
                $order->coupon_type = $coupon->type;
                $order->coupon_code = $code;
                $order->coupon_amount = $coupon->amount;
                if($coupon->type == 'fixed'){
                    $order->discounted_amount = $order->amount - $coupon->amount;
                } else {
                    $amt = ($order->amount * $coupon->amount) / 100;
                    $order->discounted_amount = $order->amount - $amt;
                }

                //dd($order);
                $order->save();
                return true;
            } else {
                return false;
            }
        }
        return false;

    }
}
