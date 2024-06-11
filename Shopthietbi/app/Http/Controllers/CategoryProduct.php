<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Category;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use DB;
session_start();

class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
           return Redirect::to('admin.dasboard');
        }else{
            return Redirect::to('/login-admin')->send();
        }
    }
    public function add_category_product(){
        $this -> AuthLogin();
        $all_category_product = Category::orderBy('category_id','DESC')->get();

        return view('admin.add_category_product')->with(compact('all_category_product'));
    }

    public function list_category_product(){
        $this -> AuthLogin();
        $all_category_product = Category::orderBy('category_id','DESC')->get();
        $manager_category_product = view('admin.list_category_product') -> with('all_category_product', $all_category_product);
        return view('admin_layout')->with('admin.list_category_product', $manager_category_product);
    }
    public function save_category_product(Request $request){
        $this -> AuthLogin();
        $data = $request->all();
        
        if (!isset($data['category_parent'])) {
            $category = new Category();
            $category->category_name = $data['category_product_name'];
            $category->category_slug = $data['category_product_slug'];
            $category->category_status = $data['category_product_status'];
            $category->save();
        }else{
            $category = new Category();
            $category->category_name = $data['category_product_name'];
            $category->category_slug = $data['category_product_slug'];
            $category->category_status = $data['category_product_status'];
            $category->category_parent = $data['category_parent'];
            $category->save();
        }
        
        
        Session::put('message','Thêm thành công');
       
        return Redirect::to('/add-category-product');
    }
    public function active_category_product($category_product_id){
        $this -> AuthLogin();
        Category::where('category_id', $category_product_id)->update(['category_status' => 1]);
        return Redirect::to('/list-category-product');
    }
    public function unactive_category_product($category_product_id){
        $this -> AuthLogin();
        Category::where('category_id', $category_product_id)->update(['category_status' => 0]);
        return Redirect::to('/list-category-product');
    }

    public function edit_category_product($category_product_id){
        $this -> AuthLogin();
        $all_category_product = Category::orderBy('category_id','DESC')->where('category_parent','0')->get();

        $edit_category_product= Category::where('category_id', $category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product') 
        -> with('all_category_product', $all_category_product)
        -> with('edit_category_product', $edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }
    public function update_category_product(Request $request, $category_product_id){
        $this -> AuthLogin();
        $data = $request->all();
        $category = Category::find($category_product_id);
        $category->category_name = $data['category_product_name'];
        $category->category_slug = $data['category_product_slug'];
        $category->category_parent = $data['category_parent'];

        $category->save();
        Session::put('message','Cập nhật thành công');
       
        return Redirect::to('/list-category-product');
    }
    public function delete_category_product($category_product_id){
        $this -> AuthLogin();
        Category::where('category_id', $category_product_id)->delete();
        Session::put('message','Xoá thành công');
        return Redirect::to('/list-category-product');
    }

    
}
