<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::paginate(5);
        $paginator = new Paginator($courses,5);
        $result = $paginator->currentPage();
        return view("admin.courses.index",compact('courses','result'));
    }

    public function registrations()
    {
        $registrations = Registration::paginate(5);
        $paginator = new Paginator($registrations,5);
        $result = $paginator->currentPage();
        return view("admin.courses.registrations",compact('registrations','result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.courses.create",compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'price' => 'required',
            'content' => 'required',
            'image' => 'required|image',
            'category_id' => 'required',

        ]);

        $ex = $request->file('image')->getClientOriginalExtension();
        $img_new_name = 'courses_store'. time() . '.' . $ex;
        $request->file('image')->move(public_path('uploads'),$img_new_name);

        Course::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'content' => $request->content,
            'image' => $img_new_name,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('courses.index')
        ->with('success','Course Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = Category::all();
        return view("admin.courses.edit",compact('course','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'image|nullable'
        ]);

        $new_name = $course->image;
        if ($request->has('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $new_name = 'courses_store'. time() . '.' . $ext;
            $request->file('image')->move(public_path('uploads'),$new_name);
        }

        $course->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'content' => $request->content,
            'image' => $new_name,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('courses.index')
        ->with('success','Course Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')
        ->with('success','Course Deleted Successfully');
    }

    public function registrationsDelete($id)
    {
        Registration::find($id)->delete();
        return redirect()->route('registrations')->with('success','registrations Deleted Successfully');
    }
}
