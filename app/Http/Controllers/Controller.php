<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Str, Validator, DB, Exception;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function adminLogin(Request $r){
    	if(request()->method()=="POST"){
    		$validator = Validator::make($r->all(), [ 
	            'username' => 'required',
	            'password' => 'required',
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

	        if(Auth::attempt(['user_name' => request('username'), 'password' => request('password')]))
	        {   
	            
	            return 1;
	        } 
	        else{
	            return "Sorry, Login details not matched.";     
	        }

	    }
    	return view('admin.login');
    }
}
