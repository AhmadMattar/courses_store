@extends('admin.layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Category</h1>
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
                <form action="{{route('categories.update',$category->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <input type="text" name="name" placeholder="Category Name" class="form-control mb-3" value="{{$category->name}}">
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
