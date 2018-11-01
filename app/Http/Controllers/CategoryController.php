<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Post;
use DB;


class CategoryController extends Controller
{
    public function index(){
        $category = Category::orderBy('name', 'asc');

        return view('dashboardAdmin', compact('category'));
    }

    public function store(Request $request){

        $validator = $this->validate($request, [
            'name' => 'required|unique:postcategory'
        ],
    [
        'name.unique' => 'Category already exists'
    ]);

        // if($validator->fails()){
        //     return redirect('dashboardAdmin')->with('error', 'Category already exists');
        // }

        $category = new Category;
        $category->name = $request->input('name');
        $category->user_id = auth()->user()->id;

        $category->save();
        return redirect('dashboardAdmin')->with('success', 'Category created');
    }



    public function destroy($id){

        $category = Category::find($id);
        $category->delete();
        return redirect('dashboardAdmin')->with('success', 'Category deleted');
    }
}
