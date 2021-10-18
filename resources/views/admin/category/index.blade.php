@extends('admin.layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">All Categories</h1>
        </div>
      </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

        @section('script')
            @if (session('success'))
                <script>
                    toastr.success('{{session('success')}}')
                </script>
            @endif
        @stop
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Categories</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = ($result*5) - 4
                        @endphp
                        @forelse ($categories as $category )
                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->created_at}}</td>
                                <td>
                                    <a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary my-2"><i class="far fa-edit"></i></a>
                                    <form class="d-inline" action="{{route('categories.destroy',$category->id)}} "method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger my-2" onclick="return confirm('⚠⚠ Are You Sure??')"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $count++
                            @endphp
                        @empty
                            <tr>
                                <td colspan="4">No Categories Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{$categories->links()}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
    </div>
</div>
@stop
