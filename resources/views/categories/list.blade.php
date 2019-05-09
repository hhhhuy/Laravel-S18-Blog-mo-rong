@extends('home')
@section('title', 'Danh sách tỉnh thành')
@section('content')
    <div class="col-12">
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
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h1>Danh Sách Thể loại</h1>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên Thể loại</th>
                    <th scope="col">Số bài viết</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($categories) == 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($categories as $key => $category)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ count($category->blogs) }}</td>
                            <td><a href="{{route('categories.edit',$category->id)}}">
                                    <button class="btn btn-outline-warning">sửa</button>
                                </a></td>
                            <td><a href="{{route('categories.destroy', $category->id)}}" class="text-danger"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa {{$category->name}} ?')">
                                    <button class="btn btn-outline-danger">xóa</button>
                                </a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{route('categories.create')}}">Thêm mới</a>
        </div>
    </div>
@endsection