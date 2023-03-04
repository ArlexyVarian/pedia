<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    //
    protected $table = 'histories_tables';
    protected $fillable = ['image','name','quantity','price']; 
}
