<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function show(){
        $categories = Category::all();
        // dd($categories);

        return view('category', [
            'title' => 'Category',
            'categories' => $categories
        ]);
    }

    public function show_add(){
        return view('category_add', [
            'title' => 'Add Category',
        ]);
    }

    public function create(Request $request){
        $this->validate($request, [
            'nama_category' => 'required'
        ]);
        // cek duplikat nama
        $nama_category = Category::where(['nama_category'=>$request->nama_category])->first();
        if($nama_category){
            return back()->with('error_nama', 'nama sudah diganakan');
        }
        Category::create([
            'nama_category' => $request->nama_category
        ]);
        return redirect('/category')->with('add_berhasil', 'Data berhasil ditambah');
    }

    public function show_update($id){
        $category = Category::where('id', $id)->first();
        return view('category_update', [
            'title' => 'Update Category',
            'category' =>$category
        ]);
    }

    public function update(Request $request){
        $this->validate($request, [
            'nama_category' => 'required'
        ]);

        // cek duplikat nama
        $nama_category = Category::where(['nama_category'=>$request->nama_category])->first();
        if($nama_category){
            return back()->with('error_nama', 'nama sudah diganakan');
        }
        Category::where('id', $request->id)
            ->update([
                'nama_category' => $request->nama_category
            ]);
        return redirect('/category')->with('update_berhasil', 'Data berhasil diupdate');
    }
}
