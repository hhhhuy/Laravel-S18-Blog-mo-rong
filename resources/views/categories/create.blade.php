@extends('home')
@section('title', 'Thêm mới khách hàng')
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
                <h1>Thêm mới thể loại</h1>
            </div>
            <div class="col-12">
                <form method="post" action="">
                    @csrf
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection