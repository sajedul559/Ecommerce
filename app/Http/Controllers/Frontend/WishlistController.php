<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\Product;



class WishlistController extends Controller
{
   //   public function wishlist_view()
   //   {
   //      $wishlist = Wishlist::where('product_id', $product_id)->get();
   //      return view('frontend.pages.wishlist.index',compact('wishlist'));
   //   }


   public function wishlist_view($id)

   {
      // $products = Product::orderBy('id','desc')->get();  

      $wishlist = Wishlist::find($id);




      return view('frontend.pages.wishlist.index', compact('wishlist'));
   }
}
