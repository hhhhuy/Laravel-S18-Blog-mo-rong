@extends('home')
@section('content')
    <div class="row">
        <div class="menu" style="margin: auto">
            <a href="{{route('welcome')}}">
                <button class="btn btn-outline-info">Trang Chủ</button>
            </a>
            <a href="{{route('blogs.create')}}">
                <button class="btn btn-outline-info">Thêm mới Bài viết
                </button>
            </a>
            <a href="{{route('blogs.index')}}">
                <button class="btn btn-outline-info">Danh sách Bài viết
                </button>
            </a>
            <a href="{{route('categories.create')}}">
                <button class="btn btn-outline-info">Thêm mới thể loại
                </button>
            </a>
            <a href="{{route('categories.index')}}">
                <button class="btn btn-outline-info">Danh sách thể loại
                </button>
            </a>
        </div>
    </div>
    <div class="text-center">
        <h3 class="text-dark mt-5">Thông Tin Bài viết</h3>
        <div class="col-sm-4 offset-4" style="max-width: 100%; margin-left: 0">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Tên: {{$blog->title}}</h5>
                    <h6 class="card-text ">Nội dung: {{$blog->content}}</h6>
                    <p class="card-text">Ảnh:<br> <img src="{{ asset('storage/' . $blog->image) }}" alt=""
                                                       style="width: 300px">
                    </p>
                    <p class="card-text">Thể loại: {{$blog->category->name}}</p>
                    <p class="card-text">Ngày viết: {{$blog->date}}</p>
                </div>
            </div>
        </div>
        <a href="{{route('blogs.edit',$blog->id)}}" class="btn btn-warning mt-3">Sửa</a>
        <a href="{{route('blogs.index')}}" class="btn btn-success mt-3">Quay Lại</a>
    </div>
@endsection