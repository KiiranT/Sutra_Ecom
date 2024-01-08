<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $category = null;
    protected $product = null;

    public function __construct(Category $_category, Product $_product)
    {
        $this->category = $_category;
        $this->product = $_product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parent_categories = Category::where(['is_parent' => 1, 'status' => 'active'])->get();
        $all_products = Product::where(['status' => 'active'])->get();
        // if ($product_category === 'all') {
        // } else {
        //     $all_products = Product::where(['status' => 'active', 'cat_id' => $product_category])->get();
        // }

        return view('client.shop', [
            'parent_categories' => $parent_categories,
            'all_products' => $all_products,
        ]);
    }


    public function singleProduct($id, $slug)
    {
        $single_product = Product::where(['id' => $id])->first();

        return view('client.single_product', [
            'product' => $single_product,
        ]);
    }


    public function addToCart(Request $request, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            abort(404); // Product not found
        }

        $cart = $request->session()->get('cart', []);

        // Check if the product is already in the cart
        foreach ($cart as $key => $item) {
            if ($item['id'] === $product->id) {
                // Increment the quantity if the product is already in the cart
                $cart[$key]['quantity'] += 1;

                $request->session()->put('cart', $cart);

                return redirect()->back()->with('info', 'Product quantity updated in the cart');
            }
        }

        // Add the product to the cart with quantity 1
        $cart[] = [
            'id' => $product->id,
            'quantity' => 1,
            // Add other product details as needed
        ];

        $request->session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully');
    }


    public function addToWishlist(Request $request, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            abort(404); // Product not found
        }

        // Retrieve the current wishlist from the session
        $wishlist = $request->session()->get('wishlist', []);

        // Check if the product is already in the wishlist
        foreach ($wishlist as $item) {
            // Assuming $item is an array with an 'id' key
            if (is_array($item) && array_key_exists('id', $item) && $item['id'] === $product->id) {
                return redirect()->back()->with('info', 'Product is already in the wishlist');
            }
        }

        // Add the entire product to the wishlist
        $wishlist[] = [
            'id' => $product->id,
            'title' => $product->title,
            'price' => $product->price,
            'image' => $product->image,
            // Add more fields as needed
        ];

        // Update the wishlist in the session
        $request->session()->put('wishlist', $wishlist);

        return redirect()->back()->with('success', 'Product added to wishlist successfully');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
