<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    //
    protected $fillable = ['branch_id','name'];

    public function branch()
    {
        return $this->belongsTo(User::class,'branch_id');
    }
}
