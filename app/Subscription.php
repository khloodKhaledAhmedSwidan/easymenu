<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';
    protected $fillable = ['package_id', 'user_id', 'seller_code', 'discount_code', 'invoice_id', 'price', 'end_at', 'status', 'finished', 'image'];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
