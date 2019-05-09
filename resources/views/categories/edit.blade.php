@extends('home')
@section('title', 'Cập nhật thông tin tỉnh thành')
@section('content')
    <div class="col-12 col-md-12">
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
                <a href="{{route('categories.index')}}">
                    <button class="btn btn-outline-info">Danh sách thể loại
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h1>Chỉnh sửa thể loại</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{route('categories.update', $category->id)}}">
                    @csrf
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection