<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    function brand(){
    	return $this->belongsto('App\Brand');
    }

    
}
