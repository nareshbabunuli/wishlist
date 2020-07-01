<?php

namespace App\Http\Controllers\Admin;

use App\AdminWishlist;
use App\Http\Controllers\Controller;
use App\ProductCategory;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlist = AdminWishlist::all('id', 'product_id', 'admin_id');
        $myWish = [];
        foreach ($wishlist as $wish) {

            if ($wish->admin_id = Auth::guard('admin')->user()->id)
                $myWish[$wish->id] = json_decode($wish->product_id);
        }

        $products = Products::all()->where('admin_id', '=', Auth::guard('admin')->user()->id);
        return view('admin.products.index', compact(['products', 'myWish' => 'myWish']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'product_category' => 'required',
            'image' => 'required|mimes:jpg,jpeg,JPG,png|max:2048'
        ]);
        $fileName = time() . '.' . $request->image->extension();
        $product = new Products([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'product_category' => $request->get('product_category'),
            'description' => $request->get('description'),
            'image' => $fileName,
            'admin_id' => Auth::guard('admin')->user()->id,
        ]);
        $request->image->move(public_path('product_images'), $fileName);
        $product->save();
        return redirect('admin/products/')->with('success', 'Product Created Successfully');
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
        $product = Products::find($id);
        $categories = ProductCategory::all();
        return view('admin.products.edit', compact(['product', 'categories']));
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
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'product_category'
        ]);
        $product = Products::find($id);
        $image_path = public_path() . '/storage/' . $product->image;
        if (isset($request->image) == true) {
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage'), $fileName);
            $product->image = $fileName;
        }
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->product_category = $request->get('product_category');
        $product->description = $request->get('description');
        $product->admin_id = $request->get('admin_id');
        $product->save();
        return redirect('admin/products/' . $id . '/edit')->with('success', 'Successfully Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product Deleted Successfully');
    }
}
