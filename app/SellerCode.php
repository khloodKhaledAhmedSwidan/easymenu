<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerCode extends Model
{
    protected $fillable = ['name','percentage','seller_name'];
}
