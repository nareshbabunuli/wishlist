<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use App\Products;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $product_categories = ProductCategory::all();
        $products = Products::paginate(6);
        $wishlists = Wishlist::all()->where('user_id', '=', Auth::id());
        return view('welcome', compact(['products' => 'products', 'wishlists','product_categories']));
    }

}
