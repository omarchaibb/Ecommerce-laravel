<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(){
        $categories = Category::all();
        return view('category.index',compact('categories'));
    }



    public function create(){
        $isUpdate = false;
        $category = new Category();
        return view('category.form',compact('isUpdate','category'));
    }



    public function store(Request $request){
        $formfields = $request->validate([
            'name' => 'required',
        ]);
        Category::create($formfields);
        return to_route('category.index')->with('success','category Added seccessfuly');
    }



    public function show(Category $category){
        $products = $category->product()->get();
        return view('category.show',compact('products','category'));

    }


    public function edit(Category $category){
        $isUpdate = true;
        return view('category.form',compact('category','isUpdate'));
    }



     public function update(Request $request,Category $category){
        $formfields = $request->validate([
            'name' => 'required',
        ]);
        $category->fill($formfields)->save();
        return to_route('category.index')->with('seccess','edited successfuly');
        

     }

     public function destroy(Request $request,Category $category){
        $category->delete();
        return to_route('category.index')->with('success','deleted successfly');
     }



     public function delete(Request $request){
        
     }
}
