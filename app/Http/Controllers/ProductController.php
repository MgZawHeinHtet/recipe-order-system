<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dashboard.product', [
            "products" => Product::with('category')->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        $cleanData = $request->validated();

        $cleanData['photo'] = '/storage/' . $request->photo->store('/products');
        Product::create($cleanData);
        return redirect('/dashboard/products')->with('create','Created Successfully 🎉');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('product.product-detail');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
       
        return view(
            'Dashboard.edit',
            [
                'product' => $product,
                'categories' => Category::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $cleanData = $request->validated();
        if($request->photo){
           
                if(File::exists($path = public_path($product->photo))){
                File::delete($path);
            }
            $product->photo = '/storage/' . $request->photo->store('/products');
        }
        $product->title = $cleanData['title'];
        $product->description = $cleanData['description'];
        $product->price = $cleanData['price'];
        $product->category_id = $cleanData['category_id'];
        
        $product->update();
        return redirect('/dashboard/products')->with('edit','Updated Successfully 🎉');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('delete', 'Delete Successfully! 🎆');
    }
}
