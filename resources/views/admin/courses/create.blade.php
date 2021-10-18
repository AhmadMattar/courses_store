@extends('admin.layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add New Course</h1>
          @include('admin.layouts.errors')
        </div>
      </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('courses.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="name" placeholder="Course Name" class="form-control mb-3" value="{{old('name')}}">
                    <input type="text" name="price" placeholder="Price" class="form-control mb-3" value="{{old('price')}}">
                    <textarea name="content" placeholder="Content" rows="7" class="form-control mb-3">{{old('content')}}</textarea>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <select name="category_id" class="form-control mb-3">
                        <option value="" selected disabled>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-info">Add</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
    </div>
</div>
@stop
