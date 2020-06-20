<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function getAdd()
    {
        $category = Category::all();
        return view('admin.product.add',compact('category'));
    }

    public function postAdd(ProductRequest $request)
    {
        $product = new Product;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->content = $request->content;
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect()->back()->with('error','Bạn chỉ có thể chọn file jpg, png hoặc jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("public/upload/image/".$image))
            {
                $image = Str::random(4)."_".$name;
            }   
            $file->move("public/upload/image/",$image);
            $product->image = $image;
        }else{
            $product->image = "";
        }
        $product->product_featured = $request->product_featured;
        $product->save();

        return redirect(route('list_product'))->with('message','Thêm thành công');
    }

    public function getList()
    {
        $product = Product::all();
        return view('admin.product.list',compact('product'));
    }

    public function getEdit($id)
    {
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.product.edit',compact('product','category'));
    }

    public function postEdit($id, ProductRequest $request)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->content = $request->content;
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect()->back()->with('error','Bạn chỉ có thể chọn file jpg, png hoặc jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("upload/image/".$image))
            {
                $image = Str::random(4)."_".$name;
            }
            $file->move("upload/image/",$image);
            unlink("upload/image/".$product->image);
            $product->image = $image;
        }
        $product->save();

        return redirect(route('list_product'))->with('message','Sửa thành công');
    }

    public function postDelete($id)
    {
        $product = Product::find($id);
        unlink("public/upload/image/".$product->image);
        $product->delete();

        return back()->with('message','Xóa thành công');
    }
}   