<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str, Validator, DB, Exception;
use App\Models\Category;
use App\Models\Addon;
use App\Models\Product;


class ProductController extends Controller
{
    public function list(Request $r){
    	$products = Product::with('images','category','category.addons')->orderByDesc('created_at')->paginate(10);
    	
    	return view('admin.prouduct_list',compact('products'));
    }

    public function addUpdate(Request $r){
    	if(request()->method() == "POST"){
    		if($r->p_id){
                $validator = Validator::make($r->all(), [ 
                	'category' => 'nullable',
                    'product_name' => 'nullable| string |max:50',
                    'quantity'  => 'nullable | numeric',
                    'price'		=> 'nullable',
                    'discount'	=> 'nullable |integer| max:50',
                    'description' => 'nullable',
                    'image' => 'nullable',
 					'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);
                if ($validator->fails()) 
                { 
                    foreach ($validator->messages()->getMessages() as $field_name => $messages)
                    { 
                        foreach ($messages as $msg)
                        { 
                           return response()->json($validator->getMessageBag()->toArray());
                        }
                    }         
                }

                Product::where('id',$r->p_id)->update(array_filter(['category_id'=>$r->category,'name'=>$r->product_name,'quantity'=>$r->quantity,'price'=>$r->price, 'discount'=>$r->discount, 'description'=>$r->description ]));
                $product = Product::where('id',$r->p_id)->first();

                if($files=$r->file('image')){
                	$product->images()->delete();
			        foreach($files as $file){
			            $name = moveImage($file, 'product/images');
			            $product->addProductImage($name);
			        }
			    }
                return 2;
            }else{
                $validator = Validator::make($r->all(), [ 
                	'category' => 'required',
                    'product_name' => 'required| string |max:50',
                    'quantity'  => 'required | numeric',
                    'price'		=> 'required',
                    'discount'	=> 'required | integer| max:50',
                    'description' => 'required',
                    'image' => 'required',
 					'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

                ]);
                if ($validator->fails()) 
                { 
                    foreach ($validator->messages()->getMessages() as $field_name => $messages)
                    { 
                        foreach ($messages as $msg)
                        { 
                           return response()->json($validator->getMessageBag()->toArray());
                        }
                    }         
                }
                $id = Product::insertGetId(array_filter(['category_id'=>$r->category,'name'=>$r->product_name,'quantity'=>$r->quantity,'price'=>$r->price, 'discount'=>$r->discount, 'description'=>$r->description ,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]));
            	$product = Product::where('id',$id)->first();

                if($files=$r->file('image')){
			        foreach($files as $file){
			            $name = moveImage($file, 'product/images');
			            $product->addProductImage($name);
			        }
			    }

                return 1;
            }
    	}
    	$categories = Category::get();
        if($r->p_id){
            $product = Product::with('images')->where('id',$r->p_id)->first();
            return view('admin.addUpdateProduct',compact('product','categories'));
        }else{
            return view('admin.addUpdateProduct',compact('categories'));
        }
    }

    public function delete(Request $r){
    	Addon::where('id',$r->p_id)->delete();
        return redirect()->back();
    }

    public function webProductList(Request $r){
    	$products = Product::with('images','category','category.addons')->orderByDesc('created_at')->get();
    	return view('website.product_listing',compact('products'));
    }

    public function productDetail(Request $r){
    	$product = Product::with('images','category','category.addons')->where('id',$r->p_id)->first();
    	$related_products = Product::with('images','category','category.addons')->where('category_id',$product->category_id)->where('id','<>',$product->id)->get()->take(4);
    	return view('website.product_details',compact('product','related_products'));
    }
}
