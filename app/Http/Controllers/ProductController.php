<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();

        return view('product.indexproduct', compact('products'));
    }

    public function create()
    {
        return view('product.createproduct');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
        ]);

        if ($validator->fails()) {

            return redirect('product')
                ->withErrors($validator)
                ->withInput();
        }

        Product::create([
            'title' => $request->title,
            'slug' => \Str::slug($request->title)
        ]);

        return redirect()->back();

    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $comments = $product->comments;

        return view('product.singleproduct', compact('product', 'comments'));

    }

    public function comment(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $product->comments()->create(['comment' => $request->comment, 'user_id' => $request->user()->id]);


        return redirect()->back();

    }


}
