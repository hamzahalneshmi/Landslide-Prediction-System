<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
Use Alert;

class CategoryController extends Controller
{
    public function index()
    {
        if(Auth()->user()->can('Show Categories')){

        $categories = Category::paginate(5);
        return view('Admin-lte.blog.category.index',compact('categories'));
        }
        return view('errors.401');
    }
    public function store(Request $request)
    {
        if(Auth()->user()->can('Add Category')){
        $request->validate([
            'category_name'=>'required',
        ]);

        $category = new Category([
            'name' => $request->get('category_name'),
            ]);
        $category->save();
        Alert::success('Success', 'Category saved!');

        return redirect('/admin/category');
        }
        return view('errors.401');
    }
    public function edit($id)
    {
        if(Auth()->user()->can('Edit Category')){
        $category = Category::find($id);
        return view('Admin-lte.blog.category.edit', compact('category'));
        }
        return view('errors.401');
    }
    public function update(Request $request, $id)
    {
        if(Auth()->user()->can('Edit Category')){
        $request->validate([
            'category_name'=>'required',
        ]);

        $category = Category::find($id);
        $category->name =  $request->get('category_name');
        $category->save();
        Alert::success('Success', 'Category updated!');
        return redirect('/admin/category');
        }
        return view('errors.401');
    }
    public function destroy($id)
    {
        if(Auth()->user()->can('Delete Category')){
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            Alert::success('Success', 'Category has been deleted');

            return redirect()->back(); 
        } catch (\Throwable $th) {
            Alert::warning('Warning', 'Can not delete, category has Posts');

            return redirect()->back(); 

        }
        }
    return view('errors.401');
    }
        
  
    public function show($id)
    {
        $categories = Category::all();
        $categoryy = Category::findOrFail($id);
        $posts = Post::where('category_id', $id)->paginate(8);
        $popular_posts = Post::orderBy('view_count', 'desc')->take(6)->get();
        return view("FEpartials.blog.category", compact('categoryy','posts','categories','popular_posts'));
    }

}
