<?php

namespace App\Http\Controllers\Admin;

use App\AdminWishlist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminWishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.guest:admin', ['except' => 'logout']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $admin_id
     * @param $product_id
     * @return void
     */
    public function store($admin_id, $product_id)
    {
        $wishlist = new AdminWishlist();
        $wishlist->admin_id = $admin_id;
        $wishlist->product_id = $product_id;
        $wishlist->save();
        return redirect('admin/products')->with('success', 'Successfully Added to wishlist');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wishlist = AdminWishlist::find($id);
        $wishlist->delete();
        return redirect('admin/products')->with('success', 'Successfully Removed to wishlist');
    }
}
