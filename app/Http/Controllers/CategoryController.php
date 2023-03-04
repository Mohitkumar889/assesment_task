<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str, Validator, DB, Exception;
use App\Models\Category;

class CategoryController extends Controller
{
    public function list(Request $r){
        $categories = Category::orderByDesc('created_at')->paginate(10);
    	
    	return view('admin.category_list',compact('categories'));
    }

    public function addUpdate(Request $r){
    	if(request()->method() == "POST"){
    		if($r->cat_id){
                $validator = Validator::make($r->all(), [ 
                    'category_name' => "nullable| string |max:50| unique:categories,name,$r->cat_id",
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
                Category::where('id',$r->cat_id)->update(array_filter(['name'=>$r->category_name]));
                return 2;
            }else{
                $validator = Validator::make($r->all(), [ 
                    'category_name' => 'required| string |max:50| unique:categories,name',
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
                Category::create(array_filter(['name'=>$r->category_name]));
                return 1;
            }
    	}
        if($r->cat_id){
            $category = Category::where('id',$r->cat_id)->first();
            return view('admin.addUpdateCategory',compact('category'));
        }else{
            return view('admin.addUpdateCategory');
        }
    	
    }

    public function delete(Request $r){
        Category::where('id',$r->cat_id)->delete();
        return redirect()->back();
    }
}
