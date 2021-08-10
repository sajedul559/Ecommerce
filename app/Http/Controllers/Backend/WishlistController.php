<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Wishlist;
use Auth;



class WishlistController extends Controller
{
    public function wishlist_add($id)
    {
        $product = Product::find($id);
        $image = ProductImage::find($id);

        if (Auth::guard()) {
            $wish = new Wishlist();
            $wish->user_id = Auth::id();

            $wish->product_id = $product->id;






            $save =  $wish->save();

            if ($save) {

                session()->flash('success', 'Product has added to Wishlist !!');
                return back();
            } else {

                session()->flash('error', 'Product has added to fail !!');
                return back();
            }
        }
    }
}
