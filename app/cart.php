<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    //
    protected $table = '_carts';
    protected $fillable = ['userid','image','productname','quantity','totalprice']; 
}
