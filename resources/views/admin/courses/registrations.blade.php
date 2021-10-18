@extends('admin.layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">All Registrations</h1>
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
                    <h3 class="card-title">All Registrations</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Pay Status</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = ($result*5) - 4
                            @endphp
                            @forelse ($registrations as $registration )
                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{$registration->user->name}}</td>
                                    <td>{{$registration->course->category->name}}</td>
                                    <td>{!! $registration->status ?
                                            '<span class="badge badge-success"> Completed </span>' : '<span class="badge badge-warning"> Not Completed </span>'
                                        !!}
                                    </td>
                                    <td>{{$registration->created_at}}</td>
                                    <td>
                                        <form class="d-inline" action="{{route('registrations.destroy',$registration->id)}} "method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger my-2" onclick="return confirm('Are You Sure')"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $count++
                                @endphp
                            @empty
                                <tr>
                                    <td colspan="4">No Registrations Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$registrations->links()}}
                </div>
                <!-- /.card-body -->
            </div>
        <!-- /.card -->
        </div>
    </div>
</div>
@stop
