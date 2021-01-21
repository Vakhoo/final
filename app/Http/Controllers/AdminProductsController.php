<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use Illuminate\Support\Facades\Input;


class AdminProductsController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
        $this->middleware("CheckAdmin");
    }
    public function index()
    {
        // return products::with("category")->get();
        return view("admin.products.index",["data"=>products::get()]);
    }

    public function create()
    {
        return view("admin.products.create");
    }

    public function store(Request $request)
    {
    	if (Input::file("image")) {
            $dest=public_path("gallery");
            $filename=$request->input("img_name").".jpg";
            $img=Input::file("image")->move($dest, $filename);

            products::create([
	        	"title"=>$request->input("title"),
	        	"description"=>$request->input("description"),
	        	"price"=>$request->input("price"),
	        	"img_name"=>$request->input("img_name")

        	]);
        }else{
            products::create([
        	"title"=>$request->input("title"),
        	"description"=>$request->input("description"),
        	"price"=>$request->input("price"),
        ]);
        }

        return redirect()->route("productsindex");
    }


    public function show(Request $request)
    {
        $productsshow=products::where("id", $request->input("id"))->firstOrFail();
        return view("admin.products.edit", ["data"=>$productsshow]);
    }


    public function update(Request $request)
    {
        products::where("id", $request->input("id"))->update([
        	"title"=>$request->input("title"),
        	"description"=>$request->input("description"),
        	"price"=>$request->input("price"),
        	"img_name"=>$request->input("img_name")
        ]);
        return redirect()->route("productsindex");
    }


    public function delete(Request $request)
    {
        products::where("id", $request->input("id"))->delete();
        return redirect()->back();
    }

}
