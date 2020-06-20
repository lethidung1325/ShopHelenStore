<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;
use App\Model\Banner;
use App\Model\Comment;
use Illuminate\Support\Str;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $categories = Category::all();
        view()->share('categories', $categories);
    }

    public function index()
    {
        $product = Product::where('product_featured', 1)->orderBy('id', 'desc')->take(6)->get();
        $news = Product::orderBy('id', 'desc')->take(4)->get();
        return view('fontend.pages.home', compact('product', 'news'));
    }

    public function category($id)
    {
        $category = Category::find($id);
        return view('fontend.pages.category', compact('category'));
    }

    public function detailProduct($id)
    {
        $product = Product::find($id);
        $related_product = Product::where('category_id', $product->category_id)->take(4)->get();
        return view('fontend.pages.detail_product', compact('product', 'related_product'));
    }

    public function contact()
    {
        return view('fontend.pages.contact');
    }

    public function search(Request $request)
    {
        $result = $request->search;
        $keyword = $result;
        $result = Str::replaceArray(' ', ['%'], $result);
        $items = Product::where('title', 'like', '%' . $result . '%')->get();
        return view('fontend.pages.search', compact('items', 'keyword'));
    }
}
