<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;

class Subscription extends Authenticatable
{
    protected $table = "subscriptions";

    protected $fillable = [
        'user_id',
        'product_id',
        'subscription_id',
        'date_subscription_pay',
        'time_subscription',
        'plan_id',
    ];
 

    public function addNew($order_id, $user_id, $suscription)
    {
       
        $orderItems = OrderItem::where('order_id',$order_id)->get();

        if (count($orderItems) > 0) {
            foreach ($orderItems as $key) {
                $add                    = new Subscription;
                $add->user_id           = $user_id;
                $add->product_id        = $key->item_id;
                $add->subscription_id   = $suscription['subscription']['data']['plan_id'];
                $add->date_subscription_pay = $suscription['plan']['data']['creation_date'];
                $add->time_subscription = 30;
                $add->plan_id           = $suscription['plan']['data']['id'];

                $add->save();
            }
        }

        return true;

    }
}
