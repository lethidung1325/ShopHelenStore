<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function order_item()
    {
        return $this->hasMany('App\Model\Order', 'order_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Model\Customer', 'customer_id', 'id');
    }

    public function payment()
    {
        return $this->belongsTo('App\Model\Payment', 'payment_id', 'id');
    }

}
