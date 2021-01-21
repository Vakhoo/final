<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\cart;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function index()
    {
    	return view("guest.index",["data"=>products::get()]);

    }

    public function addcart(Request $Request)
    {
    	return cart::create([
    		"user_id"=>$Request->input("user_id"),
    		"product_id"=>$Request->input("product_id"),
    		"product_num"=>$Request->input("product_num")
    	]);
    }

    public function mypage()
    {
    	return cart::with("products")->where("user_id",  Auth::user()->id)->get();
    	// return view("guest.mypage", ["data"=>]);
    }
}
