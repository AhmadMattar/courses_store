@extends('outside.master')
@section('content')
    <main>
        <section class="hero">
            <div class="content">
                <h1 class="mb-4 mt-0">We are the top one in the Market</h1>
                <form action="{{route('website.search')}}" method="POST">
                    @csrf
                    <input type="text" name="search" placeholder="Course name.." class="form-control form-control-lg">
                </form>
            </div>
        </section>

        <section class="courses py-5">
            <div class="container">
                <h2 class="text-center mb-4">Our Courses</h2>
                <div class="row justify-content-center">
                    @forelse ($courses as $course)
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card course-card">
                            <img src="{{asset('uploads/'.$course->image)}}" class="card-img-top" alt="{{$course->name}}">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title">{{$course->name}}</h5>
                                        <h5>{{$course->price}}$</h5>
                                    </div>
                                    <p class="card-text ">
                                        @php
                                            echo substr($course->content,0,70).'...';
                                        @endphp
                                    </p>
                                    <a href="{{route('website.course',$course->slug)}}" class="btn btn-dark w-100 mt-3">More info...</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="row justify-content-center">
                            No Courses Found
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
@stop
