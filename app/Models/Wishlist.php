<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    public $fillable = [
    	'user_id',
    	'product_id',
    	'product_img_id',
    	
    ];
}
