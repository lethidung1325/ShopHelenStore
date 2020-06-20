<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;

class CategoryController extends Controller
{
    // trả về giao diện thêm thương hiệuzz
    public function getAdd()
    {
        // Trả ra trang giao diện thêm thương hiệu 
        return view('admin.category.add');
    }

    //thêm thương hiệu vào cơ sở dữ liệu
    public function postAdd(Request $request)
    {
        //kiểm tra dữ liệu truyền vào có đúng hay không
        $this->validate($request, [
            'name' => 'required|min:3|max:30|unique:categories',
        ], [
            'name.required' => 'Vui lòng điền tên thương hiệu',
            'name.min'      => 'Tên phải có ít nhất 3 ký tự',
            'name.max'      => 'Tên phải có nhiều nhất 30 ký tự',
            'name.unique'   => 'Tên đã tồn tại',
        ]);
        Category::create($request->all()); // Thêm dữ liệu vào bảng thương hiệu 
        return redirect()->route('list_category')->with('message', 'Thêm thành công'); //trả kết quả thêm thành công ở trang danh sách thương hiệu
    }

    //lấy danh sách các thương hiệu trong cơ sở dữ liệu
    public function getList()
    {
        $category = Category::orderBy('id', 'desc')->get(); //Lấy dữ liệu ở bảng thương hiệu và sắp xếp giảm dần theo cột id
        return view('admin.category.list', compact('category'));
    }

    // trả về giao diện chỉnh sửa 
    public function getEdit($id)
    {
        $category = Category::find($id); //Lấy thương hiệu có id cần tìm 
        return view('admin.category.edit', compact('category'));
    }

    // cập nhật thương hiệu
    public function postEdit($id, Request $request)
    {
        //Kiểm tra dữ liệu đươc nhập vào có đúng hay không
        $this->validate($request, [
            'name' => 'required|min:3|max:30',
        ], [
            'name.required' => 'Vui lòng điền tên thương hiệu',
            'name.min'      => 'Tên phải có ít nhất 3 ký tự',
            'name.max'      => 'Tên phải có nhiều nhất 30 ký tự',
        ]);
        Category::find($id)->update($request->all()); //Tìm hương hiệu theo id cần được cập nhật
        return redirect()->route('list_category')->with('message', 'Sửa thành công');
    }

    // xóa thương hiệu
    public function postDelete($id)
    {
        Category::find($id)->delete(); //Tìm thương hiệu có id muốn xóa
        return back()->with('message', 'Xóa thành công');
    }
}
