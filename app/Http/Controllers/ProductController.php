<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function productPage(){
        return view('pages.dashboard.product-page');
    }

    public function CreateProduct(Request $request){
    try {
        $user_id = $request->header('user_id');

        if (!$user_id) {
            return response()->json([
                'status' => 'failed',
                'message' => 'User ID is missing'
            ]);
        }

        // Validate required fields
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'unit'        => 'required|string|max:50',
            'category_id' => 'required|integer',
            'img'         => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        // Check category belongs to the user
        $category = Category::where('id', $validated['category_id'])
                            ->where('user_id', $user_id)
                            ->first();

        if (!$category) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid category'
            ]);
        }

        // Handle image upload
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = $user_id.'_'.time().'_'.$file->getClientOriginalName();
            $file_path = $file->storeAs('uploads', $fileName, 'public');
            $validated['img_url'] = '/storage/'.$file_path;
        }

        // Add user_id to product
        $validated['user_id'] = $user_id;

        // Create product
        $product = Product::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully',
            'data'   => $product
        ], 201);

    } catch (\Throwable $e) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Unable to create product',
            'error'   => $e->getMessage()
        ]);
    }
}



    public function ProductList(Request $request){
        try{
            $user_id = $request->header('user_id');
            if(!$user_id) {
                return response()->json([
                'status' => 'failed',
                'message' => 'User ID is missing'
                ]);
            }
            $products = Product::where('user_id', $user_id)->get();
            return response()->json([
                'status'  => 'success',
                'message' => 'Products fetched successfully',
                'data'    => $products
                ]);
        }catch (\Throwable $e){
            return response()->json([
                'status'  => 'failed',
                'message' => 'Unable to fetch products',
                'error'   => $e->getMessage()
            ]);
        }

    }

    public function ProductById(Request $request){
        try{
            $user_id = $request->header('user_id');
            if (!$user_id) {
                return response()->json([
                'status' => 'failed',
                'message' => 'User ID is missing'
                ]);
            }
                $product_id =$request->input('id');
                if (!$product_id) {
                    return response()->json([
                    'status' => 'failed',
                    'message' => 'Product ID is missing'
                ]);
            }
            $product = Product::where('id', $product_id)->where('user_id', $user_id)->first();
            if (!$product) {
                return response()->json([
                'status' => 'failed',
                'message' => 'Product not found'
                ]);
            }    
            return response()->json([
                'status' => 'success',
                'message' => 'Product fetched successfully',
                'data' => $product
            ]);
        
        }catch(\Throwable $e)  {
                return response()->json([
                'status'  => 'failed',
                'message' => 'Unable to fetch product',
                'error'   => $e->getMessage()
            ]); 
        }    
        
    }   public function ProductDelete(Request $request){
        try{
            $user_id = $request->header('user_id');
            if (!$user_id) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'User ID is missing'
                ]);
            }
            $product_id = $request->input('id');
            if (!$product_id) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Product ID is missing'
                ]);
            }
            $product = Product::where('id', $product_id)->where('user_id', $user_id)->first();
            if (!$product) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Product not found',
                ]);
            }
            if ($product->img_url && file_exists(public_path($product->img_url))) {
                 unlink(public_path($product->img_url));
            }

            $product->delete();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Product deleted successfully'
                ]);

            }catch(\Throwable $e){
            return response()->json([
                'status'  => 'failed',
                'message' => 'Unable to delete product',
                'error'   => $e->getMessage()
            ]);
        }
    }

   public function ProductUpdate(Request $request)
    {
        $user_id=$request->header('user_id');
        $product_id=$request->input('id');

        if ($request->hasFile('img')) {

            // Upload New File
            $img=$request->file('img');
            $t=time();
            $file_name=$img->getClientOriginalName();
            $img_name="{$user_id}-{$t}-{$file_name}";
            $img_url="uploads/{$img_name}";
            $img->move(public_path('uploads'),$img_name);

            // Delete Old File
            $filePath=$request->input('file_path');
            File::delete($filePath);

            // Update Product

            return Product::where('id',$product_id)->where('user_id',$user_id)->update([
                'name'=>$request->input('name'),
                'price'=>$request->input('price'),
                'unit'=>$request->input('unit'),
                'img_url'=>$img_url,
                'category_id'=>$request->input('category_id')
            ]);

        }

        else {
            return Product::where('id',$product_id)->where('user_id',$user_id)->update([
                'name'=>$request->input('name'),
                'price'=>$request->input('price'),
                'unit'=>$request->input('unit'),
                'category_id'=>$request->input('category_id'),
            ]);
        }
    }
}



