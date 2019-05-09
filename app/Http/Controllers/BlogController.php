<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('welcome');
    }
    public function index()
    {
        $blogs = Blog::all();
        $categories = Category::all();
        return view('blogs.list', compact('blogs', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('blogs.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $blog->image = $path;
        }
        $blog->date = $request->input('date');
        $blog->category_id = $request->input('category_id');
        $blog->save();
        Session::flash('success', 'Tạo mới thành công');
        //tao moi xong quay ve trang danh sach task
        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        return view('blogs.show', compact('blog','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        return view('blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');

        //cap nhat anh
        if ($request->hasFile('image')) {

            //xoa anh cu neu co
            $currentImg = $blog->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            // cap nhat anh moi
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $blog->image = $path;
        }

        $blog->date = $request->input('date');
        $categories->name = $request->input('name');
        $blog->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật thành công');
        //tao moi xong quay ve trang danh sach task
        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $image = $blog->image;

        //delete image
        if ($image) {
            Storage::delete('/public/' . $image);
        }

        $blog->delete();

        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        //xoa xong quay ve trang danh sach task
        return redirect()->route('blogs.index');

    }
}
