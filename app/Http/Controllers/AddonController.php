<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str, Validator, DB, Exception;
use App\Models\Category;
use App\Models\Addon;

class AddonController extends Controller
{
    /**
     * Method used GET 
     * return list of Addons
     */
    public function list(Request $r){
    	$addons = Addon::with('category')->orderByDesc('created_at')->paginate(10);
    	return view('admin.addon_list',compact('addons'));
    }

    /**
     * Method used GET and POST 
     * @param category , addon_name required
     * Function for add and update Addons
     */
    public function addUpdate(Request $r){
    	if(request()->method() == "POST"){
    		if($r->ad_id){
                $validator = Validator::make($r->all(), [ 
                	'category'   => 'nullable',
                    'addon_name' => "nullable| string |max:50",
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
                Addon::where('id',$r->ad_id)->update(array_filter(['category_id'=>$r->category,'addon_name'=>$r->addon_name]));
                return 2;
            }else{
                $validator = Validator::make($r->all(), [ 
                	'category' => 'required',
                    'addon_name' => 'required| string |max:50',
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
                Addon::create(array_filter(['category_id'=>$r->category,'addon_name'=>$r->addon_name]));
                return 1;
            }
    	}
    	$categories = Category::get();
        if($r->ad_id){
            $addon = Addon::where('id',$r->ad_id)->first();
            return view('admin.addUpdateAddon',compact('addon','categories'));
        }else{
            return view('admin.addUpdateAddon',compact('categories'));
        }
    	
    }

    /**
     * Method used GET 
     * @param addon id required
     * Function for DELETE Addons
     */
    public function delete(Request $r){
        Addon::where('id',$r->ad_id)->delete();
        return redirect()->back();
    }
}
